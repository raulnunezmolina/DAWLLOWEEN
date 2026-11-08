# Guía de uso · Toons de Pesadilla

Esta guía está pensada para que cualquiera pueda usar la web, aunque no sepa de informática.

## Cómo entrar
Abre la dirección de la web en el navegador (por ejemplo `http://halloween.dev`). Lo primero que verás es una pantalla negra con el botón **Abrir el expediente**. Al pulsarlo se reproduce un vídeo de introducción; si no quieres verlo, pulsa **Saltar intro** abajo a la derecha. Después llegas a la portada, que parece una carpeta de un archivo policial. La intro solo sale la primera vez que entras en cada sesión del navegador.

Si no tienes la web configurada en tu ordenador, tendrás que instalar XAMPP, copiar la carpeta de la web dentro de `htdocs` y abrirla desde `localhost`.

## El menú
Arriba hay seis pestañas. Haz clic en la que quieras:
- **Inicio**: la portada, con los personajes desaparecidos.
- **Recetas**: las recetas de Halloween en tarjetas.
- **Juego**: el minijuego "Aplasta fantasmas".
- **Quiénes somos**: quién ha hecho la web.
- **Contacto**: para escribir un mensaje a Jack. Hay que haber iniciado sesión.
- **Login** (la roja): para iniciar sesión.

## Los sustos
De vez en cuando, y sin avisar, aparece una cara a pantalla completa con un grito. Dura unos dos segundos y se va sola. No pasa nada, es parte de la web.
- Arriba del todo de la portada hay dos botones: **Sonido** (quita o pone el grito) y **Sustos** (los desactiva del todo).
- Los sustos empiezan unos segundos después de hacer el primer clic en la portada. Es una norma de los navegadores: no dejan sonar nada hasta que el usuario hace clic.

## Elementos escondidos
- En la portada hay palabras tapadas con una barra negra. Pasa el ratón por encima (o pulsa con el tabulador) y se leen.
- Al pasar el ratón por una foto de "Los desaparecidos", la foto recupera el color y se hace un poco más grande.

## Recetas
Cada tarjeta es una receta. Pulsa **Ver receta** y se abren los ingredientes y los pasos. Pulsa **Ocultar receta** para esconderlos. Las tarjetas con el marco rojo y el sello TOP SECRET son las recetas destacadas.

## El juego: Aplasta fantasmas
1. Entra en **Juego** y pulsa **Empezar a Jugar**.
2. Salen personajes de nueve tumbas. Haz clic (o toca con el dedo) para aplastarlos antes de que se escondan. También se puede jugar con el teclado: tabulador para moverte e Intro o espacio para golpear.
3. Tienes 30 segundos.
   - Fantasma blanco: +1 punto.
   - Fantasma verde con corona: +3 segundos de tiempo.
   - Murciélago: -3 segundos de tiempo. Si una tumba tiembla, hay un murciélago.
4. Cuando se acaba el tiempo verás tu puntuación. Pulsa **Jugar otra vez** para repetir.
5. El botón **Sonido** del juego quita o pone los sonidos.

## Entrar con tu usuario
Pulsa **Login**.
- **Ya tengo usuario**: escribe tu usuario y tu contraseña. Si te equivocas, la web te avisa.
- **Registrar nuevo usuario**: rellena usuario (de 3 a 20 caracteres), contraseña (mínimo 6 caracteres), correo y la palabra secreta. Después vuelves al login y ya puedes entrar.
- **¿Olvidaste tu contraseña?**: escribe tu usuario, tu palabra secreta y la contraseña nueva (mínimo 6 caracteres).
- Usuarios de prueba: `admin` y `usuario`, los dos con contraseña `123456`.

Importante: los usuarios nuevos se guardan en la sesión del navegador, así que si cierras el navegador se pierden.

## Panel y mensaje a Jack
Al entrar llegas a un panel con todas las funciones: el juego, las recetas, escribir un mensaje, quiénes somos y cerrar sesión.

En **Escribir Mensaje** (o en la pestaña **Contacto**) pones un asunto y cuentas tu peor pesadilla. El mensaje le llega a Jack con el correo de tu usuario, para que pueda responderte. Para salir, pulsa **Cerrar Sesión**.

## Si algo falla
- No se oye el susto: haz clic primero en la página y comprueba que el botón de sonido está activado.
- No se envía el correo: el mensaje sale en rojo. Revisa que hayas escrito el asunto y el mensaje, y que el servidor tenga la clave de Brevo configurada en `correo.php`.
