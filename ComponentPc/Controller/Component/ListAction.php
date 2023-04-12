<?php declare(strict_types=1);

namespace MarketPc\ComponentPc\Controller\Component;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class ListAction implements HttpGetActionInterface
{   
    private PageFactory $pageFactory;
    public function __construct(
        PageFactory $pageFactory
    )  {  $this->pageFactory = $pageFactory; }

    public function execute(): Page {
        return $this->pageFactory->create();
    }
}