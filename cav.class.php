<?php 
require_once CAV_PLUGIN_DIR . 'cav.rest.class.php';

class CAV
{

  /**
   * On plugin init
   */
  public function init()
  {
    add_action('rest_api_init', ['CavRest', 'register_landing_endpoint']);
    add_action('init', ['CAV', 'add_custom_image_sizes']);
  }


  /**
   * On plugin activation
   */
  public static function plugin_activation()
  {
    add_option('cav_globals', ['page_on_front' => get_option('page_on_front')]);
  }


  /**
   * On plugin activation
   */
  public static function plugin_deactivation()
  {
    // delete_option('cav_globals');
  }


  /**
   | Images
   |
   |-----------------------------------------------------
   | 
   */
  public static function add_custom_image_sizes()
  {
    add_image_size('landing_header', 1920, 670, 9999);
    add_image_size('langing_slider', 640, 300, 9999);
  }

};

$cav = new CAV();
$cav->init();
