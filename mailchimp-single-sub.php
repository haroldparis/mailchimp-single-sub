<?php
/**
Plugin Name: Mailchimp Single Sub
Plugin URI: http://www.tribeleadr.com/
Description: Provides a shortcode and a widget to add a single optin Mailchimp form.
Version: 0.2
Author: Harold PARIS
Author URI: http://haroldparis.fr
License: GPL3

Copyright &copy; 2013 TRIBELEADR

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/.

**/

// Demander à WordPress d'ajouter notre shortcode

add_shortcode("mailchimp-single-sub-print", "mailchimp_single_sub");

function mailchimp_single_sub() {

	$plugins_url = plugins_url();

	echo '<div id="newsletter">
			<!-- Begin MailChimp Signup Form -->
			<div id="mailchimp_single_sub_widget_form">
				<form class="newsletter-form" action="' . $plugins_url . '/mailchimp-single-sub/inc/mcapi_listSubscribe.php" method="post">
					<input type="text" name="EMAIL" class="email required" value="" id="mce-EMAIL" placeholder="' . _e( 'votre@email.com', 'mailchimp_single_sub_widget' ) . '">
					<input type="submit" name="subscribe" id="mc-embedded-subscribe" value="' . _e( 'Je m&apos;inscris !', 'mailchimp_single_sub_widget' ) . '" class="btn submit button">
				</form>
			</div>
			<!-- End MailChimp Signup Form -->
			<div class="fix"></div>
		</div><!-- /#newsletter -->';

}

class mailchimp_single_sub_widget extends WP_Widget {

	// constructor
	function mailchimp_single_sub_widget() {
		parent::WP_Widget(false, $name = __('Mailchimp Single Sub Widget', 'mailchimp_single_sub_widget') );
	}

	// widget form creation
	function form($instance) {
		// Check values
		if( $instance) {
		     $title = esc_attr($instance['title']);
		     $textarea1 = esc_textarea($instance['textarea1']);
		     $textarea2 = esc_textarea($instance['textarea2']);
		} else {
		     $title = '';
		     $textarea1 = '';
		     $textarea2 = '';
		}
		?>

		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Titre :', 'mailchimp_single_sub_widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('textarea1'); ?>"><?php _e('Avant :', 'mailchimp_single_sub_widget'); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('textarea1'); ?>" name="<?php echo $this->get_field_name('textarea1'); ?>"><?php echo $textarea1; ?></textarea>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('textarea2'); ?>"><?php _e('Après :', 'mailchimp_single_sub_widget'); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('textarea2'); ?>" name="<?php echo $this->get_field_name('textarea2'); ?>"><?php echo $textarea2; ?></textarea>
		</p>
		<?php
	}

	// widget update
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['textarea1'] = strip_tags($new_instance['textarea1']);
		$instance['textarea2'] = strip_tags($new_instance['textarea2']);
		return $instance;
	}

	// display widget
	function widget($args, $instance) {
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$textarea1 = $instance['textarea1'];
		$textarea2 = $instance['textarea2'];

		echo $before_widget;
		
		// Display the widget
		echo '<div class="mailchimp_single_sub_widget">';

		// Check if title is set
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		// Check if textarea1 is set
		if( $textarea1 ) {
			echo '<p class="mailchimp_single_sub_widget_textarea1">' . $textarea1 . '</p>';
		}
		// Display the form
		echo '<!-- Begin MailChimp Signup Form -->
			<div id="mailchimp_single_sub_widget_form">
				<form class="newsletter-form" action="' . $plugins_url . '/mailchimp-single-sub/inc/mcapi_listSubscribe.php" method="post">
					<input type="text" name="EMAIL" class="email required" value="" id="mce-EMAIL" placeholder="' . _e( 'votre@email.com', 'mailchimp_single_sub_widget' ) . '">
					<input type="submit" name="subscribe" id="mc-embedded-subscribe" value="' . _e( 'Je m&apos;inscris !', 'mailchimp_single_sub_widget' ) . '" class="btn submit button">
				</form>
			</div>
			<!-- End MailChimp Signup Form -->';
		// Check if textarea2 is set
		if( $textarea2 ) {
			echo '<p class="mailchimp_single_sub_widget_textarea2">' . $textarea2 . '</p>';
		}
		echo '</div>';
		echo $after_widget;
	}
}
// register widget
add_action('widgets_init', create_function('', 'return register_widget("mailchimp_single_sub_widget");'));

?>