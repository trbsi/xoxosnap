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

# Name changing
1. In code
1. Domain name
1. Google Analytics and domain inside of it
1. Twitter app and domain inside of it
1. Gmail + redirect info@newdomain.com to gmail
1. Change mail settings in .env file and check mail sending from site