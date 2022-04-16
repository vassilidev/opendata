Laraval app to download, parse and show https://www.hatvp.fr/le-repertoire/ open data

Commands after clone :

``cd opendata``

``composer install``

``cp .env.exemple .env``

``php artisan key:generate``

Connect a database or sqlite and after :

``php artisan opendata:parse``

Enjoy !

**Demo** : https://laravel-opendata.herokuapp.com/
