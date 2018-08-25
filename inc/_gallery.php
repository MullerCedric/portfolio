<?php
$images = get_sub_field('images');

if( $images ): ?>
	<ul data-featherlight-gallery data-featherlight-filter="a" class="c-gallery">
		<?php foreach( $images as $image ):
            ?><li class="c-gallery__item">
                <a href='<?= wp_get_attachment_image_src( $image['ID'], 'cm-gallery' )[0]; ?>' class="gallery c-gallery__link">
                    <?= wp_get_attachment_image( $image['ID'], 'thumbnail', false, ["class" => "c-gallery__thumbnail"] ); ?>
                </a>
			</li><?php
        endforeach; ?>
	</ul>
<?php endif; ?>

