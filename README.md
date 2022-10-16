## About Bible REST API

This project was developed during a Laravel 9 REST API class. It has a CRUD for Testaments, Books, Verses, Languages and Translates of Holy Bible. I used Sanctum for authentication, different ways of tables' relationships, API Resources' concepts, pagination and HATEOAS model.

All routes, except /register and /login, need a authorization token generated when someone do the login, this token needs to be sent as a bearer auth in the request's header.

## Implementations

- CRUD
- Sanctum auth
- Table relationships
- API Resources
- Pagination
- HATEOAS 
  - Is a model that helps clients consuming the REST   service to browse resources and know what they can do, making the WEB API actions easier to understand.
  Imagine that you make a request to an API, and it will return an object or collection of objects in response. That would be the WEB API without using HATEOAS.
  Using HATEOAS the API response also adds descriptive links that serve to tell you how you can change the resource and information on how to fetch secondary or related resources.

## Required

- Docker
- Docker compose

## Local Usage

- Clone this repository
- Configure .env file with your database credentials (use Laravel Sail documentation)
- Execute:
    - `./vendor/bin/sail up`
    - `./vendor/bin/sail composer install`
    - `./vendor/bin/sail artisan migrate`
- It's done!

## End-points

Route                                | HTTP method    | Request data
------------------------------------ | -------------- | --------
localhost/api/register               | POST           | name, email, password, password_confirmation, nameToken
localhost/api/login                  | POST           | email, password
localhost/api/logout                 | POST           | 
localhost/api/testament              | POST           | name
localhost/api/testament/{testament}  | PUT,PATCH      | name
localhost/api/testament              | GET            | 
localhost/api/testament{testament}   | GET            | 
localhost/api/testament{testament}   | DELETE         | 
localhost/api/book                   | POST           | name, testament_id, abbreviation, position, translate_id
localhost/api/book{book}             | PUT,PATCH      | name, testament_id, abbreviation, position, translate_id
localhost/api/book                   | GET            | 
localhost/api/book{book}             | GET            | 
localhost/api/book{book}             | DELETE         | 
localhost/api/verse                  | POST           | chapter, book_id, verse, text
localhost/api/verse{verse}           | PUT,PATCH      | chapter, book_id, verse, text
localhost/api/verse                  | GET            | 
localhost/api/verse{verse}           | GET            | 
localhost/api/verse{verse}           | DELETE         | 
localhost/api/language               | POST           | name
localhost/api/language{language}     | PUT,PATCH      | name
localhost/api/language               | GET            | 
localhost/api/language{language}     | GET            | 
localhost/api/language{language}     | DELETE         | 
localhost/api/translate              | POST           | name, abbreviation, language_id
localhost/api/translate{translate}   | PUT,PATCH      | name, abbreviation, language_id
localhost/api/translate              | GET            | 
localhost/api/translate{translate}   | GET            | 
localhost/api/translate{translate}   | DELETE         | 
