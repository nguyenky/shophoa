# Documentation


## Clone project

Open terminal
run
	git clone https://github.com/nguyenky/shophoa.git
	or
	git clone git@github.com:nguyenky/shophoa.git
run
	composer update

## Setup database
Read file .env
Make sure you have a database with name : 'shop_hoa' and pass: ''

Run
	php artisan migrate
Run
	php artisan db:seed
Change url to match your host in app\Providers\AppServiceProvider.php
and ...

Now open browser and enter your link

