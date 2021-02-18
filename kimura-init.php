<?php
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge       : Kimura Companion
 * @Version      : 1.0
 * @Author       : Spondonit
 * @Author URI 	 : https://spondonit.com
 *
 */

// Sidebar widgets include
require_once KIMURA_COMPANION_SW_DIR_PATH. 'about-widget.php';
require_once KIMURA_COMPANION_SW_DIR_PATH. 'blog-widget.php';
require_once KIMURA_COMPANION_SW_DIR_PATH. 'contact-info.php';
require_once KIMURA_COMPANION_SW_DIR_PATH. 'instagram.php';
require_once KIMURA_COMPANION_SW_DIR_PATH. 'newsletter-widget.php';
require_once KIMURA_COMPANION_SW_DIR_PATH. 'social-links.php';
require_once KIMURA_COMPANION_INC_DIR_PATH . 'functions.php';
require_once KIMURA_COMPANION_INC_DIR_PATH . 'instagram-api.php';
require_once KIMURA_COMPANION_INC_DIR_PATH . 'kimura-metabox.php';

// Elementor widget include
require_once KIMURA_COMPANION_EW_DIR_PATH . 'elementor-widget.php';

// Demo import include
require_once KIMURA_COMPANION_DEMO_DIR_PATH . 'demo-import.php';

?>