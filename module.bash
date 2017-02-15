#!/bin/bash
pestle.phar magento2:generate:module Pulsestorm Pestleform 0.0.1
pestle.phar generate_crud_model Pulsestorm_Pestleform Thing
pestle.phar magento2:generate:acl Pulsestorm_Pestleform Pulsestorm_Pestleform::things
pestle.phar magento2:generate:menu Pulsestorm_Pestleform "" Pulsestorm_Pestleform::things Pulsestorm_Pestleform::things "Pestle Things" pulsestorm_pestleform_things/index/index 10
pestle.phar magento2:generate:menu Pulsestorm_Pestleform Pulsestorm_Pestleform::things Pulsestorm_Pestleform::things_list Pulsestorm_Pestleform::things "Thing Objects" pulsestorm_pestleform_things/index/index 10
pestle.phar generate_route Pulsestorm_Pestleform adminhtml pulsestorm_pestleform_things    
pestle.phar generate_view Pulsestorm_Pestleform adminhtml pulsestorm_pestleform_things_index_index Main content.phtml 1column
pestle.phar magento2:generate:ui:grid Pulsestorm_Pestleform pulsestorm_pestleform_things 'Pulsestorm\Pestleform\Model\ResourceModel\Thing\Collection' pulsestorm_pestleform_thing_id
pestle.phar magento2:generate:ui:form Pulsestorm_Pestleform 'Pulsestorm\Pestleform\Model\Thing' Pulsestorm_Pestleform::things


#change title in app/code/Pulsestorm/Pestleform/etc/acl.xml
#Add ACL Rule to app/code/Pulsestorm/Pestleform/Controller/Adminhtml/Index/Index.php
#Add Grid to module layout handle file app/code/Pulsestorm/Pestleform/view/adminhtml/layout/pulsestorm_pestleform_things_index_index.xml
#    - <uiComponent name="pulsestorm_pestleform_things"/> 
php bin/magento module:enable Pulsestorm_Pestleform
php bin/magento setup:upgrade

echo "Don't forget to"
echo "    change title in "
echo "        app/code/Pulsestorm/Pestleform/etc/acl.xml"
echo "    Add ACL Rule to"
echo "        app/code/Pulsestorm/Pestleform/Controller/Adminhtml/Index/Index.php"
echo "    Add <uiComponent name=\"pulsestorm_pestleform_things\"/> to "
echo "        app/code/Pulsestorm/Pestleform/view/adminhtml/layout/pulsestorm_pestleform_things_index_index.xml"