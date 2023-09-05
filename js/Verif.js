const form = document.getElementById('form');
const form2 = document.getElementById('form2');

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}

const setError2 = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error2');

    errorDisplay.innerText = message;
    inputControl.classList.add('error2');
    inputControl.classList.remove('success2')
}

const setSuccess2 = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error2');

    errorDisplay.innerText = message;
    inputControl.classList.add('success2');
    inputControl.classList.remove('error2');
}

const isValidEmail = email => {
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}$/;
    return re.test(String(email).toLowerCase());
}

const isvalidPassword = password => {
    const reg = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return reg.test(String(password));  
}



// Fonction de validation pour les deux formulaires
function validateForm(event) {

    // Vérifier les champs en fonction du formulaire soumis
    if (event.target.id === "form") {
        // Vérifier les champs du formulaire d'inscription
        const nom = document.getElementById('nom');
        const prenom = document.getElementById('prenom');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const password2 = document.getElementById('password2');

        const nomValue = nom.value.trim();
        const prenomValue = prenom.value.trim();
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();
        const password2Value = password2.value.trim();

        
        if(nomValue === '') {
            setError(nom, 'Nom requis');
            event.preventDefault();
        } else {
            setSuccess(nom, '');
        }
        
        if(prenomValue === '') {
            setError(prenom, 'Prénom requis');
            event.preventDefault();
        } else {
            setSuccess(prenom, '');
        }

        if(emailValue === '') {
            setError(email, 'Email requis');
            event.preventDefault();
        } else if (!isValidEmail(emailValue)) {
            setError(email, 'Entrez un email valide');
            event.preventDefault();
        } else {
            setSuccess(email, '');
        }

        if(password2Value === '') {
            setError(password2, 'Confirmez votre mot de passe');
            event.preventDefault();
        } else if (password2Value !== passwordValue) {
            setError(password2, 'Les mots de passe ne conrrespondent pas');
            event.preventDefault();
        } else {
            setSuccess(password2,'');
        }

        if(passwordValue === '') {
            setError(password, 'Mot de passe requis');
            event.preventDefault();
        } else if (!isvalidPassword(passwordValue)) {
            setError(password,'Le mot de passe doit contenir au moins 8 caractères, avec au moins 1 caractère special, 1 chiffre et 1 majuscule.')
            event.preventDefault();
        } else {
            setSuccess(password,'')
        }


    } else if (event.target.id === "form2") {
        // Vérifier les champs du formulaire de connexion
        const email2 = document.getElementById('email2');
        const password3 = document.getElementById('password3');
        
        const emailValue = email2.value.trim();
        const passwordValue = password3.value.trim();

        if(emailValue === '') {
            setError2(email2, 'Email requis');
            event.preventDefault();
        } else if (!isValidEmail(emailValue)) {
            setError2(email2, 'Entrez un email valide');
            event.preventDefault();
        } else {
            setSuccess2(email2, '');
        }

        if(passwordValue === '') {
            setError2(password3, 'Mot de passe requis');
            event.preventDefault();
        } else if (!isvalidPassword(passwordValue)) {
            setError2(password3,'Le mot de passe doit contenir au moins 8 caractères, avec au moins 1 caractère special, 1 chiffre et 1 majuscule.')
            event.preventDefault();
        } else {
            setSuccess2(password3,'')
        }
    }
}
// Ajouter un événement "submit" sur les deux formulaires
document.getElementById("form").addEventListener("submit", validateForm);
document.getElementById("form2").addEventListener("submit", validateForm);
