<?php
namespace Cashware\BootswatcherElements;

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;

class CarouselItem extends DataObject {
    private static $table_name = 'CarouselItem';

    private static $db = [
        'Title' => 'Varchar(255)',
        'Caption' => 'Varchar(255)',
    ];

    private static $owns = [
        'Image'
    ];

    private static $has_one = [
        'Image' => Image::class,
        'Parent' => ElementCarousel::class
    ];

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

        if(!$this->Caption) {
            $valid->addError('Caption is required');
        }

        if(!$this->ImageID) {
            $valid->addError('Image is required');
        }

        return $valid;
    }
}
