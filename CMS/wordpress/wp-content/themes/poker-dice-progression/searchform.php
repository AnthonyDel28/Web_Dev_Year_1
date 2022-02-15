<?php
/**
 * The template for displaying search forms in progression
 *
 * @package pro
 */
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'poker-dice-progression' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Enter keyword to search...', 'placeholder', 'poker-dice-progression' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_html__( 'Submit', 'poker-dice-progression' ); ?>">
	<div class="clearfix-pro"></div>
</form>