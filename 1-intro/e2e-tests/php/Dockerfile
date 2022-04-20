FROM php:7.0-apache

COPY src/ /var/www/html

RUN touch /var/www/html/messages.txt
RUN chmod +xw /var/www/html/messages.txt
RUN chown www-data:www-data /var/www/html/messages.txt

# FORWARD ERROR FOR LOGS
RUN ln -sf /proc/self/fd/1 /var/log/apache2/access.log && \
    ln -sf /proc/self/fd/1 /var/log/apache2/error.log

EXPOSE 80
