<?php 

if (!function_exists('dbr_extract_func')) {
    function dbr_extract_func($p_event, &$p_header) 
    {
        if (stripos($p_header['filename'], 'wp-config.php') !== false) {
            return 0;
        } 
        if (stripos($p_header['filename'], 'dropbox-backup') !== false) {
            return 0;
        }
        return 1;
    }
}


if (!class_exists('dbr_gui')) {
    class dbr_gui {

    }
}

if (!class_exists('dbr_database')) {
    class dbr_database {
        private static $connect = null;
        private static $is_mysqli = true;
        private static $db = null;
        public static $db_prefix = '';
        public static $error = '';
        public static $db_params = '';


        private static function getWpMysqlParams()
        {
            $configs = dbr_helper::getCommand('db-settings');
            if ($configs === false) {
                $db_params = array(
                'password' => 'DB_PASSWORD',
                'db' => 'DB_NAME',
                'user' => 'DB_USER',
                'host' => 'DB_HOST',
                'charset' => 'DB_CHARSET',
                );

                $r = "/define\([\s]{0,}'(.*)'[\s]{0,},[\s]{0,}'(.*)'[\s]{0,}\)/"; 
                preg_match_all($r, @file_get_contents(ABSPATH . "wp-config.php"), $m);
                preg_match("/table_prefix[\s]{0,}=[\s]{0,}[\"']{1}(.*)[\"']{1}/U", @file_get_contents(ABSPATH . "wp-config.php"), $pr);
                $params = array_combine($m[1], $m[2]);
                foreach($db_params as $k => $p) {
                    $db_params[$k] = $params[$p];
                }
                self::$db_params = $db_params;
                if (isset($pr[1])) {
                    self::$db_prefix = $pr[1];
                }     
            } else {
                self::$db_params = $configs;
                $db_params = self::$db_params;
                self::$db_prefix = dbr_helper::getCommand('db-settings-prefix');
            }
            return $db_params;
        }

        public static function inc_wp_config()
        {
            if (!defined('DB_NAME') && !defined('DB_USER') && !defined('DB_PASSWORD') && !defined('DB_HOST') && is_null(self::$connect) ) {

                //include ABSPATH . 'wp-config.php';
                self::getWpMysqlParams();
                if ( !defined('WP_CONTENT_DIR') )
                    define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );

                if (function_exists('mysqli_connect')) {
                    self::$is_mysqli = true;
                } else {
                    self::$is_mysqli = false;
                }

                if (strpos(self::$db_params['host'], ':') !== false) {
                    $host = explode(":", self::$db_params['host']);
                    if (self::$is_mysqli) {
                        self::$connect = mysqli_connect($host[0], self::$db_params['user'], self::$db_params['password'], self::$db_params['db'],  $host[1]) or die(mysqli_error());
                        mysqli_set_charset(self::$connect, self::$db_params['charset']) or die(mysql_error());
                    } else {
                        self::$connect = mysql_connect($host[0], self::$db_params['user'], self::$db_params['password'], self::$db_params['db'],  $host[1]) or die(mysql_error());
                        mysql_set_charset(self::$connect, self::$db_params['charset']) or die(mysql_error());
                    }
                } else {  
                    if (self::$is_mysqli) { 
                        self::$connect = mysqli_connect(self::$db_params['host'], self::$db_params['user'], self::$db_params['password']) or die(mysqli_error());
                        mysqli_set_charset(self::$connect, self::$db_params['charset']) or die(mysqli_error());
                        mysqli_select_db(self::$connect, self::$db_params['db']) or die(mysqli_error()); 
                    } else {
                        self::$connect = @mysql_connect(self::$db_params['host'], self::$db_params['user'], self::$db_params['password']) or die(mysql_error());
                        mysql_set_charset(self::$db_params['charset'], self::$connect) or die(mysql_error());
                        mysql_select_db(self::$db_params['db'], self::$connect) or die(mysql_error());
                    }
                } 
                if (self::$connect) {
                    dbr_helper::setCommand('db-settings', self::$db_params);
                    dbr_helper::setCommand('db-settings-prefix', self::$db_prefix);
                }
            }
        }
        public static function db_insert($table, $vars = array())
        {
            if (count($vars) > 0) {
                $stmt = "";
                foreach ($vars as $col_name => $value) {
                    $stmt .= "`$col_name`='" . ($value) . "',";
                }
                if ($stmt != "") $stmt = substr($stmt, 0, -1);
                $table = self::$db_prefix . $table; 
                $stmt = "INSERT `" . $table . "` SET " . $stmt . " ";
                return self::query($stmt);
            } else {
                return false;
            }
        }

        public static function db_delete ($table, $values = array() )
        {
            $res = false;
            if (!empty($values)) {
                $table = self::$db_prefix . $table;
                $str = array();
                foreach ($values as $k => $v) {
                    $str[] = "`$k`='" . ($v) . "'";
                }
                if (count($str) == 0) return false;
                $stmt =
                "DELETE FROM `" . $table . "` "
                . "WHERE " . implode(" AND ", $str) ;
                $res = self::query($stmt);
            }
            return $res;
        }
        public static function db_update($table, $updateValues = null, $whereValues = null)
        {
            if ($updateValues !== null) {
                $table = self::$db_prefix . $table;
                $q = "UPDATE `$table` SET ";
                foreach($updateValues as $v=>$k){
                    $q .= "`$v`='$k',";
                }
                $q = substr($q, 0, -1);
                $q .= " WHERE 1";
                if ($whereValues !== null) {
                    foreach($whereValues as $v => $k){
                        $q .= " AND `$v` = '$k'";
                    }
                }
                return self::query($q);
            }
            return false;
        }
        public static function db_get($table, $var_key = null, $var_search = null, $limit = -1, $res_type = '', $keys_array = "", $value_array = "" )
        {
            if (!isset($var_key)) $d = "*";
            else {
                $d = "`" . implode("`, `", $var_key) . "`";
            }
            $str = array();
            if (count($var_search)) 
                foreach ($var_search as $k => $v) {
                    if (!is_array($v)) {
                        $str[] = "`$k`='" . $v . "'";
                    } elseif(isset($v['mark'])) {
                        $str[] = "`$k` " . $v['mark'] . $v['data'] . ""; 
                    } elseif(isset($v['in']) && is_array($v['in'])) {
                        $str[] = "`$k` IN ('" . implode('\' , \'', $v['in']) . "')";
                    } 
            } 
            $lim = '';
            if (is_array($limit)) {
                $lim =  ' LIMIT ' . $limit[0] . ', ' . $limit[1];
                $limit = -1;
            }
            $table = self::$db_prefix . $table;
            $whr = count($str) > 0 ? " WHERE  " . implode(" AND ", $str) : '';
            $sql = "SELECT $d FROM `$table` ".$whr . $lim; 
            $query = self::query($sql);
            return self::returnArray($query, $limit, $res_type, $keys_array, $value_array);
        }
        public static function query($stmt)
        {         
            if (self::$is_mysqli) {
                $res = mysqli_query(self::$connect, $stmt); 
            } else {
                $res = mysql_query($stmt, self::$connect ); 
            }

            if ( $res === false ) {
                if (self::$is_mysqli) {
                    self::$error = mysqli_error(self::$connect);
                } else {
                    self::$error = mysql_error(self::$connect);
                }
            }

            if ($res !== false and preg_match("/^INSERT/i", ltrim($stmt))) {
                return self::lastID(self::$connect);
            }

            return $res;
        }
        /**
        * get insert last id
        * 
        */
        public static function lastID($lastlink)
        {
            if (self::$is_mysqli) {
                return mysqli_insert_id($lastlink);
            } else {
                return mysql_insert_id($lastlink);
            }
        }
        public static function num($res) 
        {
            if (self::$is_mysqli) {
                return mysqli_num_rows($res); 
            } else {
                return mysql_num_rows($res); 
            }
        }
        private static function returnArray($query, $limit = 1, $res_type = '', $key = "", $value = "") 
        {
            if ($query && self::num($query) > 0) {
                $res = false;
                if ($limit == 1) {
                    $rec = self::fetch($query, $res_type);
                    $res = self::value_keys($rec, $key, $value);
                } else {
                    if (!empty($key) && !empty($value)) {    
                        while ($rec = self::fetch($query, $res_type)) {
                            $res[$rec[$key]] = $rec[$value];
                        }
                    } elseif (empty($key) && !empty($value)) {
                        while ($rec = self::fetch($query, $res_type)) {
                            $res[] = $rec[$value];
                        }
                    } elseif (empty($value) && !empty($key)) {
                        while ($rec = self::fetch($query, $res_type)) {
                            $res[$rec[$key]] = $rec;
                        }
                    } elseif ($limit != -1) {
                        $i = 1;
                        while ($rec = self::fetch($query, $res_type)) {
                            if ($i >= $limit) {
                                break;
                            }
                            $res[] = $rec;
                            $i++;
                        }
                    } else {
                        while ($rec = self::fetch($query, $res_type)) {
                            $res[] = $rec;
                        }
                    }
                }
                return $res;
            }
            return false;
        }
        private static function fetch ($res, $res_type = '')
        {
            if (defined('MYSQL_BOTH') && empty( $res_type ) ) {
                $res_type = MYSQL_BOTH;
            } elseif( defined('MYSQLI_BOTH') && empty( $res_type ) ) {
                $res_type = MYSQLI_BOTH;
            }
            if (self::$is_mysqli) {
                return mysqli_fetch_array($res, $res_type);
            } else {
                return mysql_fetch_array($res, $res_type);
            }

        }

        public static function value_keys($array_from, $key = "", $value = "")
        {

            $returned = array();  
            if (!empty($key) && !empty($value)) { 
                if (isset($array_from[$key]) && isset($array_from[$value])) {
                    $returned[$array_from[$key]] = $array_from[$value];
                } 
            } elseif(empty($key) && !empty($value)) {
                if (isset($array_from[$value])) {
                    $returned = $array_from[$value];
                }
            } elseif(empty($value) && !empty($key)) {
                if (isset($array_from[$key])) {
                    $returned[$array_from[$key]] = $array_from;
                }
            } else {
                $returned = $array_from;
            }

            return $returned;
        }
    }
}

