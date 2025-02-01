# 📦 **Gestión de Inventarios**

Este proyecto es una **aplicación web** diseñada para la **gestión básica de productos e inventarios**. Permite a los usuarios administrar un catálogo de productos con funcionalidades esenciales como creación, edición, eliminación y actualización de inventario.

---

## 🛠 **Características Principales**

- **Gestión de productos**: Crear, editar y eliminar productos con información como nombre, descripción, precio y cantidad inicial en inventario.
- **Visualización de productos**: Listado de productos disponibles con opciones de búsqueda y filtros por nombre, rango de precios, rango de cantidades.
- **Actualización de inventario**: Registro de entradas y salidas para mantener el stock actualizado.
- **Autenticación**: Sistema de inicio de sesión único para asegurar el acceso a la aplicación.

---

## 💻 **Stack Tecnológico Utilizado**

- **Laravel**: Framework de PHP utilizado para el desarrollo backend y la gestión de la lógica de la aplicación.
- **Blade**: Motor de plantillas de Laravel utilizado para la creación de las vistas dinámicas.
- **Breeze**: Paquete de autenticación ligero de Laravel utilizado para el registro e inicio de sesión de usuarios.
- **SweetAlert2**: Librería utilizada para mejorar la experiencia de usuario con alertas y notificaciones personalizadas.
- **CSRF Protection**: Implementado en los formularios para prevenir ataques de falsificación de solicitudes entre sitios.
- **Middleware**: Utilizado para la gestión de rutas y restricciones de acceso según la autenticación del usuario.
- **Tailwind CSS**: Framework de diseño utilizado para estilizar la interfaz de usuario de manera rápida y eficiente.

---

## 🛠 **Requisitos Previos**

Antes de comenzar, asegúrate de tener lo siguiente instalado en tu máquina:

- **PHP** (versión 7.4 o superior)
- **Composer** (para gestionar las dependencias de PHP)
- **MySQL** o **MariaDB** (base de datos)
- **Node.js** (para la gestión de dependencias front-end y compilación de assets)
- **Git** (para clonar el repositorio)

---

## 📝 **Instrucciones de Instalación**

1. Clona el repositorio en tu máquina local:  
```bash
git clone https://github.com/Estefanyq19/web-inventory.git
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
10. Instala sweetalert2
```bash
npm install sweetalert2
```

9. Inicia el servidor de desarrollo:  
```bash
php artisan serve
```
## 🛠 **Credenciales de Acceso**

Para acceder a la aplicación con las credenciales predeterminadas, utiliza los siguientes datos:

- **Email**: `admin@gmail.com`
- **Contraseña**: `admin`
