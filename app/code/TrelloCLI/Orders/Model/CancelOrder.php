<?php
namespace TrelloCLI\Orders\Model;
use Magento\Sales\Api\OrderManagementInterface;
use Psr\Log\LoggerInterface;

class CancelOrder
{
    protected $orders;
    /**
     * @var OrderManagementInterface
     */
    private $orderManagementInterface;

    /**
     * CancelOrder constructor.
     * @param Order $orders
     * @param OrderManagementInterface $orderManagementInterface
     * @param LoggerInterface $logger
     */
    public function __construct(
        Order $orders,
        OrderManagementInterface $orderManagementInterface,
        LoggerInterface $logger
    )
    {
        $this->orders = $orders;
        $this->orderManagementInterface = $orderManagementInterface;
        $this->logger = $logger;
    }

    /**
     * @param $orders
     */
    public function setOrderStatusToCanceled($orders){
        try {
            if($orders && $orders->getTotalCount() > 0) {
                foreach($orders as $order) {
                    if($order->getId() != 0) {
                        $this->orderManagementInterface->cancel($order->getId());
                    }
                }
            }
        } catch (\Exception $e) {
            $this->logger->error("Cannot set canceled status: " . $e->getMessage());
        }
    }
}
