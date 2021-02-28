<?php
/**
 * @package cav-wp-plugin
 * Plugin Name: Conversión a venta
 * Plugin uri: https://
 * Description: Register wp rest api features
 * Author: Conversión
 * Author URI: https://conversionaventa.com
 */

/** Sets plugin dir */
define('CAV_PLUGIN_DIR', plugin_dir_path(__FILE__));

/** Call main class */
require_once CAV_PLUGIN_DIR . 'cav.class.php';

/** Plugin hooks */
register_activation_hook(__FILE__, ['CAV', 'plugin_activation']);
register_deactivation_hook(__FILE__, ['CAV', 'plugin_deactivation']);