<?php

?>
<iframe id='<?php echo $iframe_id; ?>'
		class='appizy-iframe'
		data-app-id="<?php echo $atts_id; ?>"
		frameborder='0' width='100%'
		src='<?php echo $attachment_url; ?>'></iframe>
<?php if ( is_user_logged_in() ) { ?>
	<button id='save'>Save</button>
<?php } ?>
