<?php

namespace TrelloCLI\Orders\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $ratingFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \TrelloCLI\Orders\Model\RatingFactory $ratingFactory
        )
    {
        $this->_pageFactory = $pageFactory;
        $this->ratingFactory = $ratingFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $rating = $this->ratingFactory->create();
        $collection = $rating->getCollection();
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
        return $this->_pageFactory->create();
    }
}
