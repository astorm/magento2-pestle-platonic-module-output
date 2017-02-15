<?php
namespace Pulsestorm\Pestleform\Controller\Adminhtml\Thing;

class Index extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/index/index');
        return $resultRedirect;
    }     
}
