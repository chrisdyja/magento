<?php
namespace TrelloCLI\Orders\Block;
class Orders extends \Magento\Framework\View\Element\Template
{
    protected $_orderCollectionFactory;

    public function __construct(
        Magento\Framework\App\Action\Context $context,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory
    ) {
        $this->_orderCollectionFactory = $orderCollectionFactory;
        parent::__construct($context);
    }

//    public function getOrderCollectionByCustomerId($customerId)
//    {
//        $collection = $this->_orderCollectionFactory()->create($customerId);
//            $collection->addFieldToSelect('*');
//        $collection->addFieldToFilter('status', ['in' => $this->_orderConfig->getVisibleOnFrontStatuses()]);
//        $collection ->setOrder('created_at', 'desc');
//
//        return $collection;
//    }
}