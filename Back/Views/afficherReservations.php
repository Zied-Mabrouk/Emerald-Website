
<?php


include_once '../Controller/ReservationsC.php';

    include_once '../Controller/TablesC.php';
    include_once '../Controller/RestaurantsC.php';
    $error = "";
    session_start();
$tableC = new TableC();
$restoC = new RestaurantC();

   if(isset($_GET["error"]))
      {
        switch ($_GET["error"]) {
          case 1:
            $error = "Cette table n'existe pas";
            break;
            case 2:
            $error = "L'une des cases est vide";
            break;
          
        }
      }

  $userC=new ReservationC();

      if(isset($_SESSION['rang'])){
  if($_SESSION['rang']=="admin")
 $liste=$userC->afficherReservations();
else
 $liste=$userC->afficherReservations2($_SESSION['id']);
}





    $user = null;

 $restos=$restoC->afficherRestaurants();
 $number=$tableC->getRestaurants();


   
    
    
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Emerald</title>
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
      <?php
    require("template.php");
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../partials/_settings-panel.html -->
      <?php 
      require("template2.php");
      ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php
      require("side-bar.php");
      ?>
      <!-- partial -->      

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <?php 
            //echo "<h1>".$_SESSION['rang']."</h1>";
if(!isset($_SESSION['rang']) || $_SESSION['rang']=="client" ){
  ?>
  <h1>Vous n'avez pas la permission de voir cette page</h1>
  <?php
}
else{
  ?>
          <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" style="cursor: pointer;" >Modifier une table</a>
  </li>
</ul>
                  </br>
                  <hr>
                  <div id="error" style="color: red">
            <?php echo $error; ?>
        </div>
    
    <form class="forms-sample" method="POST" action="modifierReservation.php" onSubmit="return checkform()">
                      <input type="hidden" name="id" class="form-control" id="id">
                  <div class="form-group">
                      <label for="adresse">Nombre de personnes</label>
                      <input type="text" name="nbrePersonnes" class="form-control" id="nbrePersonnes">
                    </div>  
                   
                    <div class="form-group">
                      <label for="nom">Date de réservation</label>
                      <input type="date" class="form-control" id="dateR" name="dateR" value="<?php echo ( date('Y-m-d', time()));?>" min="<?php echo ( date('Y-m-d', time()));?>" max="2021-07-26">
                    </div>
                    <div class="form-group">
                      <label for="num">Restaurant</label>
                      <select name="nom" class="form-control resto" onchange="getTables(event);" id="resto">
                        <?php
                        if($_SESSION['rang']=="manager"){
                          ?>
                          <option selected value="<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['name']; ?></option>
                        <?php }
                        else{
                          ?>
                        <option disabled selected value="">*</option>
                        <?php 
                        foreach ($restos as $r)
                        {
                          ?>
                        
                        <option value="<?php echo $r['idCompte']; ?>"><?php echo $r['nomCompte']; ?></option>
                        <?php
                      }}
                      ?>
                      </select>
                    </div>
                    <?php 
                        foreach ($number as $n)
                        {
                          if($_SESSION['rang']=="admin" || $_SESSION['id']==$n['idResto']){
                          ?>

                      <div class="form-group tables" id="<?php echo $n['idResto'] ; ?>" style="<?php if($_SESSION['id']!=$n['idResto']) echo 'display: none;' ?>">
                      <label for="num">Numéro de la table</label>
                      <select name="num" id="num" class="form-control">
                        <?php

                        $tables=$tableC->afficherTablesOrdered($n['idResto']);
                        foreach ($tables as $t){
                          ?>
                            <option value="<?php echo $t['idTable']; ?>"><?php echo $t['num']; ?></option>
                            <?php
                      }
                        ?>
                      </select>
                    </div>

                    <?php
                      }}
                      ?>

                    <script>
                      function getTables()
                      {
                        var resto = document.getElementById("resto").value;
                        document.querySelectorAll("div.tables").forEach(element=>{
                          element.style.display="none";
                          element.getElementsByTagName("select")[0].setAttribute("name","hey");
                        });
                        document.getElementById(resto).style.display="block";
                        document.getElementById(resto).getElementsByTagName("select")[0].setAttribute("name","num");


                      }
                    </script>
                    
                    <input type="submit"  value="Modifier" name ="Modifier" class="btn btn-primary mr-2">
                    <input class="btn btn-light" type="reset" value="Annuler" >
                  </form>


                  <script src="../Assets/js/checkReservation.js"></script>


                </div>
              </div>
            </div>
            
            <div class="col-lg-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                
                  <h4 class="card-title">Liste Réservations
                  <i class="fa fa-pepper-hot"></i>
                  </h4> 
                  
                  
          <div class="table-responsive pt-3">
                  
                  
          <table id="tblCustomers" class="table table-bordered">
          <thead>
            <tr>
                        <th>
            Id
            </th>
            <th>
            Nombre de Personnes
            </th>
            <th>
            Date
            </th>
            <th>
            Numéro de la Table
            </th>
            <th>
            Nom du Restaurant
            </th>
          <?php
          $i =0;
            foreach($liste as $user){
              $i++;
              ?>
            <tr>
                <td><?PHP echo $user['Id']; ?></td>
              <td><?PHP echo $user['Nbre_Personnes']; ?></td>
              <td><?PHP echo $user['DateR']; ?></td>
              <td title="<?PHP echo $user['idTable']; ?>"><?PHP echo $user['num']; ?></td>
              <td title="<?PHP echo $user['idCompte']; ?>"><?PHP echo $user['nomCompte']; ?></td>
              <td>
                        <form method="POST" action="supprimerReservation.php">
                        <input class="btn btn-primary mr-2" type="submit" name="supprimerIngredients" value="supprimer"  >
                        <input type="hidden" value="<?PHP echo $user['Id']; ?>" name='id'>
                        </form>
                  </td>
                  <td>
                      <a class="btn btn-light" onclick="fill(<?php echo $i ; ?>);" name="Modifier" > Modifier 
                      <i class="fa fa-exchange-alt"></i>
                    </a>
                    
                  </td>
            
            </tr>
            <?PHP
                }
              ?>
          </tbody>
          </table>
<br>
<br>

         <style type="text/css">
  .thActif
  {
    background-color: rgb(0, 120, 255,45%);

  }
</style>



<script>
  function fill(index)
                      {
                        var table = document.getElementById("tblCustomers");

                           row = table.rows[index];

                           for(i=0;i<table.rows.length;i++)
                            table.rows[i].className="";

                          row.className="thActif";

                          
                           document.getElementById("id").value= row.cells[0].innerText;
                           document.getElementById("nbrePersonnes").value= row.cells[1].innerText;
                           document.getElementById("dateR").value= row.cells[2].innerText;


                        for (var i = 1; i <document.getElementById("resto").options.length; i++) {
                          if(document.getElementById("resto").options[i].innerText== row.cells[4].innerText){
                            document.getElementById("resto").options[i].selected=true;
                            var idResto = document.getElementById("resto").options[i].value;
                          }
                        }
                        <?php 
                        if($_SESSION['rang']=="admin"){
                          ?>
                        document.querySelectorAll("div.tables").forEach(element=>{
                          element.style.display="none";
                          element.getElementsByTagName("select")[0].setAttribute("name","hey");
                          element.getElementsByTagName("select")[0].setAttribute("id","hey");
                        });
                        


                        document.getElementById(idResto).style.display="block";
                        document.getElementById(idResto).getElementsByTagName("select")[0].setAttribute("name","num");
                        document.getElementById(idResto).getElementsByTagName("select")[0].setAttribute("id","num");

<?php 
                      }
                      ?>
                        for (var i = 0; i <document.getElementById("num").options.length; i++) {

                          if(document.getElementById("num").options[i].innerText== row.cells[3].innerText){
                          console.log( document.getElementById("num").options[i].selected);
                            document.getElementById("num").options[i].selected=true;
                            console.log( document.getElementById("num").options[i].selected);
                          }

                        }
                          console.log(document.getElementById("num").options.length);

                       }
</script>






          <i class="fas fa-file-export"></i>
          <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
                    pdfMake.createPdf(docDefinition).download("Liste ingredient");
                }
            });
        });
    </script>
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
       <?php
    }
    ?>
    </div>
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
