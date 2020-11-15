<?php

    use App\Kernel;
    use Symfony\Component\Dotenv\Dotenv;
    use Symfony\Component\ErrorHandler\Debug;
    use Symfony\Component\HttpFoundation\Request;

    require dirname(__DIR__).'/vendor/autoload.php';

    (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');

    if ($_SERVER['APP_DEBUG']) {
        umask(0000);

        Debug::enable();
    }

    if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? false) {
        Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_FOR | Request::HEADER_X_FORWARDED_PORT | Request::HEADER_X_FORWARDED_PROTO);
    }

    if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? false) {
        Request::setTrustedHosts([$trustedHosts]);
    }

    $var = (bool) $_SERVER['APP_DEBUG'];
    echo "dbConnection \n" . $var;
    $db = $_SERVER['APP_ENV'];
    echo $db;
?>