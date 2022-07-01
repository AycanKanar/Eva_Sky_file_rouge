<?php
    $bdd = new PDO("mysql:host=localhost;dbname=evasky;charset=utf8", "root", "");

    if(isset($_POST['forminscription'])) {
        $pseudo = htmlspecialchars($_POST['pseudo_user']);
        $mail = htmlspecialchars($_POST['mail_user']);
        $mdp = ($_POST['mdp_user']);
        $mdp2 = ($_POST['mdp2']);
        $role = 0;
        if(!empty($_POST['pseudo_user']) AND !empty($_POST['mail_user']) AND !empty($_POST['mdp_user']) AND !empty($_POST['mdp2'])) {
           $pseudolength = strlen($pseudo);
           if(!empty($_POST['condition'])){
            if($pseudolength <= 255) {
                    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $reqmail = $bdd->prepare("SELECT * FROM Membres WHERE mail_user = ?");
                        $reqmail->execute(array($mail));
                        $mailexist = $reqmail->rowCount();
                        if($mailexist == 0) {
                            if(filter_var($pseudo)) {
                                $reqpseudo = $bdd->prepare("SELECT * FROM Membres WHERE pseudo_user = ?");
                                $reqpseudo->execute(array($pseudo));
                                $pseudoexist = $reqpseudo->rowCount();
                                if($pseudoexist == 0) {
                                    if ($mdp === $mdp2) {
                                        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                                        $insertmbr = $bdd->prepare("INSERT INTO Membres(pseudo_user, mail_user, mdp_user, role_user) VALUES('$pseudo', '$mail', '$mdp', '$role')");
                                        $insertmbr->execute([
                                            'pseudo_user' => $pseudo,
                                            'mail_user' => $mail,
                                            'mdp_user' => $mdp,
                                            'role_user' => $role
                                        ]);
                                $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                                header("Location: index.php");
                            } else {
                                $erreur = "<span>✘ Erreur : </span> : Vos mots de passes ne correspondent pas !";
                            }
                            } else{
                                $erreur = "<span>✘ Erreur : </span> : Pseudo deja utuliser";
                            }
                            } else {
                            $erreur = "<span>✘ Erreur : </span> Adresse mail déjà utilisée !";
                            }
                        } else {
                            $erreur = "<span>✘ Erreur : </span> Votre adresse mail n'est pas valide !";
                        }
                    } else {
                        $erreur = "<span>✘ Erreur : </span> Vos adresses mail ne correspondent pas !";
                    }
                } else {
                    $erreur = "<span>✘ Erreur : </span> Votre pseudo ne doit pas dépasser 255 caractères !";
                }
                } else {
                    $erreur = "<span>✘ Erreur : </span> Vous devez accepter les Conditions Générales D’utilisation";
                }
            } else {
            $erreur = "<span>✘ Erreur : </span> Tous les champs doivent être complétés !";
            }
        }
?>
