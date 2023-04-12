<?php

namespace MarketPc\AssembledPc\Api;

use MarketPc\AssembledPc\Api\Data\AssembledInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

interface AssembledRepositoryInterface {
    /**
     * @param int $id
     * @return AssembledInterface
     * @throws LocalizedException
     */
    public function getById(int $id): AssembledInterface;

    /**
     * @param AssembledInterface $assembled
     * @return AssembledInterface
     * @throws LocalizedException
     */
    public function save(AssembledInterface $assembled): AssembledInterface;

    /**
     * @param int $id
     * @return bool
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id): bool;
}