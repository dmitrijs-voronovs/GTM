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
use Technodom\GTM\Model\Config\Source\Type;

/**
 * Class TypeRenderer
 *
 * @package Technodom\GTM\Block\Adminhtml\Form\Field\GTM\Promotions
 */
class TypeRenderer extends Select
{
    /**
     * @var Type
     */
    private $type;

    /**
     * TypeRenderer constructor.
     *
     * @param Context $context
     * @param Type $type
     * @param array $data
     */
    public function __construct(
        Context $context,
        Type $type,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->type = $type;
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
            $attributes = $this->type->toOptionArray();

            foreach ($attributes as $attribute) {
                $this->addOption($attribute['value'], $attribute['label']);
            }
        }

        return parent::_toHtml();
    }
}
