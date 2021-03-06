<?php

// Si l'email n'est pas vide, enregistrer cet email dans un cookie
if(isset($_POST['email_doctor']) && !empty($_POST['email_doctor'])){
	setcookie('email_doctor', $_POST['email_doctor'], time() + (24 * 60 * 60));
}

// Si email ou password vide > redirection vers le formulaire
if(!isset($_POST['email_doctor']) || empty($_POST['email_doctor']) || !isset($_POST['password_doctor']) || empty($_POST['password_doctor'])){
	// Rediriger vers la page inscription avec une erreur
	header('location:inscription.php?message=Vous devez remplir les 2 champs.&type=danger');
	exit;
}

// Si email invalide > redirection vers le formulaire
if(!filter_var($_POST['email_doctor'], FILTER_VALIDATE_EMAIL)){
	// Rediriger vers la page inscription avec une erreur
	header('location:inscription.php?message=Email invalide.&type=danger');
	exit;
}

// Si l'email n'est pas déjà pris

include('includes/db.php');

$q = 'SELECT id_doctor FROM doctor WHERE email_doctor = ?';
$req = $bdd->prepare($q);
$req->execute([$_POST['email_doctor']]);

$result = $req->fetch(); // Récupérer la premiere ligne de résultat (renvoie false si rien de trouvé)

if($result !== false){
	// Rediriger vers la page inscription avec une erreur
	header('location:inscription.php?message=Email déjà utilisé.&type=danger');
	exit;
}

// Prise en charge du fichier uploadé

// Si un fichier a été uploadé
if(isset($_FILES['image_doctor']) && !empty($_FILES['image_doctor']['name'])){

	// Vérifier le type de fichier

	// Tableau des types de fichier admis
	$acceptable = [
		'image/jpeg',
		'image/png',
		'image/gif'
	];

	if(!in_array($_FILES['image_doctor']['type'], $acceptable)){
		// Pas le bon type, redirection
		header('location:inscription.php?message=Le fichier n\'est pas du bon type. Bien essayé :)&type=danger');
		exit;
	}

	
	// Vérifier la taille du fichier

	$maxSize = 2 * 1024 * 1024; // 2Mo

	if($_FILES['image_doctor']['size'] > $maxSize){
		// Fichier trop lourd, redirection
		header('location:inscription.php?message=Le fichier est trop lourd.&type=danger');
		exit;
	}


	// Déplacer le fichier vers son emplacement définitif

	// Créer un dossier uploads s'il n'existe pas
	$path = 'uploads';
	if(!file_exists($path)){
		mkdir($path, 0777); 
	}

	$filename = $_FILES['image_doctor']['name']; // Récupérer le nom original


	// créer un nom de fichier selon le modele 'image-XXX.ext' où XXX est le timestamp du moment de l'enregistrement et ext l'extension du fichier.

	// Récupérer l'extension
	$array = explode('.', $filename); // image.php.gif => ['image', 'php', 'gif'];
	$extension = end($array);
	
	$filename = 'image-' . time() . '.' . $extension; // Note : risque de doublon si 2 fichiers avec la même extension uploadés dans la même seconde !!
	


	$destination = $path . '/' . $filename; // Le chemin où le fichier sera enregistré

	move_uploaded_file($_FILES['image_doctor']['tmp_name'], $destination); // Déplacement vers la destibnation finale.

}

// Insertion d'un nouvel utilisateur

// Requête créée à partir des données utilisateur concaténées : Attention, danger d'injection SQL !!
// On le fait une seule et unique fois (pour tester)
//$q = 'INSERT INTO users (email, password) VALUES ("' . $_POST['email'] . '", "' . $_POST['password'] . '")';
// Exécution de la requête
//$reponse = $bdd->exec($q);   // renvoie le nb de lignes affectées par la requête


// SOLUTION SECURISEE : Requête préparée
//$q = 'INSERT INTO users (email, password) VALUES (?, ?)';
//$req = $bdd->prepare($q); // Création de la requête préparée

// Exécuter la requête préparée en passant un tableau de valeurs
//$reponse = $req->execute([$_POST['email'], $_POST['password']]); // renvoie un booléen
$q = 'INSERT INTO doctor (email_doctor, password_doctor, image_doctor) VALUES (:email_doctor , :password_doctor , :image_doctor )';
$req = $bdd->prepare($q); // Création de la requête préparée

// Exécuter la requête préparée en passant un tableau de valeurs
$reponse = $req->execute([
	'email_doctor' => $_POST['email_doctor'],
	'password_doctor' => hash('sha256', $_POST['password_doctor']),	 // hacher le password avec du sha256
	'image_doctor' => isset($filename) ? $filename : ''
]);



if($reponse){
	// L'insertion s'est bien passée
	// Rediriger vers la page d'accueil avec un message
	header('location:index.php?message=Compte créé avec succès doctor.&type=success');
	exit;
}else{
	// Rediriger vers la page inscription avec une erreur
	header('location:inscription.php?message=Erreur lors de la création du compte.&type=danger');
	exit;
}














