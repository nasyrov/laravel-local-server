# Laravel Local Server

The local server package providers a local development environment for Laravel projects. It is built on a containerized architecture using Docker images and Docker Compose to provide drop-in replacements for most components of the cloud infrastructure.

## Requirements

Make sure all dependencies have been installed before moving on:

* [PHP](http://php.net/manual/en/install.php) >= 7.2
* [Composer](https://getcomposer.org/download/)
* [Docker Desktop](https://www.docker.com/products/docker-desktop)

## Installation

You can install the package via composer:

```bash
composer require nasyrov/laravel-local-server --dev
```

## Usage

### Starting the local server

To start the local server, simply run `composer local-server start`. The first time this will download all the necessary Docker images. Once the initial install is over and download have completed, you should see the output:

``` sh
Starting...
Starting blog-proxy         ... done
Starting blog-redis         ... done
Starting blog-mysql         ... done
Starting blog-php           ... done
Starting blog-phpmyadmin    ... done
Starting blog-nginx         ... done
Started.

To access site please visit: http://blog.localtest.me/
To access phpmyadmin please visit: http://phpmyadmin.blog.localtest.me/
```

Visiting your site's URL should now work.

### Stopping the local server

To stop the local server containers, simply run `composer local-server stop`.

### Destroying the local server

To destroy the local server containers, simply run `composer local-server destroy`.

### Viewing the local server status

To get details on the running local server status and containers, run `composer local-server status`. You should see output similar to:

```sh
     Name                          Command                 State                         Ports
------------------------------------------------------------------------------------------------------------------------
blog-mysql           docker-entrypoint.sh --def ...   Up (healthy)   3306/tcp, 33060/tcp
blog-nginx           nginx -g daemon off;             Up             80/tcp
blog-php             docker-php-entrypoint php-fpm    Up             9000/tcp
blog-phpmyadmin      /docker-entrypoint.sh apac ...   Up             80/tcp
blog-proxy           /traefik                         Up             0.0.0.0:80->80/tcp, 0.0.0.0:8080->8080/tcp
blog-redis           docker-entrypoint.sh redis ...   Up             6379/tcp
```

All containers should have a status of "Up". If they do not, you can inspect the logs for each service by running `composer local-server logs <service>`, for example, if `blog-mysql` shows a status other than "Up", run `composer local-server logs mysql`.

### Viewing the local server logs

Often you'll want to access logs from the services that local server provides. For example, PHP errors logs, Nginx access logs, or MySQL logs. To do so, run the `composer local-server logs <service>` command, where `<service>` can be any of `php`, `nginx`, `mysql`, `redis`. This command will tail the logs.

## Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email inasyrov@ya.ru instead of using the issue tracker.

## Credits

- [Evgenii Nasyrov](https://github.com/nasyrov)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
