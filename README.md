# Create-URL-shortener
First Run This command 
1) composer create-project laravel/laravel blog
2) Change in env file DB_DATABASE = urlshortenertak
3) Update in create_users_table.php Add // 1=> Admin, 2=>User
            $table->tinyInteger('role')->default(2);
4) Run this commond php artisan make:migration create_short_links_table
5) and change in this table  $table->integer('userId');  in up function.
6) Run commond "php artisan migrate"
7) In  Models -> User.php Added "role" in fillable array and add this function
   public function getRoleAttribute($value)
        {
            return ["","admin","user"][$value];
        }
8) Then run this command "composer require laravel/ui"
9) and this commond 2 time "php artisan ui bootstrap --auth"
10) After this make middelware "php artisan make:middleware UserRoleMiddleware" and registered in kernal.php file.
11) After that write some code in
    Middleware -> UserRoleMiddleware;
12) Then add route
13) Then Controllers -> HomeController.php in this file make the code of login relatd funcnality.
14) Then Create view file "Create View (Blade)"
15) Then "Update Login Controller"
16) Add Seeder for Admin (php artisan make:seeder CreateUserSeeder and php artisan db:seed --class=CreateUserSeeder)
17) php artisan serve (when login funcnality is working proper then start work on adding url)
18) Run this command for model "php artisan make:model ShortLink  "
19) Create Route for link related work
And  app is working fine.
