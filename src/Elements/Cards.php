<?php
namespace Cashware\BootswatcherElements;

use DNADesign\Elemental\Models\ElementContent;

class ElementCards extends ElementContent
{
    private static $icon = 'font-icon-thumbnails';

    private static $table_name = 'ElementCards';

    private static $singular_name = 'cards block';

    private static $plural_name = 'cards blocks';

    private static $description = 'List of cards';

    private static $inline_editable = false;

    private static $db = [
        'ContainerSize' => 'Enum("fixed,fluid,edge-to-edge")',
        'WhiteSpaceBetweenCards' => 'Enum("default,end,center,between,around,evenly","default")',
    ];

    private static $has_many = [
        'Cards' => CardItem::class
    ];

    public function getType() {
        return 'Cards';
    }

}
