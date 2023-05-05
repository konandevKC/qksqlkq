const form = document.querySelector("#form");
const user = document.querySelector("#name");
const email = document.querySelector("#email");
const nume = document.querySelector("#numr");
var forme = document.getElementById("form");

//evenements

    form.addEventListener('submit',e=>{
     e.preventDefault();


     form_verify();
})

//fonctions
function form_verify() {
    const nameValue = user.value.trim();
    const emailValue = email.value.trim();
    const numeValue = numr.value.trim();

    //user verify
    if (nameValue === "") {
        let message ="Le non ne peut pas etre vide";
        setError(user,message);
    }else if (!nameValue.match(/^[a-zA-Z]/)) {
        let message ="Commencer par une lettre";
        setError(user,message)
    }else{
        let letterNom = nameValue.length;
        if(letterNom < 3){
            let message ="Au moins 3 caratères";
        setError(user,message)
        }else {
            setSucces(user);
        }
    }
    if (emailValue === "") {
        let message ="L'email ne peut pas etre vide";
        setError(email,message);        
    }else if (!email_verify(emailValue)){
        let message = "L'email non valide";
        setError(email,message);
        
    }else {
        setSucces(email)
    }
   
    if (numeValue === "") {
        let message ="Le numero ne peut pas etre vide";
        setError(numr,message);


   }else{
    setSucces(numr)
   }
}

function setError(elen,message){
    const formControl = elen.parentElement;
    const small = formControl.querySelector('small');


    small.innerText = message


    formControl.className = "boite error";
}
function setSucces(elen){
    const formControl = elen.parentElement;
    formControl.className = "boite succes";
}
function email_verify(email) {
    
    return  /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test(email);
    
}forme.addEventListener("submit", function(event) {
    event.preventDefault();

    // Récupérez les données du formulaire
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var numr = document.getElementById("numr").value;
    var message = document.getElementById("message").value;

    // Créer un objet XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Définir le type de requête et l'URL de la page PHP
    xhr.open("POST", "traitement.php", true);

    // Envoyer les données du formulaire en tant que requête POST
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("name=" + name + "&email=" + email + "&numr=" + numr + "&message=" + message);

    // Gérer la réponse de la page PHP
    xhr.onload = function() {
        if (xhr.responseText === "success") {
            alert("Votre message a été envoyé avec succès. Nous vous contacterons bientôt.");
            forme.reset();
          } else {
            alert("Une erreur s'est produite lors de l'envoi du message. Veuillez réessayer plus tard.");
          }
    };
});


