<?php

/*************************************************************
 * core.class.php
 * Upgrade Plugins
 * Copyright (c) 2011 Prelovac Media
 * www.prelovac.com
 **************************************************************/
class MMB_Core
{
    /** @var MMB_Comment */
    private $comment_instance;

    /** @var MMB_Stats */
    private $stats_instance;

    /** @var MMB_User */
    private $user_instance;

    /** @var MMB_Installer */
    private $installer_instance;

    protected $mmb_multisite = false;

    protected $network_admin_install;

    public function __construct()
    {
        global $blog_id;

        if (is_multisite()) {
            $this->mmb_multisite         = $blog_id;
            $this->network_admin_install = get_option('mmb_network_admin_install');

            add_action('wpmu_new_blog', array(&$this, 'updateKeys'));
        }

        // admin notices
        if (!get_option('_worker_public_key')) {
            if ($this->mmb_multisite) {
                if (is_network_admin() && $this->network_admin_install == '1') {
                    add_action('network_admin_notices', array(&$this, 'network_admin_notice'));
                } else {
                    if ($this->network_admin_install != '1') {
                        $parent_key = $this->get_parent_blog_option('_worker_public_key');
                        if (empty($parent_key)) {
                            add_action('admin_notices', array(&$this, 'admin_notice'));
                        }
                    }
                }
            } else {
                add_action('admin_notices', array(&$this, 'admin_notice'));
            }
        }
    }

    public function network_admin_notice()
    {
        $enabledNotice = $this->isNoticeEnabled();

        if (count(mwp_get_communication_keys()) > 0 || !$enabledNotice) {
            return;
        }

        $configurationService = new MWP_Configuration_Service();
        $configuration        = $configurationService->getConfiguration();
        $notice               = $configuration->getNetworkNotice();

        echo $notice;
    }

    public function admin_notice()
    {
        $enabledNotice = $this->isNoticeEnabled();

        if (count(mwp_get_communication_keys()) > 0 || !$enabledNotice) {
            return;
        }

        $configurationService = new MWP_Configuration_Service();
        $configuration        = $configurationService->getConfiguration();
        $notice               = is_multisite() ? $configuration->getNetworkNotice() : $configuration->getNotice();

        echo $notice;
    }

    private function isNoticeEnabled()
    {
        return apply_filters('mwp_admin_notice_enabled', true);
    }

    /**
     * Get parent blog options
     */
    private function get_parent_blog_option($option_name = '')
    {
        /** @var wpdb $wpdb */
        global $wpdb;
        $option = $wpdb->get_var($wpdb->prepare("SELECT `option_value` FROM {$wpdb->base_prefix}options WHERE option_name = '%s' LIMIT 1", $option_name));

        return $option;
    }

    /**
     * @return MMB_Comment
     */
    public function get_comment_instance()
    {
        if (!isset($this->comment_instance)) {
            $this->comment_instance = new MMB_Comment();
        }

        return $this->comment_instance;
    }

    /**
     * @return MMB_User
     */
    public function get_user_instance()
    {
        if (!isset($this->user_instance)) {
            $this->user_instance = new MMB_User();
        }

        return $this->user_instance;
    }

    /**
     * @return MMB_Stats
     */
    public function get_stats_instance()
    {
        if (!isset($this->stats_instance)) {
            $this->stats_instance = new MMB_Stats();
        }

        return $this->stats_instance;
    }

    /**
     * @return MMB_Installer
     */
    public function get_installer_instance()
    {
        if (!isset($this->installer_instance)) {
            $this->installer_instance = new MMB_Installer();
        }

        return $this->installer_instance;
    }

    public function buildLoaderContent($pluginBasename)
    {
        $loader = <<<EOF
<?php

/*
Plugin Name: ManageWP - Worker Loader
Plugin URI: https://managewp.com
Description: This is automatically generated by the ManageWP Worker plugin to increase performance and reliability. It is automatically disabled when disabling the main plugin.
Author: GoDaddy
Version: 1.0.0
Author URI: https://godaddy.com
License: GPL2
Network: true
*/

if (!function_exists('untrailingslashit') || !defined('WP_PLUGIN_DIR')) {
    // WordPress is probably not bootstrapped.
    exit;
}

if (file_exists(untrailingslashit(WP_PLUGIN_DIR).'/$pluginBasename')) {
    if (in_array('$pluginBasename', (array) get_option('active_plugins')) ||
        (function_exists('get_site_option') && array_key_exists('worker/init.php', (array) get_site_option('active_sitewide_plugins')))) {
        \$GLOBALS['mwp_is_mu'] = true;
        include_once untrailingslashit(WP_PLUGIN_DIR).'/$pluginBasename';
    }
}

EOF;

        return $loader;
    }

