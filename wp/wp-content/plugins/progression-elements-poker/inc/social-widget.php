<?php
add_action('widgets_init', 'pro_social_Media__load_widgets');

function pro_social_Media__load_widgets()
{
	register_widget('Pro_Social_Featured_Media_Widget');
}

class Pro_Social_Featured_Media_Widget extends WP_Widget {
	
	public function __construct()
	    {
		$widget_ops = array('classname' => 'pyre_social_media-feat', 'description' => 'Add your social icons');

		$control_ops = array('id_base' => 'pyre_social_media-widget-feat');
		
		
		parent::__construct('pyre_social_media-widget-feat', 'Pro: Social Icons', $widget_ops, $control_ops);
	}
	
	
	
	
	
	function widget($args, $instance)
	{
		global $post;
		
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		$pro_main_text = $instance['pro_main_text'];
		$instagram_share_pro = $instance['instagram_share_pro'];
		$tumblr_share_pro = $instance['tumblr_share_pro'];
		
		

		$progression_studios_btn_link = $instance['progression_studios_btn_link'];
		$progression_studios_btn_text = $instance['progression_studios_btn_text'];
		$android_share_pro = $instance['android_share_pro'];
		$vimeo_share_pro = $instance['vimeo_share_pro'];
		$soundcloud_share_pro = $instance['soundcloud_share_pro'];
		$vine_share_pro = $instance['vine_share_pro'];
		
		$fb_share_pro = $instance['fb_share_pro'];
		$twttr_share_pro = $instance['twttr_share_pro'];
		$goog_share_pro = $instance['goog_share_pro'];
		$lnkedin_share_pro = $instance['lnkedin_share_pro'];
		$pintrst_share_pro = $instance['pintrst_share_pro'];
		$utube_share_pro = $instance['utube_share_pro'];
		
		$mail_share_pro = $instance['mail_share_pro'];

		$snapchat_share_pro = $instance['snapchat_share_pro'];
		$dribbble_share_pro = $instance['dribbble_share_pro'];
		$vk_share_pro = $instance['vk_share_pro'];
		$houzz_share_pro = $instance['houzz_share_pro'];
		$wordpress_share_pro = $instance['wordpress_share_pro'];
		$behance_share_pro = $instance['behance_share_pro'];
		$medium_share_pro = $instance['medium_share_pro'];
		$trip_advisor_share_pro = $instance['trip_advisor_share_pro'];
		$twitch_share_pro = $instance['twitch_share_pro'];
		$yelp_share_pro = $instance['yelp_share_pro'];


		
		echo wp_kses($before_widget, true);
		
		if($title) {
			echo  $before_title.$title.$after_title;
		}
		
	 ?>

		<div class="progression-studios-social-icons-widget-container">
			
			
			
			<?php if($pro_main_text): ?><div class="progression-studios-social-summary-pro"><?php echo wp_kses( $pro_main_text, TRUE); ?></div><?php endif; ?>
			
			
			<?php if($progression_studios_btn_text): ?><a href="<?php echo esc_attr( $progression_studios_btn_link ); ?>" class="progression-button"><?php echo esc_attr( $progression_studios_btn_text ); ?></a><?php endif; ?>
				
			
			<ul class="progression-studios-social-widget">

				<?php if($fb_share_pro): ?><li><a href="<?php echo esc_attr( $fb_share_pro ); ?>" target="_blank" class="facebook-pro"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
				<?php if($twttr_share_pro): ?><li><a href="<?php echo esc_attr( $twttr_share_pro ); ?>" target="_blank" class="twitter-pro"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
				<?php if($mail_share_pro): ?><li><a href="mailto:<?php echo esc_attr( $mail_share_pro ); ?>" class="mail-pro"><i class="fa fa-envelope"></i></a></li><?php endif; ?>
				<?php if($goog_share_pro): ?><li><a href="<?php echo esc_attr( $goog_share_pro ); ?>" target="_blank" class="google-pro"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
				<?php if($lnkedin_share_pro): ?><li><a href="<?php echo esc_attr( $lnkedin_share_pro ); ?>" target="_blank" class="linkedin-pro"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
				<?php if($instagram_share_pro): ?><li><a href="<?php echo esc_attr( $instagram_share_pro ); ?>" target="_blank" class="instagram-pro"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
				<?php if($tumblr_share_pro): ?><li><a href="<?php echo esc_attr( $tumblr_share_pro ); ?>" target="_blank" class="tumblr-pro"><i class="fa fa-tumblr"></i></a></li><?php endif; ?>
				<?php if($pintrst_share_pro): ?><li><a href="<?php echo esc_attr( $pintrst_share_pro ); ?>" target="_blank" class="pinterest-pro"><i class="fa fa-pinterest"></i></a></li><?php endif; ?>
				<?php if($utube_share_pro): ?><li><a href="<?php echo esc_attr( $utube_share_pro ); ?>" target="_blank" class="youtube-pro"><i class="fa fa-youtube-play"></i></a></li><?php endif; ?>
				<?php if($android_share_pro): ?><li><a href="<?php echo esc_attr( $android_share_pro ); ?>" target="_blank" class="flickr-pro"><i class="fa fa-flickr"></i></a></li><?php endif; ?>
				<?php if($vimeo_share_pro): ?><li><a href="<?php echo esc_attr( $vimeo_share_pro ); ?>" target="_blank" class="vimeo-pro"><i class="fa fa-vimeo"></i></a></li><?php endif; ?>
				<?php if($soundcloud_share_pro): ?><li><a href="<?php echo esc_attr( $soundcloud_share_pro ); ?>" target="_blank" class="soundcloud-pro"><i class="fa fa-soundcloud"></i></a></li><?php endif; ?>
				<?php if($vine_share_pro): ?><li><a href="<?php echo esc_attr( $vine_share_pro ); ?>" target="_blank" class="vine-pro"><i class="fa fa-vine"></i></a></li><?php endif; ?>
					
				
				<?php if($snapchat_share_pro): ?><li><a href="<?php echo esc_attr( ($snapchat_share_pro) ); ?>" target="_blank" class="icon-pro"><i class="fa fa-snapchat"></i></a></li><?php endif; ?>
				<?php if($dribbble_share_pro): ?><li><a href="<?php echo esc_attr( ($dribbble_share_pro) ); ?>" target="_blank" class="icon-pro"><i class="fa fa-dribbble"></i></a></li><?php endif; ?>
				<?php if($vk_share_pro): ?><li><a href="<?php echo esc_attr( ($vk_share_pro) ); ?>" target="_blank" class="icon-pro"><i class="fa fa-vk"></i></a></li><?php endif; ?>
				<?php if($houzz_share_pro): ?><li><a href="<?php echo esc_attr( ($houzz_share_pro) ); ?>" target="_blank" class="icon-pro"><i class="fa fa-houzz"></i></a></li><?php endif; ?>
				<?php if($wordpress_share_pro): ?><li><a href="<?php echo esc_attr( ($wordpress_share_pro) ); ?>" target="_blank" class="icon-pro"><i class="fa fa-wordpress"></i></a></li><?php endif; ?>
				<?php if($behance_share_pro): ?><li><a href="<?php echo esc_attr( ($behance_share_pro) ); ?>" target="_blank" class="icon-pro"><i class="fa fa-behance"></i></a></li><?php endif; ?>
				<?php if($medium_share_pro): ?><li><a href="<?php echo esc_attr( $medium_share_pro ); ?>" target="_blank" class="icon-pro"><i class="fa fa-medium"></i></a></li><?php endif; ?>
				<?php if($trip_advisor_share_pro): ?><li><a href="<?php echo esc_attr( ($trip_advisor_share_pro) ); ?>" target="_blank" class="icon-pro"><i class="fa fa-tripadvisor"></i></a></li><?php endif; ?>
				<?php if($twitch_share_pro): ?><li><a href="<?php echo esc_attr( ($twitch_share_pro) ); ?>" target="_blank" class="icon-pro"><i class="fa fa-twitch"></i></a></li><?php endif; ?>
				<?php if($yelp_share_pro): ?><li><a href="<?php echo esc_attr( ($yelp_share_pro) ); ?>" target="_blank" class="icon-pro"><i class="fa fa-yelp"></i></a></li><?php endif; ?>
			</ul><!-- close .progression-studios-social-widget -->
			

			
			
			
		</div><!-- close .progression-studios-social-icons-widget-container -->

		
		<?php
		echo wp_kses($after_widget, true);
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['pro_main_text'] = $new_instance['pro_main_text'];
		$instance['instagram_share_pro'] = $new_instance['instagram_share_pro'];
		$instance['tumblr_share_pro'] = $new_instance['tumblr_share_pro'];
		
		
		$instance['progression_studios_btn_link'] = $new_instance['progression_studios_btn_link'];
		$instance['progression_studios_btn_text'] = $new_instance['progression_studios_btn_text'];
		
		
		$instance['android_share_pro'] = $new_instance['android_share_pro'];
		$instance['vimeo_share_pro'] = $new_instance['vimeo_share_pro'];
		$instance['soundcloud_share_pro'] = $new_instance['soundcloud_share_pro'];
		$instance['vine_share_pro'] = $new_instance['vine_share_pro'];
		
		$instance['fb_share_pro'] = $new_instance['fb_share_pro'];
		$instance['twttr_share_pro'] = $new_instance['twttr_share_pro'];
		$instance['goog_share_pro'] = $new_instance['goog_share_pro'];
		$instance['lnkedin_share_pro'] = $new_instance['lnkedin_share_pro'];
		
		$instance['pintrst_share_pro'] = $new_instance['pintrst_share_pro'];
		$instance['utube_share_pro'] = $new_instance['utube_share_pro'];
		$instance['mail_share_pro'] = $new_instance['mail_share_pro'];
		

		$instance['snapchat_share_pro'] = $new_instance['snapchat_share_pro'];
		$instance['dribbble_share_pro'] = $new_instance['dribbble_share_pro'];
		$instance['vk_share_pro'] = $new_instance['vk_share_pro'];
		$instance['houzz_share_pro'] = $new_instance['houzz_share_pro'];
		$instance['wordpress_share_pro'] = $new_instance['wordpress_share_pro'];
		$instance['behance_share_pro'] = $new_instance['behance_share_pro'];
		$instance['medium_share_pro'] = $new_instance['medium_share_pro'];
		$instance['trip_advisor_share_pro'] = $new_instance['trip_advisor_share_pro'];
		$instance['twitch_share_pro'] = $new_instance['twitch_share_pro'];
		$instance['yelp_share_pro'] = $new_instance['yelp_share_pro'];

		return $instance;
	}

