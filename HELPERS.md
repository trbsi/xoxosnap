# Create symbolic link from public_html to public folder
On shared hosting: `ln -s /home/u676053291/domains/pornsnapx.com/public /home/u676053291/domains/pornsnapx.com/public_html`
On any other or locally: `php artisan storage:link`

# Create symbolic link from `storage` inside `public` folder to `storage/app/public`
cd public/
ln -s ../storage/app/public/ storage

# error setting certificate verify locations: CAfile
https://stackoverflow.com/a/40861755/1860890
Gdje god u php.ini ima `curl-ca-bundle.crt`, zamijeniti to sa cacert.pem

# Infinite scroll
https://laraget.com/blog/implementing-infinite-scroll-pagination-using-laravel-and-jscroll

# Laravel Passport consume own api unauthorized
https://stackoverflow.com/a/48542641/1860890