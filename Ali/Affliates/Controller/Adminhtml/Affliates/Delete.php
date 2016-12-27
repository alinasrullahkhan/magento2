<?php


namespace Ali\Affliates\Controller\Adminhtml\Affliates;

class Delete extends \Ali\Affliates\Controller\Adminhtml\Affliates
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('affliates_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('Ali\Affliates\Model\Affliates');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('You deleted the Affliates.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['affliates_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find a Affliates to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
