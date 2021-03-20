<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        $result['data'] = Customer::all();
        return view('admin/customer', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id='')
    {
        $arr = Customer::where(['id' =>$id])->get();
        $result['customer_list'] = $arr['0'];
        return view('admin/show_customer', $result);
    }

    public function status(Request $request,$status,$id)
    {
        $model = Customer::find($id);
        $model ->status=$status;
        $model ->save();
        $request ->session()->flash('message','Customer status Updated');
        return redirect('admin/customer');
    }
}
