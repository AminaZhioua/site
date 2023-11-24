<?php
      //récupération des valeurs saisies dans le formulaire
      session_start();
      $id = $_POST["id"];
      $nom = $_POST["nom"];
      $prenom = $_POST["prenom"];
      $genre = $_POST["genre"];
      //inclusion de la connexion avec la base de données
      include "connexion.php";
      //insertion des données dans la base de données
      $stmt = $db->prepare("UPDATE `etudiant` SET `nom`=?,`prenom`=?,`genre`=? WHERE `id`=?;");
      $stmt->execute([$nom,$prenom,$genre,$id]);
      //redirection vers la page index.php
      header("location:acceuil.php");
?>