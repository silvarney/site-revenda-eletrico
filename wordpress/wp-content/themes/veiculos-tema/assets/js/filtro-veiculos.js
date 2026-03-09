document.addEventListener("DOMContentLoaded", function(){

    const form = document.querySelector("#filtro-veiculos");

    form.addEventListener("submit", function(e){

        e.preventDefault();

        const formData = new FormData(form);

        fetch(ajax_object.ajaxurl, {
            method: "POST",
            body: new URLSearchParams({
                action: "filtrar_veiculos",
                marca: formData.get("marca"),
                preco_min: formData.get("preco_min"),
                preco_max: formData.get("preco_max")
            })
        })
        .then(res => res.text())
        .then(html => {

            document.querySelector("#resultado-veiculos").innerHTML = html;

        });

    });

});