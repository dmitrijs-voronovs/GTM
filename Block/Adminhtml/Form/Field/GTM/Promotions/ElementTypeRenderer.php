<?php
/**
 * @category  Technodom
 * @package   Technodom\GTM
 * @author    Rihards Stasans <info@scandiweb.com>
 * @copyright Copyright (c) 2019 Scandiweb, Inc (https://scandiweb.com)
 * @license   http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0 (OSL-3.0)
 */

namespace Technodom\GTM\Block\Adminhtml\Form\Field\GTM\Promotions;

use Magento\Framework\View\Element\Context;
use Magento\Framework\View\Element\Html\Select;
use Technodom\GTM\Model\Config\Source\ElementType;

/**
 * Class TypeRenderer
 *
 * @package Technodom\GTM\Block\Adminhtml\Form\Field\GTM\Promotions
 */
class ElementTypeRenderer extends Select
{
    /**
     * @var ElementType
     */
    private $elementType;

    /**
     * TypeRenderer constructor.
     *
     * @param Context $context
     * @param ElementType $elementType
     * @param array $data
     */
    public function __construct(
        Context $context,
        ElementType $elementType,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->elementType = $elementType;
    }

    /**
     * Set name
     *
     * @param $value
     *
     * @return mixed
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }

    /**
     * Parse to html.
     *
     * @return mixed
     */
    public function _toHtml()
    {
        if (!$this->getOptions()) {
            $attributes = $this->elementType->toOptionArray();

            foreach ($attributes as $attribute) {
                $this->addOption($attribute['value'], $attribute['label']);
            }
        }

        return parent::_toHtml();
    }
}
