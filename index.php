<?php



   // $id=@mysqli_connect("localhost",'root' ,'','base') or die ("Erreur de connexion");

   
/*$servername='Localhost';
$username='root';
$password='';
$dbname='base';


try {
    $connect= new PDO('mysql:host=Localhost;dbname=base;charset=utf8', 'root','');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   

    echo"La connexion a echoué:" .$e->getMessage();
    
}*/


try {
    $access=new pdo("mysql:host=localhost;dbname=;charset=utf8", "root", "");
    
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) 
{
$e->getMessage();
}


   








if(isset($_POST['valider']))
  {
  	if(isset($_POST['name'])  AND isset($_POST['username'])   AND isset($_POST['contact']) AND isset($_POST['email']))
  	{
  		if(!empty($_POST['name']) AND      !empty($_POST['username']) AND !empty($_POST['contact'])   AND !empty($_POST['email']))
  		{
            $name = htmlspecialchars(strip_tags($_POST['name'])) ;
            $username = htmlspecialchars(strip_tags($_POST['username'])) ;
           $phone = htmlspecialchars(strip_tags($_POST['contact'])) ;
           $email = htmlspecialchars(strip_tags($_POST['email'])) ;

          /* $erreur="";


           if(isset($_POST['valider'])){

            if(empty($name)) $erreur="  <li> Veuillez mettre un nom!     <li>";
            if(empty($username)) $erreur="  <li> Veuillez ajouter votre prenom!     <li>";
            if(empty($phone)) $erreur="  <li> Veuillez ajouter votre contact!     <li>";
            if(empty($email)) $erreur="  <li> Veuillez ajouter votre Email !     <li>";*/


           // mysqli_query($id,"insert into participant(name,username,phone,email) Values"(:name , ));

           $req = $access->prepare("INSERT INTO participant(name, username, contact, email) VALUES (?, ?, ?, ?)");

           $req->execute(array($name, $username, $phone, $email));
         

           echo 'Profil enregistré!';
       






           }
        }else{

            die ( 'Le formulaire est incomplet!');
        }
    
    
    
    
    
    }



       /*$nomMess = $emailMess = $numTelMess =  $userMess = '';
          if(!preg_match("#^[a-zA-Z]+$#", $name)){
        	//die( 'Format de nom invalide !!');
         	}
      

    if(!preg_match("#^0[67][0-9]{8}$#", $phone)){
    	$numTelMess = 'Format de numTel invalide !!';
    	}

        var_dump($Post);  


    //verifier email


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

            die('adresse email est incorrect!');

         }





        }

        

    }else{

        die ( 'Le formulaire est incomplet!');
    }



  }*/






           ?>

<?php

//verifier si les champs ne sont pas vide

   $name= $username = $phone=$email='';

	if($_SERVER['REQUEST_METHOD'] == "post"){
			if(empty($_POST['name'])){
			$name = '<span class="erreur">Le nom est requis !!</span>';
			}
	     	if(empty($_POST['username'])){
			$username = '<span class="erreur">Le prenom est requis !!</span>';
			}
			if(empty($_POST['contact'])){
			$phone = '<span class="erreur">Le numero de fone est requis !!</span>';
		}

        if(empty($_POST['email'])){
			$email = '<span class="erreur">Le numero de fone est requis !!</span>';
		}




		 }

        ?>
        



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title"> Simplon Cote d'Ivoire</h3>
          <p class="text">
            Bienvenue sur la plateforme d'enregistrement des Participants à la formation de 
            Simplon Cote d'ivoire.
          </p>

          <div class="info">
            <div class="information">
              <img src="img/lieu.png" class="icon" alt="" />
              <p>Riviera Palmeraie, Carrefour Guiro</p>
            </div>
            <div class="information">
              <img src="img/icon8.png" class="icon" alt="" />
              <p>wmanzan.ext@simplon.co</p>
            </div>
            <div class="information">
              <img src="img/phone1.png" class="icon" alt="" />
              <p>+2250503382155</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connecter avec:</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="" method="POST" autocomplete="off">
            <h3 class="title"> Profil</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" id="name" required />
              <label for="">Nom Participant</label>
              
              <span>name</span>
              <?php echo $name; ?>






            </div>

            <div class="input-container">
              <input type="text" name="username" class="input" id="username" required/>
              <label for="">Prenom Participant</label>
            
              <span>username</span>
              <?php echo $username; ?>
            </div>


             <div class="input-container">
              <input type="number" name="contact"  class="input" id="contact" required/>
              <label for="">Contact</label>
              <span>Phone</span>

              <?php echo $phone; ?>




            </div>
            





            <div class="input-container">
              <input type="email" name="email" class="input" id="email" required/>
              <label for="">Email</label>
              <span>Email</span>
              <?php echo $email; ?>
            </div>


           
            

            <input type="submit" value="Send" name="valider" class="btn" />
          </form>

         <div class="els"><p> Liste des participants<a href="action.php">CLIQUER ICI</a></p></div>


        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
