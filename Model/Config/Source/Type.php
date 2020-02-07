<?php
/**
 * @category  Technodom
 * @package   Technodom\GTM
 * @author    Rihards Stasans <info@scandiweb.com>
 * @copyright Copyright (c) 2019 Scandiweb, Inc (https://scandiweb.com)
 * @license   http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0 (OSL-3.0)
 */

namespace Technodom\GTM\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class Type
 *
 * @package Technodom\GTM\Model\Config\Source
 */
class Type implements OptionSourceInterface
{
    const TYPE_STATIC = 1;
    const TYPE_SLIDER = 2;

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::TYPE_STATIC, 'label' => __('Static')],
            ['value' => self::TYPE_SLIDER, 'label' => __('Slider')],
        ];
    }

    /**
     * Get array
     *
     * @return array
     */
    public function toArray()
    {
        return [self::TYPE_STATIC => 'static', self::TYPE_SLIDER => 'slider'];
    }
}
