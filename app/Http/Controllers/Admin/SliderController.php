<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\DefaultImage;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use DefaultImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(3);
        return view('Admin.sliders.index' , compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->except('image');
        if ($request->hasFile('image')){
            $data['image'] = $this->uploadFiles('sliders',$request->file('image'));
        }else{
            $data['image'] = $this->storeDefaultImage('sliders',$request->name);
        }
        $slider = Slider::create($data);
        return redirect()->back()->with('message' , 'تم اضاة الصورة بنجاح');
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
        $slider = Slider::find($id);
        $data = $request->except('image');
        if ($request->hasFile('image')){
            $data['image'] = $this->uploadFiles('sliders',$request->file('image'));
        }
        $slider->update($data);

        return redirect()->back()->with('message' , 'تم تحديث الصورة بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->back()->with('message', 'تم حذف الصورة بنجاح');
    }
}
