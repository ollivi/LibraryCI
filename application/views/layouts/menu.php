	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<h1 class="nav navbar-nav navbar-left">Bienvenue
			<?php
				if($this->session->userdata('logged') == true)
				{
					echo $this->session->userdata('username');
				}
			?>
			</h1>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url(); ?>">Accueil</a></li>

				<?php
					if($this->session->userdata('logged') == false)
					{
						echo '<li><a href="'.base_url("connexion").'">Connexion</a></li>';
					}
					else
					{
						echo '<li><a href="'.base_url("upload/").'">Upload</a></li>';
						echo '<li><a href="'.base_url("files/".$this->session->userdata('username')."").'">Fichiers</a></li>';
						echo '<li><a href="'.base_url("folders/".$this->session->userdata('username')."").'">Dossiers</a></li>';
						echo '<li><a href="'.base_url("profile/".$this->session->userdata('username')."").'">Profile</a></li>';
						echo '<li>' . anchor('user/logout', 'Déconnexion') . '</li>';
					}
				?>

				<?php
					if($this->session->userdata('logged') == false)
					{
						echo '<li><a href="'.base_url("inscription").'">Inscription</a></li>';
					}
				?>
			</ul>
		</div>
	</nav>