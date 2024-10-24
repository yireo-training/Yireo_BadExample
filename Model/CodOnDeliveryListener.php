<?php

namespace Yireo\BadExample\Model;

use Magento\Framework\DataObject;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Payment\Model\Method\AbstractMethod;
use Magento\Quote\Model\Quote;

class CodOnDeliveryListener implements ObserverInterface
{
    /**
     * @param Observer $observer
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute(Observer $observer)
    {
        /** @var DataObject $result */
        $result = $observer->getEvent()->getResult();

        /** @var Quote $quote */
        $quote = $observer->getEvent()->getQuote();

        /** @var AbstractMethod $methodInstance */
        $methodInstance = $observer->getEvent()->getMethodInstance();

        if ($quote) {
            $shippingMethod = $quote->getShippingAddress()->getShippingMethod();
            $paymentMethod = $methodInstance->getCode();

            if ($paymentMethod === 'cashondelivery' && $shippingMethod !== 'tablerate_bestway') {
                $result->setData('is_available', false);
            }
        }
    }
}
