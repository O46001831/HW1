//FUNZIONI PER GESTIRE IL CARRELLO:
//creo una variabile che tiene conto di quanti elementi ho nel carrello:
function onAggiungiCarrello(json){
    let modalMsg = document.getElementById("modalConferma");
    console.log(json);
    let modalBox = document.getElementById("modalBox");    
    if (modalBox.classList !== "Hide" && json>0){        
        modalMsg.classList.remove("hideConferma");
    }
}

function aggiungiAlCarrello(event){     
    let modalBox = document.getElementById("modalBox");
    if(modalBox.classList == "hide"){
        let hideDiv = event.currentTarget.parentNode.childNodes[5];
    hideDiv.classList.remove("hideConferma");
    }    
    let id=0;
    id= event.currentTarget.dataset.id;
    console.log(id)

    let formData= new FormData();

    formData.append("prodotto", id);

    fetch("../Homepage/aggiungiCarrello.php", {
        method:"POST",
        body: formData
    }).then(onResponse).then(onAggiungiCarrello); 
}


/* ALTRO */
/*CARICAMENTO ELEMENTI*/
function onJson(json){
    console.log(json);
    let contenuti = json;

    //AGGIUNTA DI N DIV CHE CONTERRANNO I PRODOTTI:
    for(let i=0; i<contenuti.length; i++){
        let contenitore=document.createElement("div");
        let titolo=document.createElement("h1");
        let img=document.createElement("img");
        let Prezzo=document.createElement("strong");
        let mostra=document.createElement("h2");    
        let button=document.createElement("button");
        let hideDiv=document.createElement("h3");

        contenitore.classList.add("box");
        mostra.classList.add("mostra");
        button.classList.add("aggiungiCarrello");
        hideDiv.classList.add("hideConferma");

        titolo.textContent=contenuti[i].titolo;
        img.src=contenuti[i].immagine;
        Prezzo.textContent="€" + contenuti[i].prezzo;
        mostra.textContent="Mostra prodotto";
        button.textContent="Aggiungi al carrello";
        hideDiv.textContent="Prodotto aggiunto al carrello!";

        button.dataset.id=contenuti[i].id;
        button.addEventListener("click", aggiungiAlCarrello);
        mostra.addEventListener("click", mostraProdotto);

        contenitore.appendChild(titolo);
        contenitore.appendChild(img);
        contenitore.appendChild(Prezzo); 
        contenitore.appendChild(mostra);
        contenitore.appendChild(button);  
        contenitore.appendChild(hideDiv); 
       
        list.appendChild(contenitore);
    }
}

function onResponse(response){
    return response.json();
}

//richiesta dati:
fetch("../Homepage/contents.php").then(onResponse).then(onJson);


