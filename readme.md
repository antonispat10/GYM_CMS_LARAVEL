# GYM CMS
### Admin, User, Guest Panel

### Features


- GYM CMS
- 3 different panels (Admin, User, Guest)
- Admin Panel- Add User
- Admin Panel- Add Posts
- Admin Panel- Add Exercises for each user
- Admin Panel- Charts to Compare Users registered per month
- Middleware and Gates for the role of Admin, User, Guest
- User Panel - View weekly Program
- User Panel - Edit User Details
- User Panel - Chart to compare the last weights measurements
- Guest - Guest could see the post and make comments
- Disqus - Disqus API for making comments

### Installation

First, clone the repository (https or ssh):
```bash
git clone https://github.com/roelofjan-elsinga/GYM_CMS_LARAVEL.git
```

Then change directory into the repository
```bash
cd GYM_CMS_LARAVEL
```

And run the composer installer
```bash
composer install
```

### Setup your .env file to match you desired database

First you'll need to get a copy of the supplied .env.example:
```bash
cp .env.example .env
```

The run a few Artisan commands to get set up the environment
```bash
php artisan key:generate
```

The database will be created and supplied with basic data.
```bash
php artisan migrate --seed
```

You can now log in with the email admin@admin.com and password: 543210 in order to view
and use the admin panel

You can also create a new user (default role is user but you could change it after creating the user) 
then you can create posts, exercises per user etc.