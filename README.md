# RESTFull-Api-Symfony-FOSOAuthServer
A RESTFull Api exemple with Symfony 4.3 &amp; FOSOAuthServerBundle

**All the code for start a Api RESTFull**

Setup require : 
	
	composer
	Symfony
	PhpMyAdmin

Symfony is required for run a server for test the different request.
Look at the documentation if you want more info. 
(Here : https://symfony.com/download and https://symfony.com/doc/current/setup/symfony_server.html)

**1.First step**

Clone or download this repository

**2.Second step**

        composer install
        
**3.Third step**

Put your credential in files .env at lines

        DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
        
**4.Four step**

        php bin/console doctrine:database:create
        
**5.Fifth step**

        php bin/console make:migration
        php bin/console doctrine:migrations:migrate

**6.Sixth step**

        php bin/console make:controller -controllerName-
        
In this case, for the example, the name of the controller is **MovieController**


**7.Seventh step**

If you try to make a **POST** request at this following url for create a movie : 
 
        http://127.0.0.1:8000/api/Movie
	
with the following body:

	{
	"name": "Movie 2",
	"description": "Movie description"
	}
        
 You have this response : 
 
        {
        "error": "access_denied",
        "error_description": "OAuth2 authentication required"
        }


**8.eighth step**

make a user with the command 

        php bin/console fos:user:create
        
and follow the step


**9.ninth step**

After create a user, use Postman for test api with request in **POST** like that : 

        {
	"redirect-uri": "127.0.0.1:8000",
	"grant-type": "password"
        }
        
with the url : 

        http://127.0.0.1:8000/createClient

You have a response with client_id and client_secret : 

        {
        "client_id": "4_3tytv67l56as008kockwcog8c0c4w4cgco8kkkocww4g84ggks",
        "client_secret": "1qy00s6lqb8gcogk0kcgw4g4skww4gwgsooswocowg0o0o8wgc"
        }
        

 **10.Tenth step**
 
 
with this following url :

        http://127.0.0.1:8000/oauth/v2/token
	
        
make a request **POST** with th client_id and the client_secret like that : 

        {
	"client_id": "3_5o7b5dwnrk84w8o8ckgoc4ckwwscks4cgkgcskg8gs8s44wgkk",
	"client_secret": "6cbqd4070tookwsow88ossc4gswcwoowgwowosw0w08sgow8s8",
	"grant_type": "password",
	"username": "toto",
	"password": "totototo"
        }
	
You receive a response : 

	{
    	"access_token": "ZTRkZjg4MGQ1OTBjNDRkZjJiNGU5MDdhMTVlYjFlMzIxODkyMjczMDlkMTY1MDZmMDExYWQyMmNkMjMyZmZkMg",
    	"expires_in": 86400,
    	"token_type": "bearer",
    	"scope": null,
    	"refresh_token": "NmQ4YTA4YjVlYTU2YmIyMDEyY2JjNjY3OGY2NWU2MDNhZmQ4NDJlYmU1NjMwM2FmNjk1ZWJjNTAyYTk0NmJlYg"
	}
	
**11.Eleventh step**

At the following address, for have a list of the Movies you have created: 

	http://127.0.0.1:8000/api/Movies
	
	
You can now make a **GET** request with the following arguments "access_token" in the headers : 

	Content-Type : application/json
	Authorization : Bearer ZTRkZjg4MGQ1OTBjNDRkZjJiNGU5MDdhMTVlYjFlMzIxODkyMjczMDlkMTY1MDZmMDExYWQyMmNkMjMyZmZkMg
	
You have a response like that : 

	[
    		{
        		"id": 1,
        		"name": "movie 1",
        		"description": "movie description"
    		},
    		{
        		"id": 2,
        		"name": "Movie 2",
        		"description": "Movie description"
    		}
	]
	
The access is authorized.


Enjoy to make your own application ! 

**If you have any problem or any question, you can open a issue.**
        
