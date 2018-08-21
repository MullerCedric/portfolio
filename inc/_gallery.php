<?php
$images = get_sub_field('images');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

if( $images ): ?>
	<ul>
		<?php foreach( $images as $image ): ?>
			<li>
				<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

