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
                    

                            ?>
                    <body>
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <div class="col-8 m-4">
                                <form action="contact.php" method="POST">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <h1>Take appointment </h1>
                                        </div>
                                        <div class="d-flex">
                                            <input type="text" name="surname" placeholder="Nom" autocomplete="off" class="form-control"/>
                                            <input type="text" name="firstname" placeholder="Prénom" autocomplete="off" class="form-control"/>
                                        </div>
                                        </br>
                                        <input type="text" name="type" placeholder="Type of dog" autocomplete="off" class="form-control"/>
                                        </br>   
                                        <input type="number" name="age" placeholder="your age" class="form-control" id="tentacles" name="tentacles"
                                                                     min="1" max="100">       
                                        <br/>
                                        <input type="datetime-local" class="form-control" name="date1" min="<?= date('Y-m-d H:i:s'); ?>">
                                        
                                        <br/>
                                        <select class="form-select" name="select" aria-label="Default select example">
                                        
                                        <option value="fine">fine</option>
                                        <option value="sick">sick</option>
                                        <option value="Urgent">Urgent</option>
                                        </select>
                                         </br>
                                        <input type="email" name="_email" placeholder="From Email" autocomplete="off" class="form-control"/>
                                        <br/>
                                        <input type="email" name="__email" placeholder="To Email doctor " autocomplete="off" class="form-control"/>
                                        <br/>
                                        <textarea rows="10" name="message" placeholder="Describe your dog and the reason for the medical appointment" class="form-control"></textarea>
                                        <br/>
                                        <button type="submit" class="btn btn-lg btn-primary">Envoyer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            
                    <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                  </body>

                  <?php
                     
                       

					
                    
                  
				
                                    }elseif(isset($_SESSION['email_doctor'])){
                                        include('includes/db.php');

					
                    
                   
                                        $recupUsers = $bdd->query('select * from users'); 
                                         while ($user = $recupUsers->fetch()){
                                             ?>
                                                   <p><?= $user['email']; ?> <a href="profil.php?id=<?= $user['id']; ?>" style="color:blue;text-decoration:none;">Profil utilisateur
                                    </a>
                                   
                                    
                                    <?php 
                                         }



                    }else{
                        echo '<p>Utilisateur introuvable !</p>';
                    }
				
				?>
			</div>
		</main>

		<?php include('includes/footer.php'); ?>

	</body>
</html>