# 📚 Librería Online

## 📌 Proyecto Final de Programación Web

**Librería Online** es un portal web desarrollado como proyecto final de la asignatura **Programación Web**.

El objetivo principal del proyecto es poner en práctica los conocimientos adquiridos durante el curso mediante la integración de diferentes tecnologías web como **HTML, CSS, JavaScript, PHP y MySQL**.

El sistema permite consultar información almacenada en una base de datos de una librería, principalmente los **libros y autores registrados**, presentando la información mediante una interfaz moderna, organizada, responsive y fácil de utilizar.

---

## 🎯 Objetivo del proyecto

Desarrollar un portal web dinámico que permita consultar el listado de libros y autores disponibles en una librería online, utilizando PHP para realizar las consultas y MySQL para almacenar y administrar la información.

Además, el proyecto implementa JavaScript para agregar funcionalidades interactivas, CSS y Bootstrap para el diseño visual, y PHP con PDO para realizar la conexión entre la aplicación y la base de datos.

---

## 📖 Funcionalidades principales

El portal cuenta con diferentes funcionalidades:

### 🏠 Página de inicio

La página principal presenta información general sobre la Librería Online y permite acceder fácilmente a las diferentes secciones del sistema.

También muestra automáticamente información obtenida desde la base de datos, como:

- Cantidad de libros disponibles.
- Cantidad de autores registrados.
- Acceso directo al catálogo de libros.
- Acceso al listado de autores.
- Acceso al formulario de contacto.

---

### 📚 Catálogo de libros

La sección de libros obtiene los registros directamente desde la base de datos MySQL.

Para cada libro se muestra información como:

- Título del libro.
- Categoría o tipo.
- Precio.
- Cantidad de ventas.
- Fecha de publicación.

También se implementó un **buscador dinámico utilizando JavaScript**, permitiendo filtrar los libros por nombre o categoría sin necesidad de recargar la página.

---

### ✍️ Listado de autores

La sección de autores permite consultar los escritores registrados en la base de datos.

Entre los datos disponibles se encuentran:

- Nombre del autor.
- Apellido.
- Teléfono.
- Ciudad.
- Estado.
- País.

También dispone de un buscador desarrollado con JavaScript para localizar autores de manera rápida.

---

### ✉️ Formulario de contacto

El portal incluye una sección de contacto mediante la cual los usuarios pueden enviar mensajes.

El formulario solicita:

- Nombre.
- Correo electrónico.
- Asunto.
- Mensaje.

La información enviada es procesada mediante **PHP** y almacenada en una tabla de la base de datos **MySQL**.

Cuando el mensaje es registrado correctamente, el sistema muestra una confirmación al usuario.

---

## 🛠️ Tecnologías utilizadas

Para el desarrollo del proyecto se utilizaron las siguientes tecnologías:

- **HTML5** — Estructura y contenido de las páginas.
- **CSS3** — Diseño personalizado del portal.
- **Bootstrap 5** — Diseño responsive y componentes visuales.
- **JavaScript** — Buscadores dinámicos e interacción con el usuario.
- **PHP** — Procesamiento del lado del servidor.
- **MySQL** — Gestión y almacenamiento de los datos.
- **PDO** — Conexión segura entre PHP y MySQL.
- **XAMPP** — Entorno de desarrollo local con Apache y MySQL.
- **phpMyAdmin** — Administración de la base de datos.
- **Git** — Control de versiones del proyecto.
- **GitHub** — Publicación y almacenamiento del código fuente.

---

## 📂 Estructura del proyecto

El proyecto está organizado de la siguiente manera:

    libreria/
    │
    ├── config/
    │   └── conexion.php
    │
    ├── css/
    │   └── estilos.css
    │
    ├── js/
    │   ├── autores.js
    │   └── libros.js
    │
    ├── index.php
    ├── libros.php
    ├── autores.php
    ├── contacto.php
    │
    └── README.md

---

## 📄 Descripción de los archivos principales

### `index.php`

Es la página principal de la aplicación. Presenta la información general de la Librería Online y consulta la cantidad de libros y autores registrados en la base de datos.

