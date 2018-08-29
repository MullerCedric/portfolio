<?php
$arrImg = get_sub_field('image_content');
$size = 'cm-banner';
?><figure class="c-project__image">
<?= wp_get_attachment_image( $arrImg['ID'], $size );
?></figure>