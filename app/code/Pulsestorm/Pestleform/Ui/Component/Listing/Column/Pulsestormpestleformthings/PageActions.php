<?php
namespace Pulsestorm\Pestleform\Ui\Component\Listing\Column\Pulsestormpestleformthings;

class PageActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource["data"]["items"])) {
            foreach ($dataSource["data"]["items"] as & $item) {
                $name = $this->getData("name");
                $id = "X";
                if(isset($item["pulsestorm_pestleform_thing_id"]))
                {
                    $id = $item["pulsestorm_pestleform_thing_id"];
                }
                $item[$name]["view"] = [
                    "href"=>$this->getContext()->getUrl(
                        "pulsestorm_pestleform_things/thing/edit",["pulsestorm_pestleform_thing_id"=>$id]),
                    "label"=>__("Edit")
                ];
            }
        }

        return $dataSource;
    }    
    
}
