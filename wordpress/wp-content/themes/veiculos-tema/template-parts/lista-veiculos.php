<?php

$args = [
    "post_type" => "veiculo",
    "posts_per_page" => 12,
];

$query = new WP_Query($args);

if ( $query->have_posts() ) :

    while ( $query->have_posts() ) :
        $query->the_post();
        get_template_part('template-parts/veiculo-card');
    endwhile;

else :

    echo '<p>Nenhum veículo encontrado.</p>';

endif;

wp_reset_postdata();