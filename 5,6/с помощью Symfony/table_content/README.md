Task API
===========

This is a test task which consist from 9 items.

Installation
------------

 1. Clone the repository

    ```
    git@github.com:tes7work/testwork_gps.git
    ```

2. Install dependencies

    ```
    composer install
    ```

3. Setup database

    Please make sure you change your local .env file according to the comment in the doctrine/doctrine-bundle section.

    ```
    bin/console doctrine:schema:update --force
    bin/console doctrine:fixtures:load
    ```

4. (Optional) Run a web server

    ```
    bin/console server:run
    ```
