
<?php

include('../class/form.php');
include('../class/style.php');

?>

<style>
    
<?php
include('inscriptionViewStyle.php');

?>
</style>

<?php

echo'<form class="container-sm" method="post" action="inscriptionControleur.php" enctype="multipart/form-data">';
echo '<h1>INSCRIPTION</h1>';
$f=new form();

$nom=$f->input('text','nom','',"input1");
$prenom=$f->input('text','prenom','',"input1");
$email=$f->input('email','email','',"input1");
$naissance=$f->input('text','naissance','',"input1");
$Bac2=$f->option('Bac+2','',"input1");
$Bac3=$f->option('Bac+3','',"input1");
$niveau=$f->input('text','niveau','',"input1");
$diplome=$f->input('text','diplome','',"input1");
$etbalissement=$f->input('text','etablissement','',"input1");
$photo=$f->input('file','photo','',"input1");
$cv=$f->input('file','cv','',"input1");
$log=$f->input('text','log','',"input1");
$mdp=$f->input('password','mdp','',"input1");

echo $nom;
echo $prenom;
echo $email;
echo $naissance;
echo '<select  class="form-select input1" name="op"  aria-label="Default select example">';
echo $Bac2;
echo $Bac3;
echo '</select>';
echo $niveau;
echo $etbalissement;
echo $diplome;
echo $photo;
echo $cv;
echo $log;
echo $mdp;




$sub=$f->submit('sub','INSCRIPTION','','log');
echo $sub;

echo '</form>';




?>

