<?php
/**
 * Appizy App Embed
 *
 * Admin settings page to list all available web-calculators in the media library
 *
 * @package Appizy App Embed
 */

?>
<div class="wrap">
	<h1><?php esc_html_e( 'Appizy Embed App', 'appizy-embed-app' ); ?></h1>

	<?php

	$args = [
		'order'          => 'ASC',
		'order_by'       => 'publish_date',
		'posts_per_page' => - 1,
		'post_status'    => null,
		'post_parent'    => null,
		'default_styles' => true,
		'date_format'    => 'Y/m/d',
		'post_type'      => 'attachment',
	];

	$attachments = get_posts( $args );

	?>
	<?php if ( count( $attachments ) > 0 ) : ?>
		<h2>Available web-calculator</h2>
		<p><?php _e( 'Copy the shortcode into your post to display the corresponding web-calculator', 'appizy-app-embed' ); ?></p>
		<table class="form-table">
			<thead>
			<tr>
				<th>Title</th>
				<th>Caption</th>
				<th>Shortcode</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ( $attachments as $attachment ) : ?>
				<?php $attachment_id = $attachment->ID; ?>
				<tr>
					<td><?php echo get_the_title( $attachment_id ); ?></td>
					<td><?php echo wp_get_attachment_caption( $attachment_id ); ?></td>
					<td><input value='[appizy id="<?php echo $attachment_id; ?>"]'/></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	<?php else : ?>
		<p><?php _e( 'No web-calculator found in the media library', 'appizy-app-embed' ); ?></p>
	<?php endif; ?>
</div>
