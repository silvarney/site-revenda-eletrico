document.addEventListener("DOMContentLoaded", function(){

    const form = document.querySelector("#filtro-veiculos");

    form.addEventListener("submit", function(e){

        e.preventDefault();

        const formData = new FormData(form);
        formData.append("action", "filtrar_veiculos");

        fetch(ajax_object.ajaxurl, {
            method: "POST",
            body: formData
        })
        .then(res => res.text())
        .then(html => {

            document.querySelector("#resultado-veiculos").innerHTML = html;

        });

    });

});