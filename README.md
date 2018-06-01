# YAF-docker
最小PHP YAF的docker镜像
[![](https://images.microbadger.com/badges/version/newfuture/yaf.svg)](https://hub.docker.com/r/newfuture/yaf/) [![](https://images.microbadger.com/badges/image/newfuture/yaf.svg)](https://microbadger.com/images/newfuture/yaf "datails")

`newfuture/yaf` : the minimal docker image for yaf extension (default environment is dev )

## Details 

PHP YAF images based on alpine (the mini docker image which is about 1.8MB after compressed !)


### all images:

* [![](https://images.microbadger.com/badges/image/newfuture/yaf:php7.svg)](https://microbadger.com/images/newfuture/yaf:php7) [`php7` (latest)](https://github.com/NewFuture/YAF-docker/tree/docker/php5/cli/)
* [![](https://images.microbadger.com/badges/image/newfuture/yaf:fpm-php7.svg)](https://microbadger.com/images/newfuture/yaf:fpm-php7) [`fpm-php7`](https://github.com/NewFuture/YAF-docker/blob/docker/php7/fpm/)
* [![](https://images.microbadger.com/badges/image/newfuture/yaf:php5.svg)](https://microbadger.com/images/newfuture/yaf:php5) [`php5`](https://github.com/NewFuture/YAF-docker/tree/docker/php5/cli/)
* [![](https://images.microbadger.com/badges/image/newfuture/yaf:fpm-php5.svg)](https://microbadger.com/images/newfuture/yaf:fpm-php5) [`fpm-php5`](https://github.com/NewFuture/YAF-docker/blob/docker/php7/fpm/)

### include the latest php extensions:
- [YAF](https://github.com/laruence/yaf)
- [php-memcached](https://pecl.php.net/package/memcached)
- [php-redis](https://pecl.php.net/package/redis)
- PDO-*
- mcrypt
- curl
- gd

## Environment var

| VAR | default | description |
| --- | --- | --- |
| `TIMEZONE` | UTC | for `date.timezone` setting ini php.ini |
|`MAX_UPLOAD` | 50M | `upload_max_filesize` setting |
|`DISPLAY_ERROR`| 1 | `display_errors` to show php errors |
|`STARTUP_ERROR`| 1 | `display_startup_errors` to display statrtup errors|
|`ASSERTIONS` | 0 | `zend.assertions`, only php7 supported: -1 close, 1 open|

## Usage

* pull image
```
docker pull newfuture/yaf
docker pull newfuture/yaf:fpm
```
* run your yaf app : replace `"/PATH/OF/YAF/APP/"` with your app path , and it will auto detect public path (if exist `public folder` and not exist `index.php` ,use the `public` as web root)
```bash
docker run -it --rm -p 1122:80 -v "`pwd`":/yaf newfuture/yaf
```
* run in background
```bash
docker run -d -p 1122:80 -v "`pwd`":/yaf newfuture/yaf
```
* using php5
```bash
docker run -it --rm -p 1122:80 -v "`pwd`":/yaf newfuture/yaf:php5
```
