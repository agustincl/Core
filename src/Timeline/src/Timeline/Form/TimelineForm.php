<?php
namespace Timeline\Form;

use Zend\Form\Form;

class TimelineForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('timeline');

        $this->add(array(
            'name' => 'idtimeline',
            'type' => 'Hidden',
        ));
        
     
        
        $this->add(array(
            'name' => 'startdate',
            'type' => 'Date',
            'options' => array(
                'label' => 'startdate',
            ),
        ));
        
    
        
        $this->add(array(
            'name' => 'enddate',
            'type' => 'Date',
            'options' => array(
                'label' => 'enddate',
            ),
        ));
        
        
        $this->add(array(
            'name' => 'headline',
            'type' => 'Text',
            'options' => array(
                'label' => 'headline',
            ),
        ));
        
        $this->add(array(
            'name' => 'text',
            'type' => 'Text',
            'options' => array(
                'label' => 'text',
            ),
        ));
        
        $this->add(array(
            'name' => 'media',
            'type' => 'Text',
            'options' => array(
                'label' => 'media',
            ),
        ));
        
        $this->add(array(
            'name' => 'mediacredit',
            'type' => 'Text',
            'options' => array(
                'label' => 'mediacredit',
            ),
        ));
        
        $this->add(array(
            'name' => 'mediacaption',
            'type' => 'Text',
            'options' => array(
                'label' => 'mediacaption',
            ),
        ));
        
        $this->add(array(
            'name' => 'mediathumbnail',
            'type' => 'Text',
            'options' => array(
                'label' => 'mediathumbnail',
            ),
        ));
        
        $this->add(array(
            'name' => 'type',
            'type' => 'Text',
            'options' => array(
                'label' => 'type',
            ),
        ));
        
        $this->add(array(
            'name' => 'tag',
            'type' => 'Text',
            'options' => array(
                'label' => 'tag',
            ),
        ));
        
        
        
        
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}