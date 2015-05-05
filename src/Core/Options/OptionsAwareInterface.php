<?php
namespace acl\Core\Options;

interface OptionsAwareInterface
{
    public function getOptions();
    
    public function setOptions($options);
}