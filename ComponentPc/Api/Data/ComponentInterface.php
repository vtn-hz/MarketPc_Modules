<?php declare(strict_types=1);

namespace MarketPc\ComponentPc\Api\Data;


interface ComponentInterface {
    const ID = 'id';
    const MODEL = 'model';
    const PRICE = 'price';
    const TYPE = 'type';
    const CREATED_AT = 'created_at';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getModel();

    /**
     * @param string $model
     * @return $this
     */
    public function setModel($model);

    /**
     * @return float
     */
    public function getPrice();

    /**
     * @param float $price
     * @return $this
     */
    public function setPrice($price);


        /**
     * @return string
     */
    public function getType();

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type);

    /**
     * @return string
     */
    public function getCreatedAt();
}