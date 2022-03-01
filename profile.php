<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php
	$title = 'Mon profil';
	include('includes/head.php');
	?>
	<body>

		<?php include('includes/header.php'); ?>

		<main>
			<div class="container">
			<?php include('includes/message.php'); ?>

				<?php
				if(isset($_SESSION['email'])){
					
					include('includes/db.php');

					// récupérer les infos de l'utilisateur
					$q = 'SELECT email, image FROM users WHERE email = :email';

					$req = $bdd->prepare($q);
					$req->execute([
						'email' => $_SESSION['email']
					]);

					$user = $req->fetch(PDO::FETCH_ASSOC); // Récupération du premier résultat

					

					// Affichage de l'email
					echo '<p>Email : ' . $user['email'] . '</p>';

					// Affichage de l'image de profil
					echo '<img src="uploads/' . $user['image'] . '" alt="Image de profil" width="200" height="300">';

							}elseif(isset($_SESSION['email_doctor'])){

								include('includes/db.php');

								// récupérer les infos de l'utilisateur
								$q = 'SELECT email_doctor, image_doctor FROM doctor WHERE email_doctor = :email_doctor';

								$req = $bdd->prepare($q);
								$req->execute([
									'email_doctor' => $_SESSION['email_doctor']
								]);

								$user = $req->fetch(PDO::FETCH_ASSOC); // Récupération du premier résultat

								

								// Affichage de l'email
								echo '<p>Email : ' . $user['email_doctor'] . '</p>';

								// Affichage de l'image de profil
								echo '<img src="uploads/' . $user['image_doctor'] . '" alt="Image de profil">';

					}else{
					echo '<p>Utilisateur introuvable !</p>';
				}
				?>
			</div>
		</main>

		<?php include('includes/footer.php'); ?>

	</body>
</html>