<nav class="c-mainMenu">
    <h2 class="hidden">
        Navigation principale
    </h2>
    <div class="hidden">
        <a href="#content">Revenir au contenu du site</a>
    </div>

    <ul class="c-mainMenu__list">
		<?php if ( cm_get_menu( 'header-menu' )->getItems() ):
			foreach ( cm_get_menu( 'header-menu' )->getItems() as $item ):
				$current = ( $item->url === get_permalink() ) ? ' c-mainMenu__links--current' : ''; ?>
                <li class="c-mainMenu__item">
                    <a href="<?= $item->url; ?>"
                       class="c-mainMenu__link<?= $current; ?>"><?= $item->label; ?></a>
                </li>
			<?php endforeach; endif; ?>
        <li class="c-mainMenu__item">
            <a href="index.php" class="c-mainMenu__link c-mainMenu__link--index" title="vers la page d'accueil">Portfolio de Cédric Müller</a>
        </li>
    </ul>
</nav>