<?php declare(strict_types=1);

namespace MarketPc\AssembledPc\Api\Data;


interface AssembledInterface {
    const ID = 'id';
    const NAME = 'name';
    const RATE = 'rate';
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
    public function getName();

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name);



    /**
     * @return float
     */
    public function getRate();

    /**
     * @param float $rate
     * @return $this
     */
    public function setRate($rate);


    /**
     * @return string
     */
    public function getCreatedAt();
}