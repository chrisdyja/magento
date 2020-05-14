<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Catalog\Test\Block\Links;

use Magento\Mtf\Block\Block;

/**
 * Orders compare link block.
 */
class CompareLink extends Block
{
    /**
     * Locator value for qty of Orders in Compare list.
     *
     * @var string
     */
    protected $qtyCompareProducts = '.compare .counter.qty';

    /**
     * Locator value for Compare Orders link.
     *
     * @var string
     */
    protected $linkCompareProducts = '[data-role="compare-products-link"] a.compare';

    /**
     * Get qty of Orders in Compare list.
     *
     * @return string
     */
    public function getQtyInCompareList()
    {
        $this->waitForElementVisible($this->qtyCompareProducts);
        $compareProductLink = $this->_rootElement->find($this->qtyCompareProducts);
        preg_match_all('/^\d+/', $compareProductLink->getText(), $matches);
        return $matches[0][0];
    }

    /**
     * Wait for compare products link to appear
     *
     * @return void
     */
    public function waitForCompareProductsLinks()
    {
        $this->waitForElementVisible($this->linkCompareProducts);
    }
}
