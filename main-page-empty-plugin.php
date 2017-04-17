<?php
	wp_enqueue_style('empty-plugin-style', plugins_url( '/css/style.css', __FILE__ ) );
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