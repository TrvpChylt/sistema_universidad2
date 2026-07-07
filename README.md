# 🏫 Sistema Universidad 2 - Gestión Maestra

## Desarrollador
## Nombre: Jesus Ramos 🧑‍💻

Especialidad: Tecnología / Desarrollo de Software

Este proyecto es un sistema de gestión universitaria local desarrollado para entornos PHP y MySQL utilizando el servidor local XAMPP.

---

## 🛠️ Requisitos del Sistema
Para ejecutar este proyecto correctamente, asegúrese de contar con:
* **Sistema Operativo:** Linux (probado en Linux Mint / Ubuntu) o Windows.
* **Servidor Local:** XAMPP / LAMPP (PHP 8.x recomendado).
* **Gestor de Base de Datos:** MySQL / MariaDB.

## Comentario de parte del creador - Jesus Ramos

Este proyecto fue creado en el sistema operativo de linux Ubuntu, trabajo como Analista en Sistemas en la Policia de Chacao, me especializo en el area de Frontend pero tengo conocimientos en Backend. Este proyecto esta alojado en un repositorio de Github y se le implemento un control de Versiones para una mejor fluidez de

---

## 🚀 Instrucciones de Instalación y Despliegue

Siga estos pasos detallados para poner en marcha el proyecto en su máquina local:

### 1. Clonar el repositorio
Si no tiene el proyecto en su directorio local, clónelo en la ruta de su servidor (`htdocs`):
```bash
cd /opt/lampp/htdocs/
sudo git clone https://github.com/TrvpChylt/sistema_universidad2.git
```

---

### 2. Configurar Permisos (Solo para usuarios Linux)
```bash
sudo chown -R $USER:$USER /opt/lampp/htdocs/sistema_universidad2
```

---

### 3. Configuración de la Base de Datos 🗄️
Inicie los servicios de XAMPP (Apache y MySQL).
Dirijase a http://localhost/phpmyadmin/.

Cree una base de datos llamada gestionmaestra (todo en minusculas y con guion bajo).
Importe el archivo SQL o ejecute la siguiente estructura correspondiente a la tabla asignada:

```bash
SQL
CREATE TABLE IF NOT EXISTS bancos (
    id_banco INT AUTO_INCREMENT PRIMARY KEY,
    codigo_banco VARCHAR(10) NOT NULL UNIQUE,
    nombre_banco VARCHAR(100) NOT NULL,
    rif_banco VARCHAR(20) UNIQUE,
    estado_activo TINYINT(1) DEFAULT 1,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 4. Ejecutar la Aplicación 
Asegurese de tener el servidor local activo:

```bash
sudo /opt/lampp/lampp start
```

---

## Abra su navegador de preferencia e ingrese a la siguiente dirección:
👉 http://localhost/sistema_universidad2/