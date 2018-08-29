<?php /*
  * 404 page
  * Error page
  */ ?>
<!DOCTYPE html>
<html lang="fr">
<?php get_header(); ?>
<body>
<main id="content" class="o-layout">
    <div class="o-layout__wrapper">
        <header>
            <h1><span class="c-highlight">Page introuvable</span></h1>
            <div class="hidden">
                <a href="#nav">Aller à la navigation</a>
            </div>
        </header>
        <section class="c-404">
            <h2>Il n'y a rien ici</h2>
            <p>La page que vous cherchez n'existe pas ou plus.</p>
            <div class="c-cta">
                <a href="http://www.mullercedric.com" class="c-cta__link">Retourner à l'accueil</a>
            </div>
        </section>
    </div>
</main><?php
get_template_part( 'inc/part', 'nav' );
get_footer(); ?>

</body>
</html>
