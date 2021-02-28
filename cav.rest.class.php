<?php
class CavRest 
  {

    public static function register_landing_endpoint()
    {  
      register_rest_route( 'cav/', '/landing', array(
          'methods' => 'GET',
          'callback' => ['CavRest', 'register_landing_endpoint_contents'],
        ) 
      );

      register_rest_route( 'cav/', '/landing/attachments', array(
          'methods' => 'GET',
          'callback' => ['CavRest', 'get_landing_gallery'],
        ) 
      );
    }

    public static function register_landing_endpoint_contents()
    {
      $frontPageId = get_option('cav_globals');
      $googleTagManager = get_field('tag_manager_code', $frontPageId['page_on_front']);
      $headerText = get_field('header_text', $frontPageId['page_on_front']);
      $headerLegend = get_field('header_legend', $frontPageId['page_on_front']);
      $textBanner = get_field('text_banner', $frontPageId['page_on_front']);
      $landing = $frontPageId['page_on_front'];

      return [
        "page_on_front" => (int) $landing,
        "google_tag_manager_code" => $googleTagManager,
        "header_text" => $headerText,
        "header_legend" => $headerLegend,
        "text_banner" => $textBanner,
      ];
    }

    /** 
     * Get page attachments with mime type 'image'
     */
    public static function get_landing_gallery()
    {
      /** Landing ID */
      $lid = get_option('cav_globals');

      $query = get_attached_media('image', $lid['page_on_front']);
      // $query = new WP_Query([
      //   "post_type" => "media",
      //   "parent" => $lid['page_on_front'],
      //   "mime_type" => "image"
      // ]);

      return $query;

    }

}