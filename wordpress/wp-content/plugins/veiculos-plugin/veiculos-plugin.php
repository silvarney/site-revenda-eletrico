<?php
/**
 * Plugin Name: Veículos Plugin
 * Description: Plugin para gerenciar veículos.
 * Version: 1.0.0
 */

if (!defined('ABSPATH')) exit;

define('VP_PATH', plugin_dir_path(__FILE__));
define('VP_URL', plugin_dir_url(__FILE__));

require_once VP_PATH . 'includes/init.php';
//require_once VP_PATH . 'includes/cpt.php';
require_once VP_PATH . 'includes/taxonomies.php';
require_once VP_PATH . 'includes/shortcodes.php';
require_once VP_PATH . 'includes/post-type-veiculos.php';
require_once VP_PATH . 'includes/metabox-veiculos.php';
require_once VP_PATH . 'includes/query-veiculos.php';
require_once VP_PATH . 'includes/ajax.php';