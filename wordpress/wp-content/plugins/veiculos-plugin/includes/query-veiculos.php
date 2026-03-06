<?php

/* 
Esse hook altera a query antes do WordPress buscar os posts, 
permitindo filtrar os veículos com base nos parâmetros de 
preço e autonomia passados via GET.
*/
add_action('pre_get_posts', 'query_filtrar_veiculos');

function query_filtrar_veiculos($query)
{
    if (
        !is_admin() &&
        $query->is_main_query() &&
        is_post_type_archive('veiculo')
    ) {
        $meta_query = [];

        if (!empty($_GET['preco_max'])) {
            $meta_query[] = [
                'key' => 'preco',
                'value' => $_GET['preco_max'],
                'compare' => '<=',
                'type' => 'NUMERIC'
            ];
        }

        if (!empty($_GET['autonomia_min'])) {
            $meta_query[] = [
                'key' => 'autonomia',
                'value' => $_GET['autonomia_min'],
                'compare' => '>=',
                'type' => 'NUMERIC'
            ];
        }

        if($meta_query){
            $query->set('meta_query', $meta_query);
        }
    }
}