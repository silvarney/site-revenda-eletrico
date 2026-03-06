<?php

$preco = get_post_meta(get_the_ID(), 'preco', true);
$autonomia = get_post_meta(get_the_ID(), 'autonomia', true);
$marcas = get_the_terms(get_the_ID(), 'marca');
?>

<div class="border rounded-lg p-4 shadow">

<div class="flex justify-center items-center h-56">
<?php the_post_thumbnail('medium'); ?>
</div>

<h2 class="text-xl font-bold mt-2">
<?php the_title(); ?>
</h2>

<?php 

if ($marcas && !is_wp_error($marcas)) {
    echo '<p class="text-sm text-gray-500">';
    echo implode(', ', wp_list_pluck($marcas, 'name'));
    echo '</p>';
}

?>

<p class="text-green-600 font-semibold">
    R$ <?= esc_html($preco); ?>
</p>

<p class="text-gray-700">
    Autonomia: <?= esc_html($autonomia); ?> km
</p>

<a href="<?php the_permalink(); ?>" class="text-blue-500 hover:underline">
    Ver detalhes
</a>
</div>