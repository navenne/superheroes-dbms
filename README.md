# Superheroes - DWES

## Cómo desplegar  

Añadir a _RUTA\httpd-vhosts.conf_  
```xml
    <VirtualHost *>
        DocumentRoot "_RUTA_\public"
        ServerName superheroes.local
        <Directory "_RUTA_\public">
            Options All
            AllowOverride All
            Require all granted
        </Directory>
    </VirtualHost>
```  
Añadir a fichero hosts  
127.0.0.1  superheroes.local  
  
Instalar dependencias con composer

### Base de datos de ejemplo
[bd_superheroes.sql](https://github.com/navenne/superheroes-dbms/tree/main/public/bd_superheroes.sql)  
  
### Login de usuarios para la base de datos de ejemplo
Superhéroe experto:  
 - Usuario: admin
 - Contraseña: Admin@123
Todos los usuarios tienen el mismo formato de contraseña: Nombredeusuario@123