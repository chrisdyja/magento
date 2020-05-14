<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Catalog\Test\TestStep;

use Magento\Catalog\Test\Page\Adminhtml\CatalogProductAttributeIndex;
use Magento\Mtf\TestStep\TestStepInterface;

/**
 * Open Product Attribute Display Page.
 */
class OpenProductAttributesPageStep implements TestStepInterface
{
    /**
     * Catalog Product Attribute Display page.
     *
     * @var CatalogProductAttributeIndex
     */
    protected $catalogProductAttributeIndex;

    /**
     * @constructor
     * @param CatalogProductAttributeIndex $catalogProductAttributeIndex
     */
    public function __construct(CatalogProductAttributeIndex $catalogProductAttributeIndex)
    {
        $this->catalogProductAttributeIndex = $catalogProductAttributeIndex;
    }

    /**
     * Open Catalog Product Attribute Display.
     *
     * @return void
     */
    public function run()
    {
        $this->catalogProductAttributeIndex->open();
    }
}