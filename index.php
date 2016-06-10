
<?php
//https://getcomposer.org/doc/01-basic-usage.md#autoloading
require __DIR__ . '/vendor/autoload.php';

// http://symfony.com/doc/current/components/yaml/introduction.html#reading-yaml-files
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

try {
    $values = Yaml::parse(file_get_contents('links.yml'));
} catch (ParseException $e) {
    printf("Unable to parse the YAML string: %s", $e->getMessage());
}


// http://stackoverflow.com/questions/11300658/making-a-list-of-links-with-php
echo '<ul>';
foreach($values as $k => $v) {
  echo '<li >';
  echo '<a href="//' . $v . '">' . $k . '</a>';
  echo '</li >';
}
echo '</ul>';


// Debug
//echo 'DEBUG:';
//var_dump($values);

?>
