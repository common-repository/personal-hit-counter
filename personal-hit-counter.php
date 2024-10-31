<?php
/* 
Plugin Name: Personal Hit Counter
Plugin URI: https://store.devilhunter.net/wordpress-plugin/phc/
Description:  This Plugin will automatically match your Theme's style. Go to Appearance > Widgets, and drag 'Plugin' in sidebar or footer or into any widgetized area. Insert into page or post by Page Builder. There is no need to use any short-code or to edit settings. Theme must be non-block Theme. 
Version: 1.0
Author: Tawhidur Rahman Dear
Author URI: https://www.tawhidurrahmandear.com/
Text Domain: tawhidurrahmandeartwentyseven
License: GPLv2 or later 
 
 */
 
 
 // Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}
// 
 
class tawhidurrahmandeartwentysevenWidget extends WP_Widget {
  function tawhidurrahmandeartwentysevenWidget() {
    $widget_ops = array('classname' => 'tawhidurrahmandeartwentysevenWidget', 'description' => 'Drag the Plugin in sidebar or footer. Insert into page or post by Page Builder' );
    $this->WP_Widget('tawhidurrahmandeartwentysevenWidget', 'Personal Hit Counter', $widget_ops);
  }
 
  function form($instance) {
    $instance = wp_parse_args((array) $instance, array( 'title' => '' ));
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title (optional) :<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance) {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
 ?>


<SCRIPT LANGUAGE="JavaScript">
<!--
 function nameDefined(ckie,nme)
{
   var splitValues
   var i
   for (i=0;i<ckie.length;++i)
   {
      splitValues=ckie[i].split("=")
      if (splitValues[0]==nme) return true
   }
   return false
}

function delBlanks(strng)
{
   var result=""
   var i
   var chrn
   for (i=0;i<strng.length;++i) {
      chrn=strng.charAt(i)
      if (chrn!=" ") result += chrn
   }
   return result
}
function getCookieValue(ckie,nme)
{
   var splitValues
   var i
   for(i=0;i<ckie.length;++i) {
      splitValues=ckie[i].split("=")
      if(splitValues[0]==nme) return splitValues[1]
   }
   return ""
}
function insertCounter() {
 readCookie()
 displayCounter()
}
 function displayCounter() {
 document.write('<p ALIGN="CENTER"><b>')
 document.write("You've visited ")
 if(counter==1) document.write(" first time")
 else document.write(counter+" times")
 document.writeln('</b></p>')
 }
function readCookie() {
 var cookie=document.cookie
 counter=0
 var chkdCookie=delBlanks(cookie)  //are on the client computer
 var nvpair=chkdCookie.split(";")
 if(nameDefined(nvpair,"pageCount"))
 counter=parseInt(getCookieValue(nvpair,"pageCount"))
 ++counter
 var futdate = new Date()
 var expdate = futdate.getTime()
 expdate += 3600000 * 24 *30  //expires in 1 hour
 futdate.setTime(expdate)

 var newCookie="pageCount="+counter
 newCookie += "; expires=" + futdate.toGMTString()
 window.document.cookie=newCookie
}
// -->
</SCRIPT>
<div align="center">
<SCRIPT LANGUAGE="JavaScript">
<!--
insertCounter()
// -->
</SCRIPT>
</div>
 
<?php
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("tawhidurrahmandeartwentysevenWidget");') );?>