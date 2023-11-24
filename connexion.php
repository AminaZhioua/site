<?php
      //configuration de la base de données
      $serveur = "localhost";
      $base = "glsi22";
      $utilisateur = "root";
      $motdepasse ="";

      try{
            //création de l'instance de PDO
            $db = new PDO("mysql:host=$serveur;dbname=$base",$utilisateur,$motdepasse);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $ex){
            echo "Echec de connexion ".$ex->getMessage();
      }
?>