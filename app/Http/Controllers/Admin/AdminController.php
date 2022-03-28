<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Traits\DefaultImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    use DefaultImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('id', 'DESC')->paginate(7);
        return view('Admin.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.admins.create');
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
         $request->validate([
            'name'=>'required',
            'email'=>'required|unique:admins,email',
            'password'=>'required',
            'image'=>'nullable',
        ]);

         $data = $request->except('image');


        if ($request->hasFile('image')){
            $data['photo'] = $this->uploadFiles('admins',$request->file('image'));
        }else{
            $data['photo'] = $this->storeDefaultImage('admins',$request->name);
        }


        $data['password'] = Hash::make($request->password);

        $admin = Admin::create($data);
        return redirect()->route('admins.index')->with('message','تم تسجيل اليوزر بنجاح');
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
        $admin = Admin::find($id);
        return view('Admin.admins.edit' ,compact('admin'));
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

        $admin = Admin::find($id);
        $data = $request->validate([
            'name'=>'required',
              'email' => [
        'required',
        Rule::unique('admins')->ignore($id),
    ],
            'image'=>'nullable',
        ]);

        $data = $request->except('image');
        if ($request->hasFile('image')){
            $data['photo'] = $this->uploadFiles('admins',$request->file('image'));
        }
        $admin->update($data);
        return redirect()->route('admins.index')->with('message','تم تحديث اليوزر بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('admins.index')->with('message','تم جذف اليوزر بنجاح');

    }
}
