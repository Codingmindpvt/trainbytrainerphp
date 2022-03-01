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

        $admin_commission = AdminCommission::first();

        if (!empty($admin_commission)) {
             notify()->error('Error', 'Commission already added');
            return redirect()->route('admin.commission.list');
        }

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'commission_percent' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $admin_commission = new AdminCommission;
            $admin_commission->commission_percent = $request->commission_percent;

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

        $commission = AdminCommission::first();

        if (empty($commission)) {
            notify()->error('Error', 'You need to add commission');
            return redirect()->route('admin.commission.list');
        }

        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'commission_percent' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $commission->commission_percent = $request->commission_percent;

            if ($commission->save()) {
                return redirect()->route('admin.commission.list')->with('success', 'Commission updated successfully');
            } else {
                return redirect()->route('admin.commission.list')->with('error', 'Something went wrong!');
            }
        }

        return view('admin.admin_commissions.edit', compact('commission'));
    }
}
