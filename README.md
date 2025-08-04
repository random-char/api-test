Api test
--------

Local setup
===========

 * Run ``make env`` or copy ``.env.example`` into ``.env``. Update ``.env`` with desired variables.
 * 

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
