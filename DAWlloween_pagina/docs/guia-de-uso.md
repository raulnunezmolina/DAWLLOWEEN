# Guía de uso · Toons de Pesadilla

Esta guía está pensada para que cualquiera pueda usar la web, aunque no sepa de informática.

## Cómo entrar
Abre la dirección de la web en el navegador (por ejemplo `http://halloween.dev`). Lo primero que verás es la portada, que parece una carpeta de un archivo policial. Si no lo tienes configurado te tendrás que instalar xamp, meter el documento en hdocs y abrirlo en Localhost.

## El menú
Arriba hay cinco pestañas. Haz clic en la que quieras:
- **Inicio**: la portada, con los personajes desaparecidos, unas recetas, el juego y quiénes somos.
- **Recetas**: las recetas de Halloween en tarjetas.
- **Juego**: el minijuego "Aplasta fantasmas".
- **Quiénes somos**: quién ha hecho la web.
- **Entrar** (la roja): para iniciar sesión.

## Los sustos
De vez en cuando, y sin avisar, aparece una cara a pantalla completa con un grito. Dura unos dos segundos y se va sola. No pasa nada, es parte de la web.
- Arriba del todo hay dos botones: **Sonido** (quita o pone el grito) y **Sustos** (los desactiva del todo).
- El susto no suena hasta que has hecho clic en la página, es una norma de los navegadores.
- Si pulsas **Abrir el expediente** en la portada, el susto salta al momento.
- Para usar un grito real, guarda un archivo con el nombre `grito.mp3` dentro de la carpeta `audio`.

## Elementos escondidos
- En la portada hay palabras tapadas con una barra negra. Pasa el ratón por encima (o pulsa con el tabulador) y se leen.
- Al pasar el ratón por una foto de "Los desaparecidos", la foto recupera el color y se hace un poco más grande.

## Recetas
Cada tarjeta es una receta. Pulsa **Ver receta** y se abren los ingredientes y los pasos. Pulsa **Cerrar receta** para esconderlos. La tarjeta con el marco rojo y la calavera es la receta TOP.

## El juego: Aplasta fantasmas
1. Entra en **Juego** y pulsa **Jugar**.
2. Salen personajes de nueve tumbas. Haz clic (o toca con el dedo) para aplastarlos antes de que se escondan. También se puede jugar con el teclado: tabulador para moverte e Intro o espacio para golpear.
3. Tienes 30 segundos.
   - Fantasma blanco: +1 punto.
   - Fantasma verde: +3 puntos
   - Murciélago: -3 puntos
4. Al acabar verás tu puntuación y se guarda tu récord en el navegador.
5. El botón **Sonido** del juego quita o pone los sonidos.

## Entrar con tu usuario
Pulsa **Entrar**.
- **Ya tengo usuario**: escribe tu usuario y tu contraseña. Si te equivocas, la web te avisa.
- **Registrar usuario**: rellena usuario, contraseña (mínimo 6 caracteres), correo y la respuesta a la pregunta de seguridad. Después ya puedes entrar.
- **Cambiar contraseña**: escribe tu usuario, la respuesta a la pregunta de seguridad y la contraseña nueva.
- Usuarios de prueba: `admin` / `usuario`.

Importante: los usuarios nuevos se guardan en la sesión del navegador, así que si cierras el navegador se pierden.

## Panel y mensaje a Jack
Al entrar llegas a un panel con todas las funciones. En **Escribir a Jack** pones un asunto y cuentas tu peor pesadilla. El correo sale con tu dirección como remitente. Para salir, pulsa **Salir**.

## Si algo falla
- No se oye el susto: haz clic primero en la página y comprueba que el botón de sonido está activado.
- No se envía el correo: hay que configurar `sendmail.ini` y `php.ini` en XAMPP .
