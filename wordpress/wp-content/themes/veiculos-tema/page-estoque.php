<?php
/* Template Name: Estoque */

get_header();
$dados = vp_get_dados_filtros();
?>

<div class="container">

    <h1 class="text-2xl p-2">Estoque de Veículos</h1>

    <form id="filtro-veiculos">
        <div class="flex flex-col md:flex-row justify-start gap-3 p-4 border-gray-700 border-2 rounded-lg">
        <select name="marca" id="marca" class="border border-gray-300 rounded px-3 py-2">
            <option value="">Todas as marcas</option>

            <?php
            foreach ($dados['marcas'] as $marca) {
                echo '<option value="' . $marca->slug . '">' . $marca->name . '</option>';
            }
            ?>
        </select>

        <div class="container flex flex-col gap-2">
            <label for="">Preço mínimo</label>
            <input type="text" value="" name="preco_min" class="slider" id="preco_min" placeholder="<?php echo $dados['preco_min']; ?>">
        </div>

        <div class="container flex flex-col gap-2">
            <label for="">Preço máximo</label>
            <input type="text" value="" name="preco_max" class="slider" id="preco_max" placeholder="<?php echo $dados['preco_max']; ?>">
        </div>

        <button type="submit" class="border-2 border-gray-900 p-2 rounded-lg">Filtrar</button>
        </div>

    </form>
    
    <div id="resultado-veiculos" class="grid grid-cols-3 lg:grid-cols-4 gap-6 mt-6 p-4">
        <?php get_template_part('template-parts/lista-veiculos'); ?>
    </div>

</div>

<?php get_footer(); ?>