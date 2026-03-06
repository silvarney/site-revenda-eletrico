<?php get_header(); ?>

<h1 class="text-3xl mb-6">
<?php single_term_title(); ?>
</h1>

<?php if (have_posts()) : ?>

<div class="grid grid-cols-3 gap-6 px-10">

<?php while (have_posts()) : the_post(); ?>

<?php get_template_part('template-parts/veiculo','card'); ?>

<?php endwhile; ?>

</div>

<?php endif; ?>

<?php get_footer(); ?>