<?php
session_start();


$bdd = new PDO ('mysql:host=127.0.0.1;dbname=espace-membres', "root", 'SiLo8387#@#@#@');

if(isset($_GET['id']) AND $_GET['id']>0)
{
    $getid = intval ($_GET['id']);
    $requser = $bdd -> prepare('SELECT * FROM membres WHERE id = ?');
    $requser -> execute(array($getid));
    $userinfo = $requser->fetch();

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
            <h2> Bienvenue au <?php echo $userinfo['pseudo']; ?></h2>
            <br/><br/>
            Pseudo= <?php echo $userinfo['pseudo']; ?>
            <br/>
            Mail= <?php echo $userinfo['mail']; ?>
            <?php
            if($userinfo['id']== $_SESSION['id'])
            {
            ?>
             <a href="#"> Editer mon profil</a> 
            }
            ?>
        </div>
    </body>
</html>
<?php
}
}
?>