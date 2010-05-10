<?php
class Default_Form_Video extends Zend_Form
{
    
    public function init()
    {
        $this->setAttrib('enctype', 'multipart/form-data');
        
        $name = new Zend_Form_Element_Text('name');
        $name
            ->setLabel('Name')
            ->setRequired(true)
            ->addValidator(new Zend_Validate_NotEmpty());
            
        $referenceId = new Zend_Form_Element_Text('referenceId');
        $referenceId
            ->setLabel('Reference Id');
            
        $shortDescription = new Zend_Form_Element_Textarea('shortDescription');
        $shortDescription
            ->setRequired(true)
            ->addValidator(new Zend_Validate_NotEmpty())
            ->setLabel('Short description');
            
        $longDescription = new Zend_Form_Element_Textarea('longDescription');
        $longDescription
            ->setLabel('Long description');
           
        $tags = new Zend_Form_Element_Text('tags');
        $tags
            ->addFilter(new Zend_Filter_Null(Zend_Filter_Null::STRING))
            ->setLabel('Tags');
            
        $video = new Zend_Form_Element_File('video');
        $video
          ->setDestination(APPLICATION_PATH . '/../public/videos')
          ->addValidator(new Zend_Validate_File_NotExists())
          ->setLabel('Video');
            
        $submit = new Zend_Form_Element_Submit('submit');
        $submit
            ->setLabel('OK');
            
        $this
            ->addElement($name)
//            ->addElement($referenceId)
            ->addElement($shortDescription)
//            ->addElement($longDescription)
            ->addElement($tags)
            ->addElement($video)
            ->addElement($submit);
    }
    
}