<?php
namespace TrelloCLI\Orders\Model\ResourceModel\Rating;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'rating_id';
    protected $_eventPrefix = 'trellocli_orders_order_rating';
    protected $_eventObject = 'rating_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TrelloCLI\Orders\Model\Rating', 'TrelloCLI\Orders\Model\ResourceModel\Rating');
    }

}

