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