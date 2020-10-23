# User login

>Un exercice très classique de création de pages d'enregistrement/login/signout d'utilisateurs, permettant d'exploiter les notions de session, redirection, lecture/écriture de fichiers et de gestion de formulaires abordées dans le cours.


:bulb: Un modèle est visible [ici](https://training-course.herokuapp.com/user-login/)

### Instructions

- Les fichiers HTML (avec les formulaires) sont déjà fournis
- Observez la structure du fichier `credentials.txt` faisant office de base de données
- Le fichier `index.php` doit permettre à l'utilisateur de se loguer, ou d'afficher un message d'erreur, si le mot de passe est erroné ou d'afficher un lien vers la page de **signup** si le mail n'a pas été trouvé
- Si la bonne correspondance mail/mot de passe est trouvée, alors une nouvelle session se créé et l'utilisateur est redirigé vers la page `success.php`, lui affichant le contenu de sa session et un lien lui proposant de se déloguer (en restant sur cette même page)
- La page d'enregistrement d'un nouvel utilisateur doit ajouter une nouvelle combinaison mail/mot de passe dans le fichier `credentials.txt` si le mail n'est pas déjà existant et afficher un lien vers la page de signin

:bulb: Indications supplémentaires

- Faites attention aux **paramètres optionnels (flags)** des fonctions `file` et `file_put_contents` qui pourraient vous être utiles pour réaliser encore plus simplement et rapidement cet exercice.
- S'il y a eu un erreur au moment de la validation des formulaires, **les valeurs des inputs saisies précédement doivent se réafficher automatiquement**


## :bulb: Comment gérer les sessions en PHP

- [session_start()](https://www.php.net/manual/fr/function.session-start.php)

### Fonctions PHP non abordées dans le cours

- [header()](https://www.php.net/manual/en/function.header) (pour faire des redirections en PHP)
- [password_hash](http://php.net/manual/en/function.password-hash.php) pour encrypter le mot de passe (avant de l'écrire dans le fichier)
- [password_verify](http://php.net/manual/en/function.password-verify.php) pour décrypter le mot de passe
- [unset()](http://php.net/manual/en/function.unset.php) pour réaliser la page de logout

