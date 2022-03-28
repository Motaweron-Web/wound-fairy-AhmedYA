<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\DefaultImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BlogController extends Controller
{
    use DefaultImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(3);

        return view('Admin/blogs/index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.blogs.create');
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
            $data['image'] = $this->uploadFiles('blog',$request->file('image'));
        }

        $blog = Blog::create($data);
        return redirect()->route('blogs.index')->with('message','تم اضافة المقال بنجاح');

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
        $blog = Blog::find($id);
        return view('Admin.blogs.edit',compact('blog'));
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
        $blog_update = Blog::find($id);

        $data = $request->except('image');
        if ($request->hasFile('image')){
            $data['image'] = $this->uploadFiles('blog',$request->file('image'));
        }
        $blog_update->update($data);
        return redirect()->route('blogs.index')->with('message','تم تحديث المقال بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with('message','تم حذف المقال بنجاح');
    }
}
