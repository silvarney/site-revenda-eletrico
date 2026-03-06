<?php get_header(); ?>
<h1>Bem-vindo à Revenda de Veículos Elétricos</h1>
<p class="bg-red-500 text-white p-4">Use o shortcode [lista_veiculos] para exibir veículos.</p>
<?php echo do_shortcode('[lista_veiculos posts="5"]'); ?>
<?php get_footer(); ?>