<?php
/**
 *  Add social media icons to menu
 *
 * @package taxispirit
 */

function taxispirit_social_array() {

	$social_sites = array(
		'twitter'       => 'taxispirit_twitter_profile',
		'facebook'      => 'taxispirit_facebook_profile',
		'google-plus'   => 'taxispirit_googleplus_profile',
		'pinterest'     => 'taxispirit_pinterest_profile',
		'linkedin'      => 'taxispirit_linkedin_profile',
		'youtube'       => 'taxispirit_youtube_profile',
		'vimeo'         => 'taxispirit_vimeo_profile',
		'tumblr'        => 'taxispirit_tumblr_profile',
		'instagram'     => 'taxispirit_instagram_profile',
		'flickr'        => 'taxispirit_flickr_profile',
		'dribbble'      => 'taxispirit_dribbble_profile',
		'rss'           => 'taxispirit_rss_profile',
		'reddit'        => 'taxispirit_reddit_profile',
		'soundcloud'    => 'taxispirit_soundcloud_profile',
		'spotify'       => 'taxispirit_spotify_profile',
		'vine'          => 'taxispirit_vine_profile',
		'yahoo'         => 'taxispirit_yahoo_profile',
		'behance'       => 'taxispirit_behance_profile',
		'codepen'       => 'taxispirit_codepen_profile',
		'delicious'     => 'taxispirit_delicious_profile',
		'stumbleupon'   => 'taxispirit_stumbleupon_profile',
		'deviantart'    => 'taxispirit_deviantart_profile',
		'digg'          => 'taxispirit_digg_profile',
		'github'        => 'taxispirit_github_profile',
		'hacker-news'   => 'taxispirit_hacker-news_profile',
		'steam'         => 'taxispirit_steam_profile',
		'vk'            => 'taxispirit_vk_profile',
		'weibo'         => 'taxispirit_weibo_profile',
		'tencent-weibo' => 'taxispirit_tencent_weibo_profile',
		'500px'         => 'taxispirit_500px_profile',
		'foursquare'    => 'taxispirit_foursquare_profile',
		'slack'         => 'taxispirit_slack_profile',
		'slideshare'    => 'taxispirit_slideshare_profile',
		'qq'            => 'taxispirit_qq_profile',
		'whatsapp'      => 'taxispirit_whatsapp_profile',
		'skype'         => 'taxispirit_skype_profile',
		'wechat'        => 'taxispirit_wechat_profile',
		'xing'          => 'taxispirit_xing_profile',
		'paypal'        => 'taxispirit_paypal_profile',
		'email-form'    => 'taxispirit_email_form_profile'
	);

	return apply_filters( 'taxispirit_social_array_filter', $social_sites );
}

function taxispirit_add_customizer_sections( $wp_customize ) {

	$social_sites = taxispirit_social_array();

	// set a priority used to order the social sites
	$priority = 5;

	// section
	$wp_customize->add_section( 'taxispirit_social_media_icons', array(
		'title'       => __( 'Social Media Icons', 'taxispirit' ),
		'priority'    => 25,
		'description' => __( 'Add the URL for each of your social profiles.', 'taxispirit' )
	) );

	// create a setting and control for each social site
	foreach ( $social_sites as $social_site => $value ) {

		$label = ucfirst( $social_site );

		if ( $social_site == 'google-plus' ) {
			$label = 'Google Plus';
		} elseif ( $social_site == 'rss' ) {
			$label = 'RSS';
		} elseif ( $social_site == 'soundcloud' ) {
			$label = 'SoundCloud';
		} elseif ( $social_site == 'slideshare' ) {
			$label = 'SlideShare';
		} elseif ( $social_site == 'codepen' ) {
			$label = 'CodePen';
		} elseif ( $social_site == 'stumbleupon' ) {
			$label = 'StumbleUpon';
		} elseif ( $social_site == 'deviantart' ) {
			$label = 'DeviantArt';
		} elseif ( $social_site == 'hacker-news' ) {
			$label = 'Hacker News';
		} elseif ( $social_site == 'whatsapp' ) {
			$label = 'WhatsApp';
		} elseif ( $social_site == 'qq' ) {
			$label = 'QQ';
		} elseif ( $social_site == 'vk' ) {
			$label = 'VK';
		} elseif ( $social_site == 'wechat' ) {
				$label = 'WeChat';
		} elseif ( $social_site == 'tencent-weibo' ) {
			$label = 'Tencent Weibo';
		} elseif ( $social_site == 'paypal' ) {
			$label = 'PayPal';
		} elseif ( $social_site == 'email-form' ) {
			$label = 'Contact Form';
		}
		// setting
		$wp_customize->add_setting( $social_site, array(
			'sanitize_callback' => 'esc_url_raw'
		) );
		// control
		$wp_customize->add_control( $social_site, array(
			'type'     => 'url',
			'label'    => $label,
			'section'  => 'taxispirit_social_media_icons',
			'priority' => $priority
		) );
		// increment the priority for next site
		$priority = $priority + 5;
	}
}
add_action( 'customize_register', 'taxispirit_add_customizer_sections' );

function taxispirit_social_icons_output() {

	$social_sites = taxispirit_social_array();

	foreach ( $social_sites as $social_site => $profile ) {

		if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
			$active_sites[ $social_site ] = $social_site;
		}
	}

	if ( ! empty( $active_sites ) ) {

		echo '<ul class="social-media-icons">';
		foreach ( $active_sites as $key => $active_site ) { 
        	$class = 'csd-icon csd-' . $active_site; ?>
		 	<li>
				<a class="<?php echo esc_attr( $active_site ); ?>" target="_blank" rel="noopener" href="<?php echo esc_url( get_theme_mod( $key ) ); ?>">
					<i class="<?php echo esc_attr( $class ); ?>" title="<?php echo esc_attr( $active_site ); ?>"></i>
				</a>
			</li>
		<?php } 
		echo "</ul>";
	}
}