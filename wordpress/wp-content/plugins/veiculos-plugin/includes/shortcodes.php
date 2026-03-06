<?php
// Shortcode para listar veículos
add_shortcode('lista_veiculos', function($atts){
    $atts = shortcode_atts(['posts' => 5], $atts, 'lista_veiculos');
    $query = new WP_Query(['post_type'=>'veiculo','posts_per_page'=>$atts['posts']]);
    $output = '<ul>';
    while($query->have_posts()){
        $query->the_post();
        $output .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
    }
    wp_reset_postdata();
    $output .= '</ul>';
    return $output;
});

add_shortcode('veiculos', 'shortcode_veiculos');

function shortcode_veiculos($atts) {
    $atts = shortcode_atts([
        'limite'=> 6,
        'marca'=> '',
        'preco_max'=> '',
        'autonomia_min'=> '',
    ], $atts, 'veiculos');

    $args = [
        'post_type' => 'veiculo',
        'posts_per_page' => intval($atts['limite']),
    ];

    $meta_query = [];

    if (!empty($atts['preco_max'])) {
        $meta_query[] = [
            'key' => 'preco',
            'value' => intval($atts['preco_max']),
            'compare' => '<=',
            'type' => 'NUMERIC'
        ];
    }

    if (!empty($atts['autonomia_min'])) {
        $meta_query[] = [
            'key' => 'autonomia',
            'value' => intval($atts['autonomia_min']),
            'compare' => '>=',
            'type' => 'NUMERIC'
        ];
    }

    if ($meta_query) {
        $args['meta_query'] = $meta_query;
    }

    if (!empty($atts['marca'])) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'marca',
                'field' => 'slug',
                'terms' => sanitize_title($atts['marca'])
            ]
        ];
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) : ?>
        <div class="grid grid-cols-3 gap-6">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php get_template_part('template-parts/veiculo', 'card'); ?>
            <?php endwhile; ?>
        </div>

    <?php else : ?>
        <p>Nenhum veículo encontrado.</p>
    <?php endif;

    wp_reset_postdata();

    return ob_get_clean();
}