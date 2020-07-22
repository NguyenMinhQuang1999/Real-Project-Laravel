<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
// use App\Http\Component\Recusive;
// use App\Recusive;

class Recusive
{
    private $data;
    private $htmlSelect = '';

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecusive( $parent_id, $id = 0, $text='')
    {
        foreach($this->data as $value)
        {
            if($value['parent_id'] == $id)
            {
                if(!empty($parent_id) && $parent_id == $value['id'])
                {
                    $this->htmlSelect .= "<option selected value='".$value['id']."'>" . $text. $value['name']. "</option>";
                }else{
                    $this->htmlSelect .= "<option value='".$value['id']."'>" . $text. $value['name']. "</option>";
                }
                $this->categoryRecusive($parent_id, $value['id'], $text.'--');

            }
        }
        return $this->htmlSelect;
    }
}


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category ;
    }

    public function index()
    {
        //
        $category = $this->category->latest()->paginate(5);

        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $htmlOption = '';
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption .= $this->getCategory($parent_id ='');

        return view('admin.category.add', compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name),
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCategory($parent_id)
    {
        $htmlOption = '';
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption .= $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }
    public function edit($id)
    {
        //
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOption'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->category->find($id)->update(
            [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => str_slug($request->name),
            ]
            );
        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
