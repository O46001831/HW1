//FUNZIONI PER MOSTRARE O NASCONDERE LA DESCRIZIONE DEI PRODOTTI TRAMITE MODAL BOX:
function modalBoxClose(event){
    let modalMsg = document.getElementById("modalConferma");
    modalMsg.classList.add("hideConferma");
    let modalBox = document.getElementById("modalBox");
    modalBox.classList.add("hide");
    document.documentElement.style.overflowY="";
    let containerCommenti = document.getElementById("recensioni");
    containerCommenti.innerHTML='';
}
let idProdotto=0;
function mostraProdotto(event){
    idProdotto=null;
    idProdotto = event.currentTarget.parentNode.childNodes[4].dataset.id;
    document.documentElement.style.overflow="hidden";
    mostraP(idProdotto);
}
function mostraP(idProdotto){    
    
    let formDataModal= new FormData();
    formDataModal.append("idProdotto", idProdotto);
    console.log(idProdotto)
    //INSERIRE ISTRUZIONI PER LA CREAZIONE DELLA FINESTRA MODALE:
    let modalBox = document.getElementById("modalBox");
    modalBox.classList.remove("hide");
    let modalMsg = document.getElementById("modalConferma");
    modalMsg.classList.add("hideConferma");

    function onJsonModal(json){//riempio la finestra modale:
        let modalImg = document.getElementById("modalImg");
        let modalTitle = document.getElementById("modalTitle");
        let modalPrezzo = document.getElementById("modalPrezzo");
        let modalDescrizione = document.getElementById("modalDescrizione");
        let modalAcquista = document.getElementById("modalAcquista");
        let chiudiModale = document.createElement("button");
        chiudiModale.textContent="Chiudi prodotto";
        chiudiModale.addEventListener("click", modalBoxClose);

        let button=document.createElement("button");
        button.textContent="Aggiungi al carrello";
        button.id="bottoneID";
        button.dataset.id=json[0].id;
        button.addEventListener("click", aggiungiAlCarrello);

        modalTitle.textContent=json[0].titolo;
        modalPrezzo.textContent="€ " + json[0].prezzo;
        modalDescrizione.textContent=json[0].descrizione;
        modalImg.src=json[0].immagine;
        modalAcquista.innerHTML="";
        modalAcquista.appendChild(button);
        modalAcquista.appendChild(chiudiModale);    

        
    }
    fetch("../Homepage/finestraModale.php",
        {method: "POST", body: formDataModal}
    ).then(onResponse).then(onJsonModal);

    //ESEGUO TUTTE LE ALTRE FUNZIONI RELATIVE ALLA FINESTRA MODALE:
    //funzione per aggiungere un commento:
    
    function onResponse(response){
        return response.json();
    }
    function aggiungiCommento(event){
        let formDataAdd= new FormData();
        formDataAdd.idProd=0;
        let idProd = document.getElementById("bottoneID").dataset.id;
        let commento = document.getElementById("addComment").value;        
        formDataAdd.append("commento", commento);
        formDataAdd.append("idProdotto", idProd);

        fetch("../Homepage/aggiungiCommento.php", 
            {method:"POST", body: formDataAdd}
        ).then(onResponse).then(onJsonAddComment);
    }
    let bottoneRecensione = document.getElementById("inviaRecensione");
    bottoneRecensione.addEventListener("click", aggiungiCommento);

    //funzione per mostrare i commenti:
    function onJson(json){
        if(json == -1){
            let recensioni = document.getElementById("recensioni");
            recensioni.textContent="Non sono ancora presenti recensioni. Scrivi tu la prima recensione!";
        }
        else{
            for(let i = 0; i<json.length; i++){
                let boxContainer = document.createElement("div");
                let boxNome = document.createElement("strong");
                let boxCommento = document.createElement("h4");
                let containerCommenti = document.getElementById("recensioni");

                boxContainer.id="boxContainerCommento";

                boxNome.textContent = json[i].nome_utente;
                boxCommento.textContent = json[i].commento;

                boxContainer.appendChild(boxNome);
                boxContainer.appendChild(boxCommento);
                containerCommenti.appendChild(boxContainer);

            }
        }
    }
    
    function onAggiungiCarrello(json){
        console.log(json);
    }

    fetch("../Homepage/mostraRecensioni.php",
        {method:"POST", body:formDataModal}
    ).then(onResponse).then(onJson);

}

function onJsonAddComment(json){
    console.log(json);
    if(json[0]>-1){
        //aggiorno la pagina
        window.location.reload()
    }
    else if(json[0] == -1){
        console.log("Impossibile aggiungere il commento");
    }
}


