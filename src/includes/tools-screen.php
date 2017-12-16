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
	<h1><?php esc_html_e( 'Code Embed Search', 'simple-embed-code' ); ?></h1>

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
	<h2>Available web-calculator</h2>
	<table class="form-table">
		<thead>
		<tr>
			<th>Title</th>
			<th>Caption</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ( $attachments as $attachment ) : ?>
			<?php $attachment_id = $attachment->ID; ?>
			<tr>
				<td><?php get_the_title( $attachment_id ); ?></td>
				<td><?php wp_get_attachment_caption( $attachment_id ); ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