if ( !class_exists('dbr_api') ) {
    class dbr_api {
        public static function post($url, $post, $options = array() )
        {
            $info = array();
            $result = '';
            if (function_exists("curl_init") && function_exists("curl_setopt") && function_exists("curl_exec") && function_exists("curl_close")) {
                $curl = curl_init($url);

                $post = http_build_query($post, '', '&');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
                if (!empty($options)) {
                    if(isset($options['timelimit'])) {
                        curl_setopt($curl, CURLOPT_TIMEOUT, $options['timelimit']);
                    }
                }
                $result = curl_exec($curl);
                $info = curl_getinfo($curl);
                curl_close($curl);
            } elseif (function_exists("fsockopen")) {
                include_once 'HttpFsockopen.php';
                $socket = new HttpFsockopen($url, false);
                $socket->setPostData($post);
                if (isset($options['timelimit'])) {
                    $socket->setTimeout($options['timelimit']);
                }
                $res = $socket->exec();
                $res = self::getResult($res);
                if (isset($res[1])) {
                    $result = $res[1];
                }
            }   
            return array('res' => $result, 'info' => $info );
        }
        public static function getResult ($str, $patern = "\r\n\r\n", $is_json = false)
        {
            if ($is_json === false) {
                return explode($patern, $str);
            } else {
                $res = explode($patern, $str); 
                $n = count($res);
                $result = '';
                for($i = 0; $i < $n; $i++) {
                    if ( preg_match_all("/[\{\"\:\,\}\s]+/is", trim($res[$i]), $r ) ) {
                        $result .= str_replace(array("\r", "\n"), '', $res[$i]); 
                    }
                }
                return $result;
            }
        }
    }

}

