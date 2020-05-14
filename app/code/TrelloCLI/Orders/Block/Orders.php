<?php
namespace TrelloCLI\Orders\Block;
class Orders extends \Magento\Framework\View\Element\Template
{
    protected $_orderCollectionFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
        array $data = []
    )
    {
        $this->_orderCollectionFactory = $orderCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getOrderCollection()
    {
        $collection = $this->_orderCollectionFactory->create()
            ->addAttributeToSelect('*')
            ->setOrder('created_at','asc');
        return $collection;
    }

    public function getOrderCollectionByCustomerId($customerId)
    {
        $collection = $this->_orderCollectionFactory->create($customerId)
            ->addFieldToSelect('*')
            ->addFieldToFilter('status', ['in' => $this->_orderConfig->getVisibleOnFrontStatuses()])
            ->setOrder('created_at', 'asc');
        return $collection;
    }

    public function getOrderCollectionByStatus($statuses = [])
    {
        $collection = $this->_orderCollectionFactory->create()
            ->addFieldToSelect('*')
            ->addFieldToFilter('status', ['in' => $statuses]);
        return $collection;
    }

    public function getOrderCollectionByDate($from, $to)
    {
        $collection = $this->_orderCollectionFactory->create()
            ->addFieldToSelect('*')
            ->addAttributeToFilter('created_at', array('from'=>$from, 'to'=>$to))
            ->setOrder('created_at', 'desc');
        return $collection;
    }
    public function getOrderCollectionByDateRange(){
        $startDate = date("Y-m-d h:i:s",strtotime('-7 days')); // start date
        $endDate = date("Y-m-d h:i:s"); // end date

        $orders = $this->_orderCollectionFactory->create()
            ->addAttributeToFilter('created_at', ['from'=>$startDate, 'to'=>$endDate]);
        return $orders;
    }

}