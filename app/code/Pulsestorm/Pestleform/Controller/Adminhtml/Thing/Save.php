<?php
namespace Pulsestorm\Pestleform\Controller\Adminhtml\Thing;

                use Magento\Backend\App\Action;
                use Pulsestorm\Pestleform\Model\Page;
                use Magento\Framework\App\Request\DataPersistorInterface;
                use Magento\Framework\Exception\LocalizedException;
            
class Save extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Pulsestorm_Pestleform::things';

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @param Action\Context $context
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            if (isset($data['is_active']) && $data['is_active'] === 'true') {
                $data['is_active'] = Pulsestorm\Pestleform\Model\Thing::STATUS_ENABLED;
            }
            if (empty($data['pulsestorm_pestleform_thing_id'])) {
                $data['pulsestorm_pestleform_thing_id'] = null;
            }

            /** @var Pulsestorm\Pestleform\Model\Thing $model */
            $model = $this->_objectManager->create('Pulsestorm\Pestleform\Model\Thing');

            $id = $this->getRequest()->getParam('pulsestorm_pestleform_thing_id');
            if ($id) {
                $model->load($id);
            }

            $model->setData($data);

            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved the thing.'));
                $this->dataPersistor->clear('pulsestorm_pestleform_thing');
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['pulsestorm_pestleform_thing_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->dataPersistor->set('pulsestorm_pestleform_thing', $data);
            return $resultRedirect->setPath('*/*/edit', ['pulsestorm_pestleform_thing_id' => $this->getRequest()->getParam('pulsestorm_pestleform_thing_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }    
}
