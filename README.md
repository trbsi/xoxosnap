# Xampp setup

## Install SSL locally
1. https://shellcreeper.com/how-to-create-valid-ssl-in-localhost-for-xampp/

2. In \xampp\apache\conf\extra\httpd-vhosts.conf add following:

```
<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host2.example.com
    DocumentRoot "F:/xampp/htdocs/pornsnap/site"
    ServerName pornsnap.loc
    ErrorLog "logs/pornsnap-error.log"
    CustomLog "logs/pornsnap-access.log" common
</VirtualHost>

<VirtualHost *:443>
    DocumentRoot "F:/xampp/htdocs/pornsnap/site"
    ServerName pornsnap.loc
    SSLEngine on
    SSLCertificateFile "cert/pornsnap.loc/server.crt"
    SSLCertificateKeyFile "cert/pornsnap.loc/server.key"
</VirtualHost>
```