
//FUNZIONE DI RICERCA:
function ricerca(event){

    const listaProdotti = document.getElementById("list")
    const ricerca = document.getElementById("ricerca");

    //Prendiamo la sottostringa che vogliamo cercare nel titolo dei prodotti
    let testoRicerca=ricerca.value;                     

    for(let i=0; i<listaProdotti.childNodes.length; i++){
        //A turno controlliamo tutti i prodotti presenti nella lista
        let prodottoLista=listaProdotti.childNodes[i];  

        //Prendiamo il titolo del prodotto
        let titoloProdotto=prodottoLista.childNodes[0].textContent;  
        
        //Trasformiamo entrame le stringhe in minuscolo in maniera tale da non essere Case Sensitive
        titoloProdotto= titoloProdotto.toLowerCase();
        testoRicerca= testoRicerca.toLowerCase();

        //Ritorna la posizione della sottostringa cercata nel titolo (Se non è presente ritorna -1)
        let result=titoloProdotto.indexOf(testoRicerca);        

        //infine eseguo il controllo che mi determina se tenere o far scomparire il blocco in questione.
        if(result===-1){
            prodottoLista.classList.remove("box");
            prodottoLista.classList.add("hide");
        }
        else{
            prodottoLista.classList.add("box");
            prodottoLista.classList.remove("hide");
        }
    }
}