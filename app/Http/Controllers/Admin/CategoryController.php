<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
     /*****************************************/

    /* add category */

    /****************************************/
    public function categoryAdd(Request $request)
    {
        //print_r($request->all()); die;
        $category = new Category();
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $validator = Validator::make($postData, [
                // 'title' => 'required',
                // 'description' => 'required'
                //'status' => 'required',
            ]);

            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                notify()->error('Error, '.$response['message']);
                $response['error'] = true;
                return redirect()->back()->with($response);
            }

            $category->title = $postData['title'];
            $category->description = $postData['description'];
            $category->status = !empty($postData['status']) ? $postData['status'] : Category::STATUS_INACTIVE;
            if (isset($postData['image_file']) && !empty($postData['image_file'])) {
                $postData['image_file'] = UploadImage($postData['image_file'], 'category');
                $category->image_file = $postData['image_file'];
            }
            if($category->save()){
                notify()->success('Category added successfully.');
                return redirect()->route('admin.category.list');
            }

        }
        return view("admin.categories.add", ["category" => $category]);
    }

    /*****************************************/

    /* category list */

    /****************************************/
    public function categoryList(Request $request)
    {
        $userId = Auth::guard('admin')->id();
        $categories = Category::orderBy("id", "DESC")->paginate(10);
        return view("admin.categories.list", ["categories" => $categories]);
    }

    /*****************************************/

    /* edit category */

    /****************************************/
    public function categoryEdit($id)
    {
        $category = Category::where(["id" => $id])->first();
        if ($category) {
            return view("admin.categories.edit", ['category' => $category]);
        }
        return Redirect::back();
    }

    public function categoryUpdate(Request $request)
    {
        // print_r($request->all()); die;

        $postData = $request->all();
        //dd($postData);
        $validator = Validator::make($postData, [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            // 'image_file' => 'extension'
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            $response['error'] = true;
            return redirect()->back()->with($response);
        }

        $id = $postData['id'];
        $title = $postData['title'];
        $description = $postData['description'];
        $status = $postData['status'];
        $category = Category::where("id", $id)->first();
        if (isset($postData['image_file']) && !empty($postData['image_file'])) {
                $postData['image_file'] = UploadImage($postData['image_file'], 'category');
                // dd($postData);
                $category->image_file =!empty($postData['image_file'])?$postData['image_file']:@$category->image_file;

        }
        Category::where("id", $id)
        ->update([
            "title" => $title,
            "description" => $description,
            "status" => $status,
             "image_file"=>$category->image_file,
          ]);
          notify()->success('Category updated successfully.');
        return Redirect::to('admin/category');
    }

    /*****************************************/

    /* view category */

    /****************************************/
    public function categoryView($id)
    {
        $category = Category::where(['id' => $id])->first();
        return view('admin.categories.view', ['category' => $category]);
    }

    /*****************************************/

    /* delete category */

    /****************************************/
    public function categoryDelete($id)
    {
        Category::where("id", $id)->delete();
        return Redirect::back()->with("message", "Data Deleted Successfully");

    }
}
