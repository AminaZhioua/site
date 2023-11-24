<?php
    session_start();
      //récupération des valeurs saisies de l'adresse URL
      $id = $_GET["id"];
      $nom = $_GET["nom"];
      $prenom = $_GET["prenom"];
      $genre = $_GET["genre"];
?>

<html>
      <head>
            <title>Modification d'un  &eacute;tudiant</title>
            <link rel="stylesheet" type="text/css" href="style.css">
      </head>
      <body>
            <fieldset>
                  <legend>Modification d'un  &eacute;tudiant</legend>
                  <form method="POST" action="t_edit.php">
                        <input type="hidden" name ="id" value="<?php echo $id; ?>">
                        <table>
                              <tr>
                                    <td><label>ID:</label></td>
                                    <td><input type="number" value="<?php echo $id; ?>"  size="8" disabled></td>
                              </tr>
                              <tr>
                                    <td><label>NOM:</label></td>
                                    <td><input type="text" value="<?php echo $nom; ?>" name="nom" size="20" required></td>
                              </tr>
                              <tr>
                                    <td><label>PRENOM:</label></td>
                                    <td><input type="text" value="<?php echo $prenom; ?>" name="prenom" size="20" required></td>
                              </tr>
                              <tr>
                                    <td><label>GENRE:</label></td>
                                    <td>
                                          <select name="genre">
                                                <?php if(strcmp($genre,"MASCULIN")==0){?>
                                                      <option value="MASCULIN" selected>Masculin</option>
                                                <?php }else{?>
                                                      <option value="MASCULIN">Masculin</option>
                                                <?php }
                                                      if(strcmp($genre,"FEMININ")==0){?>
                                                      <option value="FEMININ" selected>Feminin</option>
                                                <?php }else{?>
                                                      <option value="FEMININ">Feminin</option>
                                                <?php }?>                                                
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