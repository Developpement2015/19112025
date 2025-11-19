But: Instructions pour tester le module "demandes" (formulaire + approbation 3 niveaux)

1) Installer dépendances (si nécessaire)

   composer install

2) Générer l'autoload (si vous avez ajouté des seeders)

   composer dump-autoload

3) Exécuter les migrations

   php artisan migrate

4) Seed minimal (rôles + comptes test)

   php artisan db:seed --class=Database\\Seeders\\RolesAndUsersSeeder

   Comptes créés (mot de passe par défaut: `password`):
   - resp1@example.test (role: responsable1)
   - resp2@example.test (role: responsable2)
   - resp3@example.test (role: responsable3)
   - user3@example.test (role: utilisateur3)

5) Démarrer le serveur et tester

   php artisan serve

   - Soumettre une demande (publique): http://127.0.0.1:8000/demandes/create
   - Consulter ses demandes (publique): http://127.0.0.1:8000/demandes/mine
   - Lister toutes les demandes (nécessite login): http://127.0.0.1:8000/demandes

6) Flux d'approbation

   - Connectez-vous avec resp1@example.test, approuvez une demande → approval_level=1
   - Connectez-vous avec resp2@example.test, approuvez → approval_level=2
   - Connectez-vous avec resp3@example.test, approuvez → approval_level=3 et status="approved"
   - Un administrateur (ou resp3 si vous lui avez donné le droit) peut ensuite créer une décision via le bouton "Décider".

7) Captcha

   - Un captcha math simple a été ajouté (stocké en session) sur le formulaire public. Pour un captcha plus robuste, fournir des clés reCAPTCHA et je l'intègre.

8) Notes complémentaires

   - Les routes d'approbation/décision sont protégées par le middleware Spatie `role:`.
   - Si vous voulez que j'exécute les migrations et seeds pour vous ici, dites "Exécuter migrations et seed".

