<?php 

function veiculos_filtrar_ajax() 
{
    $marca = isset($_POST['marca']) ? sanitize_text_field($_POST['marca']) : '';
    $preco_max = isset($_POST['preco_max']) ? intval($_POST['preco_max']) : '';
    $preco_min = isset($_POST['preco_min']) ? intval($_POST['preco_min']) : '';
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

    $args = array(
        'post_type' => 'veiculo',
        'posts_per_page' => 12,
        'paged' => $paged,
    );

    if ($marca) {
        $args['tax_query'] = [
            [    
            'taxonomy' => 'marca',
            'field' => 'slug',
            'terms' => $marca,
            ],
        ];
    }

    $meta_query = [];

    if ($preco_min) {
        $meta_query[] = [
            'key'     => 'preco',
            'value'   => $preco_min,
            'compare' => '>=',
            'type'    => 'NUMERIC',
        ];
    }

    if ($preco_max) {
        $meta_query[] = [
            'key'     => 'preco',
            'value'   => $preco_max,
            'compare' => '<=',
            'type'    => 'NUMERIC',
        ];
    }

    if (!empty($meta_query) ) {
        if (count( $meta_query) > 1 ) {
            $meta_query['relation'] = 'AND';
        }
        $args['meta_query'] = $meta_query;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {

        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/veiculo-card');
        }

        if ($query->max_num_pages > $paged) {
            echo '<div class="pagination">';
            for ($i = 1; $i <= $query->max_num_pages; $i++) :
                echo '<button class="pagination-button" data-page="' . $i . '">' . $i . '</button>';
            endfor;
            echo '</div>';
        }

    } else {

        echo '<p>Nenhum veículo encontrado.</p>';

    }

    wp_reset_postdata();

    wp_die();

}

add_action('wp_ajax_filtrar_veiculos', 'veiculos_filtrar_ajax');
add_action('wp_ajax_nopriv_filtrar_veiculos', 'veiculos_filtrar_ajax');