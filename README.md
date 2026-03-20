### Guía de Instalación y Despliegue

Este documento explica cómo levantar el proyecto en un entorno local y
cómo desplegarlo en un hosting compartido (HostGator).

------------------------------------------------------------------------

### EJECUTAR EL PROYECTO EN LOCALHOST

Para ejecutar el proyecto en tu entorno local necesitas tener instalados
los siguientes requisitos:

Requisitos: - PHP - MySQL - Node.js - NPM - Un servidor local como XAMPP
o WAMP

Pasos:

1.  Clonar el repositorio o descargar el proyecto.

2.  Instalar las dependencias de Node: npm install

3.  Compilar los assets del frontend: npm run dev

4.  En otra consola iniciar el servidor de Laravel: php artisan serve

5.  Abrir el navegador y acceder a: http://127.0.0.1:8000

------------------------------------------------------------------------

### DESPLIEGUE EN HOSTGATOR

Para subir el proyecto a un hosting compartido (HostGator) seguir los
siguientes pasos.

1.  Comprimir el proyecto

Comprimir la carpeta del proyecto en un archivo .zip.

Ejemplo: codigos-oxford.zip

2.  Subir el proyecto

3.  Ingresar al cPanel del hosting.

4.  Ir al Administrador de Archivos.

5.  Entrar a la carpeta: public_html

6.  Subir el archivo: codigos-oxford.zip

7.  Descomprimir el archivo.

La estructura final debería quedar así:

public_html/ codigos-oxford/ ...

------------------------------------------------------------------------

### MOVER LOS ARCHIVOS PÚBLICOS

Entrar a la carpeta: codigos-oxford/public

Copiar todos los archivos y carpetas dentro de “public” hacia:

public_html/

Ejemplo:

public_html/ index.php css/ js/ images/

------------------------------------------------------------------------

### MODIFICAR EL ARCHIVO INDEX.PHP

Abrir el archivo: public_html/index.php

Modificar las rutas para que apunten a la carpeta del proyecto.

Ejemplo:

require DIR.’/codigos-oxford/vendor/autoload.php’;

$app = require_once DIR.’/codigos-oxford/bootstrap/app.php’;

------------------------------------------------------------------------

### CONFIGURACIÓN DEL ARCHIVO .ENV

IMPORTANTE:

Antes de subir una nueva versión del proyecto:

1.  Copiar el archivo .env actual del servidor.
2.  Guardarlo como respaldo.

Esto es importante porque el archivo .env contiene las variables de
producción, como:

-   Conexión a base de datos
-   Credenciales
-   Configuración del entorno

Luego de subir la nueva versión, restaurar el .env correspondiente.

------------------------------------------------------------------------

### RECOMENDACIONES

No subir el archivo .env al repositorio.

Verificar los permisos de las carpetas:

storage bootstrap/cache

------------------------------------------------------------------------

