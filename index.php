
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


// initialize presentation layer
$loader = new Twig_Loader_Filesystem($theme_directory, './templates');
$loader->addPath($theme_directory);
$loader->addPath('./templates');
$twig = new Twig_Environment($loader, array(
    // 'cache' => 'compilation_cache',
));


$link_lists = $settings['linklists'];
foreach ($link_lists as $listsource => $link_list) {
    // get data
    $parsed_linklist = $config->getConfig($link_list['source']);
    // Debug
    //echo 'DEBUG:';
    //var_dump($link_list);
    echo $twig->render('linklist.html', array(
        'sitename' => 'dashpit',
        'linklist' => $parsed_linklist,
        'listsource' => $listsource
    ));
}


echo $twig->render('index.html', array(
    'sitename' => 'dashpit',
    'linklist' => $parsed_linklist
));


?>
