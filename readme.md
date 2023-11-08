# Developed with [Laravel 3](http://laravel.com) - A PHP Framework For Web Artisans

This is an assessment created, a simple product manager (Similar: Inventory Management System). Uses Laravel 3 (as instructed per assessement) (Yeah I know Lravel 3 has been deprecated a loooooong time ago xd) and uses API for data insertion and managing. Created with MVC (Model, view, controller) architecture.

## Feature Overview

- Simple routing using Closures or controllers.<br>
Routing checks authentication status before handling data
>**Note**: *If needed to test APIs with postman or similar system comment out routings which uses `'auth'` filtering. Else simply you can use coding in `other/router.txt` whre it has the changed routings for testing with postman which do not require login. Replace `router.php` coding with above mentioned txt file data.* <br>

- Views and templating.<br>
views and as well as controllers are divided to sub-folders for the easiness of the code reviewing and handling.

- Database abstraction with query builder. <br>
This project uses `MySQL`. The sql file is stored at `'sql files'` sub-folder.

- Authentication.<br/>
Project uses password hashing, which is an industrial standard when handling passwords. Currently this application uses `Bcrypt`. As the password are hashed, in databse you cannot see user's password and a `hashed password` will be there. 

- Migrations.
- PHPUnit Integration.
- A lot more.

## Example for API testing

Before starting, please use the methods included before to make the `router.php` much more easier for testing with Postman or any other similar approaches. Otherwise you cannot test results as expected and the response will be the login page

### Example:

- Testing edit product API

Use `PUT` method for this (Not `POST`, as this an update method). <br/>

The url is as following
`http://localhost/<project name>/public/api/edit-product/21`

`<project name>` should be replaced with correct path name.<br/>

Ex: `Assessement%20-laravel%203`

Raw data are,

```Json
{
    "pname": "Updated Product Name",
    "pcat": "Electronics",
    "quantity": 15,
    "price": 199.99
}
```


## License

Laravel is open-sourced software licensed under the MIT License.
