<?php

namespace App\Http\Controllers;
use App\Http\Requests\SliderAddRequest;
use Illuminate\Http\Request;
use App\Slider;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Log;
class AdminSliderController extends Controller
{
    //
    private $slider;
    use StoreImageTrait;
    public function __construct(Slider $slider)
    {
       $this->slider = $slider;
    }
    public function index()
    {
        $sliders = $this->slider->latest()->paginate(8);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }
    public function store(SliderAddRequest $request)
    {
        try{
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description
             ];
            $dataImgage = $this->StoreTraitUpload($request, 'image_path', 'slider');

            if(!empty($dataImgage)) {
                $dataInsert['image_path'] = $dataImgage['file_path'];
                $dataInsert['image_name'] = $dataImgage['file_name'];
            }
            $slider =  $this->slider->create($dataInsert);
            return redirect()->route('slider.index');
        }
        catch(\Exception $exception){
            Log::error('Errors: '. $exception->getMessage() . ' Line: ' . $exception->getLine());
        }

    }
    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        try
        {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description
            ];

            $dataImage =  $this->StoreTraitUpload($request, 'image_path', 'slider');
            if(!empty($dataImage)) {
                $dataUpdate['image_path'] = $dataImage['file_path'];
                $dataUpdate['image_name'] = $dataImage['file_name'];
            }

            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('slider.index');

        }
        catch(\Exception $exception) {
            Log::error('Error: '. $exception->getMessage(). ' Line: '. $exception->getLine());
        }
    }

    public function delete($id)
    {
        try
        {
            $this->slider->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Delete success'
            ], 200);

        }
        catch(\Exception $exception) {
            return response()->json([
                'code' => 500,
                'message' => 'Delete fail'
            ], 500);
            Log::error('Error: '. $exception->getMessage(). ' Line: '. $exception->getLine());
         }


    }


}
