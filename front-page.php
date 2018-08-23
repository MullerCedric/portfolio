<?php /*
  * Home/classic page
  * Displays only the title and links
  */ ?>
<!DOCTYPE html>
<html lang="fr">
<?php get_header(); ?>
<body>
<main id="content" class="o-vCenteredContent c-dottedBlue">
    <header>
        <h1 class="c-frontTitle">
            <span class="hidden">Portfolio de </span><div class="c-frontTitle__name">Cédric</div><br><div class="c-frontTitle__name">Müller</div>
        </h1>
        <div class="hidden">
            <a href="#nav">Aller à la navigation</a>
        </div>
    </header>
    <ul>
        <li class="c-cta">
            <a href="./projets/" class="c-cta__link" title="Voir l'ensemble de mes projets">Mes projets</a>
        </li>
        <li class="c-cta">
            <a href="./contact/" class="c-cta__link" title="Accéder au formulaire de contact">Me contacter</a>
        </li>
    </ul>
	<?php get_template_part( 'inc/part', 'socials' ); ?>
</main><?php
get_template_part( 'inc/part', 'nav' );
get_footer(); ?>

</body>
</html>
