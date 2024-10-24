<?php
namespace Yireo\BadExample;

use Magento\Catalog\Model\Product;
use Magento\Framework\App\ObjectManager;

class Importer
{
    public function __construct(
        Product $product
    ) {
        $this->product = $product;
    }

    public function import($product)
    {
        $guzzle = new \GuzzleHttp\Client();
        $json = $guzzle->get('https://dummyjson.com/products/2');
        $json = json_decode($json->getBody(), true);

        //$product = new Product();
        $product->setData('name', $json['title']);
        $product->setDescription($json['description']);
        $product->setUrlKey($json['sku']);

        if ($product->getId()) {
            exit;
        }

        $product->save();

        $ob = self::getObjectManager();
        $directory = $ob->get('\Magento\Framework\Filesystem\DirectoryList');
        $logPath   = $directory->getPath('log');
        $file      = fopen($logPath . '/last_jobs.log', 'a+');
    }

    public static function getObjectManager()
    {
        return ObjectManager::getInstance();
    }
}
