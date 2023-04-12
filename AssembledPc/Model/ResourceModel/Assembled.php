<?php declare(strict_types=1);

namespace MarketPc\AssembledPc\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Assembled extends AbstractDb {
    const MAIN_TABLE = 'marketpc_assembledpc';
    const ID_FIELD_NAME = 'id';

    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}