# Despliegue en Apache (halloween.dev)

## 1. Instalar Apache y PHP (Ubuntu o Kali)
```
sudo apt update
sudo apt install apache2 php libapache2-mod-php
```

## 2. Carpetas y página "Próximamente"
```
sudo mkdir -p /var/www/halloween.dev/public_html
sudo cp proximamente.html /var/www/halloween.dev/public_html/index.html
sudo cp -r css img /var/www/halloween.dev/public_html/
```
`proximamente.html` usa `css/estilos.css`, por eso se copia también la carpeta `css`.

## 3. Permisos
```
sudo chown -R www-data:www-data /var/www/halloween.dev
sudo find /var/www/halloween.dev -type d -exec chmod 755 {} \;
sudo find /var/www/halloween.dev -type f -exec chmod 644 {} \;
```
Carpetas 755 y archivos 644: Apache lee, pero nadie de fuera escribe.

## 4. Virtual Host
```
sudo cp halloween.dev.conf /etc/apache2/sites-available/halloween.dev.conf
```

## 5. Activar el sitio
```
sudo a2ensite halloween.dev.conf
sudo apache2ctl configtest
sudo systemctl restart apache2
```

## 6. Archivo hosts
Añadir esta línea en `/etc/hosts` (en Windows: `C:\Windows\System32\drivers\etc\hosts`):
```
127.0.0.1   halloween.dev
```
Ahora `http://halloween.dev` abre la página de "Próximamente".

## 7. Subir la web completa
Cuando esté lista, se copia todo el contenido de la carpeta `halloween` (menos `docs` y `despliegue`) a `public_html` y se cambia `index.html` por el de la web.

## 8. Correo (PHPMailer + Brevo)
El formulario de `correo.php` envía el correo con PHPMailer (ya está en la carpeta `PHPMailer`) y el servidor SMTP de Brevo. No hace falta tocar `sendmail.ini` ni `php.ini`.
1. Crea una cuenta en Brevo y genera una clave SMTP.
2. En `correo.php` pon esa clave en `$correo->Password` (ahora está el texto `CLAVE SSH`). La clave real no se sube a GitHub ni se deja en el zip que se entrega.
3. El remitente (`setFrom`) tiene que ser un remitente verificado en Brevo.
4. El destino (`addAddress`) es el correo de Jack.
5. El ordenador necesita internet para llegar a `smtp-relay.brevo.com` por el puerto 587.

Si el envío falla, la web lo avisa en rojo y no se rompe.

## 9. Con XAMPP en Windows
Si no se usa Linux, también vale XAMPP:
1. Copia la carpeta de la web dentro de `C:\xampp\htdocs`.
2. Añade `127.0.0.1   halloween.dev` al archivo `hosts` (abriendo el Bloc de notas como administrador).
3. En `C:\xampp\apache\conf\extra\httpd-vhosts.conf` añade un VirtualHost con `ServerName halloween.dev` y `DocumentRoot` apuntando a la carpeta de la web (con barras `/`).
4. Reinicia Apache desde el panel de XAMPP y abre `http://halloween.dev`.
