<?php
namespace Pulsestorm\Pestleform\Model\ResourceModel;
class Thing extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('pulsestorm_pestleform_thing','pulsestorm_pestleform_thing_id');
    }
}
