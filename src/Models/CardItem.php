<?php
namespace Cashware\BootswatcherElements;

use DNADesign\Elemental\Forms\TextCheckboxGroupField;
use gorriecoe\Link\Models\Link;
use gorriecoe\LinkField\Forms\HasOneLinkField;
use gorriecoe\LinkField\LinkField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class CardItem extends DataObject
{
    private static $table_name = 'CardItem';
    private static $db = [
        'ShowTitle' => 'Boolean',
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
    ];

    private static $owns = [
        'Image',
        'Link',
    ];

    private static $has_one = [
        'Image' => Image::class,
        'Parent' => ElementCards::class,
        'Link' => Link::class
    ];

    private static $summary_fields = [
        'Image.CMSThumbnail' => '',
        'Title',
        'Content.Plain' => 'Content',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(['Image', 'ParentID', 'LinkID', 'ShowTitle', 'Title', 'Content']);

        $fields->addFieldsToTab('Root.Main', [
            TextCheckboxGroupField::create('Title')
                ->setName('Title'),
            HTMLEditorField::create('Content'),
            HasOneLinkField::create($this, 'Link')
        ]);

        $fields->addFieldToTab('Root.Image', UploadField::create('Image')->setAllowedFileCategories('image/supported'));

        return $fields;
    }

    public function validate()
    {
        $valid = parent::validate();
        if($this->ID && !$this->LinkID) {
            $valid->addError('A link is required for this card');
        }

        if($this->ID && !$this->ImageID) {
            $valid->addError('An image is required for this card');
        }

        return $valid;
    }
}
