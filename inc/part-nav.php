<nav class="c-mainMenu" id="nav">
    <h2 class="hidden">
        Navigation principale
    </h2>
    <div class="hidden">
        <a href="#content">Revenir au contenu du site</a>
    </div>

    <ul class="c-mainMenu__list">
		<?php if ( cm_get_menu( 'main-menu' )->getItems() ):
			foreach ( cm_get_menu( 'main-menu' )->getItems() as $item ): ?>
                <li class="c-mainMenu__item">
                    <a href="<?= $item->url; ?>"
                       class="<?= cm_get_menu_classes($item, 'main'); ?>"><?= $item->label; ?></a>
                </li>
			<?php endforeach; endif; ?>
    </ul>
</nav>