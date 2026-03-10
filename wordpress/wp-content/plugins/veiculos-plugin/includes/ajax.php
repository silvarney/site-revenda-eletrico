<?php 

function veiculos_filtrar_ajax() 
{
    $marca = isset($_POST['marca']) ? sanitize_text_field($_POST['marca']) : '';
    $preco_max = isset($_POST['preco_max']) ? intval($_POST['preco_max']) : '';
    $preco_min = isset($_POST['preco_min']) ? intval($_POST['preco_min']) : '';
    $paged = isset($_REQUEST['paged']) ? intval($_REQUEST['paged']) : 1;
    
    $args = array(
        'post_type' => 'veiculo',
        'posts_per_page' => 4,
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
        if ($query->max_num_pages > 1) {
            echo '<div class="pagination">';
            echo paginate_links([
                'base'      => home_url('/estoque/') . '%_%',
                'format'    => '?paged=%#%',
                'total'     => $query->max_num_pages,
                'current'   => max(1, $paged),
                'mid_size'  => 2,
                'prev_text' => '«',
                'next_text' => '»',
                'type'      => 'list',
            ]);
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