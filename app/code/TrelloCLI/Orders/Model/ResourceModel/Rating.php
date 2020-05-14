<?php
namespace TrelloCLI\Orders\Model\ResourceModel;


class Rating extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('trellocli_orders_order_rating', 'rating_id');
    }

}
