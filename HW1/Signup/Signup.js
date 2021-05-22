function onJson(json){
    console.log(json)

    if(json==-1){
        let triangle= document.getElementById("err_usr");
        console.log(triangle)
        triangle.classList.remove("hide");
    }
    else if(json==1)
        window.location.href="../Templates/Conferma.php";
    else
        console.log("Errore nel json")
}

function onResponse(response){  
    return response.json();
}

function signup(event){
    event.preventDefault();

    let form= document.getElementById("signup_form");

    let nome= form.nome.value;
    let cognome=form.cognome.value;
    let indirizzo=form.indirizzo.value;
    let cellulare=form.cellulare.value;
    let username=form.username.value;
    let password= form.password.value;
    let confpsw = form.conferma.value;

    //CONTROLLI SULLA PASSWORD:
    //imposto una variabile in cui inserire l'eventuale messaggio di errore:

    let msgContainer = document.createElement('div');

    if(password !== confpsw){
        msgContainer.textContent="Le due password inserite devono essere uguali!";
        let spazioNascosto = document.getElementById("secret");
        spazioNascosto.innerHTML="";
        spazioNascosto.appendChild(msgContainer);
        let triangle = document.getElementById("err_psw");
        triangle.classList.remove("hide");
    }
    else if(password.length < 8){
        msgContainer.textContent="La password deve contenere almeno 8 caratteri!";
        let spazioNascosto = document.getElementById("secret");
        spazioNascosto.innerHTML="";
        spazioNascosto.appendChild(msgContainer);
        let triangle = document.getElementById("err_psw");
        triangle.classList.remove("hide");
    }
    //controllo caratteri speciali: ! ? $ % ^ & # _ @    
    else if(password.indexOf("!") == -1 && password.indexOf("?") == -1 
    && password.indexOf("$") == -1 && password.indexOf("^") == -1 
    && password.indexOf("%") == -1 && password.indexOf("@") == -1 
    && password.indexOf("&") == -1 ){
        console.log("inserire carattere speciale");
        msgContainer.textContent = "Inserire un carattere speciale (Es:! ? $ % ^ & # _ @)";
        let spazioNascosto = document.getElementById("secret");
        spazioNascosto.innerHTML="";
        spazioNascosto.appendChild(msgContainer);
        let triangle = document.getElementById("err_psw");
        triangle.classList.remove("hide");
    }
    else{//se tutte le specifiche sono state rispettate:
        let formData= new FormData();
    
        formData.append("nome", nome);
        formData.append("cognome", cognome);
        formData.append("indirizzo", indirizzo);
        formData.append("cellulare", cellulare);
        formData.append("username", username);
        formData.append("password", password);
        url="../Templates/Registrazione.php";
    
        fetch(url, {
            method:"POST",
            body: formData
        }).then(onResponse).then(onJson);
    }   
}

const form = document.getElementById("signup_form");
form.addEventListener("submit", signup);