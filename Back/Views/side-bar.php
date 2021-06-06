<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Gestion des Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="afficherTables.php">Les Tables</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Gestion de Réservations</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="afficherReservations.php">Les Réservations</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Gestion de Menus</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="afficherCategorie.php">Categories</a></li>
                <li class="nav-item"> <a class="nav-link" href="afficherPlats.php">Plats</a></li>
                <li class="nav-item"> <a class="nav-link" href="afficherMenu.php">Menus</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Gestion des ingrédients</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="afficherIngredient.php">Ingrédients</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Gestion des Fournisseurs </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="afficherFournisseur.php">Fournisseurs</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Gestion des profils</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="showUser.php">Comptes</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auths" aria-expanded="false" aria-controls="auths">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Gestion des Livraisons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auths">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="ajouterlivraison.php">Ajouter une livraison </a></li>
                <li class="nav-item"> <a class="nav-link" href="affichagelivraison.php">Affichage</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#dunno" aria-expanded="false" aria-controls="dunno">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">Gestion des Livreurs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="dunno">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="ajouterlivreur.php"> Ajouter un livreur </a></li>
                <li class="nav-item"> <a class="nav-link" href="affichagelivreur.php
                  ">Affichage</a></li>
              </ul>
            </div>
          </li>



        </ul>
      </nav>