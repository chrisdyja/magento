<?php
namespace TrelloCLI\Orders\Model;
use Magento\Sales\Model\ResourceModel\Order\Collection;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;

class Order
{
    protected $_orderCollectionFactory;

    /**
     * Order constructor.
     * @param CollectionFactory $orderCollectionFactory
     */
    public function __construct(
        CollectionFactory $orderCollectionFactory
    )
    {
        $this->_orderCollectionFactory = $orderCollectionFactory;
    }

    /**
     * @param $startDate
     * @param $endDate
     * @return Collection
     */
    public function getOrderCollectionByDateRange($startDate, $endDate){
        $orders = $this->_orderCollectionFactory->create()
            ->addAttributeToFilter('created_at', ['from'=>$startDate, 'to'=>$endDate]);
        return $orders;
    }
/*
 *
 */
    public function getNewPendingWeekOldOrders(){
        $startDate = date("Y-m-d h:i:s",strtotime('-7 days')); // start date
        $endDate = date("Y-m-d h:i:s"); // end date
        $orders = $this->_orderCollectionFactory->create()
            ->addFieldToSelect('*')
            ->addFieldToFilter('status', ['in' => 'pending'])
            ->addFieldToFilter('state', ['in' => 'new'])
            ->addFieldToFilter('created_at', ['from'=>$startDate, 'to'=>$endDate]);
        return $orders;
    }
}
