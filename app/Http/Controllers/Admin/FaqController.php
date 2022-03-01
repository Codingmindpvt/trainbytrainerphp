<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqSeeder;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy("id", "DESC")->paginate(10);
        return view('admin.faq.index')->with('faqs', $faqs);
    }
    public function addFaqForm()
    {
        $faq_types = FaqSeeder::get();
        return view('admin.faq.add_faq')->with('faq_types', $faq_types);
    }
    public function saveFaqForm(Request $request)
    {
        $request->validate([
            'questions' => 'required',
            'answer' => 'required',
            'type' => 'required'
        ]);
        $faq_form = Faq::create($request->all());
        if ($faq_form->save()) {
            notify()->success('Faq added successfully.');
            return redirect()->route('faq.dashboard')->with('message', 'Faq form submit successfully!.');
        }
    }
    public function deleteFaq($id)
    {
        $delete_faq = Faq::where('id', $id);
        if (!empty($delete_faq)) {
            Faq::where('id', $id)->delete();
            notify()->success('Faq delete successfully!.');
            return redirect()->back()->with('message', 'Faq delete successfully.');
        }
        return redirect()->back()->with('error', 'Faq not deleted successfully!.');
    }
    public function viewFaq($id)
    {
        $view_faq = Faq::where('id', $id)->first();
        return view('admin.faq.view_faq')->with('view_faq', $view_faq);
    }
    public function editFaq($id)
    {
        $edit_faq = Faq::where('id', $id)->first();
        $faq_types = FaqSeeder::get();
        return view('admin.faq.edit_faq')->with(['edit_faq' => $edit_faq, 'faq_types' => $faq_types]);
    }
    public function updateFaq(Request $request)
    {
        $request->validate([
            "type" => "required",
            "questions" => "required",
            "answer" => "required"
        ]);
        $update_faq = Faq::find($request->id);
        $update_faq->fill($request->all());
        if($update_faq->save()) {
            notify()->success('Faq update successfully!.');
            return redirect()->route('faq.dashboard')->with('message', 'Faq update successfully.');
        } else {
            return redirect()->back()->with('error', 'Faq not updated!.');
        }

    }
}
