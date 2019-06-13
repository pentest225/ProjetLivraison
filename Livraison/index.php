<!DOCTYPE : html>
<html>
	<head>
		<meta charset="utf-8">
		<!-- Latest compiled and minified CSS -->
<!-- 		<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">-->		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="bootstrap-3.3.7-dist/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">

	</head>
	<body>
		
	
		<header>
			<?php include("menu.php") ?>
		</header>
		<form action="# " method="post">
			<div class="row entete">
					<div class="col-md-4 Tab_left">
						<!-- Tableau d'entete -->
							<table class="table table-striped" >
								<thead>
									<tr>
										<th scope="col">Prise du jour</th>
										<th scope="col"><input type="number" name="Prise" placeholder="prise" id="Prise" value='0'></th>
									</tr>
									<tr>
										<th scope="col">Retour</th>
										<th scope="col"><input type="number" name="Retour" placeholder="Retour" id="Retour" value='0'></th>
									</tr>
									<tr>
										<th scope="col">Somme A verser</th>
										<th scope="col" id="SommeAVerser">Valleur</th>
									</tr>
								</thead>
							</table>
						</div>
					<div class="col-md-4 date">
						<h4>Date du jour </h4><input type="date" name="">
					</div>
				<!-- FIN TABLEAU GAUCHE -->
					<div class="col-md-4  Tab_right">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">VERSEMENT</th>
									<th scope="col"><input type="number" name="Versement" placeholder="Versement" id="Versement"></th>
								</tr>
								<tr>
									<th scope="col">Manquant Du jour </th>
									<th scope="col" id='ManquantDuJour'>Valleur</th>
								</tr>
								<tr>
									<th scope="col">Total  Manquant</th>
									<th scope="col">Valleur</th>
								</tr>
							</thead>
						</table>
					</div>
					
				<!-- TABLEAU DROIT -->
				
			</div>
<!-- ________________________________FIN DE LA SECTION DES ENTETE___________________________________________________ -->
		<!--SECTION VENTE-->
			<div class="containeur">
				<div class="vente_du_jour">
					<h4>Vente du jour </h4>
				</div>
			</div>
			<!--SECTION TABLEAUX  CLIENTS -->
			<div class="row navigation">
				<div class="col-md-4">
					<input type="button" name="" class="btn btn-success " id="addLine" onclick="ajouterLigne();" value="Ajouter une ligne">
				</div>
				<div class="col-md-4 col-md-offset-8 restPrise">
					<h4>Rest prise :</h4><h4 class="restVal">125</h4>
				</div>
				
			</div>
		
			<table class="table table-striped" id="Tableau" >
			  <thead>
			    <tr>
				<th scope="col">N </th>
			      <th scope="col">Nom</th>
			      <th scope="col">Prise</th>
			      <th scope="col">Somme A verser </th>
			      <th scope="col">Somme verser </th>
			      <th scope="col">Etat Solde</th>
			      <th scope="col">Montant Solde</th>
			    </tr>
			  </thead>
			  <tbody class='Tbody'>
			  <tbody>
			</table>
			<a type="submit" name="Soumetre" class="btn btn-success  "> SOUMETRE LE FORMULAIRE </a>
		</form>
	<!-- section modal  -->
		<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h2 class="modal-title" style="text-align: center;">Creation de compt Client</h2>
	        </div>
	        <div class="modal-body">
	                <form action="#" method="post" id='formAddUser' style='margin:0 80px' >
	                <div class="row">
	                    <div class="form-group ">
	                        <label for="NomClient">Nom Client</label>
	                        <input id="NomClient" class="form-control" type="text" name="NomClient">
	                    </div>
	                    <div class="form-group ">
	                        <label for="Prix">Prix D'Achat</label>
	                        <input id="Prix" class="form-control" type="number" name="PrixClient">
	                    </div>
	                    <div class="form-group ">
	                        <label for="NomClient">Type Client</label>
	                        <select name="typeClient" id="Type" class="form-control">
	                            <option value="" >...</option>
	                            <option value="r" >Revendeur(se)</option>
	                            <option value="d" >Domicile</option>
	                        </select> 
	                    </div> 
	                    <button id="Validation" class="btn btn-success">Enregistre </button>
	                </div>
	            </form>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
			<!--  fin de la section modal-->    
		</div>
  </div>
  <script src="js/script.js"></script>
	<script type="text/javascript">
		  //FUNCTION POUR AJOUTER UN LIGNE 
		  var ajouterLigne = function (){
            arrayTab=document.getElementById('Tableau');
            var ligne=arrayTab.insertRow();
            celNom=ligne.insertCell(0);
            celNom.innerHTML+="<input type='text' placeholder='Non client'> ";
            celPrise=ligne.insertCell(1);
            celPrise.innerHTML+="<input type='text' placeholder='prise'> ";
            celSommeAVerser=ligne.insertCell(2);
            celSommeAVerser.innerHTML+="SommeAVerse";
            celSommeVerser=ligne.insertCell(3);
            celSommeVerser.innerHTML+="<input type='text' placeholder='Non client'> ";
            celEtatSolde=ligne.insertCell(4);
            celEtatSolde.innerHTML+="Etat soled";
            celSolde=ligne.insertCell(5);
            celSolde.innerHTML+="soled";
            }
	</script>
</body>
</html>