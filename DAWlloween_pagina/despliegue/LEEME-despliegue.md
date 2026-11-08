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

## 8. Correo con XAMPP (Yahoo)
1. Crea una cuenta de Yahoo y genera una contraseña de aplicación en https://login.yahoo.com/myaccount/security/
2. Copia antes `sendmail.ini` y `php.ini` para tener los originales.
3. En `xampp/sendmail/sendmail.ini`:
```
smtp_server=smtp.mail.yahoo.com
smtp_port=587
auth_username=TU_CORREO@yahoo.com
auth_password=TU_CONTRASEÑA_DE_APLICACION
```
4. En `xampp/php/php.ini`:
```
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
```
5. Cambia `DESTINO_JACK` en `VarGlobales.php` por el correo de Yahoo del grupo.
6. Reinicia Apache desde el panel de XAMPP.

Yahoo suele obligar a que el remitente sea la cuenta autenticada. Si rechaza el correo, el mensaje de error de la web saldrá igualmente controlado.
