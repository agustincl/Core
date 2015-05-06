<?php
namespace acl\Core\Controller;

use Timeline\Options\ModuleOptions;
class ModuleManager
{
    public function __construct($config)
    {
        $config = include $config;
        
        $moduleConfigs=[];
        foreach ($config as $module)
        {
            $global = [];
            $local = [];
            $globalName = ROOT_PATH.'/configs/autoload/'.strtolower(str_replace('\\', ".", $module).'.global.php');
            $localName = ROOT_PATH.'/configs/autoload/'.strtolower(str_replace('\\', ".", $module).'.local.php');
            
            if(file_exists($globalName))
                $global = include $globalName;
            
            if(file_exists($localName))
                $local = include $localName;
           
            if(isset($local))
                $options = array_merge($global, $local);
            else if(isset($global))
                $options = $global;
            else 
                $options = [];
    
            
            $moduleOptionsName = $module.'\Options\ModuleOptions';
            
            $moduleOptions = null;
            if(class_exists($moduleOptionsName))
            {
                $moduleOptions = new $moduleOptionsName();
                
                foreach ($options as $key => $value)
                {
                    $methodName = 'set'.$key;
                    $moduleOptions->$methodName($value);
                } 
                
                $moduleName = $module."\Module";
                $module = $moduleName::getInstance();
                $module->options = $moduleOptions;
                                
//                 echo "<pre>";
//                 print_r($module);
//                 echo "</pre>";
            }
             
        }
        
        
            
    }
    
    
    
}
