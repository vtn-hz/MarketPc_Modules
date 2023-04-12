<?php declare(strict_types=1);

namespace MarketPc\AssembledPc\Model;
use Magento\Framework\Model\AbstractModel;

class Foreignkey extends AbstractModel {
    protected function _construct()
    {
        $this->_init(ResourceModel\Foreignkey::class);
    }
}