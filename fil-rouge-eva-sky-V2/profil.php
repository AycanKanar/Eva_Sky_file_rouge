<?php
session_start();
 
$bdd = new PDO("mysql:host=localhost;dbname=evasky;charset=utf8", "root", "");
 
if(isset($_POST['formmdp'])) {
    if(!empty($_POST['newmdp1']) AND !empty($_POST['newmdp2'])) {
    $mdp1 = ($_POST['newmdp1']);
    $mdp2 = ($_POST['newmdp2']);
    $ids = ($_SESSION['id']);

    if ($mdp1 === $mdp2) {
    $mdp1 = password_hash($mdp1, PASSWORD_DEFAULT);
    $insertmdp = $bdd->prepare("UPDATE membres SET mdp_user = '$mdp1' WHERE id_user = $ids");
    $insertmdp->execute([
        'mdp_user' => $mdp1
        
    ]);
    $erreur = "<span>✔ : </span> Votre mot de passe à bien été changer !";
    } else {
        $erreur = "<span>✘ Erreur : </span> Vos mots de passes ne correspondent pas !";
    }
}else {
    $erreur = "<span>✘ Erreur : </span> Remplir les champ !";
}
}

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id_user = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();

   $date = date("d/m/y à H:m",  strtotime($userinfo['date_creation'])); 

   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/26176732ce.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="Assets/img/Eva3.png">
    <title>Profil - EvaSky</title>
</head>
   <body>
   <nav>
        <ul>
            <li id="li1">
                <a href="index.php" class="actuellement">
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
            <?php 
                if (isset($_SESSION['id'])) {?>
                <li class="active">
                    <a href="profil.php?id=<?php echo $_SESSION['id'] ; ?>" id="bleu" class="actuellement">Mon profil</a>
                </li>
            <?php }  else { ?>
                <li class="active">
                    <a href="connexion.php" id="bleu">Connexion</a>
                </li>
            <?php } ?> 
        </ul>
        <hr>
    </nav>
    
      <section id="profile">
            <div>
                <img src="https://mc-heads.net/avatar/<?php echo $userinfo['pseudo_user']; ?>/40.png" alt="Profil Icon" class="avatar-lg">
                <h2>
                    Mon profil
                </h2>
            </div>

                <main>
                    <div class="tabs">
                            <div class="tab">
                                <button class="tablinks" onclick="opentab(event, 'info')" id="active">Information</button>
                                <button class="tablinks" onclick="opentab(event, 'aunt')">Autentification</button>
                                <button class="tablinks" onclick="opentab(event, 'deco')">Deconnexion</button>
                                <?php
                                    if($userinfo['role_user'] == 1){
                                        echo('<button class="admin" onclick="opentab(event, `admin`)">Admin Panel</button>');
                                    } else{
                                        echo("");
                                    }
                                ?>
                            </div>
                            <hr>

                            <div id="info" class="tabcontent">
                                <h3>
                                    Vos Information
                                </h3>
                                <div>
                                    <div>
                                        <h6>
                                            Pseudo
                                        </h6>
                                        <div>
                                            <i class="fa fa-user"></i>
                                            <input type="text" class="form-control" value="<?php echo $userinfo['pseudo_user']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div>
                                        <h6>
                                            Date de création
                                        </h6>
                                        <div>
                                            <i class="fa fa-calendar"></i>
                                            <input type="text" class="form-control" value="<?php echo $date; ?>" disabled>
                                        </div>
                                    </div>
                                    <div>
                                        <h6>
                                            Eva Points
                                        </h6>
                                        <div>
                                            <i class="fa fa-coins"></i>
                                            <input type="text" class="form-control" value="" disabled>
                                        </div>
                                    </div>
                                </div>
                            <form method="POST" action="">
                                <h3>
                                    Changer de mot de passe
                                </h3>
                                <div class="nmdp">
                                        <?php
                                            if(isset($erreur)) {
                                                echo "<div class=errr> <div class=er>".$erreur."</div> </div>";
                                            }
                                        ?>             

                                    <div>
                                        <div>
                                            <i class="fa fa-user"></i>
                                            <input type="password" class="form-control" name="newmdp1" placeholder="Mot de passes">
                                        </div>
                                        <div>
                                            <i class="fa fa-user"></i>
                                            <input type="password" class="form-control" name="newmdp2" placeholder="Confirmation">
                                        </div>
                                    </div>
                                </div>
                                    <div>
                                        <div class="envoyer">
                                            <i class="fa fa-paper-plane"></i>
                                            <input type="submit" value="ENVOYER" name="formmdp" class="envoyer1">
                                        </div>
                                    </div>
                            </form>

                            </div>

                            <div id="aunt" class="tabcontent">
                                <h3>Paris</h3>
                                <p>Paris is the capital of France.</p>
                            </div>

                            <div id="deco" class="tabcontent">
                                <div>
                                <h3>À bientôt</h3>
                                    <div class="decoo">
                                        <a href="deconnexion.php">Se déconnecter</a>
                                    </div>
                                </div>
                            </div>

                            <div id="admin" class="tabcontent">
                                <div>
                                    <div class="admin">
                                        <a href="admin.php">Admin panel</a>
                                    </div>
                            </div>
                    </div>
                </main>
            </div>
        </section>
   </body>
</html>
<?php   
}
?>
<script src="assets/js/menufade.js"></script>
