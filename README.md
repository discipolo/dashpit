# dashpit link page
 +[![Stories in Ready](https://badge.waffle.io/discipolo/dashpit.png?label=ready&title=Ready)](https://waffle.io/discipolo/dashpit)
will show a list of links

## Requirements:

* [Composer](https://getcomposer.org/)
* A working [Docker ](https://www.docker.com/)

Note: on Mac you can get composer easily with `brew install homebrew/php/composer`

## Setup
run `init.sh` in directory after cloning to get dependencies

## Configure
yaml file takes associative titles and urls for now

## Run in Docker:
`docker run -d  -v $(pwd):/var/www/html -p 8042:80 php:5.6-apache`
 
Then visit [localhost:8042](http://localhost:8042) (or <your docker host>:8042)


## Run in your own webserver
you can also place these files in a webroot of your apache server that should be configured to run php.


