<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 18/12/17
 * Time: 11:08
 */

namespace TVTS;

class View
{
    private $data;
    private $view;

    /**
     * View constructor.
     * @param $view
     */
    public function __construct($view)
    {
        $this->view = $view;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @return string
     */
    public function render()
    {
        // Retornar o buffer do browser
        ob_start();

        if (!file_exists($view = VIEWS_PATH . $this->view . '.phtml'))
            die($view . ' não foi encontrada!');

        require $view;

        // Quando limpar, só irá retornar a view
        return ob_get_clean();
    }
}