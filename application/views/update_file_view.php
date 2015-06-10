<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Mis à jour de fichier</title>
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css">
</head>
<body>
	<?php
		include("layouts/menu.php");
	?>

	<div class="col-lg-6">
		<div class="well bs-component">
			<?php echo form_open("files/change/".$this->session->userdata('user_id')."/".$id, array('class' => 'form-horizontal')); ?>
				<fieldset>
					<legend>Modifier ce fichier</legend>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Nom</label>
						<div class="col-lg-10">
							<input class="form-control" id="inputEmail" placeholder="Nom" type="text" name="nom">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="submit" class="btn btn-primary">Modifier</button>
						</div>
					</div>
				</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="well bs-component">
			<?php echo form_open("files/delete/".$this->session->userdata('user_id')."/".$id, array('class' => 'form-horizontal')); ?>
				<fieldset>
					<legend>Supprimer ce fichier</legend>
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="submit" class="btn btn-default">Supprimer</button>
						</div>
					</div>
				</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
</body>
</html>