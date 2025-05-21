<link
  rel="shortcut icon"
  type="image/x-icon"
  href="{{ asset('back_auth/assets/img/favicon.png') }}"
/>
<link rel="stylesheet" href="{{ asset('back_auth/assets/css/bootstrap.min.css') }}" />
<link
  rel="stylesheet"
  href="{{ asset('back_auth/assets/plugins/fontawesome/css/fontawesome.min.css') }}"
/>
<link rel="stylesheet" href="{{ asset('back_auth/assets/plugins/fontawesome/css/all.min.css') }}" />
<link rel="stylesheet" href="{{ asset('back_auth/assets/css/feathericon.min.css') }}" />
<link
  rel="stylesheet"
  href="{{ asset('back_auth/https://cdn.oesmith.co.uk/morris-0.5.1.css') }}"
/>
<link rel="stylesheet" href="{{ asset('back_auth/assets/plugins/morris/morris.css') }}" />
<link rel="stylesheet" href="{{ asset('back_auth/assets/css/style.css') }}" />
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
  integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>

<!-- Ajouter le CSS de Bootstrap Tagsinput -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.css"
  rel="stylesheet"
/>

<style>
  .bootstrap-tagsinput {
    width: 100%;
    padding: 3px 7px;
    border: 1px solid #ced4da;
    border-radius: 3px;
    background: #2196f3;
    color: #ffffff;
    margin-right: 2px;
  }
  .bootstrap-tagsinput {
    width: 100%;
  }










  .input-container {
    position: relative;
    display: inline-block;
    width: 100%;
}

.tags-container {
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    flex-wrap: wrap;
    padding: 5px 8px;
    width: 100%;
    pointer-events: none; /* Permet d'éviter que l'utilisateur interagisse avec les tags */
    overflow: hidden;
}

.tag-item {
    background-color: #11b8d6;
    color: white;
    padding: 5px 10px;
    margin: 5px;
    border-radius: 10px;
    pointer-events: auto; /* Permet de cliquer sur les tags pour les supprimer */
    font-size: 12px;
}

.remove-tag {
    cursor: pointer;
    font-weight: bold;
    margin-left: 8px;
}

.remove-tag:hover {
    color: #ff0000;
}

#tags {
    width: 100%;
    padding: 5px;
    box-sizing: border-box;
    margin-top: 5px;
}


.badge-primary {
    background-color: #007bff;
    color: white;
    padding: 5px 10px;
    margin: 5px;
    border-radius: 15px;
}

</style>

<!-- Placer les scripts juste avant la fermeture de </body> -->
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"
></script>
