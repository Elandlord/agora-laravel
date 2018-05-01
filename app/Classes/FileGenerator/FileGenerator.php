<?php

namespace App\Classes\FileGenerator;

class FileGenerator {


    public static function createFile(array $file) 
    {
        $generatedFile = fopen($file['directory'] . $file['fileName'], "w");
        fwrite($generatedFile, $file['contents']);
    }

    public static function openFile($filename) 
    {

    }

    public static function generateController($entity) 
    {
        $path_to_file = '../app/Classes/FileGenerator/templates/php/controller.txt' ;
        $file_contents = file_get_contents($path_to_file);
        $contents = str_replace("__className__", $entity->name , $file_contents);        
        
        FileGenerator::createFile([
            'fileName' =>  ucfirst($entity->name) . 'Controller.php', 
            'directory' => '../app/Http/Controllers/api/', 
            'contents' => $contents
        ]);

    }

    public static function generateEntitiesFile($entities) 
    {
        $path_to_file = '../resources/assets/js/cms/Objects.js';
        unlink($path_to_file);    
        
        $contents = "
        /*
        |--------------------------------------------------------------------------
        | Import
        |--------------------------------------------------------------------------
        |
        | Import your models here
        | 
        | 
        |
        */
        
        ";

        foreach($entities as $key => $entity) {
            $contents .= "import {$entity->name} from './models/" . lcfirst($entity->name) . "';\n        "; 
        }

        $contents .= "
    
        /*
        |--------------------------------------------------------------------------
        | Insert
        |--------------------------------------------------------------------------
        |
        | Insert your models in the models object below.
        | 
        | 
        |
        */
    
        window.models = {";
 
        foreach($entities as $key => $entity) {
            $contents .= "\n            " .lcfirst($entity->name) . ": " . $entity->name . ','; 
        } 
    
        $contents .= "\n        };
            
        ";

        FileGenerator::createFile([
            'fileName' =>  'Objects.js', 
            'directory' => '../resources/assets/js/cms/', 
            'contents' => $contents
        ]);
    }

    public static function generateApi($entity) 
    {
        $contents = file_get_contents('../routes/api.php');
        $contents .= "\n Route::resource('" . lcfirst($entity->name) . "', 'api\\" . $entity->name . "Controller');";
        \file_put_contents('../routes/api.php', $contents);
    }
    
    public static function setContents()
    {

    }



}