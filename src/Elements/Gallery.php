<?php
namespace Cashware\BootswatcherElements;

use DNADesign\Elemental\Models\ElementContent;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\View\Requirements;
use SilverStripe\View\SSViewer;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class ElementGallery extends ElementContent {
    private static $icon = 'font-icon-p-gallery-alt';

    private static $table_name = 'ElementGallery';

    private static $singular_name = 'gallery block';

    private static $plural_name = 'gallery blocks';

    private static $description = 'Gallery of images';

    private static $inline_editable = false;

    private static $has_many = [
        'Items' => GalleryItem::class
    ];

    public function getType() {
        return 'Gallery';
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName('Items');

        $fields->addFieldToTab('Root.Main',
            GridField::create(
                'Items',
                'Items',
                $this->Items(),
                GridFieldConfig_RecordEditor::create()
                    ->addComponent(GridFieldOrderableRows::create())
            )
        );

        return $fields;
    }

    public function forTemplate($holder = true)
    {
        $script = SSViewer::execute_template('Includes/BootswatchGalleryJS', []);
        Requirements::javascript("https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js");
        Requirements::css("https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css");
        Requirements::customScript($script);
        return parent::forTemplate($holder);
    }

}
