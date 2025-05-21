<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="active">
          <a href="{{ route('dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Accueil CEI</span>
          </a>
        </li>

        <li class="list-divider"></li>

        <li class="submenu">
          <a href="/dashboard">
            <i class="fas fa-hand-holding-heart"></i>
            <span>Activité</span>
            <span class="menu-arrow"></span>
          </a>
          <ul class="submenu_class" style="display: none">
                  <li><a href="{{ route('activite.index') }}"> Tous les activités </a></li>
                  <li><a href="{{ route('activite.create') }}"> Ajouter une activité </a></li>
                </ul>
        </li>

        
        @can('admin-access')
        

 <li class="submenu">
          <a href="#">
            <i class="fas fa-list"></i>
            <span>Catégorie</span>
            <span class="menu-arrow"></span>
          </a>
          <ul class="submenu_class" style="display: none">
                  <li>
                    <a href="{{route('category.index')}}"> Tous les catégories </a>
                  </li>

                  <li>
                    <a href="{{route('category.create')}}"> Ajouter une catégorie </a>
                  </li>
                </ul>
        </li>

        <!-- Renommé en Responsables -->
        <li class="submenu">
          <a href="#">
            <i class="fas fa-user-tie"></i>
            <span>Responsables</span>
            <span class="menu-arrow"></span>
          </a>
          <ul class="submenu_class" style="display: none">
                  <li><a href="{{ route('author.index') }}">Tous les responsables</a></li>
                  <li>
                    <a href="{{ route('author.create') }}"> Ajouter un responsable </a>
                  </li>
                </ul>
        </li>

        <!-- Nouveau menu pour Bénéficiaires -->
        <li class="submenu">
          <a href="#">
            <i class="fas fa-users"></i>
            <span>Bénéficiaires</span>
            <span class="menu-arrow"></span>
          </a>
         <ul class="submenu_class" style="display: none">
              <li><a href="{{ route('beneficiaires.index') }}">Tous les bénéficiaires</a></li>
              <li><a href="{{ route('beneficiaires.create') }}">Ajouter un bénéficiaire</a></li>
        </ul>

        </li>



        <li class="submenu">
          <a href="#">
            <i class="fas fa-share-alt"></i>
            <span>Partenaires & Réseaux</span>
            <span class="menu-arrow"></span>
          </a>
          <ul class="submenu_class" style="display: none">
                  <li><a href="{{ route('socialMedia.index') }}">Tous les medias</a></li>
                  <li><a href="{{ route('socialMedia.create') }}">Ajouter un media </a></li>
                </ul>
        </li>

        <li>
          <a href="{{ route('contact.index') }}">
            <i class="fas fa-envelope"></i>
            <span>Contacts CEI</span>
          </a>
        </li>

        <li>
          <a href="{{ route('setting.index') }}">
            <i class="fas fa-cog"></i>
            <span>Paramètres généraux</span>
          </a>
        </li>

        @endcan
       

        <li>
          <a href="{{ route('comment.index') }}">
            <i class="fas fa-comments"></i>
            <span>Messages & Retours</span>
          </a>
        </li>

        

        <li class="submenu">
          <a href="#">
            <i class="fas fa-columns"></i>
            <span>Pages d'information</span>
            <span class="menu-arrow"></span>
          </a>
          <ul class="submenu_class" style="display: none">
             @can('admin-access')
            <li><a href="{{ route('demandes.index') }}">Demande</a></li>
            <li><a href="{{ route('demandes.admin.index')}}">Voir les demandes</a></li>
            <li><a href="{{ route('aides.index')}}">Aides effectuées</a></li>
            @endcan
            <li><a href="login.html">Connexion</a></li>
            <li><a href="register.html">Inscription</a></li>
            <li><a href="forgot-password.html">Mot de passe oublié</a></li>
            <li><a href="change-password.html">Changer le mot de passe</a></li>
            <li><a href="lock-screen.html">Écran de verrouillage</a></li>
            <li><a href="profile.html">Profil</a></li>
            <li><a href="gallery.html">Galerie</a></li>
           
                                                                                    
            <li><a href="blank-page.html">Page vide</a></li>
          </ul>
        </li>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
      </ul>
    </div>
  </div>
</div>
