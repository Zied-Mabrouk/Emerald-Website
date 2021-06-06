
<?php
//mailing
if (isset($_POST['ajax'])) {
$to = $_POST['to'];
$subject = $_POST['sub'];
$msg = $_POST['msg'];
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: ".$_POST['name']."<".$_POST['from'].">";


$send = mail($to,$subject,$msg,$headers);

if ($send)
{
	echo "<p id='success'>✔️  $to</p>";
}else{
	echo "<p id='error'>❌  $to</p>";
}
exit();
}
?>

<?php
    include_once '../model/plats.php';
    include_once '../controller/platsC.php';
    include_once '../controller/categorieC.php';
    $plats = null;
    $platsC = new platsC();
    $categorieC= new CategorieC();
    $listePlats=$platsC->afficherPlats();  
    $listeCategorie=$categorieC->afficherCategorie();
   //tri + recherche
    if (isset($_GET["recherche"])&&isset($_GET["colonne"])&&isset($_GET["sort"]))
    { 
      if (!empty($_GET["recherche"])&&!empty($_GET["colonne"])&&!empty($_GET["sort"]))
      {
    
       // echo "<script>alert('$c') </script>";
        $listePlats=$platsC->rechercheEtTri($_GET["recherche"],$_GET["colonne"],$_GET["sort"]);
  
      }
    }
  //recherche seulement
   else if (isset($_GET["recherche"]) &&!isset($_GET["colonne"])&&!isset($_GET["sort"])){
      if (!empty($_GET["recherche"])){
        $listePlats=$platsC->rechercheEtTri($_GET["recherche"]);
      } 
    }  
