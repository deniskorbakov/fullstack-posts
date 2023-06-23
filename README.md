### Запуск проекта:

___

#### back:

* в папке infra запустить ``docker-compose up -d``
* прописать команду для входа в контейнер ``docker exec -it app bash``
* внутри контейнера прописать:
    * ``php artisan key:generate``
    * ``php artisan config:cache``
    * ``php artisan migrate``
    * ``php artisan db:seed``

### front:

* в папке infra прописать ``docker logs front``
* перейти по Network - откроется прокет на vue js

___

### Swagger - [перейти](http://localhost:8876/api/doc)
