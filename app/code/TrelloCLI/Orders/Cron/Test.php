<?php

namespace TrelloCLI\Orders\Cron;
use TrelloCLI\Orders\Model\CancelOrder;
use TrelloCLI\Orders\Model\Order;
use Psr\Log\LoggerInterface;
class Test
{
    protected $cancelOrder;
    protected $order;

    /**
     * CancelWeekOldOrders constructor.
     * @param CancelOrder $cancelOrder
     * @param Order $order

     */
    public function __construct(
        CancelOrder $cancelOrder,
        Order $order
    )
    {
        $this->cancelOrder = $cancelOrder;
        $this->order = $order;
    }

    /**
     * @return $this
     */
    public function execute()
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/cron.log');
        $logger = new \Zend\Log\Logger();
        try {
            $this->cancelOrder->setOrderStatusToCanceled($this->order->getNewPendingWeekOldOrders());
            $logger->addWriter($writer);
            $logger->info(__METHOD__);

        } catch (\Exception $e) {
            $logger->info("Cro0n Job " . __METHOD__ . " failed. " . $e->getMessage());
        }
        return $this;
    }
}

