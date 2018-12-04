<?php
namespace vendor\core;
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 02.12.18
 * Time: 16:02
 */
class Router
{
    protected static $routes = []; //table of routes
    protected static $route = []; //current route

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function matchRoute($url)
    {

        /*
         * preg_match ( string pattern, string subject [, array &matches [, int flags [, int offset]]] )
         * В случае, если дополнительный параметр matches указан, он будет заполнен результатами поиска.
         * Элемент $matches[0] будет содержать часть строки, соответствующую вхождению всего шаблона,
         * $matches[1] - часть строки, соответствующую первой подмаске, и так далее.
         *
         * */
        foreach (self::$routes as $pattern => $route) {
            /*print_r('<b>Pattern: </b>'.$pattern);
            echo '<br/>';
            print_r('<b>Route: </b>');
            print_r($route);
            echo '<br/>';
            print_r('<b>Url: </b>'.$url);
            echo '<br/>------------------<br/>';*/

            if (preg_match("#$pattern#i", $url, $matches)) {
               /* print_r('<b>Matches: </b>');
                print_r($matches);*/
                foreach ($matches as $k => $v) {
                    //if key == 'controller' or key =='action'
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (!isset($route['action']))
                    $route['action'] = 'index';
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * redirect URL to correct route
     * @param string $url income url
     * @return void
     *
     */
    public static function dispatch($url)
    {
        //remove explicit query string.
        //according to htaccess rule RewriteRule (.*) index.php?$1 [L,QSA]
        //we have implicit (our url) and  explicit (part after ?) query strings

        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {

            $controller = 'app\\controllers\\' . self::$route['controller']. 'Controller';
            //debug(self::$route);
            if (class_exists($controller)) {
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';

                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                    $cObj->getView();
                } else {
                    echo "Method <b>$controller::$action</b> not found";
                }
            } else {
                echo 'Controller <b>' . $controller . '</b> not found';
            }
        } else {
            http_response_code(404);
            include '404.html';
        }
    }

    public static function upperCamelCase($name)
    {
        /*
         * string ucwords ( string $str [, string $delimiters = " \t\r\n\f\v" ] )
         * -Преобразует в верхний регистр первый символ каждого слова в строке
         * Словом при этом является любая последовательность символов, следующая непосредственно
         * за любым из символов, перечисленных в параметре delimiters
         * (по умолчанию это пробел, разрыв страницы, перевод строки, возврат каретки, горизонтальная или вертикальная табуляция).
         *
         */

        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));

    }

    public static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    protected static function removeQueryString($url){
        if($url){
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }
            else{
                return '';
            }
        }

        return $url;
    }

}