<?php /*
  * Basic page
  * Basic template used for the wordpress user pages such as the About page
  */ ?>
<!DOCTYPE html>
<html lang="fr">
<?php get_header(); ?>
<body>
<main id="content" class="o-layout">
    <div class="o-layout__wrapper">
    <header>
        <h1><span class="c-highlight"><?= get_the_title(); ?></span></h1>
        <div class="hidden">
            <a href="#nav">Aller à la navigation</a>
        </div>
    </header><?php
	if ( have_posts() ): while ( have_posts() ): the_post();
        if ( have_rows( 'sections' ) ): while ( have_rows( 'sections' ) ): the_row(); ?>
            <section>
                <h2><?= get_sub_field( 'title' ); ?></h2>
                <?= get_sub_field('text'); ?>
            </section><?php
        endwhile; endif;
        if ( have_rows( 'cta' ) ): echo '<div>'; while ( have_rows( 'cta' ) ): the_row(); ?>
            <div class="c-cta">
                <a href="<?= get_sub_field('url'); ?>" class="c-cta__link"><?= get_sub_field('label'); ?></a>
            </div><?php
		endwhile; echo '</div>'; endif;
    endwhile; endif;?></div>
</main><?php
get_template_part( 'inc/part', 'nav' );
get_footer(); ?>

</body>
</html>
