git pull origin develop
npm i
npm run build
php bin/console cache:clear
php bin/console doctrine:migrations:migrate
git push