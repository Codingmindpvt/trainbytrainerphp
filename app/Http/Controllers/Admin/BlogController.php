<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class BlogController extends Controller
{
    /*****************************************/

    /* add blog */

    /****************************************/
    public function blogAdd(Request $request)
    {
        $blog = new Blog();
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $validator = Validator::make($postData, [
                //'title' => 'required',
                //'description' => 'required'
                //'status' => 'required',
            ]);

            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                notify()->error('Error, '.$response['message']);
                $response['error'] = true;
                return redirect()->back()->with($response);
            }

            $blog->title = $postData['title'];
            $blog->description = $postData['description'];
            $blog->category_id = $postData['category'];
            $blog->user_id = Auth::guard('admin')->id();
            $blog->status = !empty($postData['status']) ? $postData['status'] : Blog::STATUS_INACTIVE;
            if (isset($postData['image_file']) && !empty($postData['image_file'])) {
                $postData['image_file'] = UploadImage($postData['image_file'], 'blog');
                $blog->image_file = $postData['image_file'];
            }
            $blog->save();
             notify()->success('Blog added successfully.');
            return redirect("/admin/blog");

        }

        return view("admin.blogs.add", ["blog" => $blog]);
    }


    /*****************************************/

    /* blog list */

    /****************************************/
    public function blogList(Request $request)
    {
        $userId = Auth::guard('admin')->id();
        $blogs = Blog::with('category')->orderBy("id", "DESC")->paginate(10);
        return view("admin.blogs.list", ["blogs" => $blogs]);
    }

    /*****************************************/

    /* edit blog */

    /****************************************/
    public function blogEdit($id)
    {
        $blog = Blog::with('category')->where(["id" => $id])->first();
        if ($blog) {
            return view("admin.blogs.edit", ['blog' => $blog]);
        }
        return Redirect::back();
    }

    public function blogUpdate(Request $request)
    {
        $postData = $request->all();
        //dd($postData);
        $validator = Validator::make($postData, [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            $response['error'] = true;
            return redirect()->back()->with($response);
        }

        $id = $postData['id'];
        $blog = Blog::with('category')->where("id", $id)->first();
        if (isset($postData['image_file']) && !empty($postData['image_file'])) {
                $postData['image_file'] = UploadImage($postData['image_file'], 'blog');
                // dd($postData);
                $blog->image_file =!empty($postData['image_file'])?$postData['image_file']:@$blog->image_file;

        }
        blog::where("id", $id)
        ->update([
            "title" => $postData['title'],
            "description" => $postData['description'],
            "status" => $postData['status'],
            "category_id" => $postData['category'],
            "image_file"=>$blog->image_file,
          ]);
        return Redirect::to('admin/blog')->with('message', "Blog updated successfully");

    }

    /*****************************************/

    /* view Blog */

    /****************************************/
    public function blogView($id)
    {
        $blog = Blog::with('category')->where(['id' => $id])->first();
        return view('admin.blogs.view', ['blog' => $blog]);
    }

    /*****************************************/

    /* delete blog */

    /****************************************/
    public function blogDelete($id)
    {
        Blog::where("id", $id)->delete();
        return Redirect::back()->with("message", "Data Deleted Successfully");

    }
}
