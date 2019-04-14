# Xampp setup

## Install SSL locally
1. https://shellcreeper.com/how-to-create-valid-ssl-in-localhost-for-xampp/

1. In \xampp\apache\conf\extra\httpd-vhosts.conf add following:

```
<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host2.example.com
    DocumentRoot "F:/xampp/htdocs/adult/site/public"
    ServerName adult.loc
    ErrorLog "logs/adult-error.log"
    CustomLog "logs/adult-access.log" common
</VirtualHost>

<VirtualHost *:443>
    DocumentRoot "F:/xampp/htdocs/adult/site/public"
    ServerName adult.loc
    SSLEngine on
    SSLCertificateFile "crt/adult.loc/server.crt"
    SSLCertificateKeyFile "crt/adult.loc/server.key"
</VirtualHost>
```

# Official logo font
https://www.1001fonts.com/pouttu-font.html

# Official theme
https://themeforest.net/item/olympus-html-social-network-toolkit/19755363

# Official admin theme
https://startbootstrap.com/themes/sb-admin-2/