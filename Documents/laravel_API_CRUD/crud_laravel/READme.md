# Documentation de l'API Persona

## Introduction

Cette API permet de gérer les personas dans une base de données. Elle inclut des opérations CRUD (Create, Read, Update, Delete) pour interagir avec les informations des personas.

Les informations sont stockées dans une base de données MySQL avec une table `personas` contenant les champs suivants :

- `nom`: Le nom de la persona.
- `prenom`: Le prénom de la persona.
- `age`: L'âge de la persona.
- `email`: L'email de la persona (doit être unique).
- `telephone`: Le numéro de téléphone de la persona (doit être unique).

## Endpoints API

### 1. Créer une nouvelle persona (POST)

**URL**: `POST http://localhost:8000/api/personas`

**Corps de la requête (JSON)** :
```json
{
  "nom": "Alice",
  "prenom": "Dupont",
  "age": 30,
  "email": "alice.dupont@example.com",
  "telephone": "1234567890"
}

#
Réponse:

Code : 201
Corps de la réponse :
json
  "message": "Persona créée avec succès!",
  "data": {
    "id": 1,
    "nom": "Alice",
    "prenom": "Dupont",
    "age": 30,
    "email": "alice.dupont@example.com",
    "telephone": "1234567890",
    "created_at": "2024-11-10T17:31:31",
    "updated_at": "2024-11-10T17:31:31"
  }
}
#
2. Lire toutes les personas (GET)
URL: GET http://localhost:8000/api/personas

Réponse:

Code : 200
Corps de la réponse :

[
  {
    "id": 1,
    "nom": "Alice",
    "prenom": "Dupont",
    "age": 30,
    "email": "alice.dupont@example.com",
    "telephone": "1234567890",
    "created_at": "2024-11-10T17:31:31",
    "updated_at": "2024-11-10T17:31:31"
  },
  ...
]
3. Lire une persona spécifique (GET)
URL: GET http://localhost:8000/api/personas/{id}

Réponse:

Code : 200
Corps de la réponse :
json

{
  "id": 1,
  "nom": "Alice",
  "prenom": "Dupont",
  "age": 30,
  "email": "alice.dupont@example.com",
  "telephone": "1234567890",
  "created_at": "2024-11-10T17:31:31",
  "updated_at": "2024-11-10T17:31:31"
}
4. Mettre à jour une persona (PUT)
URL: PUT http://localhost:8000/api/personas/{id}

Corps de la requête (JSON) :

json

{
  "nom": "Alice",
  "prenom": "Dupont",
  "age": 31,
  "email": "alice.dupont@example.com",
  "telephone": "0987654321"
}
Réponse:

Code : 200
Corps de la réponse :
json

{
  "message": "Persona mise à jour avec succès!",
  "data": {
    "id": 1,
    "nom": "Alice",
    "prenom": "Dupont",
    "age": 31,
    "email": "alice.dupont@example.com",
    "telephone": "0987654321",
    "created_at": "2024-11-10T17:31:31",
    "updated_at": "2024-11-10T18:00:00"
  }
}
5. Supprimer une persona (DELETE)
URL: DELETE http://localhost:8000/api/personas/{id}

Réponse:

Code : 200
Corps de la réponse :
json

{
  "message": "Persona supprimée avec succès!"
}
Tester l'API avec Postman
Pour tester les endpoints de l'API, vous pouvez importer la collection Postman suivante dans votre application Postman.

Collection Postman: Cliquez ici pour importer la collection

Ouvrez Postman.
Allez dans l'onglet "Collections".
Cliquez sur "Import".
Sélectionnez "Link" et collez le lien suivant : https://documenter.getpostman.com/view/39627073/2sAY52dL5o
Cliquez sur "Continue", puis sur "Import".
Vous pouvez maintenant tester les différentes requêtes API.
Installation
Clonez le dépôt :

git clone https://votre-repository.git
Allez dans le répertoire du projet :

cd votre-repository
Installez les dépendances :

composer install
Configurez votre base de données dans le fichier .env :
makefile

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_votre_base_de_donnees
DB_USERNAME=votre_nom_utilisateur
DB_PASSWORD=votre_mot_de_passe
Exécutez les migrations pour créer la table personas :

php artisan migrate
Lancez le serveur local pour tester l'API :

php artisan serve
Vous pouvez maintenant accéder à l'API à l'adresse http://localhost:8000.

Conclusion
Cette API vous permet de gérer les personas facilement via des requêtes HTTP standard. Vous pouvez tester les fonctionnalités avec Postman pour valider les opérations CRUD.