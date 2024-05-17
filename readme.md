Préparation à l'environnement de travail:



1) IDE utilisés : visual studio  et sublim text me permettant ainsi d'accomplir l'ensemble de la partie front end.


2) Serveur en local pour la partie back end xampp:  1. Accés à phpmyadmin pour la creation et la gestion des bases de donnée (en cours)
                                                    2. Serveur permettant de faire fonctionner les élements en php.

3) Realisation des wireframes avec le logiciel Figma:   1. Realisation de 3 maquettes ecran ordinateur
                                                        2. Realisation de 3 maquettes en responsive


partie Front-end:

		la partie organisationnelle:

				Les différentes pages et CSS + javascript associées: 	
													Partie header:
														page-accueil.html  -> accueil.css
														Page services.html -> pages-services.css
														Page Habitat.html  -> habitat.css
															Territoire Savanne:
																enzo.html     -> c-animaux-sav-e.css
																zebra.html    -> c-animaux-sav-z.css
																caroline.html -> c-animaux-sav-g.css
															Territoire marais:
																coco-mar.html -> c-animaux-mar-cr.css
																flavi.html    -> c-animaux-mar-fl.css
																fifi.html     -> c-animaux-mar-fi.css
															Territoire Jungle:
																flavio-jungle.html  -> c-animaux-jun-fl.css
																serpico-jungle.html -> c-animaux-jun-se.css
																dormeur-jungle.html -> c-animaux-jun-do.css
														Onglet connexion   -> connexion.php (associé bdd -> table "membres")
														Onglet contact	   -> formulaire.html -> st-formulaire.css + formulaire.js+ evenement.js

													Partie footer:
				                						mentions-legales.html    -> m-legales.css
				                						reglement-interieur.html -> reglement-interieur.css
				                						plan du site             -> null
				                						Onglet contact			 -> formulaire.html -> st-formulaire.css + formulaire.js+ evenement.js

Partie Back-end: (en cours)

	Mise en place d'une base de donnée"membres" ainsi qu'un ajout utilisateur "administrateur" a l'aide de phpmyadmin:
													Tables "espace-membres":1) veterinaire
																			2) employé
																			3) administrateur
																		 
													
													Ajout utilisateur: "administrateur" -> role-> administrateur