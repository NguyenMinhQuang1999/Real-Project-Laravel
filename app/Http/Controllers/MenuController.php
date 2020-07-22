<?php

namespace App\Http\Controllers;
use App\Menu;
use Illuminate\Http\Request;
//use App\Components\MenuRecusive;
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
            $this->html .= '<option value="'.$dataItem->id.'">'.$subMark. $dataItem->name.'</option>';
            $this->menuRecusive($dataItem->id, $subMark.'--');
        }
        return $this->html;
    }

    public function menuRecusiveEdit($parentIdEdit, $parentId = 0, $subMark ='')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach($data as $dataItem)
        {
            if($parentIdEdit == $dataItem->id)
            {
                $this->html .= '<option selected value="'.$dataItem->id.'">'.$subMark.$dataItem->name. '</option>';
            }
            else {
                $this->html .= '<option  value="'.$dataItem->id.'">'.$subMark.$dataItem->name. '</option>';
            }
            $this->menuRecusiveEdit($parentIdEdit, $dataItem->id, $subMark.'--');
        }

        return $this->html;
    }
}
class MenuController extends Controller
{
    //
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
      $this->menuRecusive = $menuRecusive;
      $this->menu = $menu;
    }
    public function index()
    {
        $menus = $this->menu->paginate(8);
        return view('admin.menus.index',compact('menus'));

    }

    public function create()
    {
        $test = $this->menuRecusive->menuRecusive();
        return view('admin.menus.add', compact('test'));
    }
    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }
    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $optionSelect =  $this->menuRecusive->menuRecusiveEdit($menu->parent_id);
        return view('admin.menus.edit', compact('menu', 'optionSelect'));
    }

    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }

    public function delete($id)
    {
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}


