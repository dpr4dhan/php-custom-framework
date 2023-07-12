<?php
declare(strict_types = 1);

namespace App;

class View
{
//    protected ?string $layout = null;
    public function __construct(protected string $view, protected string $layout = '',protected array $params = [])
    {

    }

    public static function make(string $view, string $layout = '', array $params = []) :static
    {
        return new static($view, $layout, $params);
    }

    public function render()
    {

        $viewPath = VIEW_PATH. '/' . $this->view .'.php';
        if(!file_exists($viewPath)){
            throw new ViewNotFoundException();
        }
        //start output buffer
        ob_start();

        include $viewPath;

        //return buffer value
        $viewHtml =  (string) ob_get_clean();
        if($this->layout){
            $layoutPath = VIEW_PATH. '/' . $this->layout .'.php';
            if(!file_exists($viewPath)){
                throw new ViewNotFoundException();
            }
            //start output buffer
            ob_start();

            include $layoutPath;

            //return buffer value
            $layoutHtml =  (string) ob_get_clean();
            return str_replace('{{content}}', $viewHtml, $layoutHtml);

        }else{
            return $viewHtml;
        }
    }

    public function __toString() :string
    {
        return $this->render();
    }
}