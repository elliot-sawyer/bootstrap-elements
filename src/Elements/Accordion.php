<?php
namespace Cashware\BootswatcherElements;

use DNADesign\Elemental\Models\ElementContent;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldButtonRow;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\Forms\GridField\GridFieldToolbarHeader;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\View\Requirements;
use SilverStripe\View\SSViewer;
use Symbiote\GridFieldExtensions\GridFieldAddNewInlineButton;
use Symbiote\GridFieldExtensions\GridFieldEditableColumns;
use Symbiote\GridFieldExtensions\GridFieldTitleHeader;

class ElementAccordion extends ElementContent
{
    private static $icon = 'font-icon-block-accordion';

    private static $table_name = 'ElementAccordion';

    private static $singular_name = 'accordion block';

    private static $plural_name = 'accordion blocks';

    private static $description = 'Accordion block';

    private static $inline_editable = false;

    private static $has_many = [
        'Items' => AccordionItem::class
    ];

    public function getSummary() {
        return parent::getSummary();
    }
    public function getType() {
        return 'Accordion';
    }

    public function forTemplate($holder = true)
    {
        $script = SSViewer::execute_template('Includes/BootswatchAccordionJS', []);
        Requirements::customScript($script);
        return parent::forTemplate($holder);
    }

}
