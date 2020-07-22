<?php
namespace App\Http\Components;
use App\Menu;
class MenuRecusive
{
    private $html ;
    public function __construct()
    {
        $this->html = '';
    }
    public function menuRecusive($parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach($data as $dataItem)
        {
            $this->html .= "<option value='.$dataItem->id.'>'.$subMark. $dataItem->name.'</option>";
            $this->menuRecusive($dataItem->id, $subMark.'--');
        }
        return $this->html;
    }
}

