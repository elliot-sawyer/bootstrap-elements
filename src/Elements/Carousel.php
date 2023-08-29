<?php
namespace Cashware\BootswatcherElements;

use DNADesign\Elemental\Models\ElementContent;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;

class ElementCarousel extends ElementContent
{
    private static $icon = 'font-icon-block-story-carousel';

    private static $table_name = 'ElementCarousel';

    private static $singular_name = 'carousel block';

    private static $plural_name = 'carousel blocks';

    private static $description = 'Carousel of images';

    private static $inline_editable = false;

    private static $db = [
        'Indicators' => 'Enum("Off,On","On")',
        'Transitions' => 'Enum("Slide,Fade","Slide")',
        'Autoplay' => 'Enum("Off,Only when selected,Automatic","Off")',
        'Interval' => 'Int'
    ];

    private static $has_many = [
        'Items' => CarouselItem::class
    ];

    private static $defaults = [
        'Interval' => 5
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->dataFieldByName('Interval')
            ?->setDescription('Time in seconds');
        return $fields;
    }

    public function getType() {
        return 'Carousel';
    }

    /**
     * Get the shortest height of the images in the carousel, so others can be fitted to it
     *
     * @return integer
     */
    public function MinHeight(): int
    {
        $items = $this->Items();
        $min = PHP_INT_MAX;

        if(!$items) {
            return 1080;
        }
        foreach($items as $item) {
            $height = $item->Image()->getHeight();
            if($height < $min) {
                $min = $height;
            }
        }

        return $min;
    }

    public function onBeforeWrite()
    {
        if(!$this->Interval || $this->Interval < 0) {
            $this->Interval = self::$defaults['Inverval'];
        }
        parent::onBeforeWrite();
    }

    public function IntervalInMilliseconds(): int
    {
        $interval = $this->Interval;
        if(!$this->Interval || $this->Interval < 0) {
            $interval = self::$defaults['Inverval'];
        }
        return (int) $interval * 1000;
    }

}
