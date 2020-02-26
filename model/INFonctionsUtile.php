<?php

/**
 *Classe de fonction utiles
 *@author Ilan Nizard
 *
 */
  class fonctionsUtils
  {

    /**Fonction qui établie la connexion avec la base de données*/
    static function activerConnexion()
    {
      if (file_exists('utils/autoloader.php'))
      {
        require 'utils/autoloader.php';
      }
      else
      {
        if (file_exists('../utils/autoloader.php'))
        {
          require '../utils/autoloader.php';
        }
      }

      Autoloader::register();
      $dbh = Connexion::seConnecter();
      $cnx = $dbh->getCnx();

      return $cnx;
    }
/** Verifie si le token est bon*/
    static function verifToken($token)
    {
      if (isset($token) AND isset($_SESSION['token']))
      {
        if ($token != $_SESSION['token'])
        {
          $chemin = "../controller/c_connexion.php";

          if (file_exists($chemin))
          {
            session_destroy();
            header("Location: ../connexion");
          }
          else
          {
            $chemin = "controller/c_connexion.php";

            if (file_exists($chemin))
            {
              session_destroy();
              header("Location: connexion");
            }
          }
        }
      }
    }

    /**vérifie l'existence d'un id sur une table, renvoie true si trouvé et false au cas contraire*/
    static function verifId($cnx, $id, $table, $champs)
    {
      $selectId = $cnx->prepare("SELECT $champs FROM $table WHERE $champs = $id");
      $selectId->execute();
      $leId = $selectId->fetch();

      if (isset($leId[0]))
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

  }
?>
