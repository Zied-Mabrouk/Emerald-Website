
<?php
include_once '../Controller/TablesC.php';
    include_once '../Controller/RestaurantsC.php';
    $error = "";

   
    $user = null;
     session_start();
  $userC=new TableC();
  $restoC = new RestaurantC();


if(isset($_SESSION['rang'])){
  if($_SESSION['rang']=="admin")
 $liste=$userC->afficherTables();
else
  $liste=$userC->afficherTables2($_SESSION['id']);
}


$restos=$restoC->afficherRestaurants();
    $restos2= $restoC->afficherRestaurants();

    
    
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
if(!isset($_SESSION['rang']) || $_SESSION['rang']=="client" ){
  ?>
  <h1>Vous n'avez pas la permission de voir cette page</h1>
  <?php
}
else{
  ?>

          <div class="col-md-3 grid-margin stretch-card" id="ajouter">
              <div class="card">
                <div class="card-body">

                  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" style="cursor: pointer;" onclick="Show(1);">Ajouter une table</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" style="cursor: pointer;color: blue;border:0;" onclick="Show(2);">Modifier une table</a>
  </li>
</ul>


                  </br>
                  <hr>
                  <div id="error" style="color: red">
            <?php echo $error; ?>
        </div>
    
    <form class="forms-sample" method="POST" action="ajouterTable.php" onSubmit="return checkformAdd()"> 
                  <div class="form-group">
                      <label for="adresse">Numéro de la table</label>
                      <input type="text" name="numAdd" class="form-control" id="numAdd">
                    </div>  
                   
                    <div class="form-group">
                      <label for="num">Restaurant</label>
                      <select name="nomAdd" class="form-control resto" id="restoAdd">
                        <?php
                        if($_SESSION['rang']=="manager")
                        {
                          ?>
                          <option selected value="<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['name']; ?></option>
                          <?php 
                        }
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
                    <input type="submit"  value="Ajouter" name ="Ajouter" class="btn btn-primary mr-2">
                    <input class="btn btn-light" type="reset" value="Annuler" >
                    
                                      </form>
<script>
  function checkformAdd()
  {
    var table = document.getElementById("tblCustomers");
    var error = document.getElementById("error");
    var num = document.getElementById("numAdd");
    var resto = document.getElementById("restoAdd");

    var uname= num.value.trim().toUpperCase();
    let isnum = /^\d+$/.test(uname);
    if(isnum==false)
    {
      num.style.border="2px dashed red";
      error.innerHTML="Le numéro de la table doit être un nombre";
      return false;
    }

    if(resto.value =='')
    {
      resto.style.border="2px dashed red";
      error.innerHTML="Veuillez selectionner un restaurant";
      return false;
    }

    for (var i = 1, row;row=table.rows[i]; i++) {
      if(row.cells[1].innerText== num.value && row.cells[2].innerText==resto.options[resto.selectedIndex].text){
        error.innerHTML="Cette table existe déja !";
        ResetBackgroundColor(table);
        row.style.backgroundColor="rgb(255 8 8 / 82%)";
        row.scrollIntoView({ behavior: 'smooth', block: 'end'});
      return false;
      }
    }
    return true;

  }
  function checkform()
  {
    var table = document.getElementById("tblCustomers");
    var error = document.getElementById("error2");
    var num = document.getElementById("num");
    var resto = document.getElementById("resto");
    var idTable = document.getElementById("idTableHidden");

    if(idTable.value==='')
    {
      error.innerHTML="Veuillez cliquer sur l'un des boutons modifier du tableau";
      return false;
    }

    var uname= num.value.trim().toUpperCase();
    let isnum = /^\d+$/.test(uname);
    if(isnum==false)
    {
      num.style.border="2px dashed red";
      error.innerHTML="Le numéro de la table doit être un nombre";
      return false;
    }

    for (var i = 1, row;row=table.rows[i]; i++) {
      if(row.cells[1].innerText== num.value && row.cells[2].innerText==resto.options[resto.selectedIndex].text && (idTable.value!=row.cells[0].innerText)){
        error.innerHTML="Cette table existe déja !";
        ResetBackgroundColor(table);
        row.style.backgroundColor="rgb(255 8 8 / 82%)";
        row.scrollIntoView({ behavior: 'smooth', block: 'end'});
      return false;
      }
    }
    return true;

  }

  function ResetBackgroundColor(table)
  {
      for (var i = 1, row;row=table.rows[i]; i++) {
        if(row.className!="thActif")
        {
          row.style.backgroundColor="white";
        }
      }
  }

  function Reset()
  {
    document.getElementById("idTableHidden").value="";
  }



</script>

                </div>
              </div>
            </div>




          <div class="col-md-3 grid-margin stretch-card" style="display: none;" id="modifier">
              <div class="card">
                <div class="card-body">


                <ul class="nav nav-tabs">
                  <li class="nav-item">
                      <a class="nav-link" aria-current="page" style="cursor: pointer;color: blue;border:0;" onclick="Show(1);">Ajouter une table</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" style="cursor: pointer;" onclick="Show(2);">Modifier une table</a>
                  </li>
              </ul>


                  </br>
                  <hr>
                  <div id="error2" style="color:red">
            <?php echo $error; ?>
        </div>
    <?php 
    if($_SESSION['rang']=="manager"){
      ?>
    <form class="forms-sample" method="POST" action="modifierTable.php" onSubmit="return checkform()">
                      <input type="hidden" name="idTable" class="form-control" id="idTableHidden">
                  <div class="form-group">
                      <label for="adresse">Numéro de la table</label>
                      <input type="text" name="num" class="form-control" id="num">
                    </div>  
                   
                    <div class="form-group">
                      <label for="num">Restaurant</label>
                      <select name="nom" class="form-control resto" id="resto">
                        <option selected value="<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['name']; ?></option>
                        
                      </select>
                    </div>
                    <input type="submit"  value="Modifier" name ="Modifier" class="btn btn-primary mr-2">
                    <input class="btn btn-light" type="reset" value="Annuler" onclick="Reset()">
                  </form>
<?php
}
else{
  ?>
    <form class="forms-sample" method="POST" action="modifierTable.php" onSubmit="return checkform()">
                      <input type="hidden" name="idTable" class="form-control" id="idTableHidden">
                  <div class="form-group">
                      <label for="adresse">Numéro de la table</label>
                      <input type="text" name="num" class="form-control" id="num">
                    </div>  
                   
                    <div class="form-group">
                      <label for="num">Restaurant</label>
                      <select name="nom" class="form-control resto" id="resto">
                        <option disabled selected value="">*</option>
                        <?php 
                        foreach ($restos2 as $r)
                        {
                          ?>
                        
                        <option value="<?php echo $r['idCompte']; ?>"><?php echo $r['nomCompte']; ?></option>
                        <?php
                      }
                      ?>
                      </select>
                    </div>
                    <input type="submit"  value="Modifier" name ="Modifier" class="btn btn-primary mr-2">
                    <input class="btn btn-light" type="reset" value="Annuler" onclick="Reset()">
                  </form>
                  <?php
                }
                ?>


                </div>
              </div>
            </div>

<script >
  function Show(index)
  {
    if(index==1)
    {
      document.getElementById("ajouter").style.display="flex";
      document.getElementById("modifier").style.display="none";
    }
    else
    {
      document.getElementById("ajouter").style.display="none";
      document.getElementById("modifier").style.display="flex";
    }
  }

</script>




            
            
           <div class="col-lg-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                
                  <h4 class="card-title">Liste Tables
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
                <td><?PHP echo $user['idTable']; ?></td>
              <td><?PHP echo $user['num']; ?></td>
              <td><?PHP echo $user['nomCompte']; ?></td>
              <td>
                        <form method="POST" action="supprimerTable.php">
                        <input class="btn btn-primary mr-2" type="submit" name="supprimerIngredients" value="supprimer"  >
                        <input type="hidden" value="<?PHP echo $user['idTable']; ?>" name='id'>
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

<script>
                      function fill(index)
                      {
                        var table = document.getElementById("tblCustomers");

                           row = table.rows[index];
                           for(i=0;i< table.rows.length;i++)
                            table.rows[i].className="";
                          row.className="thActif";



                           document.getElementById("idTableHidden").value= row.cells[0].innerText;
                           document.getElementById("num").value= row.cells[1].innerText;

                           for (var i = 1; i <document.getElementById("resto").options.length; i++) {
                          if(document.getElementById("resto").options[i].innerText== row.cells[2].innerText){
                            document.getElementById("resto").options[i].selected=true;
                            var idResto = document.getElementById("resto").options[i].value;
                          }
                        }

                        document.getElementById("ajouter").style.display="none";
                        document.getElementById("modifier").style.display="flex";

                       }

                    </script>
<style type="text/css">
  .thActif
  {
    background-color: rgb(0, 120, 255,45%);

  }
</style>

<center><a href="showUser.php">
                    </a><a href="generatepdfTable.php" class="btn btn-primary mr-2" target="_blank">Exporter</a>
                    </center>

         
          <i class="fas fa-file-export"></i>
          <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
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
