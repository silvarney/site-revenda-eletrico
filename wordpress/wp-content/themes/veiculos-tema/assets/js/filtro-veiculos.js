document.addEventListener("DOMContentLoaded", function(){
    const form = document.querySelector("#filtro-veiculos");
    const resultado = document.querySelector("#resultado-veiculos");

    function carregarVeiculos(pagina = 1) {
                
        const formData = new FormData(form);
        formData.append("action", "filtrar_veiculos");
        formData.append("paged", pagina);

        fetch(ajax_object.ajaxurl, {
            method: "POST",
            body: formData
        })
        .then(res => res.text())
        .then(html => {

            resultado.innerHTML = html;     

        });
    }

    form.addEventListener("submit", function(e){

        e.preventDefault();

        carregarVeiculos();

    });

    resultado.addEventListener("click", function(e){

        const link = e.target.closet(".pagination a");

        if(!link) return;
         
        e.preventDefault();
        
        const url = new URL(e.target.href);
        const pagina = url.searchParams.get("paged") || 1;
                    
        carregarVeiculos(pagina);
        

    });

});