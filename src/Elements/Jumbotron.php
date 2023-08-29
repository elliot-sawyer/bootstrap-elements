<?php
namespace Cashware\BootswatcherElements;

use DNADesign\Elemental\Models\ElementContent;
use gorriecoe\Link\Models\Link;
use gorriecoe\LinkField\Forms\HasOneLinkField;

class ElementJumbotron extends ElementContent {
    private static $icon = 'font-icon-monitor';

    private static $table_name = 'ElementJumbotron';

    private static $singular_name = 'jumbotron block';

    private static $plural_name = 'jumbotron blocks';

    private static $description = 'Jumbotron / hero area';

    private static $inline_editable = false;

    private static $db = [
        'ContainerSize' => 'Enum("fixed,fluid,edge-to-edge")',
        'HeadingSize' => "Enum('1,2,3,4,5,6','1')",
        'PaddingSize' => "Enum('0,1,2,3,4,5','5')",
        'MarginSize' => "Enum('0,1,2,3,4,5','4')",
        'BorderRadius' => "Enum('0,1,2,3,4,5','3')",
        'Theme' => 'Enum("primary,secondary,success,danger,warning,info,light,dark")',
        'TextColor' => 'Enum("light,dark,primary,secondary,success,danger,warning,info")',
        'ButtonSize' => "Enum('sm,md,lg,block','lg')",
        'ButtonTheme' => 'Enum("link,primary,secondary,success,danger,warning,info,light,dark,outline-primary,outline-secondary,outline-success,outline-danger,outline-warning,outline-info,outline-light,outline-dark")',
    ];

    private static $has_one = [
        'Button' => Link::class
    ];

    public function getType() {
        return 'Jumbotron';
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['ButtonID']);

        $fields->addFieldsToTab('Root.Main', [
            HasOneLinkField::create($this, 'Button', 'Button Link')
        ]);

        return $fields;
    }


}
