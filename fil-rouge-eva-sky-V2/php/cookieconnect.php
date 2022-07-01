<?php
if(!isset($_SESSION['id_user']) AND isset($_COOKIE['pseudo_user'],$_COOKIE['mdp_user']) AND !empty($_COOKIE['mdp_user']) AND !empty($_COOKIE['mdp_user'])) {
   $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo_user = ? AND mdp_user = ?");
   $requser->execute(array($_COOKIE['pseudo_user'], $_COOKIE['mdp_user']));
   $userexist = $requser->rowCount();
   if($userexist == 1)
   {
      $userinfo = $requser->fetch();
      $_SESSION['id_user'] = $userinfo['id_user'];
      $_SESSION['pseudo_user'] = $userinfo['pseudo_user'];
      $_SESSION['mail_user'] = $userinfo['mail_user'];
   }
}
?>