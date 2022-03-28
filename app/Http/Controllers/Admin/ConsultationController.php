<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Traits\DefaultImage;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    use DefaultImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations = Consultation::orderBy('id', 'DESC')->get();
        return view('Admin.consultations.index' , compact('consultations'));
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
        //
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
        $consultation = Consultation::find($id);
        return view('Admin.consultations.edit',compact('consultation'));
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
        $consultation = Consultation::find($id);

        $data = $request->except('image');
        if ($request->hasFile('image')){
            $data['image'] = $this->uploadFiles('OnlineConsultation',$request->file('image'));
        }
        $consultation->update($data);
        return redirect()->route('consultations.index')->with('message','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultation = OnlineConsultation::find($id);
        $consultation->delete();
        return redirect()->route('consultations.index')->with('message','تم الحذف بنجاح');
    }
}
