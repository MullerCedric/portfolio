<?php /*
  * Basic page
  * Basic template used for the wordpress user pages such as the About page
  */ ?>
<!DOCTYPE html>
<html lang="fr">
<?php get_header(); ?>
<body>
<main id="content">
    <header>
        <h1>
			<?php the_title(); ?>
        </h1>
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
        endwhile; endif; ?>
        <div><?php if ( have_rows( 'cta' ) ): while ( have_rows( 'cta' ) ): the_row(); ?>
            <a href="<?= get_sub_field('url'); ?>"><?= get_sub_field('label'); ?></a><?php
		endwhile; endif; ?>
        </div><?php
    endwhile; endif;?>
</main><?php
get_template_part( 'inc/part', 'nav' );
get_footer(); ?>

</body>
</html>