### `libros.php`

Realiza la consulta de los libros almacenados en MySQL y presenta el catálogo con información como título, precio, ventas, categoría y fecha de publicación.

### `autores.php`

Consulta y presenta la información correspondiente a los autores registrados.

### `contacto.php`

Contiene el formulario de contacto y procesa la información enviada por los usuarios para almacenarla en la base de datos.

### `config/conexion.php`

Contiene la configuración utilizada para establecer la conexión entre PHP y la base de datos MySQL mediante PDO.

### `css/estilos.css`

Contiene los estilos personalizados utilizados para crear la apariencia visual de todo el portal.

### `js/libros.js`

Contiene la funcionalidad JavaScript utilizada para realizar búsquedas dinámicas dentro del catálogo de libros.

### `js/autores.js`

Contiene la funcionalidad JavaScript utilizada para buscar y filtrar autores.

---

## 💾 Base de datos

El proyecto utiliza una base de datos MySQL llamada:

    dblibreria

La base de datos contiene la información necesaria para consultar los libros, autores y otros datos relacionados con la librería.

Además, se agregó una tabla para almacenar los mensajes enviados mediante el formulario de contacto.

La conexión con la base de datos se realiza mediante **PHP PDO**.

---

## ⚙️ Ejecución del proyecto en entorno local

Para ejecutar el proyecto localmente se puede utilizar **XAMPP**.

1. Instalar XAMPP.
2. Iniciar los servicios **Apache** y **MySQL**.
3. Colocar la carpeta del proyecto dentro de:

       C:\xampp\htdocs\

4. Importar la base de datos de la librería mediante phpMyAdmin.
5. Verificar los datos de conexión en:

       config/conexion.php

6. Abrir el navegador.
7. Acceder al proyecto mediante:

       http://localhost/libreria/

---

## 📱 Diseño responsive

El portal fue diseñado para adaptarse a diferentes tamaños de pantalla utilizando Bootstrap y CSS.

Esto permite utilizar la aplicación desde:

- 💻 Computadoras.
- 📱 Teléfonos móviles.
- 📲 Tablets.

---

## 🔎 Características adicionales

El proyecto también incorpora:

- Navegación entre las diferentes páginas.
- Interfaz moderna y organizada.
- Tarjetas para presentar libros y autores.
- Buscadores en tiempo real.
- Validación de campos del formulario.
- Consultas dinámicas a MySQL.
- Diseño adaptable a dispositivos móviles.
- Almacenamiento de mensajes de contacto.
- Manejo de datos mediante PHP y PDO.

---

## 🔐 Conexión con la base de datos

La aplicación utiliza **PDO (PHP Data Objects)** para establecer la comunicación con MySQL.

Esto permite realizar las consultas necesarias desde PHP y obtener dinámicamente los registros almacenados en la base de datos.

La configuración de conexión se encuentra en:

    config/conexion.php

---

## 🚀 Control de versiones

El proyecto utiliza **Git** como sistema de control de versiones.

El código fuente se encuentra almacenado en GitHub, permitiendo mantener un historial de los cambios realizados y facilitar la revisión del proyecto.

---

## 🎓 Información académica

**Proyecto:** Librería Online  
**Asignatura:** Programación Web  
**Tipo:** Proyecto Final  
**Año:** 2026  

---

## 👨‍💻 Desarrollador

Proyecto desarrollado por:

**Gabriel Rodriguez Vasquez**

Como parte de los requerimientos académicos de la asignatura **Programación Web**.

---

## ✅ Estado del proyecto

El proyecto incluye las principales funcionalidades requeridas:

- ✅ Conexión con MySQL.
- ✅ Consulta de libros.
- ✅ Consulta de autores.
- ✅ Buscador de libros con JavaScript.
- ✅ Buscador de autores con JavaScript.
- ✅ Formulario de contacto.
- ✅ Registro de mensajes en MySQL.
- ✅ Diseño responsive.
- ✅ Uso de PHP y PDO.
- ✅ Código fuente publicado mediante Git y GitHub.

---

### 📚 Librería Online

**Proyecto Final | Programación Web | 2026**