	function form($instance)
	{
		
		$defaults = array('title' => '', 'pro_main_text' => '', 'progression_studios_btn_link' => '', 'progression_studios_btn_text' => '', 'android_share_pro' => '', 'vimeo_share_pro' => '', 'soundcloud_share_pro' => '', 'vine_share_pro' => '', 'fb_share_pro' => '#!', 'twttr_share_pro' => '#!', 'goog_share_pro' => '', 'lnkedin_share_pro' => '', 'instagram_share_pro' => '#!', 'tumblr_share_pro' => '', 'pintrst_share_pro' => '#!', 'utube_share_pro' => '', 'mail_share_pro' => '', 'snapchat_share_pro' => '', 'dribbble_share_pro' => '', 'vk_share_pro' => '', 'houzz_share_pro' => '', 'wordpress_share_pro' => '', 'behance_share_pro' => '', 'medium_share_pro' => '', 'trip_advisor_share_pro' => '', 'twitch_share_pro' => '', 'yelp_share_pro' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo esc_html($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'poker-dice-progression' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html( $this->get_field_id('title') ); ?>" name="<?php echo esc_html( $this->get_field_name('title') ); ?>" value="<?php echo esc_html($instance['title']); ?>" />
		</p>
	
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('pro_main_text')) ; ?>"><?php esc_html_e( 'Text Field', 'poker-dice-progression' ); ?>:</label>			
			<textarea class="widefat" rows="10" cols="20" id="<?php echo esc_html($this->get_field_id('pro_main_text') ); ?>" name="<?php echo esc_html($this->get_field_name('pro_main_text')); ?>"><?php echo wp_kses($instance['pro_main_text'], true ); ?></textarea>
		</p>
		
		

		<p>
			<label for="<?php echo esc_html($this->get_field_id('progression_studios_btn_text') ); ?>"><?php esc_html_e( 'Button Text', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('progression_studios_btn_text')); ?>" name="<?php echo esc_html($this->get_field_name('progression_studios_btn_text')); ?>" value="<?php echo esc_html($instance['progression_studios_btn_text']); ?>" />
		</p>
	
		<p>
			<label for="<?php echo esc_html($this->get_field_id('progression_studios_btn_link')); ?>"><?php esc_html_e( 'Button Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('progression_studios_btn_link')); ?>" name="<?php echo esc_html($this->get_field_name('progression_studios_btn_link')); ?>" value="<?php echo esc_html($instance['progression_studios_btn_link']); ?>" />
		</p>
		

		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('fb_share_pro') ); ?>">Facebook <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('fb_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('fb_share_pro') ); ?>" value="<?php echo esc_html($instance['fb_share_pro']) ; ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('twttr_share_pro') ); ?>">Twitter <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('twttr_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('twttr_share_pro') ); ?>" value="<?php echo esc_html($instance['twttr_share_pro']) ; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('mail_share_pro') ); ?>"><?php esc_html_e( 'E-mail Address', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('mail_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('mail_share_pro') ); ?>" value="<?php echo esc_html($instance['mail_share_pro']) ; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('goog_share_pro') ); ?>">Google+ <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('goog_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('goog_share_pro') ); ?>" value="<?php echo esc_html($instance['goog_share_pro']) ; ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('lnkedin_share_pro') ); ?>">LinkedIn <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('lnkedin_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('lnkedin_share_pro') ); ?>" value="<?php echo esc_html($instance['lnkedin_share_pro']) ; ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('instagram_share_pro') ); ?>">Instagram <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('instagram_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('instagram_share_pro') ); ?>" value="<?php echo esc_html($instance['instagram_share_pro']) ; ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('tumblr_share_pro') ); ?>">Tumblr <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('tumblr_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('tumblr_share_pro') ); ?>" value="<?php echo esc_html($instance['tumblr_share_pro']) ; ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('pintrst_share_pro') ); ?>">Pinterest <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('pintrst_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('pintrst_share_pro') ); ?>" value="<?php echo esc_html($instance['pintrst_share_pro']) ; ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('utube_share_pro') ); ?>">Youtube <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('utube_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('utube_share_pro') ); ?>" value="<?php echo esc_html($instance['utube_share_pro']) ; ?>" />
		</p>
		

