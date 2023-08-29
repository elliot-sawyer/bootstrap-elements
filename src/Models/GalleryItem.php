<?php
namespace Cashware\BootswatcherElements;

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;

class GalleryItem extends DataObject
{
    private static $table_name = 'GalleryItem';

    private static $db = [
        'Title' => 'Varchar(255)',
        'Caption' => 'HTMLText',
        'Sort' => 'Int',
    ];

    private static $owns = [
        'Image'
    ];

    private static $has_one = [
        'Image' => Image::class,
        'Parent' => ElementGallery::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(['Sort', 'ParentID']);

        return $fields;
    }

    public function onBeforeWrite()
    {
		if (!$this->Sort) {
			$this->Sort = GalleryItem::get()->max('Sort') + 1;
		}

		parent::onBeforeWrite();
    }
}
