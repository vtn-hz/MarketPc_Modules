<?php declare(strict_types=1);

namespace MarketPc\ComponentPc\Model;

use MarketPc\ComponentPc\Api\Data\ComponentInterface;
use Magento\Framework\Model\AbstractModel;

class Component extends AbstractModel implements ComponentInterface {
    protected function _construct()
    {
        $this->_init(ResourceModel\Component::class);
    }

    /**
     * @return string
     */
    public function getModel(){
        return $this->getData(self::MODEL);
    }

    /**
     * @param string $model
     * @return $this
     */
    public function setModel($model){
        return $this->setData(self::MODEL, $model);
    }

    /**
     * @return float
     */
    public function getPrice(){
        return $this->getData(self::PRICE);
    }

    /**
     * @param float $price
     * @return $this
     */
    public function setPrice($price){
        return $this->setData(self::PRICE, $price);
    }


    /**
     * @return string
     */
    public function getType(){
        return $this->getData(self::TYPE);
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type){
        return $this->setData(self::TYPE, $type);
    }

    /**
     * @return string
     */
    public function getCreatedAt(){
        return $this->getData(self::CREATED_AT);
    }
}