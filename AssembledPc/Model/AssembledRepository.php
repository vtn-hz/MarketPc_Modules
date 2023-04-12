<?php declare(strict_types=1);

namespace MarketPc\AssembledPc\Model;

use MarketPc\AssembledPc\Api\Data\AssembledInterface;
use MarketPc\AssembledPc\Model\ResourceModel\Assembled as AssembledResourceModel;
use MarketPc\AssembledPc\Api\AssembledRepositoryInterface;


use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class AssembledRepository implements AssembledRepositoryInterface {
    private AssembledFactory $assembledFactory;
    private AssembledResourceModel $assembledResourceModel;

    public function __construct(
        AssembledFactory $assembledFactory,
        AssembledResourceModel $assembledResourceModel
    ) {
        $this->assembledFactory = $assembledFactory;
        $this->assembledResourceModel = $assembledResourceModel;
    }

    public function getById(int $id): AssembledInterface
    {
        $assembled = $this->assembledFactory->create();
        $this->assembledResourceModel->load($assembled, $id);

        if (!$assembled->getId()) {
            // Need Handle
            throw new NoSuchEntityException(__('"%1" ID doesnt exist.', $id));
        }

        return $assembled;
    }

    public function save(AssembledInterface $assembled): AssembledInterface
    {
        try {
            $this->assembledResourceModel->save($assembled);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $assembled;
    }

    public function deleteById(int $id): bool
    {
        $assembled = $this->getById($id);

        try {
            $this->assembledResourceModel->delete($assembled);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }
}