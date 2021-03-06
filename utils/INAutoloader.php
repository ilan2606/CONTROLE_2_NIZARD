<?php


/**
 *Classe qui permet de charger dynamiquement les classes
 *@author Ilan Nizard
 *
 */
class Autoloader
{
  /**
   *
   *Fonction qui gère l'autoload
   */
  static function register()
  {
    spl_autoload_register(array(__CLASS__, 'autoload'));
  }

  /**
   *
   *Fonction qui vérifie si la classe est présente dans le fichier utils ou model
   *puis charge la bonne classe
   */
  static function autoload($maClasse)
  {
    $chemin = 'utils/'.$maClasse.'.php';

    /**
     *
     *Vérification de l'exsitance de la classe
     */
    if (file_exists($chemin))
    {
      require $maClasse.'.php';
    }
    else
    {
      if (file_exists("../".$chemin))
      {
        require "../utils/".$maClasse.'.php';
      }
      else
      {
        require '../model/'.$maClasse.'.php';
      }
    }

  }
}




?>
