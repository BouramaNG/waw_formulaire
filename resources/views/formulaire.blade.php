<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WaW Formulaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .banner {
  
    background-size: cover;
    height: 60px;
    /* width: 300px; */
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 5px; 
}


        .banner h1 {
            color: white;
            text-align: center;
            font-size: 24px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-top: 80px; 
}

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select,
        textarea,
        input {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
        h1 {
            background-color: yellow;
            text-align: center;
            padding: 10px;
            color: black;
            margin-top: 20px; 
        }
        #progressBarContainer {
    width: 100%;
    background-color: #f8f9fa;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
}

#progressBar {
    height: 20px;
    background-color: #007bff;
    border-radius: 5px;
    transition: width 0.3s ease-in-out;
    text-align: center;
    line-height: 20px;
    color: white;
}

@media (max-width: 767px) {
    /* Styles à appliquer pour les petits écrans */
    img {
        max-width: 100%;
        height: auto;
    }
}
form {
    display: flex;
    flex-direction: column;
}

label, input, select, textarea {
    width: 100%;
    margin-bottom: 10px;
}


    </style>
</head>
</head>
<body>
<div class="banner">
    <img src="{{ asset('image/waw.jpg') }}" alt="Logo de l'entreprise">
</div>

<form action="{{ route('reponse.store') }}" method="post">
<h1>Formulaire</h1>
<div id="progressBarContainer">
    <div id="progressBar" style="width: 0;"></div>
</div>
@if($errors->any())
    <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem;">
        Des erreurs se sont produites lors de la soumission du formulaire. Veuillez corriger les champs ci-dessous.
        <button type="button" class="close" onclick="this.parentElement.style.display='none';" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Merci !',
                html: 'Merci d\'avoir pris le temps de remplir le formulaire',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif








    @csrf
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" placeholder="Veuillez entrer votre nom">
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom" placeholder="Veuillez entrer votre prenom">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Veuillez entrer votre email"> 
    <label for="service">Service</label>
    <select name="service" id="service">
        <option value="CommercialB2C">Commercial B2C</option>
        <option value="CommercialB2B">Commercial B2B</option>
        <option value="FinanceComptablite">Finance & Comptablité</option>
        <option value="Admin">Admin</option>
        <option value="OperationNOC">Opération NOC</option>
        <option value="ServiceClient">Service Client</option>
        <option value="IT">IT</option>
        <option value="Engenering">Engenering</option>
    </select>
    <label for="processus_metier">Processus Métier</label>
    <textarea name="processus_metier" id="processus_metier" rows="3" placeholder="Expliquez comment vous faites votre travaille outils utilisés etc ..."></textarea>
    <label for="description">Description</label>
    <textarea name="description" id="description" rows="3" placeholder="faites une petite description "></textarea>
    <label for="outils_utilises">Outils utilisés</label>
    <select name="outils_utilises" id="outils_utilises">
        <option value="Hydra">Hydra</option>
        <option value="Odoo">Odoo</option>
        <option value="Excel">Excel</option>
        <option value="Manuel">Manuel</option>
    </select>
    <label for="amelioration">Amélioration</label>
    <textarea name="amelioration" id="amelioration" rows="3" placeholder="Vous pouvez nous faire des retours !"></textarea>
    <button type="submit">Envoyer</button>
   
</form>

<script>
    // Récupérer les éléments du formulaire
    const form = document.querySelector('form');
    const progressBar = document.getElementById('progressBar');

    // Calculer le pourcentage de complétion
    function updateProgressBar() {
        const inputs = form.querySelectorAll('input, select, textarea');
        const totalInputs = inputs.length;
        let completedInputs = 0;

        inputs.forEach(input => {
            if (input.value !== '') {
                completedInputs++;
            }
        });

        const completionPercentage = (completedInputs / totalInputs) * 100;
        progressBar.style.width = `${completionPercentage}%`;
        progressBar.innerText = `${Math.round(completionPercentage)}% complété`;
    }

    // Mettre à jour la barre de progression à chaque changement dans le formulaire
    form.addEventListener('input', updateProgressBar);
</script>

</body>
</html>
