######TempoBeats######

TempoBeats is a music streaming website that provides users with a high quality experience.

#Bulid and Testing:#
To test the project:
 1. First clone the repo.
 2. open the project via Visual Studio / PhPStorm
 3. using Terminal run the following commands:
   composer install
   cp .env.example .env
   php artisan key:generate
 4. then open Xampp and start the apache and youre database (preferable mysql)
 5. using Terminal run the following commands in order:
   php artisan migrate
   php artisan storage:link
 6. Insert the data found in the txt file (tempobeatsSql.txt)
 7. Finally, in the Terminal run the following command:
   php artisan serve
 8. visit 127.0.0.1:8000 (The default port will be 8000) and Test Our Streaming Website!!  
        
 

