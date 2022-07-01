<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote - EvaSky</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="Assets/img/Eva3.png">
</head>
<body>
    
<nav>
        <ul>
            <li id="li1">
                <a href="index.php" >
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
                <a href="vote.php" class="actuellement">
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
            <?php 
                if (isset($_SESSION['id'])) {?>
                <li class="active">
                    <a href="profil.php?id=<?php echo $_SESSION['id'] ; ?>" id="bleu">Mon profil</a>
                </li>
            <?php }  else { ?>
                <li class="active">
                    <a href="connexion.php" id="bleu">Connexion</a>
                </li>
            <?php } ?> 
        </ul>
        <hr>
    </nav>



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