<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HowItWorkHeading;
use App\Models\HowItWorkType;
use App\Models\HowItWorkContent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

use function GuzzleHttp\Promise\all;

class HowItWorkController extends Controller
{
    /*****************************************/

    /* Heading List */

    /****************************************/

    public function headingList()
    {

        $heading = HowItWorkHeading::get();
       // dd($heading);
        return view('admin.how_it_works.headings.list', compact('heading'));
    }

    /*****************************************/

    /* Add Heading */

    /****************************************/
    public function headingAdd(Request $request)
    {

        $heading = HowItWorkHeading::first();

        if (!empty($heading)) {
            notify()->error('Error', 'Heading already added');
            return redirect()->route('admin.how-it-work.headings.list');
        }

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $heading = new HowItWorkHeading();
            $heading->title = $request->title;

            if ($heading->save()) {
                notify()->success('Success', 'Heading added successfully');
                return redirect()->route('admin.how-it-work.heading.list');
            } else {
                notify()->error('Error', 'Something went wrong!');
                return redirect()->route('admin.how-it-work.heading.list');
            }
        }

        return view('admin.how_it_works.headings.add');
    }

    public function headingEdit(Request $request)
    {

        $heading = HowItWorkHeading::first();

        if (empty($heading)) {
            notify()->error('Error', 'You need to add Heading');
            return redirect()->route('admin.how-it-work.heading.list');
        }

        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $heading->title = $request->title;

            if ($heading->save()) {
                notify()->success('Success', 'Heading updated successfully');
                return redirect()->route('admin.how-it-work.heading.list');
            } else {
                notify()->error('error', 'Something went wrong!');
                return redirect()->route('admin.how-it-work.heading.list');
            }
        }

        return view('admin.how_it_works.headings.edit', compact('heading'));
    }


    /*****************************************/

    /* Add Type */

    /****************************************/
    public function typeList()
    {
        $getTypes = HowItWorkType::get();
        return view('admin.how_it_works.types.list', compact('getTypes'));
    }

    public function typeAdd(Request $request)
    {
        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
            ]);

            $getType = new HowItWorkType();
            $getType->title = $request->title;
            $getType->description = $request->description;

            $getType->save();
        }
        return redirect()->route('admin.how-it-work.types.list')->with('message','Add Type Successfully ');
        return view('admin.how_it_works.types.add');
        return view('admin.how_it_works.types.add');
        return view('admin.how_it_works.types.add');
    }

    public function typeDelete($id)
    {
        $getType = HowItWorkType::find($id);
        $getType->delete();
        return back()->with('message', 'Deleted Successfull');
    }

    public function typeEdit($id)
    {
        $getData = HowItWorkType::find($id);
        //   dd($getData);
        return view('admin.how_it_works.types.edit', compact('getData'));
    }

    public function saveEditType(Request $request)
    {
        //dd($request->all());
        $getData = HowItWorkType::find($request->id);

        $getData->title = $request->title;
        $getData->description = $request->description;

        $getData->save();
        return redirect()->route('admin.how-it-work.types.list')->with('message','Update Type Successfully ');
        return redirect()->route('admin.how-it-work.types.list');
        return redirect()->route('admin.how-it-work.types.list');
    }


    /*****************************************/

    /* Add Content */

    /****************************************/
    public function contentList()
    {
        $content = HowItWorkContent::with('how_it_work_type')->paginate(15);
        return view('admin.how_it_works.contents.list', compact('content'));
    }

    public function contentAdd()
    {
        $content = HowItWorkType::all();
        // dd( $content);
        return view('admin.how_it_works.contents.add', compact('content'));
    }

    public function saveContentAdd(Request $request)
    {
        //dd($request->all());
        $content = new HowItWorkContent();
        $content->title = $request->title;
        $content->description = $request->description;
        $content->type_id = $request->type_id;
        // dd($content->type_id);
        if (isset($request->image_file) && !empty($request->image_file)) {
            $image_file = UploadImage($request->image_file, 'pages');
            $content->image_file = $image_file;
        }
        $content->save();
        return redirect()->route('admin.how-it-work.contents.list')->with('message','Add Content Successfully ');
        return redirect()->route('admin.how-it-work.contents.list');
        return redirect()->route('admin.how-it-work.contents.list');
    }

    public function contentDelete($id)
    {
        $getType = HowItWorkContent::find($id);
        $getType->delete();
        return back()->with('message', 'Deleted Successfull');
    }

    public function contentEdit($id)
    {
        $content = HowItWorkContent::where('id',$id)->first();
        $typeList = HowItWorkType::all();
        return view('admin.how_it_works.contents.edit', compact('content','typeList'));
        $contents = HowItWorkContent::all();
        $content = HowItWorkType::all();
        return view('admin.how_it_works.contents.edit', compact('contents','content'));
    }

    public function contentEditSave(Request $request)
    {
       dd($request->id);
        $contents = HowItWorkContent::find($request->id);

        $contents->title = $request->title;
        $contents->description = $request->description;
         $contents->type_id = $request->type_id;
         if (isset($request->image_file) && !empty($request->image_file)) {
            $image_file = UploadImage($request->image_file, 'pages');
            $contents->image_file = $image_file;
        }
       
        $contents->save();
        return redirect()->route('admin.how-it-work.contents.list')->with('message','Update Content Successfully ');
        return redirect()->route('admin.how-it-work.contents.list');
    }
    
}
