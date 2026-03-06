<?php
/* Template Name: Estoque */

get_header();
?>

<div class="container">

    <h1>Estoque de Veículos</h1>

    <form id="filtro-veiculos">
        <select name="marca">
            <option value="">Todas as marcas</option>

            <?php
            $marcas = get_terms([
                'taxonomy' => 'marca',
                'hide_empty' => true,
                ]);

            foreach ($marcas as $marca) {
                echo '<option value="' . $marca->slug . '">' . $marca->name . '</option>';
            }
            ?>
        </select>

        <button type="submit">Filtrar</button>

    </form>

    <div id="resultado-veiculos" class="grid grid-cols-3 lg:grid-cols-4 gap-6 mt-6 p-4">
        <?php get_template_part('template-parts/lista-veiculos'); ?>
    </div>

</div>

<?php get_footer(); ?>