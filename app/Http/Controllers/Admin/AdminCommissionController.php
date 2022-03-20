<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminCommission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class AdminCommissionController extends Controller
{
    public function commissionList()
    {

        $commissions = AdminCommission::get();
        return view('admin.admin_commissions.list', compact('commissions'));
    }

    public function commissionAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'commission_percent' => 'required|numeric',
                'type' => 'required|unique:admin_commissions',
            ]);

            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                $response['error'] = true;
                notify()->error('Error,' .$response['message']);
                return redirect()->back()->with($response);
            }

            $admin_commission = new AdminCommission;
            $admin_commission->commission_percent = $request->commission_percent;
            $admin_commission->type = $request->type;


            if ($admin_commission->save()) {
                notify()->success('Success', 'Commission added successfully');
                return redirect()->route('admin.commission.list');
            } else {
                notify()->error('Error', 'Something went wrong!');
                return redirect()->route('admin.commission.list');
            }
        }

        return view('admin.admin_commissions.add');
    }

    public function commissionEdit(Request $request)
    {

        $commission = AdminCommission::find($request->id);

        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'commission_percent' => 'required|numeric',
                //'type' => 'required|unique:admin_commissions,type,' . $request->id,
            ]);

            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                $response['error'] = true;
                notify()->error('Error,' .$response['message']);
                return redirect()->back()->with($response);
            }

            $commission->commission_percent = $request->commission_percent;
            //$commission->type = $request->type;

            if ($commission->save()) {
                return redirect()->route('admin.commission.list')->with('success', 'Commission updated successfully');
            } else {
                return redirect()->route('admin.commission.list')->with('error', 'Something went wrong!');
            }
        }

        return view('admin.admin_commissions.edit', compact('commission'));
    }
}
