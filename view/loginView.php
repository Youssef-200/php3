
<?php

include('../class/form.php');
include('../class/style.php');

?>

<style>
    
<?php
include('loginViewStyle.php');

?>
</style>

<?php

echo'<form class="container-sm" method="post" enctype="multipart/form-data">';
echo '<h1>LOG-IN</h1>';
$f=new form();


$log=$f->input('text','log','',"input1");
$mdp=$f->input('password','mdp','',"input1");


echo $log;
echo $mdp;




$sub=$f->submit('sub','LOGIN','','log');
echo $sub;

echo '</form>';




?>

