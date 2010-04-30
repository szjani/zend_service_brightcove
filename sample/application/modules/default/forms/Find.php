<?php
class Default_Form_Find extends Zend_Form
{
    public function init()
    {
        $find = new Zend_Form_Element_Text('find');
        $find
            ->setLabel('Find')
            ->setRequired(true)
            ->addValidator(new Zend_Validate_NotEmpty());
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit
            ->setLabel('OK');
        
        $this
            ->addElement($find)
            ->addElement($submit);
    }
}