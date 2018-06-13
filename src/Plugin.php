<?php

/**
 * @file
 * Contains Netzstrategen\WooCommerceImageDisclaimer\Plugin.
 */

namespace Netzstrategen\WooCommerceImageDisclaimer;

/**
 * Main front-end functionality.
 */
class Plugin {

  /**
   * Prefix for naming.
   *
   * @var string
   */
  const PREFIX = 'image-disclaimer';

  /**
   * Gettext localization domain.
   *
   * @var string
   */
  const L10N = self::PREFIX;

  /**
   * @var string
   */
  private static $baseUrl;

  /**
   * @implements init
   */
  public static function init() {
    add_action('wp_enqueue_scripts', __CLASS__ . '::wp_enqueue_scripts');
    
    add_filter('woocommerce_single_product_image_thumbnail_html', __CLASS__ .  '::woocommerce_single_product_image_thumbnail_html', 20);
  }

  /**
   * @implements wp_enqueue_scripts
   */
  public static function wp_enqueue_scripts() {
    wp_enqueue_style('woocommerce-image-disclaimer-style', static::getBaseUrl() . '/dist/styles/style.css');

    wp_enqueue_script('woocommerce-image-disclaimer-script', static::getBaseUrl() . '/dist/scripts/script.min.js', ['jquery'], FALSE, TRUE);
  }

  /**
   * @implements woocommerce_single_product_image_thumbnail_html
   */
  public static function woocommerce_single_product_image_thumbnail_html($content = NULL) {
    $disclaimer = '<span class="disclaimer-overlay">' . __('Photo may show optional equipment not included in delivery.', Plugin::L10N) . '</span>';
    return preg_replace('/(<img[^>]+>(?:<\/img>)?)/i', '$1' . $disclaimer, $content);
  }

  /**
   * Loads the plugin textdomain.
   */
  public static function loadTextdomain() {
    load_plugin_textdomain(static::L10N, FALSE, static::L10N . '/languages/');
  }

  /**
   * The base URL path to this plugin's folder.
   *
   * Uses plugins_url() instead of plugin_dir_url() to avoid a trailing slash.
   */
  public static function getBaseUrl() {
    if (!isset(static::$baseUrl)) {
      static::$baseUrl = plugins_url('', static::getBasePath() . '/plugin.php');
    }
    return static::$baseUrl;
  }

  /**
   * The absolute filesystem base path of this plugin.
   *
   * @return string
   */
  public static function getBasePath() {
    return dirname(__DIR__);
  }

}
