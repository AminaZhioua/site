<?php
      //inclusion de la connexion avec la base de données
      include "connexion.php";
      session_start();
      //selection  des étudiants existant dans la base de données
      $stmt = $db->prepare("SELECT * FROM `etudiant`;");
      $stmt->execute([]);
      $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["logout"])){
            //détruire la session
            session_destroy();
            //rediriger vers la page de connexion
            header("Location:index.php");
            exit;
      }

?>
<html>
      <head>
            <title>Liste des &eacute;tudiants</title>
            <link rel="stylesheet" type="text/css" href="style.css">
      </head>
      <body>
      <header>
        
        <?php
            if(isset($erreur)){
                echo "<font color='red'>".$erreur."</font>";
            }
        ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="logout" value="true">
            <input type="submit" class="btn" value="Déconnexion">
        </form>
    </header>
            <br>
            <a href="addd.php">Ajout d'un nouvel &eacute;tudiant</a>
            <br><br><br>
            <caption>Liste des &eacute;tudiants</caption>
            <table border="1">
                  
                  <br><br><br>
                  <tr>
                        <th>ID<th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>GENRE</th>
                        <th>MODIFICATION/SUPPRISSION</th>
                  </tr>
                  <?php foreach($etudiants as $etudiant){ ?>
                  <tr>
                        <td><?php echo $etudiant["id"]; ?><td>
                        <td><?php echo $etudiant["nom"]; ?></td>
                        <td><?php echo $etudiant["prenom"]; ?></td>
                        <td><?php echo $etudiant["genre"]; ?></td>
                        <td>
                        <a href="edit.php?id=<?php echo $etudiant['id'];?>&nom=<?php echo $etudiant['nom'];?>&prenom=<?php echo $etudiant['prenom'];?>&genre=<?php echo $etudiant['genre'];?>">Modifier</a>
                        |<a href="del.php?id=<?php echo $etudiant['id'];?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer?');">Supprimer</a>
                        </td>
                  </tr>                              
                  <?php } ?>
            </table>
      </body>
</html>