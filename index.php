
<?php

# //https://getcomposer.org/doc/01-basic-usage.md#autoloading
require __DIR__ . '/vendor/autoload.php';


use dashpit\LinkList;
//TODO: configure linklist source, possibly as constant
$linklistobject = new LinkList('links.yml');
$parsed_linklist = $linklistobject->getLinkList();

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
   // 'cache' => 'compilation_cache',
));

echo $twig->render('index.html', array(
    'sitename' => 'dashpit',
    'linklist' => $parsed_linklist
));
// Debug
//echo 'DEBUG:';
//var_dump($parsed_linklist);

?>