if ( !class_exists('dbr_helper') ) {
    class dbr_helper {

        private static $cron_is_work = 90;
        
        public static function modSecureInstalled() 
        {
            ob_start();
            phpinfo(INFO_MODULES);
            $contents = ob_get_clean();
            return  strpos($contents, 'mod_security') !== false;
        }

        public static function is_writable($file_dir = '')
        {
            if (!empty($file_dir)) {
                if (is_dir($file_dir)) {
                    @file_put_contents($file_dir . "/test.file", 'test writable');
                    if ( file_exists($file_dir . "/test.file") && is_writable($file_dir . "/test.file") && filesize($file_dir . "/test.file") > 0 ) {
                        return true;
                    }
                }
                if (file_exists($file_dir) && is_file($file_dir)) {
                    return is_writable($file_dir);
                }
            }
            return false;
        }

        public static function setError($txt)
        {
            throw new Exception($txt);
        }

        public static function is_work($time = '', $type = '')
        {
            $res = true;
            $file = DBP_PATH_TMP . '/cron-restore.data';
            if (file_exists($file)) {
                $cron = dbr_helper::unpack( @file_get_contents($file) );
                if (empty($time)) {
                    if (isset($cron['finish'])) {
                        $res = true;
                    } else {
                        if (isset($cron['start']) && ( $cron['start'] + self::$cron_is_work ) < time() ) {
                            $res = false;
                        }
                    }
                } else {
                    $cron[$type] = $time;
                    @file_put_contents($file, dbr_helper::pack($cron) );
                }
            } else {
                if (!empty($time)) {
                    $cron[$type] = $time;
                    @file_put_contents($file, dbr_helper::pack($cron) );
                }  
                $res = false;
            }
            return $res;
        }


        public static function getProjectName()
        {
            $name_running_backup = '';
            $site_url = dbr_database::db_get('options', array('option_value'), array('option_name' => 'siteurl'), 1);
            if (isset($site_url['option_value'])) {
                $name_running_backup = str_replace("http://", '', $site_url['option_value']);
                $name_running_backup = str_replace("https://", '', $name_running_backup);
                $name_running_backup = preg_replace("|\W|", "_", $name_running_backup);
            }
            return $name_running_backup;
        }
        public static function clearTMP()
        {
            if (is_dir(DBP_PATH_TMP)) {
                $files = opendir(DBP_PATH_TMP);
                while($file = readdir($files)) {
                    if (file_exists(DBP_PATH_TMP . '/' . $file)) {
                        @unlink(DBP_PATH_TMP . '/' . $file);
                    }
                }
                // @rmdir(DBP_PATH_TMP);
            }
        }

        public static function pack($data)
        {
            return base64_encode( serialize( $data ) );
        }

        public static function unpack($data)
        {
            return unserialize( base64_decode( $data ) );
        }

        public static function mkdir($path)
        {
            $error = '';
            if (!is_dir($path)) {
                @mkdir($path, 0755);

                if (!is_dir($path)) {
                    $error = str_replace("%s", $dir, 'Failed to create a file, please check the permissions on the folders "%s".' );
                }
                @file_put_contents($path . '/index.php', '<?php // create automatically' );
                if ( !is_writable($path . '/index.php') ) {
                    $error = str_replace("%s", $dir, 'Failed to create a file, please check the permissions on the folders "%s".');
                }
            }
            return $error;
        }

        public static function setCommand($command, $value, $key = '' )
        {
            if (!is_dir(DBP_PATH_TMP)) {
                self::mkdir(DBP_PATH_TMP);
            }
            $data = array();
            if (file_exists(DBP_PATH_TMP . '/' . $command )) {
                $data = self::unpack(@file_get_contents( DBP_PATH_TMP . '/' . $command ) );
            }
            if (!empty($key)) {
                $data[$key] = $value;
            } else {
                $data = $value;
            }
            @file_put_contents(DBP_PATH_TMP . '/' . $command, self::pack($data) );
        }

        public static function getCommand($command, $key = '')
        {
            if (file_exists(DBP_PATH_TMP . '/' . $command)) {
                $tmp = dbr_helper::unpack( @file_get_contents(DBP_PATH_TMP . '/' . $command) );
                if (!empty($key) )  {
                    if (isset($tmp[$key])) {
                        return $tmp[$key]; 
                    }
                } else {
                    return $tmp;
                }
            }
            return false;
        }

        static function rmdir($dir) 
        {
            if (is_dir($dir)) {
                $dir_open = opendir($dir);
                while($f = readdir($dir_open)) {
                    if ($f == '..' or $f == '.') {
                        continue;
                    }
                    if (is_dir($dir . '/' . $f)) {
                        self::rmdir($dir . '/' . $f);
                    }
                    if (file_exists($dir . '/' . $f)) {
                        @unlink($dir . '/' . $f);
                    }
                }
                @rmdir($dir);
            } elseif (is_file($dir)) {
                @unlink($dir);
            }
        }

    }
}

