<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 03.12.18
 * Time: 12:09
 */

namespace vendor\core\base;


class View
{
    /**
     * current route and parameters
     * @var array
     */
    public $route = [];

    /**
     * current view
     * @var string
     */
    public $view;

    /**
     * current layout
     * @var string
     */
    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }

        $this->view = $view;

    }

    public function render($vars)
    {
        if (is_array($vars)) {
            extract($vars);
        }

        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view)) {
            require $file_view;
        } else {
            echo "<p>View is not found <b>$file_view</b></p>";
        }
        $content = ob_get_clean();

        if (false !== $this->layout) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";

            if (is_file($file_layout)) {
                require $file_layout;
            } else {
                echo "<p>layout is not found <b>$file_layout</b></p>";
            }
        }

    }

}