FROM inovedados/php:7.4-apache-openshift

USER root

# copy application files
COPY . /var/www/html

# fix permissions
RUN chown -R inovedados:root /var/www/html

# copy job files
COPY docker/supervisor/* /etc/supervisord.d/

# copy deployer script
ADD ./docker/deploy.sh /usr/bin/deploy

# Make builder script as executable
RUN chmod +x /usr/bin/deploy

# change to openshift default user
USER 1001:0

# install dependencies
RUN composer update

# run deployment script
ENTRYPOINT ["deploy"]