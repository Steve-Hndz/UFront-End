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