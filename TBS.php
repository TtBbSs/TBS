<?php
/*
  Plugin Name: TBS
  Description: Headplugin for all TBS plugins.
  Version: 1.0.0
  Author: TBS
  Author URI: https://github.com/TtBbSs
*/
?>
<?php
  // Do not access file directly!
  if (!defined('WPINC')) {
    die;
  }
  // Cache kontrol
  Header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  include_once( plugin_dir_path( __FILE__ ) . 'updater.php' );
  $updater = new TBS_Updater( __FILE__ );
  $updater->set_username( 'TtBbSs' );
  $updater->set_repository( 'TBS' );
  /*
    $updater->authorize( '894642da381896244de2ff9abf2d74a9e323d221' ); // Your auth code goes here for private repos
  */
  $updater->initialize();

  function tbs_admin_notice__success() {
    ?>
    <link rel="stylesheet" href="style.css" />
    <div class="notice notice-success is-dismissible">
      <div id="main_content" class="notice_content">
        <h1>TBS</h1>
        <p>Tak for at aktivere TBS!</p>
        <p>Du har nu mulighed for at bruge følgende plugins:</p>
        <ul>
          <li class="free"><a href="https://github.com/TtBbSs/smashing-plugin/">Citat</a></li>
        </ul>
      </div>
    </div>
    <?php
  }
  if (!isset($_COOKIE['tbs'])) {
    add_action( 'admin_notices', 'tbs_admin_notice__success' );
  }
  add_action( 'admin_footer', 'tbs_admin_notice__function' );
  function tbs_admin_notice__function() {
    ?>
    <script type="text/javascript">
      jQuery(window).on('load',function($) {
        jQuery('.notice .notice-dismiss').on('click',function(){
          document.cookie = "tbs=1";
        });
      });
    </script>
    <?php
  }
?>
