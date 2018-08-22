<?php /*
  * Archive page
  * Displays all the projects
  */ ?>
<!DOCTYPE html>
<html lang="fr">
<?php get_header(); ?>
<body>
<main id="content">
    <header>
        <h1>
			<?= get_bloginfo('name'); ?>
        </h1>
        <div class="hidden">
            <a href="#nav">Aller à la navigation</a>
        </div>
    </header><?php
	$projects = new WP_Query(['post_type' => 'project']);
	if($projects->have_posts()): while($projects->have_posts()): $projects->the_post();
	$content = get_field('basic_info'); ?>
        <article class="c-archProject">
            <div class="c-archProject__thumbnail">
                <?php if($content['thumb']['url']) echo '<img src="' . $content['thumb']['url'] . '" alt ="Miniature du projet ' . get_the_title() . '">"'; ?>
            </div>
            <h2 class="c-archProject__title"><?php the_title(); ?></h2>
            <div class="c-archProject__content">
                <?= $content['desc'] ?>
            </div>
            <div>
                <a href="<?php the_permalink(); ?>" title="Voir le projet <?= get_the_title(); ?>" class="c-archProject__permalink">Voir le projet</a>
            </div>
        </article>
	<?php endwhile; endif; ?>
</main><?php
get_template_part( 'inc/part', 'nav' );
get_footer(); ?>

</body>
</html>
