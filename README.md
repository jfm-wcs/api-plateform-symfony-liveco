# API plateform - Live coding 11/02/2022

## Ressources
https://api-platform.com/  
https://www.php.net/  
https://symfony.com/  
https://getcomposer.org/

## Config
Faire une copie du fichier `.env` en  `.env.local` et renseigner les identifiants `db_user`, `db_password` et `db_name` pour la connexion BDD (`ligne 26`).

Installer php et composer pour pouvoir lancer les commandes suivantes.  
## Installer les dépendances
```bash
composer intall
```
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

## Démarrer le server

```bash
php -S localhost:8000 -t public
```

Accéder à l'api via `http://localhost:8000/api`.
