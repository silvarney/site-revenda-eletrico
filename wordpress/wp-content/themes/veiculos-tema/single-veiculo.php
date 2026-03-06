<?php get_header(); ?>

<div class="container mx-auto p-10">

<?php while ( have_posts() ) : the_post(); ?>

<h1 class="text-4xl font-bold mb-6">
<?php the_title(); ?>
</h1>

<?php the_post_thumbnail('large'); ?>

<div class="mt-6">
<?php the_content(); ?>
</div>

<?php 
$preco = get_post_meta(get_the_ID(), 'preco', true);
$autonomia = get_post_meta(get_the_ID(), 'autonomia', true);
?>

<div class="mt-6">
    <p><strong>Preço:</strong> R$ <?= esc_html($preco); ?></p>
    <p><strong>Autonomia:</strong> <?= esc_html($autonomia); ?> km</p>
</div>

<?php endwhile; ?>

</div>

<?php get_footer(); ?>