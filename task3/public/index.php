<?php
use vendor\core\Router;

//determine the part the string after the ?
$query = rtrim($_SERVER['QUERY_STRING'], '/');

/*
 * CONSTANTS
 * */
define('DEBUG', 1);
define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('CACHE', dirname(__DIR__) . '/tmp/cache');
define('LIBS', dirname(__DIR__) . '/vendor/libs');
define('LAYOUT', 'default');



//require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
/*require '../app/controllers/Main.php';
require '../app/controllers/Posts.php';
require '../app/controllers/PostsNew.php';*/

//debug($_GET);

spl_autoload_register(function ($class) {
   $file = ROOT .'/'.str_replace('\\', '/', $class). '.php';
    //$file = APP . "/controllers/$class.php";
    if (is_file($file)) {
        require_once $file;
    }
});

new \vendor\core\App;
/*Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);
Router::add('posts', ['controller' => 'Posts', 'action' => 'index']);
Router::add('', ['controller' => 'Main', 'action' => 'index']);*/

//Router::add('^page/?(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

//default routes
Router::add('^admin$', ['controller' => 'User', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

//debug(Router::getRoutes());

/*
if (Router::matchRoute($query)) {
    debug(Router::getRoute());
} else {
    echo '404';
}*/

vendor\core\Router::dispatch($query);