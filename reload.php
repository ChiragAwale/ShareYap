<?php

   class Model
{
    public $string;

    public function __construct(){
        $this->string = 'MVC + PHP = Awesome, click here!';
    }

}
?>
<?php

class View
{
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
        return '<p><a href="mvc.php?action=clicked"' . $this->model->string . "</a></p>";
    }
}
?>
<?php

class Controller
{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function clicked() {
        $this->model->string = 'Updated Data, thanks to MVC and PHP!';
    }
}
?>