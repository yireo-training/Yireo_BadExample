<?php

namespace Yireo\BadExample\Controller\Adminhtml\Bad;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\RequestInterface;

class Save extends Action
{
    private $httpRequest = null;

    public function __construct(
        \Magento\Framework\App\Request\Http $httpRequest,
        Context $context)
    {
        parent::__construct($context);
        $this->httpRequest = $httpRequest;
    }

    public function execute()
    {
        $apiUrl = 'https://dummyjson.com/products/1';
        //$apiUrl = 'https://dummyjson.com/products/2';

        $request = ObjectManager::getInstance()->get('\Magento\Framework\App\Request\Http');
        $data = array(
            'name'=>$request->getParam('name'),
            'price'=>$request->getParam('price')
        );
        $data_json = json_encode($data);


        $ch = curl_init($apiUrl);
        $header = "Content-Type: "."application/json";
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array($header));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        $returned = curl_exec($ch);

        if (curl_error($ch)) {
            print curl_error($ch);
        } else {
            print 'ret: '.$returned;
        }
    }
}
