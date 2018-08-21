<?php
$btn['label'] = get_sub_field('label');
$btn['url'] = get_sub_field('url'); ?>
<div class="c-button">
	<a href="<?= $btn['url']; ?>" class="c-button__link"><?= $btn['label']; ?></a>
</div>
