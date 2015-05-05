<?php
namespace acl\Core\Entity;

class Hydrator
{
    
    public function hydrate($array, $entity)
    {
        foreach ($array as $key => $value)
        {
            $entity->$key = $value;
        }
        return $entity; // hydrated entity
    }
    
    public function extract($entity)
    {
        $array=[];
        foreach ($entity as $key => $property)
        {
            $array[$key] = $property;
        }
        return $array;
    }
}