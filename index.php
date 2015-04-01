<?php
/*
  Plugin Name: Quick Navigation Right Bar
  Plugin URI: http://anybuy.vn/noi-trang-banh-cuon.htm
  Description: This plugin add a navgation bar in right website. You can add social button on this bar, quick login button, custom html button...
  Version: 1.0.1
  Author: noitrangbanhcuon
  Author URI: http://anybuy.vn/noi-trang-banh-cuon.htm
 */
if(!function_exists('wp_get_current_user')) {
    include(ABSPATH . "wp-includes/pluggable.php"); 
}
if (is_super_admin()) {
	add_action('admin_menu', 'qnrb_admin_actions');
}
function qnrb_admin(){
    require('qnrb_backend.php');
    exit;
}
function qnrb_admin_actions(){
    add_options_page("Quick Navigation Right Bar Options", "Quick Navigation Right Bar Option", 1, "QuickNavigationRightBarOption", "qnrb_admin");
}

function qnrb_add_bar_code() { 
	$qnrb_social = array('linkedin','googleplus','instagram','facebook','behance','youtube','vimeo','tumblr','blogger','twitter','pinterest');
	$arr_social = array();
	foreach ($qnrb_social as $value) {
		$arr_social['qnrb_'.$value] = get_option('qnrb_'.$value);
	}
	$qnrb_feedback = get_option('qnrb_feedback');
?>
<div class="quick-nav" id="toolbar">
<div class="quick-nav-bar">
<ul class="quick-nav-above">
<?php foreach ($qnrb_social as $value) { ?>
<?php if ($arr_social['qnrb_'.$value] <> '') { ?>
<li class="fn-artistlist"><a class="fn-toolbar" href="<?php echo $arr_social['qnrb_'.$value]; ?>" title="icon <?php echo $value; ?>"><span class="zicon qnrb-icon-<?php echo $value; ?>"></span></a></li>
<?php }//end if ?>
<?php }//end foreach ?>
</ul>
<ul class="quick-nav-below">
<li><a href="<?php echo wp_login_url( $redirect ); ?>" title="user"><span class="zicon qnrb-icon-user"></span></a></li>
<li><a title="Về đầu trang" href="#" onclick="window.scrollTo(0, 0); return false;"><span class="zicon qnrb-icon-to-top"></span></a></li>
<li><a title="Góp ý" href="<?php echo $qnrb_feedback; ?>" target="_blank" rel="nofollow"><span class="zicon qnrb-icon-feedback"></span></a></li>
</ul>
</div></div>
<?php
}
add_action('wp_footer', 'qnrb_add_bar_code');
function qnrb_add_css() { ?>
<style>
body{
  padding-right: 45px;
}
.quick-nav-bar {
  width: 45px;
  height: 100%;
  position: fixed;
  right: 0;
  top: 0;
  border-left: 1px solid #eaeaea;
  background: #fff;
  z-index: 99999999;
}
.zicon, .dropdown ul li a.checked:before, .filter-display li i, .main-nav .home a, .s50x50, .icon33 {
  background-image: url("<?php echo plugins_url( '/icon.png', __FILE__ ) ?>");
  background-repeat: no-repeat;
}
.zicon, .dropdown ul li a.checked:before, .filter-display li i {
  display: inline-block;
  width: 25px;
  height: 25px;
}
.quick-nav-bar .quick-nav-above {
  margin: 0px;
  margin-top: 30px;
  padding: 0px;
}
.quick-nav-bar .quick-nav-above>li {
	list-style: none;
}
.quick-nav-bar .quick-nav-above>li>a {
  display: block;
  width: 44px;
  height: 50px;
  position: relative;
}
.quick-nav-bar .quick-nav-above>li>a span {
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -12px 0 0 -12px;
}
.quick-nav-bar .quick-nav-below {
  position: absolute;
  bottom: 30px;
  padding: 0px;
  margin: 0px;
}
.quick-nav-bar .quick-nav-below>li {
	list-style: none;
}
.quick-nav-bar .quick-nav-below>li a span {
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -12px 0 0 -12px;
}
.quick-nav-bar .quick-nav-below>li a {
  display: block;
  width: 44px;
  height: 50px;
  position: relative;
}
.qnrb-icon-linkedin{
	background-position: 0 0px;
}
.qnrb-icon-googleplus{
	background-position: 0 -25px;
}
.qnrb-icon-instagram{
	background-position: 0 -50px;
}
.qnrb-icon-facebook{
	background-position: 0 -75px;
}
.qnrb-icon-behance{
	background-position: 0 -100px;
}
.qnrb-icon-youtube{
	background-position: 0 -125px;
}
.qnrb-icon-vimeo{
	background-position: 0 -150px;
}
.qnrb-icon-tumblr{
	background-position: 0 -175px;
}
.qnrb-icon-blogger{
	background-position: 0 -200px;
}
.qnrb-icon-twitter{
	background-position: 0 -225px;
}
.qnrb-icon-pinterest{
	background-position: 0 -250px;
}

.qnrb-icon-user {
  background-position: 0 -275px;
}
.qnrb-icon-to-top {
  background-position: 0 -300px;
}
.qnrb-icon-feedback {
  background-position: 0 -325px;
}
</style>
<?php
}
add_action('wp_head', 'qnrb_add_css' );
?>