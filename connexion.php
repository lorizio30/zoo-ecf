<?php
session_start();


$bdd = new PDO ('mysql:host=127.0.0.1;dbname=espace-membres', "root", 'SiLo8387#@#@#@');

if(isset($_POST['formconnexion']))

{   if (isset($_POST['mailconnect']) && isset($_POST['mdpconnect'])){
    echo 'Bonjour'.' '.$_POST['mailconnect'].'!';
}
    $mailconnect= htmlspecialchars($_POST['mailconnect']);
    $mdpconnect= sha1($_POST['mdpconnect']);
    
    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser= $bdd->prepare("SELECT * FROM membres WHERE mail= ? AND motdepasse = ?"); 
        $requser-> execute(array($mailconnect,$mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            header('Location: page-accueil.html ');

        }
        else
        {
           $erreur = "mot de passe ou mail erroné !";
        }

    }
    else
    {
        $erreur= "Tous les champs doivent être complétés!";
    }

}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <div align="center">
        <h2> Connexion</h2>
        <br><br>
        <form method="POST" action="">
           <input type="email" name="mailconnect" placeholder="Mail"/>
           <input type="Password" name="mdpconnect" placeholder="Mot de passe"/>
           <input type="submit" name="formconnexion" value="Se connecter !" />
            
        </form>
       <?php
            if(isset($erreur))
            {

                echo '<font color="red">' .$erreur;
            }
       ?>
    </div>
    
</body>
</html>