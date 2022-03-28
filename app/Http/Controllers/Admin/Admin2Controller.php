<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdmin;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class Admin2Controller extends Controller
{
    public function index(request $request)
    {
        if($request->ajax()) {
            $admins = Admin::latest()->get();
            return Datatables::of($admins)
                ->addColumn('action', function ($admins) {
                    return '
                            <button class="btn btn-pill btn-primary-light" data-toggle="modal" data-target="#edit_modal"
                                    data-id="' . $admins->id . '" data-name="' . $admins->name . '" data-email="' . $admins->email . '">
                                    <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $admins->id . '" data-title="' . $admins->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('created_at', function ($admins) {
                    return '' . $admins->created_at->diffForHumans();
                })
                ->editColumn('image', function ($categories) {
                    $image = $categories->photo;
                    return '
                    <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-100" onclick="window.open(this.src)" style="cursor: pointer"
                                         src=' . asset($image) . ' alt="صورة">
								</span>
                                </div>
                    </div>
                    ';
                })
                ->editColumn('photo', function ($admins) {
                    return '
                    <img alt="image" class="avatar avatar-md rounded-circle" src="'.get_file(asset($admins->photo)).'">
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        }else{
            return view('Admin/admin/index');
        }
    }


    ################ Add Admin #################
    public function add(StoreAdmin $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data added successfully'
            ]);
    }
    ###############################################


    ################ Edit Admin #################
    public function edit(StoreAdmin $request)
    {
        $admin = Admin::where('id', $request->id)->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password != null)
            $admin->password = Hash::make($request->password);
        $admin->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data updated successfully'
            ]);
    }
    ###############################################



    public function delete(Request $request)
    {
        $admin = Admin::where('id', $request->id)->first();
        if ($admin == auth()->guard('admin')->user()) {
            return response(['message'=>'لا يمكن حذف المشرف المسجل به !','status'=>501],200);
        } else {
            $admin->delete();
            return response(['message'=>'تمت عملية الحذف بنجاح','status'=>200],200);
        }
    }

    public function save_profile(Request $request)
    {
        if (auth()->guard('admin')->user()->email != $request->email) {
            $valedator = Validator::make($request->all(), [
                'email' => ['unique:admins'],
            ]);
            if ($valedator->fails()) {
                return back()->with(notification('هذا البريد الإلكترونى موجود مسبقا', 'warning'));
            }
        }
        $update = Admin::find(auth()->guard('admin')->user()->id);
        $update->name = $request->name;
        $update->email = $request->email;
        if (isset($request->password)) {
            $update->password = Hash::make($request->password);
        }
        $update->save();
        return back()->with(notification('تم التعديل', 'info'));
    }//end fun

    public function my_profile()
    {
        $admin = auth()->guard('admin')->user();
        return view('Admin/admin/profile',compact('admin'));
    }//end fun
}
