Description

GYM CMS with Admin, User, Guest Panel

Features


· GYM CMS  <br>
· 3 different panels (Admin, User, Guest)<br>
· Admin Panel- Add User <br>
· Admin Panel- Add Posts <br>
· Admin Panel- Add Exercises for each user<br>
· Admin Panel- Charts to Compare Users registered per month<br>
· Middleware and Gates for the role of Admin, User, Guest <br>
· User Panel - View weekly Program<br>
· User Panel - Edit User Details<br>
· User Panel - Chart to compare the last weights measurements<br>
· Guest - Guest could see the post and make comments<br>
· Disqus - Disqus API for making comments<br>

#Installation

Its very simple, you just need to follow the standard Laravel installation

git clone https://github.com/antonispat10/GYM_CMS_LARAVEL <br>
cd GYM_CMS_LARAVEL <br>
composer install<br>
# Setup your .env file to match you desired database
php artisan key:generate <br>
php artisan migrate --seed <br>
login with the email admin@admin.com and password: 543210 in order to view
and use the admin panel<br>
after admin login you could create new user <br>(default role is user but you could change it after creating the user)<br>
then you could create posts,exercises per user etc