//tri seulement
    else if(!isset($_GET["recherche"]) &&isset($_GET["colonne"])&&isset($_GET["sort"]))
    {
      if (!empty($_GET["colonne"])&&!empty($_GET["sort"])){
        $listePlats=$platsC->rechercheEtTri("",$_GET["colonne"],$_GET["sort"]);
      } 
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
  <!-- endinject -->
  <link rel="shortcut icon" href="../Assets/images/favicon.png" />
  <script src="https://kit.fontawesome.com/df39f889c1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-scroller">
    <!-- partial:../partials/_navbar.html -->
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
          <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter un plats</h4>
                  
                  <br>
                  <span id="error"></span>

                  <form class="forms-sample" method="POST" action="ajouterPlats.php" id="myForm">
                    <div class="form-group">
                      <label for="libelle">Nom du plats</label>
                      <input type="text" name="libelle" class="form-control" id="libelle" placeholder="Nom du plats" > 

                    </div>
                    <div class="form-group">
                      <label class="btn btn-primary mr-2" for="imgPlats" style="display:block;"><i class="fas fa-cloud-download-alt"></i> Choisir une image </label>
                      <input type="file" name="imgPlats" style="display:none;"class="form-control" id="imgPlats" accept=".jpg,.jpeg,.png" >
               
                    </div>
                    <div class="form-group">
                      <label for="description">Description du plats</label>
                      <input type="texte"  name="description" class="form-control" id="description" placeholder="Description du plats"  >

                    </div>
                    <div class="form-group">
                      <label for="prix">Prix du plats</label>
                      <input type=""  name="prix"class="form-control" id="prix" placeholder="Prix du plats" >

                    </div>
                    <div class="form-group">
                      <label for="categorie">Catégorie du plats</label>
                      <!--<input type="Texte" name="categorie" class="form-control" id="categorie" placeholder="Categorie">-->
                      <select class="form-control" name="categorie" id="categorie">
                        <option value="">--Please choose an option--</option>
                        <?php
                        foreach($listeCategorie as $categorie)
                        {
                          echo '<option value='.$categorie["nom"].'>'.$categorie["nom"].'</option>';
                        }
                        ?>
                        
                      
                      </select>
                    </div>
                    <button  type="submit" class="btn btn-primary mr-2"><i class="fas fa-plus"></i>Ajouter</button>
                  </form>
                  <a class="btn btn-light" href="afficherPlats.php">Annuler</a>
                </div>
              </div>
            </div>
            <script src="../js/plats.js"></script>
            <div class="col-lg-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les Plats</h4>
                  
                   <form  method="GET" action="afficherPlats.php?recherche=">                   
                       <div class="container">
                            <div class="row">
                                    <div class="col-7">
                                    <a href="affecterPlatsMenu.php"><button type="button" class="btn btn-primary">affecter</button></a>
                                    </div>
                                      <div class="col">
                                        <div class="input-group">
                                          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon"id="recherche" name="recherche" />
                                          <button type="submit" class="btn btn-outline-primary">search</button>
                                        </div>
                                      </div>
                            </div>
                          </div>
 
                    </form>
            

                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                        <?php 
                        $rechercheTri="";
                          if (isset($_GET["recherche"]) && !empty($_GET["recherche"]) )
                          {
                            $rechercheTri="afficherPlats.php?recherche=".$_GET['recherche']."&";
                          }
                          else
                          {
                            $rechercheTri="afficherPlats.php?";

                          }
                        ?>
                        <th>
                          <a href="<?php echo $rechercheTri?>colonne=id&sort=asc" style="color:black"> <i class="fas fa-sort-up"></i> </a>
                           Id
                          <a href="<?php echo $rechercheTri?>colonne=id&sort=desc" style="color:black"> <i class="fas fa-sort-down"> </i></a>
                          </th>
                          <th>
                          <a href="<?php echo $rechercheTri?>colonne=libelle&sort=asc" style="color:black"> <i class="fas fa-sort-up"></i> </a>
                           Nom
                          <a href="<?php echo $rechercheTri?>colonne=libelle&sort=desc" style="color:black"> <i class="fas fa-sort-down"> </i></a>
                          </th>
                          <th>
                          <a href="<?php echo $rechercheTri?>colonne=categorie&sort=asc" style="color:black"> <i class="fas fa-sort-up"></i> </a>
                          Categorie
                          <a href="<?php echo $rechercheTri?>colonne=categorie&sort=desc" style="color:black"> <i class="fas fa-sort-down"> </i></a>
                          </th>
                          <th>
                          Image 
                          </th>
                          <th>
                          <a href="<?php echo $rechercheTri?>colonne=prix&sort=asc" style="color:black"> <i class="fas fa-sort-up"></i> </a>
                          Prix
                          <a href="<?php echo $rechercheTri?>colonne=prix&sort=desc" style="color:black"> <i class="fas fa-sort-down"> </i></a>
                          </th>
                          <th>
                          <a href="<?php echo $rechercheTri?>colonne=description&sort=asc" style="color:black"> <i class="fas fa-sort-up"></i> </a>
                          Description
                          <a href="<?php echo $rechercheTri?>colonne=description&sort=desc" style="color:black"> <i class="fas fa-sort-down"> </i></a>
                          </th>
                          <th colspan="2" style="text-align:center">
                          Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          foreach($listePlats as $plats){
                            ?>

                          
              
                        <tr>
                            <td><?PHP echo $plats['id']; ?> </td>
                            <td><?PHP echo $plats['libelle']; ?> </td>
                            <td><?PHP echo $plats['categorie']; ?></td>
                            <td><img src="../Assets/images/<?PHP echo $plats['imgPlats']; ?>"></td>
                            <td><?PHP echo $plats['prix']; ?></td>
                            <td><?PHP echo $plats['description']; ?></td>
                            <td>
						                          <form method="POST" action="supprimerPlats.php">
						                          <button  style="background-color: red;"  class="btn btn-primary mr-2" type="submit" name="supprimerPlats"><i class="far fa-trash-alt"></i> Supprimer</button>
						                          <input type="hidden" value=<?PHP echo $plats['id']; ?> name="id">
						                          </form>
                            </td>         
                            <td>
						                    <a class="btn btn-light" href="modifierPlats.php?id=<?PHP echo $plats['id']; ?>" name="Modifier" ><i class="far fa-edit"></i>Modifier </a>
					                  </td>
                          
                        </tr>
                        <?PHP
				                  }
			                  ?>
                      </tbody>
                    </table>
                  </div>
                <!--mailing-->
                  <form action="" method="post">
<div class="main" style="margin-top: 100px;">
	<h1 id="title">Email</h1>
	<div>
		<input type="text" name="from" id="from" class="form-control"  value="Contact.emerald.prod@gmail.com" readonly required autofocus>
		<input type="text" name="name" id="name" class="form-control"  value="Emerald" readonly required autofocus>
	</div><br>
	<div>
    <input type="to" name="to" id="to" class="form-control" placeholder="to ..( write an email )" required >
		<input type="text" name="sub" id="sub" class="form-control"  placeholder="Objet">
	</div><br>
	<div>
    <div class="form-floating">
  <textarea class="form-control" name="msg" id="msg" placeholder="Write your message here ..."  style="height: 150px" required></textarea>
</div>
    
	</div>
	<div><br><br>
		<button class="btn btn-primary" id="btn" onclick="return false">Envoyer</button>
	</div>
	<div id="result"></div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#btn").on('click',function(){
		var mailist = $("#to").val().split("\n");
		var tmailist =  mailist.length;
		for (var current = 0; current < tmailist; current++) {
		var from = $("#from").val();
		var name = $("#name").val();
		var sub = $("#sub").val();
		var msg = $("#msg").val();
		var to = mailist[current];
		var data = "ajax=1&from=" + from + "&name=" + name + "&sub=" + sub + "&msg=" + msg + "&to=" + to;
			$.ajax({
				type : 'POST',
				data:  data,
				success: function(data) {
	                $("#result").append(data);
	            }
			});
		}


	});
});
</script>
</body>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
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
