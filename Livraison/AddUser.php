<!DOCTYPE html>
<html lang="en">
<head>
    <head>
		<meta charset="utf-8">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
</head>
<body>
<?php include('menu.php') ?>
    <h1 style="text-align: center;">Top Livraison </h1>

    <form action="" method="post" id='formAddUser' >

        <div class="container">
            <div class="col-md-4 col-md-offset-4">
                 <h3>Enregistre un nouveaux client</h3>
           
            <div class="form-group ">
                <label for="NomClient">Nom Client</label>
                <input id="NomClient" class="form-control" type="text" name="NomClient">
            </div>
            <div class="form-group ">
                <label for="NomClient">Prise Client</label>
                <input id="NomClient" class="form-control" type="number" name="PrixClient">
             </div>
             <div class="form-group ">
                <label for="NomClient">Type Client</label>
                <select name="typeClient" id="Type" class="form-control">
                    <option value="" >...</option>
                    <option value="Revendeur" >Revendeur</option>
                    <option value="Domicile" >Domicile</option>
                </select> 
            </div> 
            <button id="Validation" class="btn btn-success">Enregistre </button>
            </div>
    </form>
    </div>
	<script src="js/script.js"></script>
</body>
</html>