    public function registerMustUse($loaderName, $loaderContent)
    {
        $mustUsePluginDir = rtrim(WPMU_PLUGIN_DIR, '/');
        $loaderPath       = $mustUsePluginDir.'/'.$loaderName;

        if (file_exists($loaderPath) && md5($loaderContent) === md5_file($loaderPath)) {
            return;
        }

        if (!is_dir($mustUsePluginDir)) {
            $dirMade = @mkdir($mustUsePluginDir);

            if (!$dirMade) {
                $error = error_get_last();
                throw new Exception(sprintf('Unable to create loader directory: %s', $error['message']));
            }
        }

        if (!is_writable($mustUsePluginDir)) {
            throw new Exception('MU-plugin directory is not writable.');
        }

        $loaderWritten = @file_put_contents($loaderPath, $loaderContent);

        if (!$loaderWritten) {
            $error = error_get_last();
            throw new Exception(sprintf('Unable to write loader: %s', $error['message']));
        }
    }

    /**
     * Plugin install callback function
     * Check PHP version
     */
    public function install()
    {
        update_option('mwp_recovering', '');
        update_option('mwp_incremental_update_active', '');
        update_option('mwp_core_autoupdate', '');
        update_option('mwp_container_parameters', array());
        update_option('mwp_container_site_parameters', array());
        update_option('mwp_maintenace_mode', array());
        mwp_container()->getMigration()->migrate();
        try {
            $this->registerMustUse('0-worker.php', $this->buildLoaderContent('worker/init.php'));
        } catch (Exception $e) {
            mwp_logger()->error('Unable to write ManageWP loader', array('exception' => $e));
        }

        /** @var wpdb $wpdb */
        global $wpdb;

        //delete plugin options, just in case
        if ($this->mmb_multisite != false) {
            $network_blogs = $wpdb->get_results("select `blog_id`, `site_id` from `{$wpdb->blogs}`");
            if (!empty($network_blogs)) {
                if (is_network_admin()) {
                    update_option('mmb_network_admin_install', 1);
                    $mainBlogId = defined('BLOG_ID_CURRENT_SITE') ? BLOG_ID_CURRENT_SITE : false;
                    foreach ($network_blogs as $details) {
                        if (($mainBlogId !== false && $details->blog_id == $mainBlogId) || ($mainBlogId === false && $details->site_id == $details->blog_id)) {
                            update_blog_option($details->blog_id, 'mmb_network_admin_install', 1);
                        } else {
                            update_blog_option($details->blog_id, 'mmb_network_admin_install', -1);
                        }

                        update_blog_option($details->blog_id, '_worker_nossl_key', '');
                        update_blog_option($details->blog_id, '_worker_public_key', '');
                        delete_blog_option($details->blog_id, '_action_message_id');
                    }
                } else {
                    update_option('mmb_network_admin_install', -1);
                    update_option('_worker_nossl_key', '');
                    update_option('_worker_public_key', '');
                    delete_option('_action_message_id');
                }
            }
        } else {
            update_option('_worker_nossl_key', '');
            update_option('_worker_public_key', '');
            delete_option('_action_message_id');
        }

        delete_option('mwp_notifications');
        delete_option('mwp_worker_brand');
        delete_option('mwp_worker_configuration');
        $path = realpath(dirname(__FILE__)."/../../worker.json");
        if (file_exists($path)) {
            $configuration     = file_get_contents($path);
            $jsonConfiguration = json_decode($configuration, true);
            if ($jsonConfiguration !== null) {
                update_option("mwp_worker_configuration", $jsonConfiguration);
            }
        }
    }

    public function deactivate($networkDeactivation = false, $workerDeactivation = true)
    {
        if ($workerDeactivation) {
            mwp_uninstall();
        }

        /** @var wpdb $wpdb */
        global $current_user, $wpdb;

        if ($this->mmb_multisite !== false) {
            $network_blogs = $wpdb->get_col("select `blog_id` from `{$wpdb->blogs}`");
            if (!empty($network_blogs)) {
                if (is_network_admin()) {
                    if ($networkDeactivation) {
                        delete_option('mmb_network_admin_install');
                        foreach ($network_blogs as $blog_id) {
                            delete_blog_option($blog_id, 'mmb_network_admin_install');
                            delete_blog_option($blog_id, '_worker_nossl_key');
                            delete_blog_option($blog_id, '_worker_public_key');
                            delete_blog_option($blog_id, '_action_message_id');
                            delete_blog_option($blog_id, 'mwp_notifications');

                            if ($workerDeactivation) {
                                delete_blog_option($blog_id, 'mwp_maintenace_mode');
                                delete_blog_option($blog_id, 'mwp_worker_brand');
                            }
                        }
                    }
                } else {
                    if ($networkDeactivation) {
                        delete_option('mmb_network_admin_install');
                    }

                    delete_option('_worker_nossl_key');
                    delete_option('_worker_public_key');
                    delete_option('_action_message_id');
                }
            }
        } else {
            delete_option('_worker_nossl_key');
            delete_option('_worker_public_key');
            delete_option('_action_message_id');
        }

        //Delete options
        delete_option('mwp_notifications');
        wp_clear_scheduled_hook('mwp_notifications');
        wp_clear_scheduled_hook('mwp_datasend');

        if ($workerDeactivation) {
            delete_option('mwp_maintenace_mode');
            delete_option('mwp_worker_brand');
            delete_option('mwp_worker_configuration');
        }
    }

