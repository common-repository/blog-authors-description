<?php
/*
	Plugin Name: Blog Authors Description
	Plugin URI: http://www.blog.akademx.ro
	Description: Shows information about blog authors in sidebar along with various social networks links and a picture.
	Version: 1.2
	Author: Balta Romeo
	Author URI: http://www.romeo.akademx.ro
	License: GPL2
*/

/*  Copyright 2011  Romeo B.  (email : romeo@akademx.ro)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class BAD_Widget extends WP_Widget {
    function BAD_Widget() {
        $widget_ops = array('classname' => 'widget_blogauths', 'description' => __('Display informations about blog author/authors.') );
 
        $this->WP_Widget('bad-widget', __('Blog Authors'), $widget_ops);
    }
 
    function form($instance) {
 
    $instance = wp_parse_args( (array) $instance, array( 'Name' => '', 'Picture' => '', 'Picture width' => '', 'Twitter link' => '', 'Facebook link' => '', 'Google+ link' => '', 'Linkedin link' => '', 'Dribbble link' => '', 'Flickr link' => '', 'Description' => '' ) );
    $name = strip_tags($instance['name']);
    $picture = strip_tags($instance['picture']);
    $description = strip_tags($instance['description']);
    $width = strip_tags($instance['width']);
	$twitter = strip_tags($instance['twitter']);
    $facebook = strip_tags($instance['facebook']);
    $googlep = strip_tags($instance['googlep']);
	$linkedin = strip_tags($instance['linkedin']);
    $dribbble = strip_tags($instance['dribbble']);
    $flickr = strip_tags($instance['flickr']);
    
	include("blog_authors_admin.php");
 
}
 
    function update($new_instance, $old_instance) {
 
    $instance = $old_instance;
    $instance['name'] = strip_tags($new_instance['name']);
    $instance['picture'] = strip_tags($new_instance['picture']);
    $instance['description'] = strip_tags($new_instance['description']);
	$instance['width'] = strip_tags($new_instance['width']);
    $instance['twitter'] = strip_tags($new_instance['twitter']);
    $instance['facebook'] = strip_tags($new_instance['facebook']);	
    $instance['googlep'] = strip_tags($new_instance['googlep']);
	$instance['linkedin'] = strip_tags($new_instance['linkedin']);
    $instance['dribbble'] = strip_tags($new_instance['dribbble']);	
    $instance['flickr'] = strip_tags($new_instance['flickr']);
 
    return $instance;
 
}
 
    function widget($args,$instance) {
 
    extract($args);
	$pp = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
    $name = empty($instance['name']) ? ' ' : apply_filters('widget_title', $instance['name']);
    $picture = empty($instance['picture']) ? ' ' : $instance['picture'];	
    $description = empty($instance['description']) ? ' ' : $instance['description'];
	$width = empty($instance['width']) ? ' ' : $instance['width'];	
    $twitter = empty($instance['twitter']) ? ' ' : $instance['twitter'];
	$facebook = empty($instance['facebook']) ? ' ' : $instance['facebook'];	
    $googlep = empty($instance['googlep']) ? ' ' : $instance['googlep'];
	$linkedin = empty($instance['linkedin']) ? ' ' : $instance['linkedin'];
	$dribbble = empty($instance['dribbble']) ? ' ' : $instance['dribbble'];	
    $flickr = empty($instance['flickr']) ? ' ' : $instance['flickr'];
	
	$description = str_replace('\\n', '<br />', $description);
	
    echo $before_widget;
    if (!empty( $name )) {
        echo $before_title . $name . $after_title;
    };
    echo '<img style="margin:5px 5px 0 0;" align="left" src="'.$picture.'" alt="'.$name.'" width="'.$width.'" />';
    echo $description.'<br />';
	if($twitter != ' ')
		echo '<a href="'.$twitter.'"><img style="margin:5px 5px 0 0;" align="left" src="'.$pp.'images/twitter.png" alt="'.$name.' Twitter" width="15" /></a>';
	if($facebook != ' ')
		echo '<a href="'.$facebook.'"><img style="margin:5px 5px 0 0;" align="left" src="'.$pp.'images/facebook.png" alt="'.$name.' Facebook" width="15" /></a>';
	if($googlep != ' ')
		echo '<a href="'.$googlep.'"><img style="margin:5px 5px 0 0;" align="left" src="'.$pp.'images/google_plus.png" alt="'.$name.' Google+" width="15" /></a>';
	if($linkedin != ' ')
		echo '<a href="'.$linkedin.'"><img style="margin:5px 5px 0 0;" align="left" src="'.$pp.'images/linkedin.png" alt="'.$name.' Twitter" width="15" /></a>';
	if($dribbble != ' ')
		echo '<a href="'.$dribbble.'"><img style="margin:5px 5px 0 0;" align="left" src="'.$pp.'images/dribbble.png" alt="'.$name.' Facebook" width="15" /></a>';
	if($flickr != ' ')
		echo '<a href="'.$flickr.'"><img style="margin:5px 5px 0 0;" align="left" src="'.$pp.'images/flickr.png" alt="'.$name.' Google+" width="15" /></a>';
	
    echo $after_widget;
}
 
}
add_action('widgets_init', create_function('', 'return register_widget("BAD_Widget");'));
?>