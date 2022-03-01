<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Auth, DB, Validator;
use Redirect;
use Mail;

class PageController extends Controller
{
    /*****************************************/

    /* add page */

    /****************************************/
    public function pageAdd(Request $request)
    {
        $page = new Page();
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $validator = Validator::make($postData, [
                'title' => 'required',
                'description' => 'required',
                'type' => 'required|unique:pages',
                //'status' => 'required',
            ]);

            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                notify()->error('Error, '.$response['message']);
                $response['error'] = true;
                return redirect()->back()->with($response);
            }

            $page->title = $postData['title'];
            $page->description = $postData['description'];
            $page->type = $postData['type'];
            $page->status = !empty($postData['status']) ? $postData['status'] : Page::STATUS_INACTIVE;
            $page->save();
             notify()->success('Data added successfully');
            return redirect("/admin/page");

        }

        return view("admin.pages.add", ["page" => $page]);
    }


    /*****************************************/

    /* page list */

    /****************************************/
    public function pageList(Request $request)
    {
        $userId = Auth::guard('admin')->id();
        $getPages = Page::orderBy("id", "DESC")->paginate(10);
        return view("admin.pages.list", ["pages" => $getPages]);
    }

    /*****************************************/

    /* edit page */

    /****************************************/
    public function pageEdit($id)
    {
        $page = Page::select("pages.*")->where(["id" => $id])->first();
        if ($page) {
            return view("admin.pages.edit", ['page' => $page]);
        }
        return Redirect::back();
    }

    public function pageUpdate(Request $request)
    {
        //print_r($request->all()); die;

        $postData = $request->all();
        $validator = Validator::make($postData, [
            'title' => 'required',
            'description' => 'required',
            'type' => 'required|unique:pages,type,' . $postData['id'],
            'status' => 'required',
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
        $type = $postData['type'];
        $page = page::where("id", $id)->first();

        Page::where("id", $id)->update(["title" => $title, "description" => $description, "status" => $status, 'type' => $type]);
        return Redirect::to('admin/page')->with('message', "Static Page updated successfully");

    }

    /*****************************************/

    /* view page */

    /****************************************/
    public function pageView($id)
    {
        $page = Page::where(['id' => $id])->first();
        return view('admin.pages.view', ['page' => $page]);
    }

    /*****************************************/

    /* delete page */

    /****************************************/
    public function pageDelete($id)
    {
        DB::table("pages")->where("id", $id)->delete();
        return Redirect::back()->with("message", "Data Deleted Successfully");

    }

}
