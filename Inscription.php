<?php

$bdd = new PDO ('mysql:host=127.0.0.1;dbname=espace-membres', "root", 'SiLo8387#@#@#@');

if (isset ($_POST['forminscription'])) 
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail= htmlspecialchars($_POST['mail']);
	$mail2= htmlspecialchars($_POST['mail2']);
	$mdp= sha1($_POST['mdp']);
	$mdp2= sha1($_POST['mdp2']);

	if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) 
	{
		$pseudolength= strlen($pseudo);
		if($pseudolength <= 255)
		{
			if($mail==$mail2)
			{
				if(filter_var($mail, FILTER_VALIDATE_EMAIL))
				{
					$reqmail=$bdd->prepare("SELECT * FROM membres WHERE mail =?");
					$reqmail->execute(array($mail));
					$mailexist = $reqmail->rowCount();
						if($mailexist == 0)
						{



							if($mdp==$mdp2)
							{
								$insertmbr = $bdd->prepare ("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?,?,?) ");
								$insertmbr->execute(array($pseudo, $mail, $mdp));
								$_SESSION['comptecree'] = " Votre compte à bien été crée !";
								header('Location: page-accueil.html ');
							}
							else
							{
								$erreur= "Vos mots de passes ne correspondent pas !!!";
							}
						}
						else
						{
							$erreur = "Adresse mail déjà utilisée !";
						}
				}
				else
				{
					$erreur ="Votre adresse mail n'est pas valide !";
				}	
			}
				else
			{
				$erreur="Vos adresses mail ne correspondent pas !";
			}
		}
			else
			{
				$erreur= "Votre pseudo ne doit pas dépasser 255 caractères !!!";
			}
		}
		else
		{
			$erreur = "Tous les champs doivent être complétés !!!";
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
        <h2> Inscription</h2>
        <br><br>
        <form method="POST" action="">
            <table >
               <tr>
                    <td align="right">
                        <label for="pseudo"> Votre pseudo: </label>
                     </td>
                     <td >
                        <input placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo;} ?>" />
                     </td>
                </tr>
                <tr>
                     <td align="right" >
                        <label for="mail">Mail: 
                        </label>
                    </td>
                    <td>
                        <input type="email" placeholder="mail" id="mail" name="mail"/>
                    </td>

                </tr> 
                <tr>
                    <td align="right">
                       <label for="mail2">Confirmation du mail:</label>
                   </td>
                   <td>
                       <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2"  value="<?php if(isset($mail2)) { echo $mail2;} ?>"/>
                   </td>

               </tr>
               <tr>
                    <td align="right">
                        <label for="mdp">Mot de passe:</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="mdp2">Confirmation du mot de passe:</label>
                    </td> 
                    <td>
                        <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2"/>
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    
                    <td>
                        <br/>
                        <input type="submit" name="forminscription" value="Je m'inscris"/>
                    </td>
                </tr>    
            </table>
            <br/>
            
        </form>
        <?php

        	if (isset($erreur))

        		echo $erreur;

        ?>   
    </div>
    
</body>
</html>