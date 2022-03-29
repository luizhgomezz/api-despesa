



## Configurando Projeto

- .env ( as informações do mailer estão no .env.example | https://sendgrid.com/ utilizado localmente. )
- .env (  QUEUE_CONNECTION=database também setado em .env.example )
- composer install
- php artisan migrate

## Rodando Projeto

- php artisan serve
- php artisan queue:work
 
 php artisan queue:work utilizado para rodar os jobs assíncronos
