<?php
      //récupération de l'ID à partir de l'adresse URL
      session_start();
      $id = $_GET["id"];
      //inclusion de la connexion avec la base de données
      include "connexion.php";
      //insertion des données dans la base de données
      $stmt = $db->prepare("DELETE FROM `etudiant` WHERE `id`=?;");
      $stmt->execute([$id]);
      //redirection vers la page index.php
      header("location:acceuil.php");
?>