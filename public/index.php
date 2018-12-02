<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require __DIR__ . '/../vendor/autoload.php';

Use eftec\bladeone\BladeOne;

$dotenv = new Dotenv\Dotenv(__DIR__.'/..');
$dotenv->load();

$pages = new SimpleWebsite\Pages($_ENV['PAGES_CONFIG']);
$components = new SimpleWebsite\Modules($_ENV['COMPONENTS_CONFIG']);

$parsedown = new Parsedown;

$views = $_ENV['BASE_DIR'] . '/views';
$cache = $_ENV['BASE_DIR'] . '/cache';
$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if(isset($_GET['urlName'])){
    $pageUrl = $_GET['urlName'];
    echo $pages->run($pageUrl);
}
else echo $pages->load(0);
?>