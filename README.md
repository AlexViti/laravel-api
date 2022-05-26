## Progetto laravel con login

1. Creare al cartella del progetto
1. Entrare dal terminale nella cartella
    - <code>composer create-project --prefer-dist laravel/laravel:^7.0 .</code>

1. Per Laravel < 8
    - <code>composer remove fzaninotto/faker</code>
    - <code>composer require fakerphp/faker</code>

1. Installare Laravel ui
    - <code>composer require laravel/ui:^2.4</code>
1. Installare vue con il login tramite l'ui
    - <code>php artisan ui vue --auth</code>
1. Installare se necessario altre librerie per gestione ruoli 
1. Se si vuole, installare bootstrap
    - <code>php artisan ui bootstrap</code>

1. Lanciare npm install e npm run dev
    - <code>npm install</code>
    - <code>npm run dev</code>
