
# Инструкции по установке

## Быстрая установка.

    git clone https://github.com/vollva4/diplom.git

    cd diplom

    composer install

    Переименовать файл .env.example в .env, настроить его под свою среду

    php artisan migrate

    php artisan db:seed

    По умолчанию создан пользователь с именем admin@ad.com и паролем admin
