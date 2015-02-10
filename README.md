
## Installation

Install a PostgreSQL server
(tip: for OS X, use [Postgres.app](http://postgresapp.com))

Then clone & configure:

```bash
git clone https://github.com/ronanguilloux/OpenWines.git
git checkout postgresql
make
make install
```

What it does:

- Makefile reads your `app/config/parameters.yml` database connection
- Makefile uses a database dump located in `./src/OpenWines/AppBundle/Resources/sql/openwines.sql`
- `make` command add a pre-commit php style checker, installs vendors, run Symfony environment checker then outputs th help message
- `make install` command creates PostGreSql database & schema, inserts data, generates assets then clear caches and output a "done." final message


## CLI examples

```bash
php app/console pomm:inspect:database db
php app/console pomm:inspect:schema db openwines
php app/console pomm:inspect:relation db vignoble openwines
```

## CLI : creating Schema PHP Class

```bash
php app/console pomm:generate:schema-all -d src -a 'OpenWines\AppBundle' db openwines
```