    /**
     * Worker update
     */
    public function update_worker_plugin($params)
    {
        if ($params['download_url']) {
            @include_once ABSPATH.'wp-admin/includes/file.php';
            @include_once ABSPATH.'wp-admin/includes/misc.php';
            @include_once ABSPATH.'wp-admin/includes/template.php';
            @include_once ABSPATH.'wp-admin/includes/class-wp-upgrader.php';
            @include_once ABSPATH.'wp-admin/includes/screen.php';
            @include_once ABSPATH.'wp-admin/includes/plugin.php';

            if (!$this->is_server_writable()) {
                return array(
                    'error' => 'Failed, please <a target="_blank" href="http://managewp.com/user-guide/faq/my-pluginsthemes-fail-to-update-or-i-receive-a-yellow-ftp-warning">add FTP details for automatic upgrades.</a>',
                );
            }

            mwp_load_required_components();

            ob_start();
            @unlink(dirname(__FILE__));
            /** @handled class */
            $upgrader = new Plugin_Upgrader(mwp_container()->getUpdaterSkin());
            $result   = $upgrader->run(
                array(
                    'package'           => $params['download_url'],
                    'destination'       => WP_PLUGIN_DIR,
                    'clear_destination' => true,
                    'clear_working'     => true,
                    'hook_extra'        => array(
                        'plugin' => 'worker/init.php',
                    ),
                )
            );
            ob_end_clean();
            if (is_wp_error($result) || !$result) {
                return array(
                    'error' => 'ManageWP Worker plugin could not be updated.',
                );
            } else {
                return array(
                    'success' => 'ManageWP Worker plugin successfully updated.',
                );
            }
        }

        return array(
            'error' => 'Bad download path for worker installation file.',
        );
    }

    public function updateKeys()
    {
        if (!$this->mmb_multisite) {
            return;
        }

        global $wpdb;

        $publicKey = $this->get_parent_blog_option('_worker_public_key');

        if (empty($publicKey)) {
            return;
        }

        $networkBlogs = $wpdb->get_results("select `blog_id` from `{$wpdb->blogs}`");

        if (empty($networkBlogs)) {
            return;
        }

        foreach ($networkBlogs as $details) {
            update_blog_option($details->blog_id, '_worker_public_key', $publicKey);
        }

        return;
    }

    public function mmb_get_user_info($user_info = false, $info = 'login')
    {
        if ($user_info === false) {
            return false;
        }

        if (strlen(trim($user_info)) == 0) {
            return false;
        }

        return get_user_by($info, $user_info);
    }

    public function mmb_get_transient($option_name)
    {
        global $wp_version;

        if (trim($option_name) == '') {
            return false;
        }

        if (version_compare($wp_version, '3.4', '>')) {
            return get_site_transient($option_name);
        }

        if (!empty($this->mmb_multisite)) {
            return $this->mmb_get_sitemeta_transient($option_name);
        }

        $transient = get_option('_site_transient_'.$option_name);

        return apply_filters("site_transient_".$option_name, $transient);
    }

    public function mmb_get_sitemeta_transient($option_name)
    {
        /** @var wpdb $wpdb */
        global $wpdb;
        $option_name = '_site_transient_'.$option_name;

        $result = $wpdb->get_var($wpdb->prepare("SELECT `meta_value` FROM `{$wpdb->sitemeta}` WHERE meta_key = '%s' AND `site_id` = '%s'", $option_name, $this->mmb_multisite));
        $result = maybe_unserialize($result);

        return $result;
    }

    public function get_master_public_key()
    {
        if (!get_option('_worker_public_key')) {
            return false;
        }

        return base64_decode(get_option('_worker_public_key'));
    }

    public function mmb_get_error($error_object)
    {
        if (!is_wp_error($error_object)) {
            return $error_object != '' ? $error_object : '';
        } else {
            $errors = array();
            if (!empty($error_object->error_data)) {
                foreach ($error_object->error_data as $error_key => $error_string) {
                    $errors[] = str_replace('_', ' ', ucfirst($error_key)).': '.$error_string;
                }
            } elseif (!empty($error_object->errors)) {
                foreach ($error_object->errors as $error_key => $err) {
                    $errors[] = 'Error: '.str_replace('_', ' ', strtolower($error_key));
                }
            }

            return implode('<br />', $errors);
        }
    }

    public function check_if_pantheon()
    {
        return !empty($_ENV['PANTHEON_ENVIRONMENT']) && $_ENV['PANTHEON_ENVIRONMENT'] !== 'dev';
    }

    public function is_server_writable()
    {
        if ($this->check_if_pantheon()) {
            return false;
        }

        if (!function_exists('get_filesystem_method')) {
            include_once ABSPATH.'wp-admin/includes/file.php';
        }

        if ((!defined('FTP_HOST') || !defined('FTP_USER')) && (get_filesystem_method(array(), false) != 'direct')) {
            return false;
        } else {
            return true;
        }
    }
}
