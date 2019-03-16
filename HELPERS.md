# Create symbolic link from public_html to public folder
On shared hosting: `ln -s /home/u676053291/domains/pornsnapx.com/public /home/u676053291/domains/pornsnapx.com/public_html`
On any other or locally: `php artisan storage:link`

# Create symbolic link from `storage` inside `public` folder to `storage/app/public`
cd public/
ln -s ../storage/app/public/ storage
ln -s path_to_directory link_name

# error setting certificate verify locations: CAfile
https://stackoverflow.com/a/40861755/1860890
Gdje god u php.ini ima `curl-ca-bundle.crt`, zamijeniti to sa cacert.pem

# Infinite scroll
https://laraget.com/blog/implementing-infinite-scroll-pagination-using-laravel-and-jscroll

# Laravel Passport consume own api unauthorized
https://stackoverflow.com/a/48542641/1860890

# Hostgator php 7 and composer
Combination of those two because you need to download composer.phar in order to put it in `~/bin/composer`
https://stackoverflow.com/questions/39643805/need-to-run-composer-update-on-ssh-on-hostgator-but-php-v-to-low/48714217
https://www.livelywebdesign.com/blog/2018/09/composer-on-hostgator-shared-hosting/

# Socialite Twitter login
https://arjunphp.com/laravel-5-6-socialite-twitter-login/

# Infinite scroll
https://laraget.com/blog/implementing-infinite-scroll-pagination-using-laravel-and-jscroll

# Laravel pagination include query string
https://github.com/laravel/framework/issues/19441#issuecomment-305491111

# Rotate image 
https://medium.com/thetiltblog/fixing-rotated-mobile-image-uploads-in-php-803bb96a852c