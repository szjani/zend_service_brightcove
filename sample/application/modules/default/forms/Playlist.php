<?php
class Default_Form_Playlist extends Zend_Form
{
    public function init()
    {
        $referenceId = new Zend_Form_Element_Text('referenceId');
        $referenceId
            ->setRequired(true)
            ->addValidator(new Zend_Validate_NotEmpty())
            ->setLabel('Reference Id');
            
        $name = new Zend_Form_Element_Text('name');
        $name
            ->setRequired(true)
            ->addValidator(new Zend_Validate_NotEmpty())
            ->setLabel('Name');
            
        $shortDescription = new Zend_Form_Element_Textarea('shortDescription');
        $shortDescription
            ->setLabel('Short description');
            
        $videoIds = new Zend_Form_Element_Text('videoIds');
        $videoIds
            ->addFilter(new Zend_Filter_Null(Zend_Filter_Null::STRING))
            ->setLabel('Video Ids');
            
        $types = ZendX_Service_Brightcove_Enums_PlaylistTypeEnum::getConstants();
        $playlistType = new Zend_Form_Element_Select('playlistType');
        $playlistType
            ->addMultiOptions(array_combine($types, $types))
            ->setRequired(true)
            ->addValidator(new Zend_Validate_NotEmpty())
            ->setLabel('Type');
            
        $filterTags = new Zend_Form_Element_Text('filterTags');
        $filterTags
            ->addFilter(new Zend_Filter_Null(Zend_Filter_Null::STRING))
            ->setLabel('Filter tags');
            
        $submit = new Zend_Form_Element_Submit('submit');
        $submit
            ->setLabel('OK');
            
        $this
            ->addElement($referenceId)
            ->addElement($name)
            ->addElement($shortDescription)
//            ->addElement($videoIds)
            ->addElement($playlistType)
            ->addElement($filterTags)
            ->addElement($submit);
    }
}