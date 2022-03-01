<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingStyle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class TraningStyleController extends Controller
{
    //
     /*****************************************/


    /*****************************************/

    /* add training style */

    /****************************************/
    public function trainingStyleAdd(Request $request)
    {
        //print_r($request->all()); die;
        $trainingStyle = new TrainingStyle();
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $validator = Validator::make($postData, [
                'title' => 'required',
                'description' => 'required'
                //'status' => 'required',
            ]);

            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                notify()->error('Error, '.$response['message']);
                $response['error'] = true;
                return redirect()->back()->with($response);
            }

            $trainingStyle->title = $postData['title'];
            $trainingStyle->description = $postData['description'];
            $trainingStyle->status = !empty($postData['status']) ? $postData['status'] : TrainingStyle::STATUS_INACTIVE;
            if (isset($postData['image_file']) && !empty($postData['image_file'])) {
                $postData['image_file'] = UploadImage($postData['image_file'], 'training_style');
                $trainingStyle->image_file = $postData['image_file'];
            }
        //     if (isset($request->image_file) && !empty($request->image_file)) {
        //         $request->image_file = UploadImage($request->image_file, 'image_file');
        //         $trainingStyle->image_file=  !empty($request->image_file)?$request->image_file:@$trainingStyle->image_file;
        // }
            $trainingStyle->save();
             notify()->success('Training Style added successfully.');
            return redirect("/admin/traning_style");

        }

        return view("admin.training_styles.add", ["training" => $trainingStyle]);
    }


    /*****************************************/
        /* view training style */

    /****************************************/
    public function trainingView($id)
    {
        $training = TrainingStyle::where(['id' => $id])->first();
        return view('admin.training_styles.view', ['training' => $training]);
    }

    /*****************************************/

    /* training style list */

    /****************************************/
    public function trainingList(Request $request)
    {
        $userId = Auth::guard('admin')->id();
        $trainings = TrainingStyle::orderBy("id", "DESC")->paginate(10);
        return view("admin.training_styles.list", ["training_s" => $trainings]);
    }

    /*****************************************/
    /* edit training style */

    /****************************************/
    public function trainingEdit($id)
    {
        $training = TrainingStyle::where(["id" => $id])->first();
        if ($training) {
            return view("admin.training_styles.edit", ['training' => $training]);
        }
        return Redirect::back();
    }
    /************************/
    public function trainingUpdate(Request $request)
    {

        $postData = $request->all();
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
        $title = $postData['title'];
        $description = $postData['description'];
        $status = $postData['status'];
        $training = TrainingStyle::where("id", $id)->first();
        if (isset($postData['image_file']) && !empty($postData['image_file'])) {
                $postData['image_file'] = UploadImage($postData['image_file'], 'training_style');
                $training->image_file =  !empty($postData['image_file'])?$postData['image_file']:@$training->image_file;
        }
        TrainingStyle::where("id", $id)
        ->update([
            "title" => $title,
            "description" => $description,
            "status" => $status
          ]);
        return Redirect::to('admin/traning_style')->with('message', "Training style updated successfully");

    }

    /*****************************************/
     /* delete training style */

    /****************************************/
    public function trainingDelete($id)
    {
        TrainingStyle::where("id", $id)->delete();
        return Redirect::back()->with("message", "Data Deleted Successfully");

    }
}
