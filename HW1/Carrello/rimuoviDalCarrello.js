function onJson(json){
    console.log(json);
    window.location.reload();
}


function onResponse(response){
    return response.json();
}

function RimuoviDalCarrello(event){
    console.log("Cliccato rimuovi");
    //IMPLEMENTARE LA FUNZIONE IN PHP E JS
    let idProdotto = event.currentTarget.dataset.id;
    console.log(idProdotto)
    let formData= new FormData();

    formData.append("idProdotto", idProdotto);

    fetch("../Carrello/rimuoviDalCarrello.php",
        {method: "POST", body: formData}
    ).then(onResponse).then(onJson);
}
