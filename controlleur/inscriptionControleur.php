<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
    <title>Document</title>
</head>
<body>


<?php
include('../class/ajax.php');

?>



<?php
include('../module/inscriptionModule.php');
include('../view/inscriptionView.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $email=$_POST["email"];
    $naissance=$_POST["naissance"];
    $op=$_POST["op"];
    $niveau=$_POST["niveau"];
    $etablissement=$_POST["etablissement"];
    $diplome=$_POST["diplome"];
    $photo=$_FILES["photo"];
    $cv=$_FILES["cv"];
    $log=$_POST["log"];
    $mdp=$_POST["mdp"];
   
    
    
    $insc=new inscriptionmodule($nom,$prenom,$email,$naissance,$diplome,$niveau,$etablissement,'src/img/'.$photo['name'].'','src/img/'.$cv['name'].'',$log,$mdp);
    
    if($op=="Bac+2"){
        $insc->insert("etud3a");

        move_uploaded_file($photo["tmp_name"], '../src/img/'.$photo['name'].'');

        
        
        
    }elseif($op=="Bac+3"){
        $insc->insert("etud4a");

        move_uploaded_file($photo["tmp_name"], '../src/img/'.$photo['name'].'');
        
    }
    
    else{
        echo "<h1>echec INT</h1>";
    }
    }

?>

</body>
</html>