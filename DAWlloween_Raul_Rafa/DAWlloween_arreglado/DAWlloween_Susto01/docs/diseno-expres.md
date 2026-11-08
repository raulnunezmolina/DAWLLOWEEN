# Labelling y Sitemap · Toons de Pesadilla

## Sitemap
```
intro.html (portada con el vídeo, solo la primera vez)
   └─→ index.html (Inicio)
          ├─→ recetas.html
          ├─→ juego.html
          ├─→ aboutus.html
          ├─→ correo.php (hay que haber iniciado sesión)
          └─→ login.php
                 ├─→ altaUsuario.php  ─→ login.php
                 ├─→ cambioPass.php   ─→ login.php
                 └─→ panel.php (se llega al hacer login)
                        ├─→ juego.html / recetas.html / aboutus.html
                        ├─→ correo.php
                        └─→ logout.php ─→ login.php
```

## Labelling (nombres de menú)
- Menú: Inicio · Recetas · Juego · Quiénes somos · Contacto · Login
- Botones: Abrir el expediente, Saltar intro, Jugar al Juego, Login / Acceso, Ver receta, Ocultar receta, Empezar a Jugar, Jugar otra vez, Registrarse, Restablecer Contraseña, Enviar Mensaje, Cerrar Sesión.

## Diseño en Figma
https://www.figma.com/design/phq44noXnA1Dqp0xwObQOz/DAWLLOWEEN?node-id=0-1&t=HvS1pCZwcnAnjQap-1

## Paleta (4 colores)
- Carbón `#0B0B0C`: fondo.
- Papel viejo `#E4DCC8`: hojas, tarjetas y texto sobre fondo oscuro.
- Rojo sangre `#B3122B`: sellos, pestaña Login, marco de la receta TOP.
- Verde tóxico `#8DFF2E`: cámara de vigilancia, fantasma tóxico y foco del teclado.

## Tipografías (Google Fonts)
- Special Elite (máquina de escribir): títulos, botones y menú.
- Permanent Marker (rotulador): notas a mano y nombres de las fotos.
- Source Sans 3: textos largos, porque se lee bien.

## Componentes
- **Pestañas de carpeta**: la activa se ve entera y las demás apagadas. Al pasar el ratón suben un poco.
- **Botones**: rectángulos oscuros que se levantan y se ponen rojos al pasar el ratón.
- **Fotos polaroid**: en blanco y negro, con cinta. Al pasar el ratón recuperan el color.
- **Tarjetas de receta**: hoja de cuaderno. La TOP lleva marco rojo y sello.
- **Texto censurado**: barra negra que se lee al pasar el ratón.
- **Hoja de formulario**: papel con campos grandes y mensajes de error en rojo.

## IPO
- Menú siempre en el mismo sitio y la página actual marcada.
- Botones de al menos 44 px para tocar con el dedo.
- Botones para quitar los sustos y el sonido en la portada.
- Mensajes de error claros en los formularios.
- Se ve bien en móvil y se puede usar con teclado.
