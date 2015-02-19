OpenWines
=========

French Vineyards Open Data provider ; pet project for alcoholics developers.

- Based on RESTful API Modeling Definition, [RAML](http://raml.org/)
- Distributed as a [HATEOAS](http://en.wikipedia.org/wiki/HATEOAS)-based RESTful API
- `master` is Doctrine-based, for POC purposes.
- __Work in Progress in the [`postgresql` branch](https://github.com/ronanguilloux/OpenWines/tree/postgresql)__
 

## API documentation (with [RAML](http://raml.org) & [NPM](https://www.npmjs.com))

See [Documentation portal (RAML format)](https://anypoint.mulesoft.com/apiplatform/web-appio/#/portals/apis/13139/versions/13779/pages/15467)

Static HTML file generation:

```bash
 cd doc/Raml/OpenWines_API-v1
 npm install -g raml2html
 raml2html api.raml > api.html
 [open/xdg-open] api.html
 ```

## TODO

See [TODO.md](TODO.md)


## Licence

[GNU Affero General Public License v3](https://www.gnu.org/licenses/agpl-3.0.txt)


## Installation

Install a PostgreSQL server
(tip: for OS X, use [Postgres.app](http://postgresapp.com))

Then clone & configure:

```bash
git clone -b postgresql https://github.com/ronanguilloux/OpenWines.git
make
make install
```

What it does:

- Makefile reads your `app/config/parameters.yml` database connection
- Makefile uses a database dump located in `./src/OpenWines/AppBundle/Resources/sql/openwines.sql`
- `make` command add a pre-commit php style checker, installs vendors, run Symfony environment checker then outputs th help message
- `make install` command creates PostGreSql database & schema, inserts data, generates assets then clear caches and output a "done." final message


## Pro Memoria: [POMM](pomm-project.org) CLI usages

### Retrieving informations:

```bash
php app/console pomm:inspect:database db
php app/console pomm:inspect:schema db openwines
php app/console pomm:inspect:relation db vignoble openwines
```

### Generating Schema PHP Classes

```bash
php app/console pomm:generate:schema-all -d src -a 'OpenWines\AppBundle' db openwines
```
