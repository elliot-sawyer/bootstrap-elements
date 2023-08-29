<?php
namespace Cashware\BootswatcherElements;

use SilverStripe\Control\Cookie;
use SilverStripe\ORM\DataObject;

class AccordionItem extends DataObject
{
    private static $table_name = 'AccordionItem';
    private static $db = [
        'Title' => 'Varchar(255)',
        'HTML' => 'HTMLText'
    ];

    private static $has_one = [
        'Parent' => ElementAccordion::class
    ];

    /**
     * Check the value of an accordion to see if it has been saved as "open"
     * This is saved as a cookie, so if the page is refreshed the choice is remembered
     *  - if the value is 1, the accordion has been opened before leaving the page
     *  - if the value is 0, the accordion has been closed before leaving the page
     * @return boolean
     */
    public function IsOpen()
    {
        $cookie = Cookie::get('element-accordionitem-'.$this->ID);
        return $cookie == 1;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('ParentID');
        return $fields;
    }

    public function validate()
    {
        $valid = parent::validate();

        if(!$this->Title) {
            $valid->addError('Title is required');
        }

        if(!$this->HTML || mb_strlen($this->HTML) < 7) {
            $valid->addError('HTML is required or needs more than just markup');
        }
        return $valid;
    }
}
