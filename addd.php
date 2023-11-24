<?php
      //inclusion de la connexion avec la base de données
      include "connexion.php";
      session_start();
      //selection  des étudiants existant dans la base de données
      $stmt = $db->prepare("SELECT MAX(id) as max_id FROM `etudiant`;");
      $stmt->execute([]);
      $id_result = $stmt->fetch(PDO::FETCH_ASSOC);

      // Récupération de la valeur de l'ID
      $max_id = $id_result['max_id'];
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
            <title>Ajout d'un nouvel &eacute;tudiant</title>
            <link rel="stylesheet" type="text/css" href="style.css">
      </head>
      <body>
            <fieldset>
                  <legend>Ajout d'un nouvel &eacute;tudiant</legend>
                  <form method="POST" action="add.php">
                        <table>
                              <tr>
                                    <td><label>ID:</label></td>
                                    <td><input type="number" name="id" value="<?php echo $max_id + 1; ?>" size="8" readonly></td>
                              </tr>
                              <tr>
                                    <td><label>NOM:</label></td>
                                    <td><input type="text" name="nom" size="20" required></td>
                              </tr>
                              <tr>
                                    <td><label>PRENOM:</label></td>
                                    <td><input type="text" name="prenom" size="20" required></td>
                              </tr>
                              <tr>
                                    <td><label>GENRE:</label></td>
                                    <td>
                                          <select name="genre">
                                                <option value="MASCULIN">Masculin</option>
                                                <option value="FEMININ">Feminin</option>                                                
                                          </select>
                                    </td>
                              </tr>
                        </table>
                        <input type="submit" value="Enregister"> &nbsp;
                        <input type="reset" value="Annuler"  onclick="window.location.href='acceuil.php';">
                  </form>
            </fieldset>
      </body>
</html>