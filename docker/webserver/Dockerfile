FROM ubuntu:trusty
MAINTAINER Kuflievskiy Aleksey <kuflievskiy@gmail.com>

# Labels.
LABEL org.label-schema.schema-version="1.0"
LABEL org.label-schema.build-date="2019-04-09"
LABEL org.label-schema.name="kuflievskiy/docker-project-skeleton"
LABEL org.label-schema.maintainer="kuflievskiy@gmail.com"
LABEL org.label-schema.description="Docker project skeleton"
LABEL org.label-schema.url="https://github.com/kuflievskiy/docker-project-skeleton"
LABEL org.label-schema.vcs-url="https://github.com/kuflievskiy/docker-project-skeleton"
LABEL org.label-schema.version="1.0"
LABEL org.label-schema.docker.cmd="docker-compose up -d --build"

# Install packages
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update && \
  apt-get -y --force-yes install software-properties-common && \
  add-apt-repository -y ppa:ondrej/php && \
  apt-get update && \
  apt-get -y --force-yes install \
    supervisor \
    git \
    apache2 \
    libapache2-mod-php7.2 \
    curl \
    wget \
    php-curl \
    php7.2-mysqli \
    php7.2-zip zip unzip \
    php7.2-gd \
    php7.2-xml \
    php7.2-mbstring && \
  echo "ServerName localhost" >> /etc/apache2/apache2.conf

# installing soap
#RUN apt-get update -y \
#  && apt-get install -y --force-yes \
#    libxml2-dev \
#    php-soap

# Adds Ruby 2.1 to Ubuntu 14.04
# and install "Web Package Update checker"
#RUN add-apt-repository ppa:brightbox/ruby-ng -y && \
#    apt-get update && \
#    apt-get install ruby2.1 -y && \
#    gem install web-puc

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# config to enable .htaccess
#ADD etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

RUN apt-get -y --force-yes install \
 php-xdebug \
 vim

# Install sSMTP service.
RUN apt-get update && \
    apt-get install -y ssmtp && \
    apt-get clean

# Configure /app folder with sample app
#RUN git clone https://github.com/kuflievskiy/drupal /app
#RUN mkdir -p /app && rm -fr /var/www/html && ln -s /app /var/www/html

#Environment variables to configure php
ENV PHP_UPLOAD_MAX_FILESIZE 10M
ENV PHP_POST_MAX_SIZE 10M

# Add volumes
# /var/lib/docker/volumes/%folder-name%
# VOLUME  ["/etc/mysql", "/var/lib/mysql", "/var/log/apache2" ]

EXPOSE 80
EXPOSE 443

#CMD apachectl -DFOREGROUND
CMD ["apachectl", "-DFOREGROUND"]