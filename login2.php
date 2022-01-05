<?php
session_start();
$nom = 'Younes';
$psw = 'younes';
?>
<?php
$data = [
    'host' => 'localhost',
    'database' => 'bd_gsb',
    'user' => 'root',
    'password' => '',
];
function getPDO(array $data): PDO
{
    try {
        $bdd = new PDO(
            'mysql:host=' . $data['host'] . ';dbname=' . $data['database'] . ';charset=utf8',
            $data['user'],
            $data['password']
        );
        return $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
$nom = '';
$password = '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="Connexion.png">
    <link rel="stylesheet" type="text/css" href="login2.css">
    <title>Connexion</title>
</head>
<body>

    <img src="GSB.png" height="150" whidth="175" class="img_titre">
    <p class="titre">Interface gestion frais GSB</p><img src="GSB.png" height="150" whidth="175" class="img_titre">

    <div class="sous-titre">Saisissez vos identifiants et accédez à vos fonctions</div>
    <?php   // Vérification que les deux champs sont bons //
    if (!isset($_POST['nom']) && isset($_POST['psw'])) :
    ?>

        <?php   // Si non connecté //
        if ($_POST['nom'] == $nom && $_POST['psw'] == $password) {
            $_SESSION['user'] = $nom;
            $_SESSION['role'] = 'admin';
            echo "<center>";
            echo "<h2>Bienvenue </h2> $nom";
            echo "</center>";
        } else {
            echo "<em>Vous</em>";
            echo "<a href='login.php'>Revenir à l'accueil</a>";
        }
    else :
        ?>
        <div style="width: 48.4%" id="connexion">
            <center>
                <form name="connexion" method="post" action="user_page.php">
                    <div class="user">Connexion visiteur</div>
                    <div class="identifiant_user">Identifiant : </div><input type="text" class="identifiant_user" name="nom_user" placeholder="Saisir votre identifiant"><br><br>
                    <div class="mdp_user">Mot de passe : </div><input type="password" class="mdp_user" name="mdp_user" placeholder="Saisir votre mot de passe"><br>
                    <input type="submit" name="send" value="Connexion" class="btn_connexion">
                </form>
            </center>
        </div>
        <div style="width: 48.4%" id="connexion">
            <center>
                <form name="connexion" method="post" action="admin_page.php">
                    <div class="admin">Connexion comptable</div>
                    <div class="identifiant_admin">Identifiant : </div><input type="text" class="identifiant_admin" name="nom_admin" placeholder="Saisir votre identifiant"><br><br>
                    <div class="mdp_admin">Mot de passe : </div><input type="password" class="mdp_admin" name="mdp_admin" placeholder="Saisir votre mot de passe"><br>
                    <input type="submit" name="send" value="Connexion" class="btn_connexion">
                </form>
            </center>
        </div>

    <?php
    endif;
    ?>

</body>

</html>