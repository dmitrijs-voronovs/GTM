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
 * Class ElementType
 *
 * @package Technodom\GTM\Model\Config\Source
 */
class ElementType implements OptionSourceInterface
{
    const TYPE_IMAGE_WRAPPER = 1;
    const TYPE_ELEMENT_WRAPPER = 2;

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::TYPE_IMAGE_WRAPPER, 'label' => __('Image wrapper')],
            ['value' => self::TYPE_ELEMENT_WRAPPER, 'label' => __('Element wrapper')],
        ];
    }

    /**
     * Get array
     *
     * @return array
     */
    public function getArray()
    {
        return [self::TYPE_IMAGE_WRAPPER => 'image', self::TYPE_ELEMENT_WRAPPER => 'element'];
    }
}
