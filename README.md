# YAF-Twig-Doctrine
基于docker镜像（newfuture/yaf）,目标是整合出yaf为基础，twig和doctrine附加上的这么一个框架。

twig已经整合好，doctrine还没有

`php-7.1.15`

`newfuture/yaf` : the minimal docker image for yaf extension (default environment is dev )

## Details 

- [YAF](https://github.com/laruence/yaf)
- [php-memcached](https://pecl.php.net/package/memcached)
- [php-redis](https://pecl.php.net/package/redis)
- PDO-*
- mcrypt
- curl
- gd

## Usage

* pull image
```
docker pull newfuture/yaf
docker pull newfuture/yaf:fpm
```


* run in background
```bash
docker run -d -p 1122:80 -v "`pwd`":/yaf newfuture/yaf
```
* using php5
```bash
docker run -it --rm -p 1122:80 -v "`pwd`":/yaf newfuture/yaf:php5
```
