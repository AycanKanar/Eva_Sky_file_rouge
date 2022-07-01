<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - EvaSky</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="Assets/img/Eva3.png">
</head>
<body>
    
<nav>
        <ul>
            <li id="li1">
                <a href="index.php">
                    <img src="Assets/img/Eva3.png" alt="">
                    <p>Accueil</p>
                </a>
            </li>
            <li id="li2">
            </li>
            <li>
                <a href="boutique.php">
                    Boutique
                </a>
            </li>
            <li>
                <a href="vote.php">
                    Vote
                </a>
            </li>
            <li>
                <a href="forum.php">
                    Forum
                </a>
            </li>
            <li>
                <a href="reglement.php">
                    Reglement
                </a>
            </li>
            <li>
                <a href="connexion.php" id="bleu" class="actuellement">
                    Connexion
                </a>
            </li>
        </ul>
        <hr>
    </nav>

    <?php
session_start();
 
$bdd = new PDO("mysql:host=localhost;dbname=evasky;charset=utf8", "root", "");


// if(isset($_POST['formconnexion'])) {
//    $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
//    $mdpconnect = ($_POST['mdpconnect']);
//    if(!empty($pseudoconnect) AND !empty($mdpconnect)) {
//       $requser = $bdd->prepare("SELECT * FROM Membres WHERE pseudo_user = ? AND mdp_user = ?");
//       $requser->execute(array($pseudoconnect, $mdpconnect));
//       $userexist = $requser->rowCount();
//       $mdp = "mdpconnect";
//       $hash = password_hash("mdpconnect", PASSWORD_DEFAULT);
//       if (password_verify($mdp, $hash)){
//         if($userexist == 1) {
//             $userinfo = $requser->fetch();
//             $_SESSION['id_user'] = $userinfo['id_user'];
//             $_SESSION['pseudo_user'] = $userinfo['pseudo_user'];
//             $_SESSION['mail_user'] = $userinfo['mail_user'];
//             $_SESSION['connecté']=1;
//             header("Location: profil.php?id=".$_SESSION['id_user']);
//         } else {
//             $erreur = "Mauvais mail ou mot de passe !";
//         }
//     } else {
//         $erreur = "Tous les champs doivent être complétés !";
//     }
//    }
// }
if(isset($_POST['formconnexion'])) {
    $stmt = $bdd->prepare("SELECT * from membres where pseudo_user = :pseudo_user");
	$stmt->bindValue('pseudo_user', $_POST['pseudoconnect']);
	$stmt->execute();
	$account = $stmt->fetch(PDO::FETCH_OBJ);
        if($account != NULL AND !empty($_POST['mdpconnect'])) {
            if (password_verify($_POST['mdpconnect'], $account->mdp_user)){
                $_SESSION['id'] = $account->id_user;
                header("Location: index.php?id=".$_SESSION['id']);
            } else {
                $erreur = '<span>✘ Erreur : </span> Mauvais pseudo ou mot de passe !';
            }
        } else {
            $erreur = '<span>✘ Erreur : </span> Tous les champs doivent être complétés !';
        }
    }
?>
    
    <section id="sectionconnexion">
        <div id="connexion">
            <h1>
                Connecter vous
            </h1>
            <p>
                Entrez vos informations pour vous connecter.
            </p>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>
                        <?php
                                if(isset($erreur)) {
                                    echo "<div class=errreur> <div class=err>".$erreur."</div> </div>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="pseudoconnect" id="pseudo" type="text" size="30" placeholder="Entrez votre Pseudo" class="inp"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="mdpconnect" id="password" type="password" size="30" placeholder="Entrez votre Mot De Passe" class="inp"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input id="c1" type="checkbox" name="rememberme">
                            <label for="c1">Se souvenir de moi</label>
                        </td>
                        </td>
                        <td>
                            <a href="" class="mdpoublier">Vous avez oublié votre mot de passe ?</a>
                        </td>
                        <td>
                            <input type="submit" value="Connexion" alt="Submit" name="formconnexion" title="Connexion" id="btnconnexion"/>
                        </td>
                        <td>
                            <p>Vous n'avez pas de compte ? <a href="inscription.php" class="inscrire">S'inscrire</a></p>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="souspagediv">
            <img src="assets/img/eva3.png" alt="">
            <p class="souspage">
                Si vous aussi vous cherchez un serveur avec une multitude d'ajouts, plusieurs événements chaque jour, une progression basée sur le farming, des centaines de Quêtes uniques pour obtenir des récompenses, une multitude de classements ... et bien plus vous attendent sur notre plateforme !
            </p>
        </div>
    </section>


    <footer>
        <div>
            <div>
                <h1>
                    A PROPOS
                </h1>
                <p>
                    Le serveur Eva Sky n'est pas affilié à mojang AB.
                </p>
                <a href="reglement.php">Condition générales de vente</a>
                <a href="reglement.php">Mention légales</a>
            </div>
            <div>
                <h1>
                    LIENS UTILES
                </h1>
                <a href="Acueil.php">Acueil</a>
                <hr>
                <a href="Forum.php">Forum</a>
                <hr>
                <a href="Boutique.php">Boutique</a>
            </div>
            <div>
                <h1>
                    NOUS SUPPORTER   
                </h1>
                <p>
                    En soutenant le serveur, vous permettez le développement d'un meilleurs serveurs et de nouvelle maps! <span>Merci à vous !</span>
                </p>

            </div>
        </div>
        <hr>
        <div>
            <h2>
                Eva Sky 2022
            </h2>
        </div>
    </footer>
</body>
</html>