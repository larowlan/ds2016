FROM drupal:8.1.10-apache

RUN apt-get update && \
    apt-get install -y vim mysql-client && \
    apt-get clean

RUN php -r "readfile('https://s3.amazonaws.com/files.drush.org/drush.phar');" > drush && \
    chmod a+x drush && \
    mv drush /usr/local/bin/drush