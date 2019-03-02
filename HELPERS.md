# Create symbolic link from public_html to public folder
On shared hosting: `ln -s /home/u676053291/domains/pornsnapx.com/public /home/u676053291/domains/pornsnapx.com/public_html`
On any other or locally: `php artisan storage:link`

# error setting certificate verify locations: CAfile
https://stackoverflow.com/a/40861755/1860890
Gdje god u php.ini ima `curl-ca-bundle.crt`, zamijeniti to sa cacert.pem