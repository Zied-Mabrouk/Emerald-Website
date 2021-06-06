<?PHP
 include_once '../Model/compte.php';
    include_once '../Controller/CompteC.php';


$utilisateurC = new CompteC();
if (isset($_GET["search"])) {
	$listeUsers=$utilisateurC->search($_GET["search"]);
 }
 else{
$listeUsers=$utilisateurC->afficherCompte();
 }


    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['supprimer']))
    {
        $Compte1=$utilisateurC->searchCatg($_POST['idCompte']);
        
        foreach ( $Compte1 as $Compte2);
    
        $idCategorie = $Compte2['idCategorie'];
    
        $utilisateurC->supprimerCompte($_POST['idCompte']);
    
    
        $utilisateurC->supprimerSelonRang($idCategorie);

		header('refresh:1;url=showUser.php');
    }



	if (isset($_GET["tri"])) {
      
      
        $listeUsers=$utilisateurC->triparname();
    }
    if (isset($_GET["triA"])) {
      
      
      $listeUsers=$utilisateurC->triparADRESS();
  
      require('../Assets/fpdf/fpdf.php');

  }
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <?php 
  require("includesMahdi.php");
  ?>
  <script src="https://kit.fontawesome.com/df39f889c1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="../Assets/images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../Assets/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../Assets/images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="../Assets/images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../Assets/images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../Assets/images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../Assets/images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../Assets/images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../Assets/images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->

      <?php
      require("side-bar.php");
      ?>

       <!-- partial --> 
       <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
         <!--  <div class="col-md-3 grid-margin stretch-card">
             <div class="card">
                <div class="card-body">
                  
                <h4 class="card-title">Ajouter un produit</h4>
                  
            

                  <form class="forms-sample" method="POST" action="ajouterPlats.php">
                    <div class="form-group">
                      <label for="libelle">Nom du plats</label>
                      <input type="text" name="libelle" class="form-control" id="libelle" placeholder="Nom du plats" > 
                     <?php
                      /*if($verif_nom==1){
                      echo $alert_nom;
                      $verif_nom=0;
                      }*/

                      ?>
                      
                      
                      
                    </div>
                    <div class="form-group">
                      <label class="btn btn-primary mr-2" for="imgPlats" style="display:block;">Choisir une image </label>
                      <input type="file" name="imgPlats" style="display:none;"class="form-control" id="imgPlats" accept=".jpg,.jpeg,.png" >
               
                    </div>
                    <div class="form-group">
                      <label for="description">Description du plats</label>
                      <input type="texte"  name="description" class="form-control" id="description" placeholder="Description du plats"  >
                      <?php
                      /*if($verif_descr==1){
                      echo $alert_desc;
                      $verif_descr=0;
                      }*/

                      ?>
                    </div>
                    <div class="form-group">
                      <label for="prix">Prix du plats</label>
                      <input type=""  name="prix"class="form-control" id="prix" placeholder="Prix du plats" >
                      <?php
                      /*if($verif_prix==1){
                      echo $alert_prix;
                      $verif_prix=0;
                      }*/

                      ?>
                    </div>
                    <div class="form-group">
                      <label for="categorie">Catégorie du plats</label>
                      <input type="Texte" name="categorie" class="form-control" id="categorie" placeholder="Categorie">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
                    <button class="btn btn-light">Annuler</button>
                  </form>
                </div> 
              </div>
            </div>-->
            
            <div class="col-lg-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les comptes</h4>
                  <br>
						<form method="GET">

                    <div class="search" >
                     <input type="text" placeholder="Search by ID ..." class="form-control"  name="search">
    
	 
                     </div>
                      </form>
 <a href="<?php echo ("showUser.php"); ?>"> <button  class="btn btn-primary mr-2" > Reset </button>
<form method="GET">
        <div class="filter">

		<br>
     <button type="submit" name="tri"  class="btn btn-primary mr-2">Order by name</button>
	 <button type="submit" name="triA"  class="btn btn-primary mr-2">Order by ADress</button>    

        </div>
    
</form>
                  <div class="table-responsive pt-3">
                  
                  
                  <table border=1 align='center' class="table table-bordered">
                      <thead>
                      <tr>
											<th>  ID  </th>
											<th>  Nom de compte  </th>
											<th>  E-mail  </th>
											<th>  Mot de passe  </th>
											<th>  Nombre de téléphne  </th>
											<th>  Adresse  </th>
											<th>  Date  </th>
											<th>  Supprimer  </th>
									
										</tr>
                      </thead>
                      <tbody>
                      <?PHP
          foreach ($listeUsers as $compte) {
?>
<tr>
											<td> <?PHP echo $compte['idCompte']; ?> </td>
											<td> <?PHP echo $compte['nomCompte'];?> </td>
											<td> <?PHP echo $compte['email']; ?> </td>											
											<td> <?PHP echo $compte['passwordd']; ?> </td>
											<td> <?PHP echo $compte['tel']; ?> </td>
											<td> <?PHP echo $compte['adresse']; ?> </td>
											<td> <?PHP echo $compte['dateCreation']; ?> </td>  
                            <td>
						                          <form method="POST" >
                                                  <button  style="background-color: red;"  class="btn btn-primary mr-2" type="submit" name="supprimer"><i class="far fa-trash-alt"></i> Supprimer</button>
						                          
						                          <input type="hidden" value=<?PHP echo $compte['idCompte']; ?> name="idCompte">
						                          </form>
					                  </td>
				                  	
                          
                        </tr>
                        <?PHP
				                  }
			                  ?>
                      </tbody>
                    </table>
                    <br>
                    <center>
                    <a href="generatepdf1.php"  class="btn btn-primary mr-2"  target="_blank">Exporter</a>
                    </center>
                    <br>
                    <br>
                  </div>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
          <!-- partial:../partials/_footer.html -->
          <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../Assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../Assets/js/off-canvas.js"></script>
  <script src="../Assets/js/hoverable-collapse.js"></script>
  <script src="../Assets/js/template.js"></script>
  <script src="../Assets/js/settings.js"></script>
  <script src="../Assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
