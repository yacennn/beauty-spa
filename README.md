# Beauty Spa — Application Laravel complète

Site public (Products / Blog / Contact) + Dashboard d'administration
(Gestion des Produits, du Blog et des Messages de contact).

## Démarrage rapide

Prérequis : PHP >= 8.2 et Composer installés.

```bash
# 1. Installer les dépendances (la seule étape qui demande internet)
composer install

# 2. Créer les tables + le compte admin + les données de démo
php artisan migrate --seed

# 3. Lien pour les images uploadées
php artisan storage:link

# 4. Lancer le serveur
php artisan serve
```

Puis ouvrir http://127.0.0.1:8000

## Compte administrateur par défaut

| Email | Mot de passe |
|-------|--------------|
| admin@beautyspa.com | password |

Connexion via http://127.0.0.1:8000/login → redirection vers `/admin`.

## URLs

| Page | URL |
|------|-----|
| Site public — Produits | `/produits` |
| Site public — Blog | `/blog` |
| Site public — Contact | `/contact` |
| Connexion admin | `/login` |
| Dashboard admin | `/admin` |
| Admin produits | `/admin/produits` |
| Admin blog | `/admin/articles` |
| Admin messages | `/admin/messages` |

## Notes techniques

- Base de données : SQLite par défaut (fichier `database/database.sqlite`,
  aucune configuration nécessaire). Pour MySQL, modifier `.env`
  (DB_CONNECTION=mysql + identifiants) puis relancer `php artisan migrate --seed`.
- Le fichier `.env` est déjà fourni avec une APP_KEY générée.
- Authentification simple intégrée (AuthController + middleware `auth`),
  aucun package supplémentaire requis.
- CRUD complet Produits/Articles avec upload et remplacement d'image,
  validation serveur, CSRF, Route Model Binding.
- Le formulaire public de la page Contact alimente la table `messages`,
  consultable depuis le dashboard.
