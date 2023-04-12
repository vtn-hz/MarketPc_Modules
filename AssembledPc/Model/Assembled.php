<?php declare(strict_types=1);

namespace MarketPc\AssembledPc\Model;

use MarketPc\AssembledPc\Api\Data\AssembledInterface;
use Magento\Framework\Model\AbstractModel;

class Assembled extends AbstractModel implements AssembledInterface {
    protected function _construct()
    {
        $this->_init(ResourceModel\Assembled::class);
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->getData(self::NAME);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name){
        return $this->setData(self::NAME, $name);
    }

    /**
     * @return float
     */
    public function getRate(){
        return $this->getData(self::RATE);
    }

    /**
     * @param float $rate
     * @return $this
     */
    public function setRate($rate){
        return $this->setData(self::RATE, $rate);
    }


    /**
     * @return string
     */
    public function getCreatedAt(){
        return $this->getData(self::CREATED_AT);
    }
}