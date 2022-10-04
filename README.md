## About Bible REST API

This project was developed during a Laravel 9 REST API class. It has a CRUD for Testaments, Books, Verses, Languages and Translates of Holy Bible. I used Sanctum for authentication, different ways of tables' relationships.

## Required

- Docker
- Docker compose

## Local Usage

- Clone this repository
- Configure .env file with your database credentials (use Laravel Sail documentation)
- Execute:
    - `.vendor/bin/sail up`
    - `./vendor/bin/sail composer install`
    - `.vendor/bin/sail artisan migrate`
- It's done!

## End-points

Route                                | HTTP method    | Request data
------------------------------------ | -------------- | --------
localhost/api/testament              | POST           | name
localhost/api/testament/{testament}  | PUT,PATCH      | name
localhost/api/testament              | GET            | 
localhost/api/testament{testament}   | GET            | 
localhost/api/testament{testament}   | DELETE         | 
localhost/api/book                   | POST           | name, testament_id, abbreviation, position
localhost/api/book{book}             | PUT,PATCH      | name, testament_id, abbreviation, position
localhost/api/book                   | GET            | 
localhost/api/book{book}             | GET            | 
localhost/api/book{book}             | DELETE         | 
localhost/api/verse                  | POST           | chapter, book_id, verse, text
localhost/api/verse{verse}           | PUT,PATCH      | chapter, book_id, verse, text
localhost/api/verse                  | GET            | 
localhost/api/verse{verse}           | GET            | 
localhost/api/verse{verse}           | DELETE         | 
