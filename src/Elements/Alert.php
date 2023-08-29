<?php
namespace Cashware\BootswatcherElements;

use DNADesign\Elemental\Models\ElementContent;
use SilverStripe\Control\Cookie;
use SilverStripe\Forms\DropdownField;
use SilverStripe\View\Requirements;
use SilverStripe\View\SSViewer;

class ElementAlert extends ElementContent
{
    private static $icon = 'font-icon-attention-1';

    private static $table_name = 'ElementAlert';

    private static $singular_name = 'alert block';

    private static $plural_name = 'alert blocks';

    private static $description = 'Alert block';

    private static $db = [
        'Theme' => 'Enum("primary,secondary,success,danger,warning,info,light,dark")'
    ];

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->insertBefore('Title', DropdownField::create('Theme', 'Theme', $this->dbObject('Theme')->enumValues()));
        return $fields;
    }

    public function getType() {
        return 'Alert';
    }

    public function forTemplate($holder = true)
    {
        $script = SSViewer::execute_template('Includes/BootswatchAlertJS', []);
        Requirements::customScript($script);
        return parent::forTemplate($holder);
    }

    /**
     * Check the value of an alert to see if it has been dismissed"
     * This is saved as a cookie, so if the page is refreshed the choice is remembered
     * @return boolean
     */
    public function IsDismissed()
    {
        $cookie = Cookie::get('element-alert-'.$this->ID);
        return $cookie == 1;
    }
}
