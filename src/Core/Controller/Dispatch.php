<?php
namespace acl\Core\Controller;

use acl\Core\Options\OptionsAwareInterface;
class Dispatch
{
    
    static public function dispatcher($request)
    {
        
        $moduleName = $request['module']."\Module";
        $options = $moduleName::getInstance()->options;
        
        $controllerName = $request['module'].'\\Controller\\'.$request['controller'];
        $actionName = $request['action'];
        
        $controller = new $controllerName($request);
        
        if($controller instanceof OptionsAwareInterface)
            $controller->setOptions($options);
        
        $view = $controller->$actionName();
        
        $layout = $controller->layout;
        
        $html = self::twoStep($layout, $view);
        
        return $html;
    }
    
    static public function twoStep($layout, $content)
    {
        ob_start();
            include (RPATH."/modules/Application/views/layouts/".$layout.".phtml");
            $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
  
    
}