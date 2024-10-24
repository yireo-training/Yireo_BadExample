<?php

namespace Yireo\BadExample\Api;

use Magento\Framework\Model\AbstractModel;
use Yireo\Example\Model\ResourceModel\ExampleItem as ResourceModel;

interface ExampleItemInterface
{
    public function setTitle($title);

    public function getTitle();

    public function setToken($token);

    public function getToken();

    public function setDescription($description);

    public function getDescription();
}
