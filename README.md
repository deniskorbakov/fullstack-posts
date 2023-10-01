### Запуск проекта:

___

#### back:
* создать файл .env из .env.example
* в env вставить эти строки 
  ``DB_CONNECTION=mysql
  DB_HOST=db
  DB_PORT=3306
  DB_DATABASE=laravel
  DB_USERNAME=root
  DB_PASSWORD=root`` 
* в папке infra запустить ``docker-compose up -d``
* прописать команду для входа в контейнер ``docker exec -it app bash``
* внутри контейнера прописать:
    * ``composer install``
    * ``php artisan key:generate``
    * ``php artisan config:cache``
    * ``php artisan migrate``
    * ``php artisan db:seed``

### front:

* в папке infra прописать ``docker logs front``
* перейти по Network - откроется прокет на vue js

___

### Swagger - [перейти](http://localhost:8876/api/doc)
