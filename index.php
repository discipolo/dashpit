
<?php
// Autoload dependencies
// https://getcomposer.org/doc/01-basic-usage.md#autoloading
require __DIR__ . '/vendor/autoload.php';

use dashpit\config;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

// load config
$config = new config();
$settings = $config->getConfig('config.yml');
$theme_directory = $settings['theme'];
// get data
$parsed_linklist = $config->getConfig('links.yml');

// initialize presentation layer
$loader = new Twig_Loader_Filesystem($theme_directory, 'templates');
$loader->addPath($theme_directory);
$twig = new Twig_Environment($loader, array(
   // 'cache' => 'compilation_cache',
));

echo $twig->render('index.html', array(
    'sitename' => 'dashpit',
    'linklist' => $parsed_linklist
));
// Debug
echo 'DEBUG:';
var_dump($settings);

?>
