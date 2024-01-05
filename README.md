## Nano Feed

Nano feed is microblogging platform build with Laravel using Blade template.

### Installation steps:

1. Clone project from https://github.com/imkhoirularifin/nano-feed.git

```shell
git clone https://github.com/imkhoirularifin/nano-feed.git
```

2. Change directory

```shell
cd nano-feed
```

3. Install Composer Dependencies

```shell
composer install
```

4. Install NPM Dependencies

```shell
npm install && npm run dev
```

5. Create a copy of your .env file

```shell
cp .env.example .env
```

6. Generate an app encryption key

```shell
php artisan key:generate
```

7. Create new database named 'nano_feed' in MySQL

8. Change Database to ('nano_feed') in .env

```Example
DB_DATABASE=nano_feed
```

9. Start apache & mysql in xampp if you using windows, and lammp if you using linux.

10. Migrate Database

```shell
php artisan migrate
```

11. Run Laravel project

```shell
php artisan serve
```
