<?php require '../controller/fp.php';?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Password Recovery</title>
</head>
<body class="bg-dark">

<style>
				body{
	font-family: calibri;
  margin-top: 50px;
  background: url(unnamed.jpg) no-repeat;
}

</style>
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
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="">
            <div class="form-group">
					<label for="email">Email:</label>
					<input type="email" name="email" placeholder="Enter Email" class="form-control">
                    <label for="email">Message:</label>
					<input type="email" name="message" placeholder="tapez votre message" class="form-control">
				</div>
        
				<input type="submit" name="check-email" class="btn btn-warning" value="send">
                
				
				

			</form>
		</div>
	</div>
</div>

</body>
</html>