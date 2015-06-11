<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Dossiers</title>
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css">
</head>
<body>
	<?php
		include("layouts/menu.php");
	?>

	<div class="col-lg-6">
		<div class="well bs-component">
			<?php echo form_open("folders/create/".$this->session->userdata('user_id'), array('class' => 'form-horizontal')); ?>
				<fieldset>
					<legend>Créer un dossier</legend>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Nom</label>
						<div class="col-lg-10">
							<input class="form-control" id="inputEmail" placeholder="Nom" type="text" name="nom">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="submit" class="btn btn-primary">Créer</button>
						</div>
					</div>
				</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
</body>
</html>