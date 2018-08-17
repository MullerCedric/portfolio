<nav class="c-socialMenu">
	<h2 class="hidden">
		Réseaux sociaux
	</h2>

	<ul class="c-socialMenu__list">
		<?php if ( cm_get_menu( 'social-menu' )->getItems() ):
			foreach ( cm_get_menu( 'social-menu' )->getItems() as $item ): ?>
				<li class="c-socialMenu__item">
					<a href="<?= $item->url; ?>"
					   class="<?= cm_get_menu_classes($item, 'social'); ?>"><?= $item->label; ?></a>
				</li>
			<?php endforeach; endif; ?>
	</ul>
</nav>