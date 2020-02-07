<?php
/**
 * @category  Technodom
 * @package   Technodom\GTM
 * @author    Rihards Stasans <info@scandiweb.com>
 * @copyright Copyright (c) 2019 Scandiweb, Inc (https://scandiweb.com)
 * @license   http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0 (OSL-3.0)
 */

namespace Technodom\GTM\Block\Adminhtml\Form\Field\GTM\Promotions;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class Mapping
 *
 * @package Technodom\GTM\Block\Adminhtml\Form\Field\GTM\Promotions
 */
class Mapping extends AbstractFieldArray
{
    /**
     * @var TypeRenderer
     */
    protected $typeRenderer;

    /**
     * @var ElementTypeRenderer
     */
    protected $elementTypeRenderer;

    /**
     * @throws LocalizedException
     *
     * @return TypeRenderer
     */
    protected function getTypeRenderer()
    {
        if (!$this->typeRenderer) {
            $this->typeRenderer = $this->getLayout()->createBlock(
                TypeRenderer::class,
                'type',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }

        return $this->typeRenderer;
    }

    /**
     * Get element type renderer
     *
     * @return ElementTypeRenderer
     *
     * @throws LocalizedException
     */
    protected function getElementTypeRenderer()
    {
        if (!$this->elementTypeRenderer) {
            $this->elementTypeRenderer = $this->getLayout()->createBlock(
                ElementTypeRenderer::class,
                'element_type',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }

        return $this->elementTypeRenderer;
    }

    /**
     * Prepare Columns
     */
    protected function _prepareToRender()
    {
        $this->addColumn('page', ['label' => 'Page']);
        $this->addColumn('type', ['label' => 'Banner type', 'renderer' => $this->getTypeRenderer()]);

        $this->addColumn('element', ['label' => 'Element wrapper class']);
        $this->addColumn('element_type', ['label' => 'Element type', 'renderer' => $this->getElementTypeRenderer()]);

        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

    /**
     * Prepare dropdown values
     *
     * @param DataObject $row
     *
     * @throws LocalizedException
     */
    protected function _prepareArrayRow(DataObject $row)
    {
        $options = [];
        $typeAttribute = $row->getData('type');
        $elementTypeAttribute = $row->getData('element_type');

        $key = 'option_' . $this->getTypeRenderer()->calcOptionHash($typeAttribute);
        $options[$key] = 'selected="selected"';

        $key = 'option_' . $this->getElementTypeRenderer()->calcOptionHash($elementTypeAttribute);
        $options[$key] = 'selected="selected"';
        $row->setData('option_extra_attrs', $options);
    }
}
