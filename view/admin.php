<?php ob_start(); ?>

<div id="acc">
	<div class="boxConnection">
		<p>Vous êtes connecté : <span style="color: #30f451; font-weight: bold"><?php echo $user["pseudo"]; ?></span> - <a href="#">Changer le mot de passe</a> - <a href="#" id="logOut">Deconnexion</a></p>
	</div>

	<div class="title_acc" >
		<h1 style="font-size: 50px">Billet simple pour l'Alaska</h1>
	</div>
</div>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<div style="padding: 60px 0px;overflow: auto;" class="container">
	<div class="col-md-12">
		<div class="tab">
			<button class="tablinks" onclick="changeTabs(event, 'create')" id="defaultOpen">Création épisode</button>
			<button class="tablinks" onclick="changeTabs(event, 'update')" >Gestion des épisodes</button>
			<button class="tablinks" onclick="changeTabs(event, 'comment')" >Gestion des commentaires</button>
		</div>

		<div id="create" class="tabcontent">
			<p class="titleTab">Création d'un épisode</p>
			<div class="col-md-12 boxEpisodeMargin">
				<div class="row">
					<div class="col-md-12">
						<div>
							<label for="username">Titre *</label>
							<input id="title" type="text" class="form-control" >
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 boxEpisodeMargin">
				<label for="username">Descriptif *</label>
				<textarea id="text_episode" name="name" rows="8" cols="80">
				</textarea>
				<button onclick="createEpisode();" type="button" class="buttonCreateEpisode" name="button">Créer l'épisode</button>
				<div class="alert alert-success createSuccess" role="alert"></div>
				<div class="alert alert-danger createError" role="alert"></div>
			</div>

		</div>

		<div id="update" class="tabcontent">
			<p class="titleTab">Gestion des épisodes</p>
			<div class="col-md-12">
				<?php
				foreach ($episodes as $episode) {
					?>
					<div id="<?php echo $episode["id"]; ?>" class="seanceBoxModification">
						<table id="managementEpisodes">
							<thead>
								<tr>
									<th> </th>
									<th> </th>
									<th> </th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td><p class="title_episode"><span class="colorRed"><?php echo $episode["title"]; ?></span></p></td>
									<td><?php echo substr($episode["text_episode"], 0, 500).' ...';?></td>
									<td>
										<p><button data-toggle="modal" data-target=".bd-example-modal-lg" onclick="displayUpdateEpisode(<?php echo $episode["id"]; ?>)" type="button" class="buttonEditEpisode"><i class="fa fa-indent" aria-hidden="true"></i> Modifier</button> <button onclick="deleteEpisode(<?php echo $episode["id"]; ?>);" class="buttonEditEpisode" type="button"><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</button></p>
									</td>

								</tr>

							</tbody>
						</table>
					</div>
					<?php
				};
				?>
			</div>
		</div>

		<div id="comment" class="tabcontent">
			<p class="titleTab">Gestion des commentaires</p>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Pseudo</th>
						<th>Commentaire</th>
						<th>Signalement</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($comments as $comment) {
					 ?>
					<tr>
						<td><?php echo $comment["pseudo"]; ?></td>
						<td><?php echo $comment["content"]; ?></td>
						<td><?php echo $comment["report"]; ?></td>
						<td><i data-comment-id="<?php echo $comment["id"]; ?>"  class="fa fa-trash deleteComment" aria-hidden="true"></i> - <i class="fa fa-check" aria-hidden="true"></i></td>
					</tr>
					<?php
				};
					 ?>
				</tbody>
			</table>

		</div>


	</div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modification de l'épisode</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div id="updateBox" class="col-md-12">
					<div class="updateBox">
						<div class="col-md-12 boxEpisodeMargin">
							<div class="col-md-12">
								<div>
									<label for="username">Titre</label>
									<input id="update_title" type="text" class="form-control" >
								</div>
							</div>
						</div>

						<div class="col-md-12 boxEpisodeMargin">
							<label for="username">Descriptif *</label>
							<textarea id="update_text_episode" name="name" rows="8" cols="80">
							</textarea>
							<button id="buttonUpdate" type="button" class="buttonCreateEpisode" name="button">Modifier l'épisode</button>
							<div class="alert alert-success updateSuccess" role="alert"></div>
							<div class="alert alert-danger updateError" role="alert"></div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<script src="./public/js/episode.js" ></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=sy88xqa0fgls5tyqp4otmi5kt8sjcwssu5c9ijoc53yjfr9n"></script>
<script src="./public/js/tinymce.js"></script>
<script src="./public/js/tabsOpen.js"></script>

<?php $content = ob_get_clean(); ?>


<?php require('./view/template.php'); ?>
