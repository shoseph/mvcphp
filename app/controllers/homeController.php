 <?php

Class HomeController Extends Controller{
 
    public function index() {
        
        
        $user = $this->model("user");
        $user->name = "rafael";
        
        $this->view("home/index", ["name" => $user->name]);
    }
    
    public function test() {
        echo "Home/test";
    }
}