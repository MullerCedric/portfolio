<?php /*
  * Single project page
  * Displays the details of a single project
  */ ?>
<!DOCTYPE html>
<html lang="fr">
<?php get_header(); ?>
<body>
<header>
    <h1>
		<?= get_the_title(); ?>
    </h1>
</header>
<main id="content"><?php
	if ( have_posts() ): while ( have_posts() ): the_post();
		$intro = get_field( 'basic_info' ); ?>
        <header>
            <div>
				<?php if ( $intro['thumb']['url'] ) {
					echo '<img src="' . $intro['thumb']['url'] . '" alt ="Miniature du projet ' . get_the_title() . '">"';
				} ?>
            </div>
            <div>
				<?= $intro['desc']; ?>
            </div>
        </header>
        <?php if ( have_rows('sections') ): while ( have_rows('sections') ): the_row(); ?>
            <section>
                <h2><?= get_sub_field('title'); ?></h2>
	            <?php if ( have_rows('content') ): while ( have_rows('content') ): the_row();
	                include 'inc/_' . get_row_layout() . '.php';
	            endwhile; endif; ?>
            </section>
		<?php endwhile; endif; ?>
	<?php endwhile; endif; ?>
</main><?php
get_template_part( 'inc/part', 'nav' );
get_footer(); ?>

</body>
</html>
