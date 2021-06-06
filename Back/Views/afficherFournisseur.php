<?php
    include_once '../Controller/fournisseurC.php';
     require '../controller/fp.php';


    $error = "";

   
    $user = null;
	$fournisseurC=new fournisseurC();
 $listeUsers=$fournisseurC->afficherFournisseur();
    
    $userC = new fournisseurC();
   

    
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic --><head><meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Espace Fournisseur</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../Assets/css/style.css">  



  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">

  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <script type="text/javascript" src="../Assets/prototype.js"></script>
	<script type="text/javascript" src="../Assets/sortHTMLTable.js"></script>
  </head>
  <body>
   <div class="container-scroller">
    <!-- partial:../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../index.html"><img src="../Assets/images/Untitled-1.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../index.html"><img src="../Assets/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
          <form class="d-none d-sm-inline-block" action="" method="POST">
          <div class="input-group input-group-navbar">
            <input type="search" class="form-control" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" placeholder="Entrez le mot à chercher.." required=""/>
            <button class="btn" type="submit" name="search">
            <i class="fa fa-search"></i>
             <!-- <i class="align-middle" data-feather="search"></i>-->
            </button>
            <a href="afficherFournisseur.php" class="btn btn-info">Réinitialiser</a>
          </div>
        </form>
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
              <img src="../images/faces/face28.jpg" alt="profile"/>
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
      <!-- partial:../partials/_settings-panel.html -->
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
                <div class="profile"><img src="../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
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
                <div class="profile"><img src="../images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../images/faces/face6.jpg" alt="image"><span class="online"></span></div>
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
      <!-- partial:../partials/_sidebar.html -->

      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="afficherTables.php" aria-expanded="false" aria-controls="ui-basic">
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
            <a class="nav-link" data-toggle="collapse" href="afficherReservations.php" aria-expanded="false" aria-controls="form-elements">
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
            <a class="nav-link" data-toggle="collapse" href="afficherMenu.php" aria-expanded="false" aria-controls="charts">
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
            <a class="nav-link" data-toggle="collapse" href="afficherIngredient.php" aria-expanded="false" aria-controls="tables">
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
            <a class="nav-link" data-toggle="collapse" href="afficherFournisseur.php" aria-expanded="false" aria-controls="icons">
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
            <a class="nav-link" data-toggle="collapse" href="showUser.php" aria-expanded="false" aria-controls="auth">
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
            <a class="nav-link" data-toggle="collapse" href="affichagelivraison.php" aria-expanded="false" aria-controls="auths">
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
            <a class="nav-link" data-toggle="collapse" href="affichagelivreur.php" aria-expanded="false" aria-controls="dunno">
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


      <!-- partial -->      
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter un fournisseur 
                  <i class="fa fa-user"></i>
                    
                  </h4>
                  
            

                  <form class="forms-sample" method="POST" action="ajouterFournisseur.php">
                    <div class="form-group">
                      <label for="adresse">Adresse</label>
                      <input type="text" name="adresse"  pattern="[a-zA-Z]+" class="form-control" id="adresse" placeholder="Adresse " > 
          
                    </div>
                  
                    <div class="form-group">
                      <label for="nom">Nom</label>
                      <input type="texte"  name="nom"  pattern="[a-zA-Z]+" class="form-control" id="nom" placeholder="Nom du fournisseur"  >
                
                    </div>
                    <div class="form-group">
                      <label for="num">Numéro</label>
                      <input type="tel" pattern="[0-9]+"  name="num"class="form-control" minlength="8" maxlength="8" id="num" placeholder="Numéro de télèphone" >
                   
                    </div>
                    <div class="form-group">
                      <label for="mail">mail</label>
                       <input class="form-control" type="email" name="mail" id="mail"  placeholder="exemple@gmail.com" pattern=".+@gmail.com|.+@esprit.tn">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Ajouter
                    <i class="fa fa-plus"></i>
                    </button>
                    <button class="btn btn-light">Annuler
                    <i class="fa fa-times"></i>
                        </button>
                  </form>
                </div>
              </div>
            </div>
            
            <div class="col-lg-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste Fournisseurs
                  <i class="fa fa-truck"></i>
                  </h4>
                  
				  <div class="table-responsive pt-3">
                  
                  
				  <table id="tblCustomers" class="table table-bordered">
					<thead>
					  <tr>
            <?php

              if(ISSET($_POST['search'])){
                ?>
                 <table id="tblCustomers" class="table table-bordered">
						<th>
					Matricule
						</th>
						<th>
            Adresse
						</th>
            <th>
            Nom du fournisseur
            </th>
						<th>
						Numéro de télèphone
						</th>
						<th>
            Mail
						</th>
					  </tr>
					</thead>
					<tbody>
          <?php
                        $keyword = $_POST['keyword'];
                        $db = config::getConnexion();
                        $query = $db->prepare("SELECT * FROM `fournisseur` WHERE `matricule` LIKE '%$keyword%' or `adresse` LIKE '%$keyword%' or `nom` LIKE '%$keyword%' or `num` LIKE '%$keyword%' or `mail` Like '%$keyword%' ");
                        $query->execute();
            
                    while($row = $query->fetch()){
                          ?>
                          <tr>
                            <td><?PHP echo $row['matricule']; ?></td>
                            <td><?php echo $row['adresse']?></td>
                            <td><?php echo $row['nom']?></td>
                            <td><?php echo $row['num']?></td>
                            <td><?PHP echo $row['mail'] ?></td>
                          </tr>

                          <?php
                        }
                        ?>
                        </tbody>
                        </table>
                        <?php   
                  }else{
                    ?>
                  <th>
				      	Matricule
						</th>
						<th>
            Adresse
						</th>
            <th>
            Nom du fournisseur
            </th>
						<th>
						Numéro de télèphone
						</th>
						<th>
            Mail
						</th>
					<?php
						foreach($listeUsers as $user){
						  ?>
					  <tr>
					  	  <td><?PHP echo $user['matricule']; ?></td>
						  <td><?PHP echo $user['adresse']; ?></td>
						  <td><?PHP echo $user['nom']; ?></td>
						  <td><?PHP echo $user['num']; ?></td>
						  <td><?PHP echo $user['mail']; ?></td>
						  <td>
												<form method="POST" action="supprimerFournisseur.php">
                        
												 <input class="btn btn-primary mr-2" type="submit" name="supprimerFournisseur" value="supprimer">
                          <i class="fa fa-trash"></i>
												<input type="hidden" value=<?PHP echo $user['matricule']; ?> name="matricule">
												</form>
									</td>
									<td>
										  <a class="btn btn-light" href="modifierFournisseur.php?matricule=<?PHP echo $user['matricule']; ?>" name="Modifier" > Modifier 
                      <i class="fa fa-exchange"></i>
                      </a>
                    </td>
						
					  </tr>
					  <?PHP
								}
							?>
             
					</tbody>
				  </table>
          <?PHP
								}
							?>

         
         
          
          <script type="text/javascript" src="../Assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../Assets/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="../Assets/js/html2canvas.min.js"></script>
    <script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#tblCustomers')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Liste fournisseur");
                }
            });
        });
    </script>
     <script type="text/javascript">
new sortHTMLTable( 'tblCustomers' );

</script> 
<div class="container h-100">
	<div class="row h-100 mt-5 justify-content-center align-items-center">
		<div class="col-md-5 mt-5 pt-2 pb-5 align-self-center border bg-light">
			
            <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                     <h4 class="card-title">Contactez un fournisseur
                  <i class="fa fa-truck"></i>
                  </h4>

			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="">  
            <div class="form-group">
					<label for="email">Email:</label>
					<input type="email" name="email" placeholder="Enter Email" class="form-control">
                    <label for="email">Message:</label>
					<input type="text" name="message" placeholder="tapez votre message" class="form-control">
				</div>
        <br>
        <center>
				<input  type="submit" name="check-email" class= "btn btn-info" value="send">
                </center>
				
				

			</form>
		</div>
	</div>
</div>


          

				</div>
        <br>
        
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
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
