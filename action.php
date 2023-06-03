<?php



/*try {
    $access=new pdo("mysql:host=localhost;dbname=base;charset=utf8", "root", "");
    
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) 
{
$e->getMessage();
}*/

$base1=@mysqli_connect("localhost","root","","base")or die("Erreur de connexion");








?>






<!Doctype html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liste des Participants</title>
    <link rel="stylesheet" href="style1.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
 

  <h1> LA LISTE DES PARTICIPANTS</h1>
  
  <table>
    <thead>   
    <tr>
        <th>Identifiant</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Action</th>

    </tr>

    </thead>

    <?php 

    $bdd=mysqli_query($base1,"SELECT*FROM participant");

    while($res=mysqli_fetch_array($bdd)){



    
    ?>
    <tbody>

   
    <tr>

    <td> <?php   echo $res["id"]   ;   ?> </td>
    <td> <?php   echo $res["name"]   ;   ?> </td>
    <td> <?php   echo $res["username"]   ;   ?> </td>
    <td> <?php   echo $res["contact"]   ;   ?> </td>
    <td> <?php   echo $res["email"]   ;   ?> </td>

   <td>

   <form action="" method="POST">

   <input type="hidden" value=" <?php     echo $res ["id"]; ?>"  />
   <input type="submit"  value="INFOS" />





   </form>




   </td>





    </tr>

    </tbody>


    <?php 




}

?>



 <tfoot>
    <tr>
        <td colspan="7">
          
         Liste des Participants présents 




        </td>




    </tr>





 </tfoot>


  </table>
    



  <script src="app.js"></script>


  </body>












</html>
