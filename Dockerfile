FROM alpine:latest
MAINTAINER New Future <docker@newfuture.cc>

LABEL Name="YAF-docker" Description="mimimal docker image for PHP7 YAF"

# Environments
ENV PORT=80 \
	TIMEZONE=UTC \
	MAX_UPLOAD=50M \
	DISPLAY_ERROR=1 \
	STARTUP_ERROR=1 \
	ASSERTIONS=0 \
	PHP_INI="/etc/php7/php.ini"

# instal PHP
RUN	PHP_CONF="/etc/php7/conf.d" \
    && apk add --no-cache php7 php7-session php7-memcached php7-redis \
		libmemcached-libs \
	#php and ext
		php7-mcrypt \
		php7-openssl \
		php7-curl \
		php7-json \
		php7-dom \
		php7-bcmath \
		php7-gd \
		php7-pdo \
		php7-pdo_mysql \
		php7-pdo_sqlite \
		php7-pdo_odbc \
		php7-pdo_dblib \
		php7-gettext \
		php7-iconv \
		php7-ctype \
		php7-phar \
	# Set php.ini
	&& ADD_EXT(){ echo -e "extension = ${1}.so; \n${2}" > "$PHP_CONF/${1}.ini"; } \
	#ADD_EXT \
	&& ADD_EXT yaf "[yaf]\nyaf.environ = dev" \
	#ClEAN_TAG \
	&& rm -rf /var/cache/apk/* \
		/var/tmp/* \
		/tmp/* \
		/etc/ssl/certs/*.pem \
		/etc/ssl/certs/*.0 \
		/usr/share/ca-certificates/mozilla/* \
		/usr/share/man/* \
		/usr/include/*

#COPY build extensions
COPY ./modules/*.so /usr/lib/php7/modules/
COPY entry.sh /entry.sh

WORKDIR /yaf

EXPOSE $PORT

ENTRYPOINT [ "/entry.sh" ]

#CMD
CMD  php -S 0.0.0.0:$PORT $([ ! -f index.php ]&&[ -d public ]&&echo "-t public")