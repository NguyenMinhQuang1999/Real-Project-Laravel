<?php

namespace App\Http\Controllers;

use App\Traits\DeleteModelTrait;
use App\Http\Requests\SettingRequest;
use Illuminate\Http\Request;
use App\Setting;


class SettingController extends Controller
{
    //
    use DeleteModelTrait;
    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate(8);
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(SettingRequest $request)
    {
        $dataInsert = [
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        ];

        $this->setting->create($dataInsert);
        return redirect()->route('setting.index');
    }

    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
        ]);
        return redirect()->route('setting.index');
    }

    public function delete($id)
    {
        //tra ve du lieu
       return $this->deleteModel($id, $this->setting);
    }
}