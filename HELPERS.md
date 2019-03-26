# Create symbolic link from public_html to public folder
On shared hosting: `ln -s /home/u676053291/domains/pornsnapx.com/public /home/u676053291/domains/pornsnapx.com/public_html`
On any other or locally: `php artisan storage:link`

# Create symbolic link from `storage` inside `public` folder to `storage/app/public`
- cd public/
- ln -s ../storage/app/public/ storage
- ln -s path_to_directory link_name

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

# Laravel pagination include query string
https://github.com/laravel/framework/issues/19441#issuecomment-305491111

# Rotate image 
https://medium.com/thetiltblog/fixing-rotated-mobile-image-uploads-in-php-803bb96a852c

# Capture video thumbnail
http://usefulangle.com/post/46/javascript-get-video-thumbnail-image-jpeg-png
https://codepen.io/renanpupin/pen/PqjyeK

# Get video duration on file input
https://stackoverflow.com/a/27550848/1860890

# Blueimp

## Blueimp - jQuery File Upload: clean file queue
https://stackoverflow.com/questions/41540040/jquery-file-upload-clean-file-queue

## Blueimp - display thumbnail image preview
https://stackoverflow.com/questions/10971662/blueimp-jquery-file-upload-doesnt-show-thumbnail-preview-image

## File type not allowed
https://stackoverflow.com/questions/12303660/restricting-file-types-in-jquery-file-upload-demo/14435204

## Send multiple files at once with extra data
https://stackoverflow.com/questions/19807361/uploading-multiple-files-asynchronously-by-blueimp-jquery-fileupload