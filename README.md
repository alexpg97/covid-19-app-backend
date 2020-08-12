<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


## Covid19-App Backend

API service to get and resolve information of covid19 statistics. 
It consumes an external API to get this information updated. 

## Initial steps

To run this application first you need to create a .env file, which must contains the following:

```
L5_SWAGGER_CONST_HOST=http://127.0.0.1:8000/api
RAPID_API_KEY=HERE_COMES_YOUR_API_KEY
```

The first one (optional) is the local path of the project, this is used to generate [Swagger docs](https://swagger.io/).
The second is required to consume RapidAPI service and get information about covid19. You can generate one [here](https://rapidapi.com/api-sports/api/covid-193).

## Dependencies

You need to have installed [Composer](https://getcomposer.org/) in your computer.
Then, in order to get all the required dependencies necessaries to build the project you can follow these steps:

   * `composer install`
   * `php artisan key:generate`
   * `composer dumpautoload`

## Build and execution

To build the project you can do it by typing:
   * `php artisan serve`    

## Deployment

You can use laravel-deployer package to depoy the application in your preferred server.
* `php artisan deploy`
   
## Test
This projects has feature tests to test the endpoints funcionality, you can check it by running this command in console:
* `php artisan test`
   
## OpenAPI Documentarion

This project uses an implementation of OpenApi standard, [L5-Swagger](https://github.com/DarkaOnLine/L5-Swagger).
You can see it when the project starts, it's the redirect default page. Or you can find it in this url: `...api/documentation`

You can regenerate the docs by doing:

   * `php artisan l5-swagger:generate` 

## Technologies

* Php 7.3
* Laravel 7
* Swagger OpenAPI
