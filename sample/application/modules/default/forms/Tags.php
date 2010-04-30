<?php
class Default_Form_Tags extends Zend_Form
{
    public function init()
    {
        $andTags = new Zend_Form_Element_Text('andTags');
        $andTags
            ->setLabel('And tags');
            
        $orTags = new Zend_Form_Element_Text('orTags');
        $orTags
            ->setLabel('Or tags');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit
            ->setLabel('OK');
        
        $this
            ->addElement($andTags)
            ->addElement($orTags)
            ->addElement($submit);
    }
}