FROM centos:7

RUN yum install -y  epel-release && yum install -y  https://rpms.remirepo.net/enterprise/remi-release-7.rpm &&  yum clean all && rm -rf /var/cache/yum

RUN yum install -y php81-php-bcmath \
    php81-php-redis \
    php81-php-soap \
    php81-php-json \
    php81-php \
    php81-php-mysqlnd \
    php81-php-gd \
    php81-php-mbstring \
    php81-runtime \ 
    php81-php-pdo \
    php81-php-pecl-crypto \
    php81-php-gmp \
    php81-php-cli \
    php81-php-pecl-mysql \
    php81-php-pecl-zip \
    php81-php-xml \
    php81-php-pecl-memcached \
    php81-php-opcache \ 
    unzip \
    httpd \ 
    && yum clean all && rm -rf /var/cache/yum

ENV PHP_PATH "/opt/remi/php81/root/usr/bin/php"
ENV PATH "/opt/remi/php81/root/usr/bin:/opt/remi/php81/root/usr/sbin${PATH:+:${PATH}}"
ENV LD_LIBRARY_PATH "/opt/remi/php81/root/usr/lib64${LD_LIBRARY_PATH:+:${LD_LIBRARY_PATH}}"

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && php -r "unlink('composer-setup.php');" && mv composer.phar /bin/composer && chmod +x /bin/composer

RUN echo " " > /etc/httpd/conf.d/welcome.conf && \ 
    echo " " > /etc/httpd/conf.d/userdir.conf && \ 
    echo " " > /etc/httpd/conf.d/autoindex.conf 

RUN sed -i 's/AllowOverride\ None/AllowOverride\ All/g' /etc/httpd/conf/httpd.conf && sed -i 's/\/var\/www\/html/\/var\/www\/html\/public/g' /etc/httpd/conf/httpd.conf

COPY . /var/www/html 

WORKDIR /var/www/html

RUN cp .env.example .env && composer install && php artisan key:generate

CMD httpd -D FOREGROUND 