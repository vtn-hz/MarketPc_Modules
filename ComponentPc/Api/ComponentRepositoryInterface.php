<?php declare(strict_types=1);

namespace MarketPc\ComponentPc\Api;

use MarketPc\ComponentPc\Api\Data\ComponentInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;


interface ComponentRepositoryInterface { 
    /**
     * @param int $id
     * @return ComponentInterface
     * @throws LocalizedException
     */
    public function getById(int $id): ComponentInterface;

    /**
     * @param ComponentInterface $component
     * @return ComponentInterface
     * @throws LocalizedException
     */
    public function save(ComponentInterface $component): ComponentInterface;

    /**
     * @param int $id
     * @return bool
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id): bool;
}