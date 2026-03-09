<?php 

function veiculos_filtrar_ajax() 
{
    $marca = isset($_POST['marca']) ? sanitize_text_field($_POST['marca']) : '';
    $preco_max = isset($_POST['preco_max']) ? intval($_POST['preco_max']) : '';
    $preco_min = isset($_POST['preco_min']) ? intval($_POST['preco_min']) : '';

    $args = array(
        'post_type' => 'veiculo',
        'posts_per_page' => -1,
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

    if ($preco_min || $preco_max) {
        $args['meta_query'] = [
            'relation' => 'AND',
            [    
            'key' => 'preco',
            'value' => $preco_min,
            'compare' => '>=',
            'type' => 'NUMERIC',
            ],
            [    
            'key' => 'preco',
            'value' => $preco_max,
            'compare' => '<=',
            'type' => 'NUMERIC',
            ],
        ];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :

        while ($query->have_posts()) :
            $query->the_post();
            get_template_part('template-parts/veiculo-card');
        endwhile;

    else :

        echo '<p>Nenhum veículo encontrado.</p>';

    endif;

    wp_reset_postdata();

    wp_die();

}

add_action('wp_ajax_filtrar_veiculos', 'veiculos_filtrar_ajax');
add_action('wp_ajax_nopriv_filtrar_veiculos', 'veiculos_filtrar_ajax');