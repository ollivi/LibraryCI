<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/public/css/style.css">
</head>
<body>
	<?php
		include("layouts/menu.php");
	?>
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">Informations de compte</div>
			<div class="panel-body">
				<p>Nom d'utilisateur: <?php echo $info[0]->username; ?></p>
				<br />
				<p>Email: <?php echo $info[0]->email; ?></p>
				<br />
				<p>Nom: <?php echo $info[0]->nom; ?></p>
				<br />
				<p>Prénom: <?php echo $info[0]->prenom; ?></p>
				<br />
				<?php echo form_open("user/showupdate/".$this->session->userdata('username').""); ?>
					<button type="submit" class="btn btn-primary">Modifier</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</body>
</html>