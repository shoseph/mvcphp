 <?php

Class Controller {

    public function model($model){
        
        $model .= "Model";

        // verifying if exists the file
        if(file_exists("../app/models/{$model}.php")){
            
            // loading the controller file and creating a new instance of our controller
            require_once "../app/models/{$model}.php"; 
        }
        return new $model();
    }
    
    
    public function view($view,$data = []){
        
        // verifying if exists the file
        if(file_exists("../app/views/{$view}.php")){
            
            // loading the controller file and creating a new instance of our controller
            require_once "../app/views/{$view}.php"; 
        }
        
    }
    
    
}