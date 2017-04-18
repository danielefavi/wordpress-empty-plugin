<?php
	/*
	 * Be very careful were you place wp_enqueue_style and wp_enqueue_script. 
	 * If you write those two functions in the beginning of an administration
	 * page (eg: main-page-empty-plugin.php) you include the CSS and the JS
	 * file only in that administration page.
	 * But if you write those two functions in the main plugin file you will
	 * include the CSS/JS file in all the pages of your website.
	 */
	// loading the CSS
	wp_enqueue_style('empty-plugin-style', plugins_url( '/css/style.css', __FILE__ ) );
	// loading the JS
	wp_enqueue_script('empty-plugin-scripts', plugins_url( '/js/scripts.js', __FILE__ ) );
?>
<div id="pluginwrap">

	<h2>
		Empty Plugin
		<input type="submit" value=" Add + " name="add_country_button" class="add-button" />
	</h2>
	<br />
	
	<h4>This is it</h4>
</div>
