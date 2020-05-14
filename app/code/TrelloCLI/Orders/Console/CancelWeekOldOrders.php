<?php

namespace TrelloCLI\Orders\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TrelloCLI\Orders\Model\CancelOrder;
use TrelloCLI\Orders\Model\Order;

class CancelWeekOldOrders extends Command
{

    protected $cancelOrder;
    protected $order;

    /**
     * CancelWeekOldOrders constructor.
     * @param CancelOrder $cancelOrder
     * @param Order $order
     * @param string $name
     */
    public function __construct(
        CancelOrder $cancelOrder,
        Order $order,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->cancelOrder = $cancelOrder;
        $this->order = $order;
    }

    protected function configure()
    {
        $this->setName('custom:getOrdersOlderThanWeek');
        $this->setDescription('Demo command line');

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $startDate = date("Y-m-d h:i:s",strtotime('-10 days')); // start date
        $endDate = date("Y-m-d h:i:s"); // end date
        $this->cancelOrder->setOrderStatusToCanceled($this->order->getOrderCollectionByDateRange($startDate, $endDate));
        $output->writeln("Hello World");
    }
}