<?php

function my_acf_init() {

    acf_update_setting('google_api_key', 'AIzaSyDKQ6x5al7NFc63XIBOw6VmnIGe1hjha64');
}

add_action('acf/init', 'my_acf_init');