<?php
namespace Timeline\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Timeline
{
    public $idtimeline;
    public $startdate;
    public $enddate;
    public $headline;
    public $text;
    public $media;
    public $mediacredit;
    public $mediacaption;
    public $mediathumbnail;
    public $type;
    public $tag;
    protected $inputFilter;                       // <-- Add this variable

    public function exchangeArray($data)
    {
        $this->idtimeline     = (!empty($data['idtimeline'])) ? $data['idtimeline'] : null;
        $this->startdate     = (!empty($data['startdate'])) ? $data['startdate'] : null;
        $this->enddate     = (!empty($data['enddate'])) ? $data['enddate'] : null;
        $this->headline     = (!empty($data['headline'])) ? $data['headline'] : null;
        $this->text     = (!empty($data['text'])) ? $data['text'] : null;
        $this->media     = (!empty($data['media'])) ? $data['media'] : null;
        $this->mediacredit     = (!empty($data['mediacredit'])) ? $data['mediacredit'] : null;
        $this->mediacaption     = (!empty($data['mediacaption'])) ? $data['mediacaption'] : null;
        $this->mediathumbnail     = (!empty($data['mediathumbnail'])) ? $data['mediathumbnail'] : null;
        $this->type     = (!empty($data['type'])) ? $data['type'] : null;
        $this->tag = (!empty($data['tag'])) ? $data['tag'] : null;
        
   
    }
    
    // Add the following method:
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    
    // Add content to these methods:
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
    
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
    
           
    
//             $inputFilter->add(array(
//                 'name'     => 'idtimeline',
//                 'required' => true,
//                 'filters'  => array(
//                     array('name' => 'StripTags'),
//                     array('name' => 'StringTrim'),
//                 ),                
//             ));
            
            $inputFilter->add(array(
                'name'     => 'startdate',
                'required' => true,
                
                
            ));
            
            $inputFilter->add(array(
                'name'     => 'enddate',
                'required' => true,
                
                
            ));
            
            $inputFilter->add(array(
                'name'     => 'headline',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name'     => 'text',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name'     => 'media',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name'     => 'mediacredit',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name'     => 'mediacaption',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name'     => 'mediathumbnail',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name'     => 'type',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            ));
            
            $inputFilter->add(array(
                'name'     => 'tag',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            ));
            
            
    
            
    
            $this->inputFilter = $inputFilter;
        }
    
        return $this->inputFilter;
    }
}