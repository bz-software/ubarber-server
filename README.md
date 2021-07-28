<p align="center">
    <h1 align="center">bzs-salon (server-side)</h1>
</p>

Complete management system for salons. Access it on your cell phone and on your computer.
bzs-salon is the ideal system for you to manage your entire salon routine in an easy and agile way,
either on your computer or your smartphone, anytime, anywhere.

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.6.0.

CONFIGURATION
-------------

### Routing url with xampp
In ```C:\xampp\apache\conf\httpd.conf``` add the following:
```
Alias /bzs-salon-server "C:/xampp/htdocs/bzs-salon-server/web"
<Directory "C:/xampp/htdocs/bzs-salon-server/web">

    # Usa mod_rewrite para suporte a URLs amigáveis
    RewriteEngine on

    Require all granted

    RewriteBase /bzs-salon-server/

    # Se $showName for "false" no UrlManager, impede o acesso a URLs que tenham o nome do  (index.php)
    RewriteRule ^index.php/ - [L,R=404]

    # Se um arquivo ou diretório existe, usa a solicitação diretamente
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d

    # Caso contrário, redireciona para index.php
    RewriteRule . index.php

</Directory>
```

You can then access the application through the following URL:

~~~
http://localhost/bzs-salon-server/
~~~

### Routing url with yii serve
Run the following command (if you use xampp for other projects it is recommended that you use yii serve on a different port than xampp to avoid future problems):

```php yii serve --port=8012```

You can then access the application through the following URL:
~~~
http://localhost:8012/
~~~


