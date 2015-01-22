<?php include('../public/Admin-controller.php'); 
$controller = new AdminController; 
?>
<div class="page-content-wrapper">
			<div class="page-content">
				<!-- BEGIN PAGE HEADER-->
				<h3 class="page-title">
				Syncronisation des séminaires</h3>
				<div class="clearfix">
				</div>

				<div class="button-syncro">

								<a href="index.php?action=syncro&statut=encours"><img src="../public/assets/img/icon-sync2.png" width="16px"/>Syncroniser</a>
				</div>

				<div class="message-syncro">

				<?php if (isset($_GET['statut']) && $_GET['statut']='encours') {
					$extraction = $controller->syncroSeminaire();
					}
				?>

				<?php if (isset($_GET['statut'])){ if(!empty($extraction)){ ?>
				<h4>Syncronisation réussie, <span><?php echo sizeof($extraction); ?></span> séminaires ont été ajoutés</h4>
				<?php }else{ ?>
				<h4>La syncronisation est à jour, aucun séminaire n'a été ajouté.</h4>
				
				<?php }} ?>

				</div>

				
				
	
			
			<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									</i>Liste des séminaires ajoutés 
								</div>
							</div>
							

		
				<div class="portlet-body">
					<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
								<thead>
								<tr>
									<th>
										 Date
									</th>
									<th>
										 Titre
									</th>
									<th>
										 Orateur
									</th>
									<th>
										 Lieu
									</th>
									<th>
										 Labo
									</th>
									<th>
										
									</th>
									<th>
										
									</th>
								</tr>
								</thead>
								<tbody>

									<?php foreach ($controlleur->listerSemSyn() as $val){ ?>
										
										<tr><td><?php $val->date; ?></td><tr>
                    echo '<td>'.$ligne->date.'</td>';
                    echo '<td>'.$ligne->titre.'</td>';
                    echo '<td>'.$ligne->lieu.'</td>';
                    echo '<td class="center">'.$ligne->orateur.'</td>';
                    echo '<td>'.$ligne->labo.'</td>';
                   <td><a class="edit" href="javascript:;"><i class="fa fa-edit"></i></a></td>';
                   <td><a class="delete" href="javascript:;"><i class="fa fa-trash"></i></a></td>';
            echo '<tr>';
									}
									?>


															
								</tbody>
								</table>
			</div>
		</div>
		</div>
		</div>
</div>



<!-- !! LAISSER CES 2 DIVS !!-->
</div>
</div>