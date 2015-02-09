
## Installation

```bash
git clone https://github.com/ronanguilloux/OpenWines.git
git checkout postgresql
```

Install a PostgreSQL server (tip: for OS X, use [Postgres.app](http://postgresapp.com/))


## Using [`Postgres.app`](http://postgresapp.com) on OS X

```bash
/Applications/Postgres.app/Contents/Versions/9.3/bin/createdb openwines
```

## Using SQL (via psql, etc.)

```sql
CREATE DATABASE openwines
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'fr_FR.UTF-8'
       LC_CTYPE = 'fr_FR.UTF-8'
       CONNECTION LIMIT = -1;
CREATE SCHEMA IF NOT EXISTS openwines;
SET search_path TO openwines, public;
``
`

## CLI examples

```bash
php app/console pomm:inspect:database openwines
php app/console pomm:inspect:schema openwines openwines
```

## CLI : creating Schema PHP Class

```bash
php app/console pomm:generate:schema-all -d src -a 'OpenWines\AppBundle\Model' openwines openwines
```
