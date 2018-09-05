<?php /*
  * Archive page
  * Displays all the projects
  */ ?>
<!DOCTYPE html>
<html lang="fr">
<?php get_header(); ?>
<body>
<main id="content" class="o-layout">
    <div class="o-layout__wrapper c-blueRect">
    <header>
        <h1 class="c-blueRect__title">
            <span class="c-changedTitle c-changedTitle--projects c-blueRect__title c-highlight"></span>
            <span class="hidden">Travaux et projets de Cédric Müller</span>
        </h1>
        <div class="hidden">
            <a href="#nav">Aller à la navigation</a>
        </div>
    </header>
    <div class="c-archProject__container"><?php
	$projects = new WP_Query( [ 'post_type' => 'project' ] );
	if ( $projects->have_posts() ): while ( $projects->have_posts() ): $projects->the_post();
		$content = get_field( 'basic_info' );
		?><div class="c-archProject__wrapper"><article class="c-archProject">
            <div class="c-archProject__thumbnail">
                <?php if($content['thumb']['ID']) echo wp_get_attachment_image( $content['thumb']['ID'], 'cm-projectThumb' ); ?>
            </div>
            <h2 class="c-archProject__title"><?php the_title(); ?></h2>
            <div class="c-archProject__content">
				<?= $content['desc'] ?>
            </div>
            <div class="c-archProject__cta">
                <a href="<?php the_permalink(); ?>" title="Voir le projet <?= get_the_title(); ?>"
                   class="c-archProject__permalink c-cta__link">Voir le projet</a>
            </div>
        </article></div><?php
    endwhile; endif; ?></div></div>
</main><?php
get_template_part( 'inc/part', 'nav' );
get_footer(); ?>

</body>
</html>
