<?php
namespace Pulsestorm\Pestleform\Block\Adminhtml\Thing\Edit;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
class ResetButton extends GenericButton implements ButtonProviderInterface
{     
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.reload();',
            'sort_order' => 30
        ];
    }
}
