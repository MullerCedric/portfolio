<?php /*
  * Home/classic page
  * Displays only the title and links
  */ ?>
<!DOCTYPE html>
<html lang="fr">
<?php get_header(); ?>
<body>
<header>
    <h1>
        <span class="hidden">Portfolio de </span>Cédric Müller
    </h1>
    <div class="hidden">
        <a href="#nav">Aller à la navigation</a>
    </div>
</header>
<main id="content">
    <ul>
        <li>
            Mes projets
        </li>
        <li>
            Me contacter
        </li>
    </ul>
	<?php get_template_part( 'inc/part', 'socials' ); ?>
</main><?php
get_template_part( 'inc/part', 'nav' );
get_footer(); ?>

</body>
</html>
