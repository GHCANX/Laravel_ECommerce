## Clone Repo

- Check permissions
- check dependencies
- check .env

## Install TOR

## Configure NGINX
- default configuration
   ```
   server {
    server_name xmrship.com;
    root /var/www/Laravel_ECommerce/public;
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    add_header Onion-Location http://xmrshipawdb5exkh4rmn43cixzqf7ziwdm3ojuanfodul4ohz3vwpvyd.onion$request_uri;
    index index.php;
    charset utf-8;
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
    error_page 404 /index.php;
    location ~ ^/index\.php(/|$) {
        fastcgi_pass unix:/var/run/php/php8.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }
    location ~ /\.(?!well-known).* {
        deny all;
    }
    listen 443 ssl; # managed by Certbot
    ssl_certificate /etc/letsencrypt/live/xmrship.com/fullchain.pem; # managed by Certbot
    ssl_certificate_key /etc/letsencrypt/live/xmrship.com/privkey.pem; # managed by Certbot
    include /etc/letsencrypt/options-ssl-nginx.conf; # managed by Certbot
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem; # managed by Certbot
    }
    server {
        if ($host = xmrship.com) {
            return 301 https://$host$request_uri;
        } # managed by Certbot
        server_name xmrship.com;
        listen 80;
        return 404; # managed by Certbot
    }
  ```
- TOR configuration
   ```
    server {
    listen 8099;
        server_name xmrshipawdb5exkh4rmn43cixzqf7ziwdm3ojuanfodul4ohz3vwpvyd.onion;
        location / {
            proxy_pass https://xmrship.com;
        }
    }
  ```
