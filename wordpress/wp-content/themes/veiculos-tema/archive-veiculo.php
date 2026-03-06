<?php get_header(); ?>

<div class="container mx-auto p-10"></div>

<h1 class="text-3xl font-bold mb-8">
    Veículos elétricos
</h1>

<form class="mb-8 flex gap-4" method="get">

<input type="text" name="preco_max" placeholder="Preço máximo" class="border p-2">

<input type="text" name="autonomia_min" placeholder="Autonomia mínima" class="border p-2">

<button class="bg-blue-500 text-white px-4 py-2 rounded">
    Filtrar
</button>

</form>
<div class="grid grid-cols-3 gap-6 px-10">

<?php if (have_posts()) : ?>

<?php while ( have_posts() ) : the_post(); ?>
    
<?php get_template_part('template-parts/veiculo-card'); ?>

<?php endwhile; ?>

<?php else : ?>
    <p class="text-red-500">Nenhum veículo encontrado.</p>
<?php endif; ?>

</div>

</div>

<?php get_footer(); ?>