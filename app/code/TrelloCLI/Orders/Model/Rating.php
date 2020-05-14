<?php
namespace TrelloCLI\Orders\Model;
class Rating extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'trellocli_orders_order_rating';

    protected $_cacheTag = 'trellocli_orders_order_rating';

    protected $_eventPrefix = 'trellocli_orders_order_rating';

    protected function _construct()
    {
        $this->_init('TrelloCLI\Orders\Model\ResourceModel\Rating');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
