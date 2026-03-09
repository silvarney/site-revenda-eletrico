<?php

add_action('init', function() {
    // Executa quando o WP inicializa
});

function vp_get_dados_filtros() {
    $marcas = get_terms([
                'taxonomy' => 'marca',
                'hide_empty' => true,
                ]);

    $ids_max = get_posts([
        'post_type'      => 'veiculo',
        'posts_per_page' => 1,
        'meta_key'       => 'preco',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
        'fields'         => 'ids',
        'post_status'    => 'publish',
    ]);

    $max = ! empty($ids_max) ? floatval( get_post_meta( $ids_max[0], 'preco', true ) ) : 0;

    $ids_min = get_posts([
        'post_type'      => 'veiculo',
        'posts_per_page' => 1,
        'meta_key'       => 'preco',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
        'fields'         => 'ids',
        'post_status'    => 'publish',
    ]);

    $min = ! empty($ids_min) ? floatval( get_post_meta( $ids_min[0], 'preco', true ) ) : 0;

    return [
        'marcas' => $marcas,
        'preco_min' => $min,
        'preco_max' => $max,
    ];
}