<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Connexion</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/public/css/style.css">
</head>
<body>
	<?php include("layouts/menu.php"); ?>

	<div class="col-lg-6">
		<div class="well bs-component">
			<?php echo form_open("user/login", array('class' => 'form-horizontal')); ?>
				<fieldset>
					<legend>Connexion</legend>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Nom d'utilisateur</label>
						<div class="col-lg-10">
							<input class="form-control" id="inputEmail" placeholder="Nom d'utilisateur" type="text" name="username">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword" class="col-lg-2 control-label">Mot de passe</label>
						<div class="col-lg-10">
							<input class="form-control" id="inputPassword" placeholder="Mot de passe" type="password" name="password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="submit" class="btn btn-primary">Connexion</button>
							<button type="reset" class="btn btn-default">Annuler</button>
						</div>
					</div>
				</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
</body>
</html>