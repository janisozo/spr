<?php

get_header();

// echo("Hello world!"); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<h2><a href="<?php // the_permalink() ?>"><?php // the_title(); ?></a></h2>
<?php // the_content(); ?>

<?php endwhile; endif; ?>

<?php get_template_part('store-front'); ?>

<p align="center"><?php posts_nav_link(); ?></p>

<?php get_footer(); ?>