 <?php

Class App {
 
    // Primary variables of our MVC
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];
    
    public function __construct() {
        
        // geting the url params
        $url = isset($_GET['url']) ? self::parseUrl($_GET['url']) : [];
        
        // verifying if exists the file
        if(file_exists("app/controllers/{$url[0]}.php")){
            
            // seting the value of url and unset the first param in our url array of params
            $this->controller = $url[0];
            unset($url[0]);
        }
        
        // loading the controller file and creating a new instance of our controller
        require_once "app/controllers/{$this->controller}.php";
        $this->controller = new $this->controller;
            
        // verifying if the method exist in the controller and setting if its exists
        if (isset($url[1]) && method_exists($this->controller, $url[1])){
            $this->method = $url[1];
            unset($url[1]);
        }
        
        // setting an arrayr of parms or creating an empty array
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
        
    }
    
    private function parseUrl($url){
        return explode("/", filter_var(rtrim($url), FILTER_SANITIZE_URL));
        
    }
}