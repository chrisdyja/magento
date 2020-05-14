<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', -1);
error_reporting(E_ALL);

use Magento\Framework\App\Bootstrap;
require _DIR_ . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);

$obj = $bootstrap->getObjectManager();

/** @var Magento\Store\Model\App\Emulation $emulation */
$emulation = $obj->get(\Magento\Store\Model\App\Emulation::class);

/** @var Magento\Framework\App\State $state */
$state = $obj->get(\Magento\Framework\App\State::class);
$state->setAreaCode('frontend');
//
$storeMgr = $obj->get(Magento\Store\Model\StoreManagerInterface::class);
$storeMgr->setCurrentStore(1);


/** @var \Magento\Framework\TranslateInterface $translator */
$translator = $obj->get(\Magento\Framework\TranslateInterface::class);

\Magento\Framework\Phrase::setRenderer(
    \Magento\Framework\App\ObjectManager::getInstance()
        ->get(\Magento\Framework\Phrase\Renderer\Translate::class)
);

$emulation->startEnvironmentEmulation(1,'frontend', true);

$object = $obj->get(\Galicja\PaymentReminder\Cron\PaymentRemind::class);    //
$order = $object->execute();

$a = 1;