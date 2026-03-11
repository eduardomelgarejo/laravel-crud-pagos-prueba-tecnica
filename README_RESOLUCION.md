# Prueba Técnica Laravel 10 - CRUD de Pagos

Esta es la resolución de la prueba técnica solicitada, desarrollada estrictamente paso a paso aplicando buenas prácticas, validaciones y arquitectura MVC bajo Laravel.

## Tecnologías Utilizadas

- **Laravel 10**
- **MySQL / Laragon**
- **Blade** para las vistas (con diseño mediante Bootstrap).
- **Guzzle HTTP Client** / **Laravel HTTP Facade** para el consumo de API externa.

## Funcionalidades Implementadas

El proyecto consistió en cumplir puntualmente los siguientes requerimientos:

✔ **Listar pagos:** Visibilidad en tabla dinámica de los registros de pago de la base de datos.
✔ **Crear pagos:** Formulario funcional con almacenamiento validado.
✔ **Editar pagos:** Selección de pagos existentes y edición en base de datos.
✔ **Eliminar pagos:** Borrado seguro de registros en tabla.
✔ **Validación de formularios:** Prevención de envíos vacíos o con formato inválido, con intercepción en el controlador (requiere `description` y `price` tipo entero).
✔ **Notificaciones (Flash Sessions):** Mensajes de alerta funcionales (éxito o error) devueltos en la interfaz gráfica.
✔ **Consumo de API Externa (Bono Extra):** Integración nativa a **JSONPlaceholder** con una ruta `/punto-extra` consumiendo y destilando la data JSON en una tabla gráfica.

## Estructura de la Base de Datos
- **Tabla:** `payments`
  - `id` (int, auto_increment, PK)
  - `description` (varchar)
  - `price` (int)
  - `created_at` / `updated_at` (timestamps)

## Requisitos de Entorno e Instalación Local

1. Clonar este repositorio.
2. Ejecutar `composer install` o `php composer.phar install`.
3. Renombrar `.env.example` a `.env` y configurar la base de datos (por ejemplo, `mysql`, nombre `laravel_crud_pagos`).
4. Generar la llave con `php artisan key:generate`.
5. Ejecutar migraciones para estructurar base de datos `php artisan migrate`.
6. Levantar servidor con `php artisan serve`.