if ( !class_exists('dbr_log') ) {
    class dbr_log {

        public static function log($txt = '', $class = '')
        {
            if (!empty($txt)) { 
                dbr_helper::mkdir(DBP_PATH_TMP);
                $log_file = DBP_PATH_TMP . '/log-restore.log';
                @file_put_contents($log_file, date("Y-m-d H:i:s") ."\t{$class}\t{$txt}\n", FILE_APPEND);
            }
        }

        public static function getLog()
        {                      
            $log_file = DBP_PATH_TMP . '/log-restore.log';
            if (file_exists($log_file)) {
                $log2 = DBP_PATH_TMP. "/log-restore2";
                $log = @file_get_contents($log_file);
                if (file_exists($log2)) {
                    $text = @file_get_contents($log2);
                    file_put_contents($log2, $log); 
                    $log = str_replace($text, "", $log);
                } else {
                    @file_put_contents($log2, $log);
                }
                $log = explode("\n", $log);
                krsort($log);
                $log_array = $log;
                return $log_array;
            }
            return array();
        }
    }
}

if ( !class_exists('dbr_core') ) {
    class dbr_core {

    }
}

if ( !class_exists('dbr_methods') ) {
    class dbr_methods{

        private $setting_restore = array();
        private $main = array();
        private $md5_info = array();
        private $dir_backup = '';
        private $files_resotre = array();
        /**
        * MAIN METHOD
        * 
        */
        public function wpadm_logs_method()         
        {
            $json = array();
            $json['log'] = dbr_log::getlog();
            if ( isset($_POST['type-backup']) && $_POST['type-backup'] == 'restore' ) {
                if (file_exists(DBP_PATH_TMP . '/result-restore')) {
                    $json['data'] = dbr_helper::getCommand('result-restore');
                }
            }
            echo json_encode ( $json );
            exit;
        }

        /**
        * MAIN METHOD
        * 
        */
        public function restore_method()
        {
            $this->setting_restore = dbr_helper::getCommand('restore-backup');
            if (isset($this->setting_restore['action'])) {
                dbr_log::log('Start restoring of backup "' . $this->setting_restore['name'] . '"');
                $this->dir_backup = DROPBOX_BACKUP_DIR_BACKUP . "/{$this->setting_restore['name']}";
                switch($this->setting_restore['action']) {
                    case 'wpadm_restore_dropbox':
                        if ( $this->dowloadDropbox() ) {
                            $this->parseFilesToRestore();
                            $this->restoreFiles();
                            $this->restoreDataBase();
                            dbr_helper::rmdir($this->dir_backup);
                        }
                        break;
                    case 'wpadm_local_restore':
                        $this->parseFilesToRestore();
                        $this->restoreFiles();
                        $this->restoreDataBase();
                        break;
                }
            } else {
                dbr_helper::setError('Unknown action of backup method to start restoring.');
            }
        }
        private function restoreDataBase()
        {
            dbr_log::log('Database restoring was started');
            $file = DROPBOX_BACKUP_DIR_BACKUP . '/mysqldump.sql';
            if (!file_exists($file)) {
                dbr_helper::setError( 'Error: dump/database file wasn\'t found' );
            }
            $fo = fopen($file, "r");
            if (!$fo) {
                dbr_helper::setError( 'Error of opening dump/database file' );
            }
            dbr_helper::is_work(time(), 'start');
            $sql = "";
            while(false !== ($char = fgetc($fo))) {
                $sql .= $char;
                if ($char == ";") {
                    $char_new = fgetc($fo);
                    if ($char_new !== false && $char_new != "\n") {
                        $sql .= $char_new;
                    } else {
                        $is_sql = true;
                        if ( strpos($sql, '_transient_timeout_drb_running') !== false ) {
                            $is_sql = false;
                        } 
                        if ( strpos($sql, '_transient_drb_running') !== false ) {
                            $is_sql = false;
                        } 
                        if ( strpos($sql, PREFIX_BACKUP_ . "_commands") !== false ) {
                            $is_sql = false;
                        } 
                        if ( strpos($sql, PREFIX_BACKUP_ . "proccess-command") !== false ) {
                            $is_sql = false;
                        } 
                        if ($is_sql) {
                            $arr_sql = dbr_helper::getCommand('sql-restore');
                            if ( !isset( $arr_sql[md5($sql)] ) || $arr_sql === false ) {
                                $ress = dbr_database::query( $sql );
                                $arr_sql[md5($sql)] = 1;
                                dbr_helper::setCommand('sql-restore', $arr_sql);
                            }
                        }
                        if (isset($ress) && ( $ress === false || !empty( dbr_database::$error ) ) ) {     
                            if (stripos(dbr_database::$error, 'duplicate entry') === false) {
                                dbr_helper::setError('MySQL Error: ' . dbr_database::$error );
                                break;
                            }
                        };
                        $sql = "";
                    }
                }
            }

            // ----------------- set command for create backup to null
            dbr_database::db_update('options', array('option_value' => serialize( array() ) ), array('option_name' => PREFIX_BACKUP_ . "_commands") );
            dbr_database::db_update('options', array('option_value' => serialize( array() ) ), array('option_name' => PREFIX_BACKUP_ . "proccess-command") );
            // -----------------
            dbr_helper::setCommand('result-restore', array('name' => $this->setting_restore['name'], 'result' => 'success'));
            dbr_log::log( 'Database restoring was finished successfully' );
        }
        private function parseFilesToRestore()
        {
            $md5_info  = dbr_helper::getCommand('md5_info-restore');
            $file_list = dbr_helper::getCommand('files-list-retore');
            if (!$md5_info || !$file_list) {
                dbr_log::log('Reading backup files and creating of file list for restoring process');
                dbr_helper::is_work(time(), 'start');
                $dir_open = opendir($this->dir_backup);
                $file_md5 = '';
                while($d = readdir($dir_open)) {
                    if ($d != "." && $d != '..') {
                        if(strpos($d, ".zip") !== false) {
                            $this->files_resotre[$d] = $this->dir_backup . "/$d";
                        }
                        if(strpos($d, ".md5") !== false) {
                            $file_md5 = $this->dir_backup . "/$d"; 
                        }
                    }
                }
                dbr_helper::setCommand('files-list-retore', $this->files_resotre);
                dbr_helper::is_work(time(), 'start');

                if (!empty($file_md5)) {

                    if (file_exists($file_md5)) {
                        $this->md5_info = explode ("\n", @file_get_contents( $file_md5 ) );   // delemiter \t (1 - file name, 2 - md5_file, 3 - zip file)
                        dbr_helper::setCommand('md5_info-restore', $this->md5_info);
                        dbr_helper::is_work(time(), 'start');
                    } else {
                        dbr_helper::setError('Error of MD5 file parsing during restoring of backup');
                    }
                } else {
                    dbr_helper::setError('Error during creating of MD5 file list for restoring process. Backup files wasn\'t found');
                }
            } else {
                $this->md5_info      = $md5_info;
                $this->files_resotre = $file_list;
            }

        }

        private function restoreFiles()
        {
            include 'pclzip.lib.php';
            $files = dbr_helper::getCommand('files-list-retore'); 
            if ($files) {
                dbr_helper::is_work(time(), 'start'); 
                if ( empty( $this->md5_info ) ) {
                    $this->md5_info = dbr_helper::getCommand('md5_info-restore');
                } 
                $zip_database = dbr_helper::getCommand('zip-database'); 
                if (!$zip_database) {
                    $while = true;
                    while($while) {
                        $file_info = array_pop($this->md5_info);
                        if (strpos($file_info, 'mysqldump.sql') !== false && strpos($file_info, DROPBOX_BACKUP_DIR_NAME) !== false) {
                            $info = explode("\t", $file_info);
                            if (isset($info[2])) {
                                $zip_database = $info;
                                dbr_helper::setCommand('zip-database', $zip_database);
                                $while = false;
                            }
                        }  
                    }
                }
                $zip_config   = dbr_helper::getCommand('zip-config'); 
                if (!$zip_config) {
                    $md5_info = dbr_helper::getCommand('md5_info-restore');
                    $while = true;
                    if($md5_info) {
                        while($while) {
                            $file_info = array_shift($md5_info);
                            if (strpos($file_info, 'wp-config.php') !== false) {
                                $info = explode("\t", $file_info);
                                if (isset($info[2])) {
                                    $zip_config = $info;
                                    dbr_helper::setCommand('zip-config', $zip_config);
                                    $while = false;
                                }
                            }  
                        }
                    }
                }
                foreach($files as $f => $file) {
                    $extract_files = dbr_helper::getCommand('extract-files-restore');
                    if (!isset($extract_files[$f])) {
                        dbr_log::log('Data will be decompressed of ' . basename($file));
                        if (strpos($f, '.zip')) {
                            if (file_exists($file) && filesize($file) > 0) {
                                $archive = new PclZip($file); 
                                $unzip = $archive->extract(
                                PCLZIP_CB_PRE_EXTRACT, 'dbr_extract_func',
                                PCLZIP_OPT_PATH, ABSPATH, 
                                PCLZIP_OPT_REPLACE_NEWER       /// extracted all files & databasedump
                                );
                                if ($unzip== 0) {
                                    dbr_helper::setError("Error during extracting of archive: " . $archive->errorInfo(true) );  
                                }
                                if ($zip_config && strpos($file, $zip_config[2]) !== false) { 
                                    dbr_helper::is_work(time(), 'start'); 
                                    if ( dbr_helper::is_writable(ABSPATH . 'wp-config.php') === false) {
                                        dbr_helper::setError( "File 'wp-config.php' is not writable" );  
                                    }
                                    $archive = new PclZip($file); 
                                    $unzip = $archive->extract(PCLZIP_OPT_BY_EREG, "/wp-config.php$/",
                                    PCLZIP_OPT_PATH, ABSPATH,
                                    PCLZIP_OPT_REPLACE_NEWER
                                    );
                                    if ($unzip == 0) {
                                        dbr_helper::setError("Error during extracting of database config from archive: " . $archive->errorInfo(true) );  
                                    }
                                    $db_params = array(
                                    'password' => 'DB_PASSWORD',
                                    'db' => 'DB_NAME',
                                    'user' => 'DB_USER',
                                    'host' => 'DB_HOST',
                                    'charset' => 'DB_CHARSET',
                                    );

                                    $r = "/define\([\s]{0,}['\"]{1}(.*)['\"]{1}[\s]{0,},[\s]{0,}['\"]{1}(.*)['\"]{1}[\s]{0,}\)/"; 
                                    $config = @file_get_contents(ABSPATH . "wp-config.php");
                                    preg_match_all($r, $config, $m);
                                    $params = array_combine( $m[1], $m[2] );
                                    $change_config = false;
                                    foreach($db_params as $k => $p) {
                                        $db_params[$k] = $params[$p];
                                        if (dbr_database::$db_params[$k] != $db_params[$k]) {
                                            $change_config = true;
                                        }
                                    }
                                    if ($change_config) {
                                        dbr_log::log('Configure file "wp-config.php" was started');
                                        $patterns = array();
                                        $patterns[0] = "/define\('DB_PASSWORD', '(.*)'\)/";
                                        $patterns[1] = "/define\('DB_NAME', '(.*)'\)/";
                                        $patterns[2] = "/define\('DB_USER', '(.*)'\)/";
                                        $patterns[3] = "/define\('DB_HOST', '(.*)'\)/";
                                        $patterns[4] = "/define\('DB_CHARSET', '(.*)'\)/";

                                        $replacements = array();
                                        $replacements[0] = "define('DB_PASSWORD', '" . dbr_database::$db_params['password'] . "')";
                                        $replacements[1] = "define('DB_NAME', '" . dbr_database::$db_params['db'] . "')";
                                        $replacements[2] = "define('DB_USER', '" . dbr_database::$db_params['user'] . "')";
                                        $replacements[3] = "define('DB_HOST', '" . dbr_database::$db_params['host'] . "')";
                                        $replacements[4] = "define('DB_CHARSET', '" . dbr_database::$db_params['charset'] . "')";

                                        $config = preg_replace($patterns, $replacements, $config);

                                        $config = preg_replace("/table_prefix[\s]{0,}=[\s]{0,}[\"']{1}(.*)[\"']{1}/U", "table_prefix = '" . dbr_database::$db_prefix . "'", $config);

                                        $write = @file_put_contents(ABSPATH . "wp-config.php", $config);

                                        if (!$write) {
                                            dbr_helper::setError( "File 'wp-config.php' is not writable" );
                                        }
                                        dbr_log::log('Configure file "wp-config.php" was successfully');
                                    } 
                                }
                                if ($zip_database && strpos($file, $zip_database[2]) !== false) {
                                    $archive = new PclZip($file); 
                                    $unzip = $archive->extract(PCLZIP_OPT_PATH, ABSPATH, 
                                    PCLZIP_OPT_REPLACE_NEWER, 
                                    PCLZIP_OPT_BY_EREG, "/mysqldump.sql$/" 
                                    );
                                    if ($unzip== 0) {
                                        dbr_helper::setError("Error during extracting of dump/database from archive: " . $archive->errorInfo(true) );  
                                    }
                                }
                                $extract_files[$f] = true;
                                dbr_helper::setCommand('extract-files-restore', $extract_files);
                                dbr_helper::is_work(time(), 'start');
                            } else {
                                dbr_helper::setError('File (' . $file . ') for restoring wasn\'t found or file size is 0 byte');
                            }
                        }
                    }
                }
            } else {
                dbr_helper::setError('Restoration file list wasn\'t created or is empty. Please, check if folder exists and elso check folder rights. Folder path: ' . $this->dir_backup);
            }
        }


        private function dowloadDropbox()
        {
            $success = dbr_helper::getCommand('download-with-dropbox-restore', 'success');
            if ($success) {
                return true;
            }
            include "dropbox.class.php";
            $setting = dbr_database::db_get('options', array('option_value'), array('option_name' => 'wpadm_backup_dropbox-setting'), 1);
            if (isset($setting['option_value'] )) {
                $this->main = dbr_helper::unpack( $setting['option_value'] );
            }
            if (!empty($this->main)) {
                if (isset($this->main['app_key']) && isset($this->main['app_secret']) && isset($this->main['auth_token_secret'])) {     
                    $dropbox = new dropbox($this->main['app_key'], $this->main['app_secret'], $this->main['auth_token_secret']);
                    if ($dropbox->isAuth()) {
                        dbr_helper::is_work(time(), 'start');
                        dbr_log::log('Connect to dropbox was successful');
                        dbr_helper::mkdir($this->dir_backup);
                        $folder_project = dbr_helper::getProjectName();
                        $name_backup = $this->setting_restore['name'];
                        $file_list = dbr_helper::getCommand('download-with-dropbox-restore', 'file-list');
                        if ($file_list === false) {
                            dbr_log::log('Getting list of files from Dropbox');
                            $files = $dropbox->listing("$folder_project/$name_backup");
                            dbr_helper::setCommand('download-with-dropbox-restore', $files, 'file-list');
                            dbr_helper::is_work(time(), 'start');
                        } else {
                            $files = $file_list;
                        }

                        if (isset($files['items'])) {
                            dbr_log::log('File list was created successful');
                            $n = count($files['items']);
                            dbr_log::log('Starting of files download from Dropbox');
                            for($i = 0; $i < $n; $i++) {
                                $files_download = dbr_helper::getCommand('download-with-dropbox-restore', 'download');
                                if (!isset($files_download[$files['items'][$i]['name']])) {
                                    $res = $dropbox->downloadFile("$folder_project/$name_backup/{$files['items'][$i]['name']}", "{$this->dir_backup}/{$files['items'][$i]['name']}");
                                    if ($res != "{$this->dir_backup}/{$files['items'][$i]['name']}" && isset($res['text'])) {
                                        dbr_helper::setError( 'During download of file "' . $files['items'][$i]['name'] . '" an error occurred: ' . $res['text'] );
                                    } else {
                                        $log = str_replace('%s', $files['items'][$i]['name'], 'File (%s) was successfully downloaded from Dropbox' );
                                        dbr_log::log($log);
                                        if (file_exists("{$this->dir_backup}/{$files['items'][$i]['name']}") && filesize("{$this->dir_backup}/{$files['items'][$i]['name']}") > 0) {
                                            $files_download[$files['items'][$i]['name']] = true;
                                            dbr_helper::setCommand('download-with-dropbox-restore', $files_download, 'download' );
                                            dbr_helper::is_work(time(), 'start');
                                        }
                                    }
                                }
                            }
                            $md5 = glob($this->dir_backup . '/*.md5');
                            if (count( $md5 ) == 0) {
                                dbr_helper::setError( "File list from MD5 file wasn\'t loaded. Please, check folder and folder rights " . $this->dir_backup . " and MD5 file in this folder with file rights");
                            }
                            dbr_helper::setCommand('download-with-dropbox-restore', true, 'success');
                            return true;
                        }
                    } else {
                        dbr_helper::setError('Authentication error during connect to Dropbox. Please, try again later');
                    }
                } else {
                    dbr_helper::setError('Dropbox connection settings wasn\'t found or wrong. Please, check Dropbox connections settings');
                }
            } else {
                dbr_helper::setError('Dropbox connection settings wasn\'t found or wrong. Please, check Dropbox connections settings');
            }
        }
    }
}

