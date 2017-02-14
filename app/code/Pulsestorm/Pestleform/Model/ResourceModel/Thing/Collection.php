<?php
namespace Pulsestorm\Pestleform\Model\ResourceModel\Thing;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Pulsestorm\Pestleform\Model\Thing','Pulsestorm\Pestleform\Model\ResourceModel\Thing');
    }
}
