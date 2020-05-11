<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	<meta charset="utf-8" />
	<title> Projet Dev Web </title>
</head>


<body>


															<!--PAGE D ACCEUIL HTML -->	
		
			<!--PARTIE HEAD DE PAGES D ACCUEIL-->

			<div class=" header"> 

					<div class=" headText container-fluid row ">

						<h1 class="logo col-md-8">
						E-shoes
						</h1>
						
						<a class="btn btn-sm btn-outline-light col-md-1" href='../connexion/connexion.php' target="_BLANK" >Connexion </a>
						<a class="btn btn-sm btn-outline-light col-md-1" href='../inscription/inscription.php' target="_BLANK" >Inscription</a>
						<a class="btn btn-sm btn-outline-light col-md-1" href='https://www.google.fr/' target="_BLANK" >Boutique </a>	

					</div>

					<div class="headSlogan container-fluid row ">
						<h1>
							<b>Find yours</b> 
						</h1>
					</div>
		
			</div>



			<!--PARTIE FIL D ACTUALITE DE PAGES D ACCUEIL-->

			

																				<!--     FILTRE     -->




<form method='POST' action=''>									<!--FILTRE TABLEAU  | OK FONCTIONNE | -->
			   <table class=" filtre table table-bordered col-md-2">             

						  <thead>
						    <tr>
						      <th scope="col">Filtres</th>
						    </tr>
						  </thead>


						  <tbody>
						  	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						    <tr>						 
						     	 <td>
							      		  <div class="panel panel-default">

										    <div class="panel-heading" role="tab" id="headingOne">
										      <h4 class="panel-title">
										        <button type="button" class="btn btn-outline-dark" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										          Genres
										        </button>
										      </h4>
										    </div>

										    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											    <ul class="list-group">
												          <li class="list-group-item"> <input type='checkbox' name='Hommes' value='on' unchecked> Hommes</li>
												          <li class="list-group-item"> <input type='checkbox' name='Femmes' value='on' unchecked> Femmes</li>
												          <li class="list-group-item"> <input type='checkbox' name='Enfants' value='on' unchecked> Enfants</li>
											    </ul>
										
										    </div>

									    </div>
								</td>				
						    </tr>

						    <tr>
						        <td>
								      	<div class="panel panel-default">

												    <div class="panel-heading" role="tab" id="headingTwo">
												      <h4 class="panel-title">
												        <button type="button" class="collapsed btn btn-outline-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												          Prix
												        </button>
												      </h4>
												    </div>


												    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
											    		   <ul class="list-group">
												          <li class="list-group-item"> <input type='checkbox' name='PrixC' value='on' unchecked> Croissants</li>
												          <li class="list-group-item"> <input type='checkbox' name='PrixD' value='on' unchecked> Décroissants</li>
											  			  </ul>
												    </div>

										  </div>
						        </td>
						    </tr>

						    <tr>
						    	<td>
						    			<div class="panel panel-default">

												    <div class="panel-heading" role="tab" id="headingThree">
												      <h4 class="panel-title">
												        <button type="button" class="collapsed btn btn-outline-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												          Tailles
												        </button>
												      </h4>
												    </div>
										  

													  <div id="collapseThree" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingThree">
														    		   <ul class="list-group">
															          <li class="list-group-item"> <input type='checkbox' name='40' value='on' unchecked> 40</li>
															          <li class="list-group-item"> <input type='checkbox' name='41' value='on' unchecked> 41</li>
															          <li class="list-group-item"> <input type='checkbox' name='42' value='on' unchecked> 42</li>
														  			  </ul>
													  </div>

										</div>
								</td>
						    	 
						    </tr>
						    <tr>
						    	<td>
						    		<input type="submit" name="submitFiltre" value="submit" class="btn btn-outline-dark">
						    	</td>
						    </tr>
						  
					     </div>	
					</tbody>
				 </table>                                 			 
</form>


				<?php                             //RECUPERATION DE FILTRES ACTIVES PAR PHP SOUS FORME FORMULAIRE SUBMIT | OK FONCTIONNE |

						if (isset($_POST['submitFiltre'])) {

								
								if (isset($_POST['Hommes'])) {
									echo "Hommes<br/>";
										} 
								
								if (isset($_POST['Femmes']) ) {
											echo "Femmes<br/>";
										} 

								if (isset($_POST['Enfants'])) {
											echo "Enfants<br/>";
										}
 
								
								if (isset($_POST['PrixC'])) {
									echo "PrixC<br/>";
										} 
								
								if (isset($_POST['PrixD']) ) {
											echo "PrixD<br/>";
										} 

								
								if (isset($_POST['40'])) {
									echo "40<br/>";
										} 
								
								if (isset($_POST['41']) ) {
											echo "41<br/>";
										} 

								if (isset($_POST['42'])) {
											echo "42<br/>";
										}
							}

				?>                                                        <!--OK | OK TOUT FONCTIONNE POUR LE FILTRE |-->



												<!--SEARCH BAR -->

			<nav class="navbar navbar-light bg-light justify-content-between">
			  <form class="form-inline">
			    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			  </form>
			</nav>










</body>


</html>

