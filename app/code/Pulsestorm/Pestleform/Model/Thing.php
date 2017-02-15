<?php
namespace Pulsestorm\Pestleform\Model;
class Thing extends \Magento\Framework\Model\AbstractModel implements ThingInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'pulsestorm_pestleform_thing';

    protected function _construct()
    {
        $this->_init('Pulsestorm\Pestleform\Model\ResourceModel\Thing');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
