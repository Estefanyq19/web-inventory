# Proyecto Laravel - Gestión de Inventarios

Este es el proyecto **Gestión de Inventarios** desarrollado en **Laravel** con **Breeze** para la autenticación. Este repositorio contiene el código fuente y los detalles necesarios para que puedas ejecutar el proyecto en tu máquina local.

## Requisitos Previos

Antes de comenzar, asegúrate de tener lo siguiente instalado en tu máquina:

- **PHP** (versión 7.4 o superior)  
- **Composer** (para gestionar las dependencias de PHP)  
- **MySQL** o **MariaDB** (base de datos)  
- **Node.js** (para la gestión de dependencias front-end y compilación de assets)  
- **Git** (para clonar el repositorio)  

### 1. Instrucciones de instalación

1. Clona el repositorio en tu máquina local:  
```bash
git clone <URL-DEL-REPOSITORIO>
```

2. Ingresa a la carpeta del proyecto:  
```bash
cd product-management-app
```

3. Instala las dependencias:  
```bash
composer install
```

4. Configura el entorno:  
- Copia el archivo de ejemplo `.env.example` y renómbralo a `.env`. Haz la configuración de tu base de datos. Ejemplo:
```
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=nombre_de_tu_base_de_datos  
DB_USERNAME=nombre_de_usuario  
DB_PASSWORD=tu_contraseña  
```

5. Genera la clave de aplicación:  
```bash
php artisan key:generate
```

6. Migra la base de datos:  
```bash
php artisan migrate
```

7. Ejecuta los seeders:  
```bash
php artisan db:seed
```

8. Instala dependencias front-end:  
```bash
npm install
```

9. Inicia el servidor de desarrollo:  
```bash
php artisan serve
```