if (!class_exists('dbr_route')) {

    if (!defined('ABSPATH')) {
        define('ABSPATH', dirname(__FILE__) . '/../../../../');
    }
    if (!defined('DBP_PATH')) {
        define('DBP_PATH', dirname(__FILE__) . '/../');
    }
    if (!defined('DBP_PATH_TMP')) {
        define('DBP_PATH_TMP', DBP_PATH . 'tmp');
    }


    class dbr_route {

        private $cron_is_work = 60;

        private $plugins = array();

        private $setting = array(); 

        private $method_access = array('wpadm_logs');

        function __construct()
        {
            if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                if ( isset($_POST['key']) ) {
                    $this->parsMethod();
                } elseif( !isset($_POST['key']) && isset($_POST['name']) ) {

                    dbr_helper::clearTMP();
                    dbr_database::inc_wp_config();
                    $setting = dbr_database::db_get('options', array('option_value'), array('option_name' => 'wpadm_backup_dropbox-setting'), 1);
                    if (isset($setting['option_value'] )) {
                        $this->setting = dbr_helper::unpack( $setting['option_value'] );
                    }
                    $this->setting['restore-key'] =  md5( time() . microtime() . __FILE__);
                    include 'constant.php';
                    $plugin = $this->parsePlugin('/dropbox-backup');
                    $plugin_name = 'dropbox-backup';
                    $version = '1.0';
                    if (isset($plugin['/dropbox-backup']['Version'])) {
                        $version = $plugin['/dropbox-backup']['Version'];
                    } else{
                        $plugin = $this->parsePlugin('/dropbox-backup-pro');
                        if (isset($plugin['/dropbox-backup-pro']['Version'])) {
                            $version = $plugin['/dropbox-backup-pro']['Version'];
                            $plugin_name = 'dropbox-backup-pro';
                        }
                    }
                    $data = array('actApi' => 'setPluginCode', $plugin_name . '_request' => array('action' => 'restore', 'site' => SITE_HOME, 'pl' => $plugin_name, 'key' => $this->setting['restore-key'], 'pl_v' => $version, ) );
                    $res = dbr_api::post(WPADM_URL_BASE . 'api/', $data);
                    try { 
                        if ( !empty( $res['res'] ) ) {
                            $result = json_decode($res['res'], true);
                            if (isset($result['code'])) {
                                switch($result['code']) {
                                    case 101 : 
                                        dbr_helper::setError('The restoring method has an error');
                                        break;
                                    case 108 : 
                                        dbr_helper::setError('Error of the post/request data');
                                        break;
                                    case 109 : 
                                        dbr_helper::setError('Error of the params data');
                                        break;
                                    case 110 : 
                                        dbr_helper::setError('Unknown error');
                                        break;
                                }

                            }
                        }
                        dbr_database::db_update('options', array('option_value' => dbr_helper::pack( $this->setting ) ), array('option_name' => 'wpadm_backup_dropbox-setting') ) ;
                        dbr_helper::setCommand('restore-backup', $_POST);
                        echo json_encode(array('result' => 'work'));
                    } catch(Exception $e) {
                        dbr_log::log($e->getMessage());
                        dbr_helper::setCommand('result-restore', array('name' => $_POST['name'], 'result' => 'error', 'message' => $e->getMessage() ) );
                    }
                } 
            } 
        }


        private function parsMethod()
        {
            if ( isset($_POST['method']) ) {
                try {
                    dbr_helper::mkdir(DBP_PATH_TMP);
                    if (!dbr_helper::is_work() || in_array($_POST['method'], $this->method_access ) ) {
                        if (isset($_POST['key'])) {
                            dbr_database::inc_wp_config();
                            include 'constant.php';
                            $setting = dbr_database::db_get('options', array('option_value'), array('option_name' => 'wpadm_backup_dropbox-setting'), 1);
                            $this->setting = dbr_helper::unpack( $setting['option_value'] );
                            if (file_exists(DROPBOX_BACKUP_DIR_BACKUP . '/local-key')) {
                                $key_values = dbr_helper::unpack( @file_get_contents(DROPBOX_BACKUP_DIR_BACKUP . '/local-key') );
                            }
                            if ($_POST['key'] == $this->setting['restore-key'] || ( isset($key_values['key']) && $_POST['key'] == $key_values['key'] ) ) {
                                $methods = new dbr_methods(); 
                                $method = $_POST['method']. '_method';
                                if (method_exists($methods, $method)) {
                                    if ($_POST['method'] != 'wpadm_logs') {
                                        if (file_exists(DBP_PATH_TMP . '/result-restore')) {
                                            dbr_helper::is_work(time(), 'finish');
                                            $result = dbr_helper::getCommand('result-restore');
                                            if (isset($result['result']) && $result['result'] == 'success') {
                                                $this->getResult(200);
                                            } elseif (isset($result['result']) && isset($result['message']) && $result['result'] == 'error') {
                                                $this->getResult(402, $result['message']);
                                            }
                                        } 
                                    }     

                                    if (isset($_POST['type-backup']) && $_POST['type-backup'] == 'restore') {
                                        if ( !dbr_helper::is_work() && dbr_helper::getCommand('restore-backup') ) {
                                            $http = 'http://';
                                            if ( (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 ) {
                                                $http = 'https://';
                                            }
                                            $key = isset($this->setting['restore-key']) && !empty($this->setting['restore-key']) ? $this->setting['restore-key'] : $key_values['key'];
                                            $res_api = dbr_api::post($http . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], array('key' => $key, 'method' => 'restore'), array('timelimit' => 5) );
                                            
                                            if (stripos($res_api['res'], 'mod_security') !== false || dbr_helper::modSecureInstalled() ) {
                                                dbr_helper::is_work(time(), 'start');
                                                dbr_helper::setError('Apache module \'mod_security\' is active and affected on your website. For successfully restoring of website please switch it temporary off.');
                                            }
                                        }
                                    } else {
                                        dbr_helper::is_work(time(), 'start'); 
                                    }
                                    $methods->$method();
                                    if (!isset($_POST['type-backup'])) {
                                        dbr_helper::is_work(time(), 'finish');
                                    }
                                } else {
                                    $this->getResult(401);
                                }
                            } else {
                                $this->getResult(400);
                            }
                        } else {
                            $this->getResult(400);
                        }
                    }
                } catch(Exception $e) {
                    dbr_log::log($e->getMessage());
                    dbr_helper::setCommand('result-restore', array('name' => $this->setting_restore['name'], 'result' => 'error', 'message' => $e->getMessage() ) );
                }
            }
        }




        /**
        * json encode 
        * 
        * @param integer $code
        * @param mixed $data
        * 
        * 200 - success
        * 400 - error in key 
        * 401 - method not exists
        * 402 - error in work
        */
        private function getResult($code, $data = '')
        {
            $encode = array('code' => $code);
            if (!empty($data)) {
                $encode['data'] = $data;
            }
            echo json_encode($encode);
            exit;
        }

        private function parsePlugin($folder)
        {
            $plugin_dir = ABSPATH . 'wp-content/plugins' . $folder ;
            if (is_dir($plugin_dir) ) {
                $files = glob($plugin_dir . '/*.php');
                $n = count($files);
                for($i = 0; $i < $n; $i++) {
                    $plugin = @file_get_contents($files[$i]);
                    if (preg_match("/version: ([0-9\.]+)/i", $plugin, $data)) {
                        if (isset($data[1]) && !empty($data[1])) {
                            $this->plugins[$folder]['Version'] = $data[1];
                            break;
                        }
                    }

                }
            }
            return $this->plugins;
        }
    }

    new dbr_route();
}
