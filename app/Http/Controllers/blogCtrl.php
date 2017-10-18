<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\blog_admin;
use App\Blog;
use DB;
use Input;

class blogCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blogs.login');
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
        $this->validate($request,[
         'username'=>'required',
         'password'=>'required'
        ]);
        
        $blog_admin = new blog_admin;
        
        $username = $request->username;
        $password = md5($request->password);
        
        $check = DB::table('blog_admins')->select('*')->get();
        
        $checkusername = $check[0]->username;
        $checkpassword = $check[0]->password;
        
        if($username == $checkusername && $password == $checkpassword)
        {
            return redirect('admin_panel');
        }
        
    }

    public function admin_panel() 
    {
        return view('blogs.create');
    }
    
    public function create_blog(Request $request)
    {
        $blog = new Blog();
        
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->likes = 0;
        $blog->save();
        
        $id = $blog->id;
        
        if($request->hasFile('image')){
            $image_name = $request->file('image')->getClientOriginalName(); 
            $image_extension = $request->file('image')->getClientOriginalExtension();
            $destinationPath = base_path() . '/public/includes/img/';
            if(!file_exists($destinationPath)) File::makeDirectory($destinationPath);
            $request->file('image')->move(
                $destinationPath,$image_name
            ); 
            Blog::where('id', $id)->update(['image'=>$image_name]);
        } else {
            $image_name = 'hclogo.png';
            Blog::where('id', $id)->update(['image'=>$image_name]);
        }
        
        $blogs = Blog::all();
        
        return redirect('blogs_list');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $blog = new Blog();
        $blogs = Blog::all();
        
        return view('blogs.index', compact('blogs'));
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
        return view('blogs.edit', compact('blog'));
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
        
        
        $blog = Blog::find($id);
        $blog->update($request->all());
        
        if($request->hasFile('image')){
            $image_name = $request->file('image')->getClientOriginalName(); 
            $image_extension = $request->file('image')->getClientOriginalExtension();
            $destinationPath = base_path() . '/public/includes/img/';
            if(!file_exists($destinationPath)) File::makeDirectory($destinationPath);
            $request->file('image')->move(
                $destinationPath,$image_name
            ); 
            Blog::where('id',$id)->update(['image'=>$image_name]);
            
         }    
        return redirect('blogs_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
        $id = Input::get('id', false);
        
        DB::table('blogs')->where('id', $id)->delete();

        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));

    }
}
