<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - EvaSky</title>
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
    include ('php/function.php');
    ?>

    <section id="sectioninscription">
        <div id="inscription">
            <h1>
                Inscrivez vous
            </h1>
            <p>
                Entrez vos informations pour vous inscrire.
            </p>
            <form method="POST" action="" >
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
                            <input name="pseudo_user" id="pseudouser" type="text" size="30" placeholder="Entrez votre Pseudo" class="inp"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="mail_user" id="mailuser" type="mail" size="30" placeholder="Entrez votre adresse mail" class="inp"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="mdp_user" id="mdpuser" type="password" size="30" placeholder="Entrez votre Mot De Passe" class="inp"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="mdp2" id="mdp_2" type="password" size="30" placeholder="Confirmez votre Mot De Passe" class="inp"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input id="c1" type="checkbox" name="condition">
                        <label for="c1">Accepter les <a href="Regles.php" class="inscrire">conditions</a></label>
                        </td>
                        <td>
                            <input type="submit" name="forminscription" value="Inscription" id="btnconnexion"/>
                        </td>
                        <td>
                            <p>Vous avez déjà un compte ? <a href="connexion.php" class="inscrire">Ce connecter</a></p>
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