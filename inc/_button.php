<?php
$btn['label'] = get_sub_field('label');
$btn['url'] = get_sub_field('url'); ?>
<div class="c-cta">
	<a href="<?= $btn['url']; ?>" class="c-cta__link"><?= $btn['label']; ?></a>
</div>
