FROM ubuntu:16.04
MAINTAINER Kuflievskiy Aleksey <kuflievskiy@gmail.com>

LABEL "name"="Webserver"
LABEL "version"="0.0.1"

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
#ENV DEBIAN_FRONTEND noninteractive
RUN DEBIAN_FRONTEND=noninteractive \
    apt-get update && \
    apt-get install -y language-pack-en-base &&\
    export LC_ALL=en_US.UTF-8 && \
    export LANG=en_US.UTF-8

RUN DEBIAN_FRONTEND=noninteractive apt-get update && apt-get install -y software-properties-common
RUN DEBIAN_FRONTEND=noninteractive LC_ALL=en_US.UTF-8 add-apt-repository -y ppa:ondrej/php

RUN apt-get update
RUN apt-get update && \
  apt-get -y install \
    supervisor \
    git \
    apache2 \
    libapache2-mod-php7.3 \
    curl \
    wget \
    libnss3-dev \
    php7.3-curl \
    php7.3-mysqli \
    php7.3-zip zip unzip \
    php7.3-gd \
    php7.3-xml \
    php7.3-mbstring && \
  echo "ServerName localhost" >> /etc/apache2/apache2.conf

# installing soap
#RUN apt-get update -y \
#  && apt-get install -y \
#    libxml2-dev \
#    php7.3-soap

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

RUN apt-get -y install \
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

COPY install-scripts/wordpress.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/wordpress.sh

COPY install-scripts/drupal.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/drupal.sh

WORKDIR /var/www/html

EXPOSE 80
EXPOSE 443

#CMD apachectl -DFOREGROUND
CMD ["apachectl", "-DFOREGROUND"]