<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/public/css/style.css">
	<script type="text/javascript" src="<?php echo base_url();?>/public/js/jquery.js"></script>
</head>
<body>
	<?php include("layouts/menu.php"); ?>

	<div class="col-lg-6">
		<div class="well bs-component">
			<?php echo form_open("user/register", array('class' => 'form-horizontal')); ?>
				<fieldset>
					<legend>Inscription</legend>
					<div class="form-group">
					<div class="error"></div>
						<label class="col-lg-2 control-label">Nom d'utilisateur</label>
						<div class="col-lg-10">
							<input class="form-control" placeholder="Nom d'utilisateur" type="text" name="username">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Mot de passe</label>
						<div class="col-lg-10">
							<input class="form-control" placeholder="Mot de passe" type="password" name="password">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword" class="col-lg-2 control-label">Confirmer</label>
						<div class="col-lg-10">
							<input class="form-control" id="inputPassword" placeholder="Confirmer mot de passe" type="password" name="password_conf">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-10">
							<input class="form-control" id="inputEmail" placeholder="Email" type="text" name="email">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Nom</label>
						<div class="col-lg-10">
							<input class="form-control" placeholder="Nom" type="text" name="nom">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Prénom</label>
						<div class="col-lg-10">
							<input class="form-control" placeholder="Prénom" type="text" name="prenom">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="button" class="btn btn-primary" id="send">Valider</button>
							<button type="reset" class="btn btn-default">Annuler</button>
						</div>
					</div>
				</fieldset>
			<?php echo form_close(); ?>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url();?>/public/js/form_check.js"></script>
</body>
</html>