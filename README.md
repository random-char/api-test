Api test
--------

Requirements
============

 * [Docker compose](https://docs.docker.com/compose/)

Local setup
===========

 * Run ``make env`` or copy ``.env.example`` into ``.env``. Update ``.env`` with desired variables;
 * Run ``make composer`` to install dependencies;
 * Run ``make init`` and specify desired options to initialize the application;
 * Run ``make up`` to start containers.


To test if app is up and running make a curl request:
```sh
curl --header "Content-Type: application/json" \
  --request POST \
  --data '{"numbers": ["1", 2, 3.0, 3,1, 4]}' \
  http://localhost:8000/api/sum-even
```

Expected output is:
```json
{
    "sum": 6
}
```

DIRECTORY STRUCTURE
-------------------

```
common
    components/     contains bounded contexts
    config/         contains shared configurations
    tests/          contains tests for common classes    
console
    config/         contains console configurations
    controllers/    contains console controllers (commands)
    migrations/     contains database migrations
    runtime/        contains files generated during runtime
api
    config/         contains api configurations
    controllers/    contains Web controller classes
    models/         contains api-specific model classes
    runtime/        contains files generated during runtime
    tests/          contains tests for api application    
    web/            contains the entry script and Web resources
vendor/             contains dependent 3rd-party packages
environments/       contains environment-based overrides
```
