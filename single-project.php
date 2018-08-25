<?php /*
  * Single project page
  * Displays the details of a single project
  */ ?>
<!DOCTYPE html>
<html lang="fr">
<?php get_header(); ?>
<body>
<main id="content" class="o-layout">
    <div class="o-layout__wrapper c-project"><?php
	if ( have_posts() ): while ( have_posts() ): the_post();
		$intro = get_field( 'basic_info' ); ?>
        <header class="c-project__info">
            <h1 class="c-project__title"><span class="c-highlight"><?= get_the_title(); ?></span></h1>
            <div class="hidden">
                <a href="#nav">Aller à la navigation</a>
            </div>
            <div class="c-project__thumbnail"><?php if($intro['thumb']['ID']) echo wp_get_attachment_image( $intro['thumb']['ID'], 'thumbnail' ); ?></div>
            <div class="c-project__desc"><?= $intro['desc']; ?></div>
        </header>
        <?php if ( have_rows('sections') ): while ( have_rows('sections') ): the_row(); ?>
            <section>
                <h2><?= get_sub_field('title'); ?></h2>
	            <?php if ( have_rows('content') ): while ( have_rows('content') ): the_row();
	                include 'inc/_' . get_row_layout() . '.php';
	            endwhile; endif; ?>
            </section>
		<?php endwhile; endif; ?>
	<?php endwhile; endif; ?></div>
</main><?php
get_template_part( 'inc/part', 'nav' );
get_footer(); ?>

</body>
</html>