		<p>
			<label for="<?php echo esc_html($this->get_field_id('android_share_pro') ); ?>">Flickr <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('android_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('android_share_pro') ); ?>" value="<?php echo esc_html($instance['android_share_pro']) ; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('vimeo_share_pro') ); ?>">Vimeo <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('vimeo_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('vimeo_share_pro') ); ?>" value="<?php echo esc_html($instance['vimeo_share_pro']) ; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('soundcloud_share_pro') ); ?>">Soundcloud <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('soundcloud_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('soundcloud_share_pro') ); ?>" value="<?php echo esc_html($instance['soundcloud_share_pro']) ; ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('vine_share_pro') ); ?>">Vine <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('vine_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('vine_share_pro') ); ?>" value="<?php echo esc_html($instance['vine_share_pro']) ; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('snapchat_share_pro') ); ?>">Snapchat <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('snapchat_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('snapchat_share_pro') ); ?>" value="<?php echo esc_html($instance['snapchat_share_pro']) ; ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('dribbble_share_pro') ); ?>">Dribbble <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('dribbble_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('dribbble_share_pro') ); ?>" value="<?php echo esc_html($instance['dribbble_share_pro']) ; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('vk_share_pro') ); ?>">VK <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('vk_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('vk_share_pro') ); ?>" value="<?php echo esc_html($instance['vk_share_pro']) ; ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('houzz_share_pro') ); ?>">Houzz <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('houzz_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('houzz_share_pro') ); ?>" value="<?php echo esc_html($instance['houzz_share_pro']) ; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('wordpress_share_pro') ); ?>">WordPress <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('wordpress_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('wordpress_share_pro') ); ?>" value="<?php echo esc_html($instance['wordpress_share_pro']) ; ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('behance_share_pro') ); ?>">BeHance <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('behance_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('behance_share_pro') ); ?>" value="<?php echo esc_html($instance['behance_share_pro']) ; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('medium_share_pro') ); ?>">Medium <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('medium_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('medium_share_pro') ); ?>" value="<?php echo esc_html($instance['medium_share_pro']) ; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('trip_advisor_share_pro') ); ?>">Trip Advisor <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('trip_advisor_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('trip_advisor_share_pro') ); ?>" value="<?php echo esc_html($instance['trip_advisor_share_pro']) ; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('twitch_share_pro') ); ?>">Twitch <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('twitch_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('twitch_share_pro') ); ?>" value="<?php echo esc_html($instance['twitch_share_pro']) ; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id('yelp_share_pro') ); ?>">Yelp <?php esc_html_e( 'Link', 'poker-dice-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo esc_html($this->get_field_id('yelp_share_pro') ); ?>" name="<?php echo esc_html($this->get_field_name('yelp_share_pro') ); ?>" value="<?php echo esc_html($instance['yelp_share_pro']) ; ?>" />
		</p>
		

		
	<?php }
}
?>