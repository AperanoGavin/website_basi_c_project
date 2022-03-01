<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container">
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNavDropdown">
	      <ul class="navbar-nav">
			  
	      	<li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
			<?php
			if(isset($_SESSION['email'])){
				// L'utilisateur est connecté

				echo '<li class="nav-item"><a class="nav-link" href="profile.php">Mon profil</a></li>';
				echo '<li class="nav-item"><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>';
				echo '<li class="nav-item"><a class="nav-link" href="appointment.php">Rendez-vous</a></li>';

			}elseif(isset($_SESSION['email_doctor'])){
				echo '<li class="nav-item"><a class="nav-link" href="profile.php">Mon profil</a></li>';
				echo '<li class="nav-item"><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>';
				

			}else{
				echo '<li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>';
				echo '<li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li>';
			}
			?>
	      </ul>
	    </div>
	  </div>
	</nav>
</header>