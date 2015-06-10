<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Upload</title>
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/dropzone.css">
	<script type="text/javascript" src="<?php echo base_url();?>public/js/dropzone.js"></script>
</head>
<body>
	<?php
		include("layouts/menu.php");
	?>

	<form class="dropzone" action="<?php echo base_url();?>upload/new" class="dropzone" method="post">
		<div class="fallback">
			<input name="file" type="file" multiple />
		</div>
	</form>
</body>
</html>