<?php

include("PDO.php");

$conn=new PDO1();
$conn->creatDB('concours');
$info='id INT PRIMARY KEY,nom VARCHAR(255),prenom VARCHAR(255),email VARCHAR(255),naissance VARCHAR(255),diplome VARCHAR(255),niveau INT,etbalissement VARCHAR(255),photo VARCHAR(255),cv VARCHAR(255),log VARCHAR(255),mdp VARCHAR(255)';
$conn->CreatTable('etud3a',$info);
$conn->CreatTable('etud4a',$info);
$conn->close();

?>

