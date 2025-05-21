<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenue – CEI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fefefe;
      font-family: 'Segoe UI', sans-serif;
    }
    .card-custom {
      max-width: 1100px;
      width: 100%;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }
    .left-side {
      background-color: #ffffff;
      padding: 2rem;
    }
    .right-side {
      background-color: #fef3f3;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }
    .divider {
      background-color: rgba(0, 0, 0, 0.05);
    }
    .highlight {
      color: #dc3545;
      font-weight: bold;
    }
    .btn-dark {
      margin-top: 1.5rem;
    }
    img {
      max-width: 100%;
      height: auto;
    }

    /* Divider styles */
    @media (min-width: 768px) {
      .divider {
        width: 1px;
      }
    }

    @media (max-width: 767.98px) {
      .divider {
        height: 1px;
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
    <div class="card-custom d-flex flex-column flex-md-row w-100">
      
      <!-- Image en haut sur mobile, à droite en desktop -->
      <div class="right-side col-md-6 order-md-2">
        <img src="{{ asset('/img/cei1.png') }}" alt="Illustration CEI">
      </div>

      <!-- Trait séparateur -->
      <div class="divider d-none d-md-block"></div>

      <!-- Texte -->
      <div class="left-side col-md-6 order-md-1">
        <h2 class="mb-4">Bienvenue au <span class="highlight">Comité d’Entraide Internationale</span></h2>
        <p>
        Le CEI, bras diaconal de l’Église Évangélique au Maroc, œuvre avec foi et conviction pour témoigner de l’amour de Dieu à travers l’accueil, l’accompagnement et l’assistance de notre prochain étranger vivant au Maroc.        </p>
        {{-- <p>
          Nous œuvrons à créer un impact positif au sein des communautés par des actions concrètes de soutien et de formation.
        </p> --}}
        <a href="{{ route('login') }}" class="btn btn-dark">Accéder à l'espace membre</a>
      </div>
      
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
