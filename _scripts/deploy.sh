git pull origin develop
npm i
npm run build
node _scripts/version_update.js
php bin/console cache:clear
php bin/console doctrine:migrations:migrate
git push