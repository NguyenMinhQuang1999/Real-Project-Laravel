<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Components\Recusive;

use App\Category;
use App\Traits\StoreImageTrait;
use App\Product;
use App\ProductImage;
use App\Tag;
use DB;
use Log;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use StoreImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;

    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
    }
    public function index()
    {
        //
        $products = $this->product->latest()->paginate(8);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $htmlOption = $this->getCategory($parent_id = '');
        return view('admin.product.add', compact('htmlOption'));
    }
    public function getCategory($parent_id)
    {
        $htmlOption = '';
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption .= $recusive->categoryRecusive($parent_id);
        return $htmlOption;
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
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name'    => $request->name,
                'price'   => $request->price,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id

            ];
            $dataUpload = $this->StoreTraitUpload($request, 'feature_image_path', 'products');
            if (!empty($dataUpload)) {
                $dataProductCreate['feature_image_path'] = $dataUpload['file_path'];
                $dataProductCreate['feature_image_name'] = $dataUpload['file_name'];
            }
            $product =  $this->product->create($dataProductCreate);

            // insert data to product_image
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataImageUpload = $this->storeTraitUploadMultiple($fileItem, 'product');
                    //se tu cap nhat id san pham vao bang product_image
                    $product->images()->create([
                        'image_name' => $dataImageUpload['file_name'],
                        'image_path' => $dataImageUpload['file_path']
                    ]);
                }
            }
            //inset data to tags

            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagId[] = $tagInstance->id;
                }
                $product->tags()->attach($tagId);
            }
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . ' Line ' . $exception->getLine());
        }

        dd($product);
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
    public function edit($id)
    {
        //
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('product', 'htmlOption'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }
}