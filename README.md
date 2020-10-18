# PROYECTO MVC

# ENVIRONMENT
 VARIABLE | EXAMPLE | DESCRIPTION 
----------|---------|------------  
BASE_DIR  | http://127.0.0.1/web/ | base dir to project
DEFAULT_CONTROLLER | controllers/ | don't touch
DEFAULT_ACTION | showHome | method in default controller
DB_USER | root | database, username 
DB_PASSWORD | your_password | database, user password
DB_HOST | 127.0.0.1 | database, host
DB_NAME | name_db | database, name

# Steps
* copy this repository on c:/xampp/htdocs/web
* import a sql file (basedir/database/sql) in phpMyAdmin

# Uso de filtros

```http
{{HOST}}/web/Controller/action&filter[campo]=valor&filter[otroCampo]=valor
```
Los campos deben existir en la base de datos

# Ordenamiento

```http
{{HOST}}/web/Controller/action&sort[campo]=[ASC|DESC]
```

Los campos deben existir en la base de datos
- Los corchetes indican

# Requerimientos

- Que posea un login para poder acceder a las funciones de Añadir Donante o Añadir Paciente.
- Un usuario logueado tiene acceso a las siguientes vistas
   - Añadir Paciente
   - Añadir donante
   - Vista de pacientes en espera de donante
   - Vista de donantes activos
- Un usuario no logueado puede acceder a las vistas de
   - Login
   - Registro
   - Vista de pacientes en espera de donante
   - Vista de donantes activos
- Que tenga filtro de pacientes y donantes por departamento
- Que tenga filtro de pacientes por hospital
- Que tenga un filtro para mostrar los donantes activos, y donantes inactivos (con donantes inactivos se entiende por aquellos que ya realizaron una donación)
- Al igual que con los donantes, se aplicará misma dinámica para los pacientes, para dejar constancia de que este ya ha contactado con un donante, los posibles estados serían “Ya contacto donante” y “Pendiente de donante”.
- Si un paciente ha contactado con un donante y ha llegado a un acuerdo, este donante debe cambiar su estado a “Inactivo”, a su vez, el paciente deberá cambiar su estado a “Ya contacto donante”.
- Tendrán prioridad de mostrarse aquellos donantes que se encuentren activos, y los pacientes que aún están pendientes de encontrar un donante
- También se debe dejar un apartado en donde se muestren los hospitales en donde se puede ir a hacer una donación de plasma, los datos que se mostrarían son: nombre del hospital y la dirección, el horario de atención

# Datos a solicitar.
   Donantes:
- Nombre y Apellidos
- Numero de Telefono
- Departamento y municipio
- Correo electrónico
- Tipo de Sangre
- Historial del donante (en qué lugar estuvo en recuperación, si tuvo sospechas de la enfermedad pero no se ha confirmado)
- Si cuenta con examen de anticuerpos que verifique que contrajo la enfermedad
- Si posee carnet de COVID-19
- Información Adicional (si tiene la disponibilidad de viajar, etc.)

  Pacientes:
- Nombre y Apellidos
- Numero de telefono
- Hospital en que se encuentra (siempre especificando departamento y municipio)
- Tipo de Sangre
- Descripción del estado del paciente (si necesita con urgencia, detalles de cómo llegar a él, etc)
