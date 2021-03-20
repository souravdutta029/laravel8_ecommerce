<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        $result['data'] = Brand::all();
        return view('admin/brand', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_brand(Request $request, $id='')
    {
        if($id > 0){
            $arr = Brand::where(['id' =>$id])->get();
            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            $result['in_home'] = $arr['0']->in_home;
            $result['in_home_selected'] = '';
            if($arr['0']->in_home == 1){
                $result['in_home_selected'] = 'checked';
            }
            $result['status'] = $arr['0']->status;
            $result['id'] = $arr['0']->id;
        }else{
            $result['name'] = '';
            $result['image'] = '';
            $result['in_home'] = '';
            $result['in_home_selected'] = '';
            $result['status'] = '';
            $result['id'] = 0;
        }
        return view('admin/manage_brand', $result);
    }

    public function manage_brand_process(Request $request)
    {
        // return $request ->post();
        // validation
        $request ->validate([
             'name' => 'required|unique:brands,name,'.$request ->post('id'),
            'image' => "mimes:jpg,jpeg,png",
        ]);

        if($request ->post('id') > 0){
            $model = Brand::find($request ->post('id'));
            $msg = "Brand Updated";
        }else{
            $model = new Brand();
            $msg = "Brand Inserted";
        }

        if($request ->hasFile('image')){
            if($request ->post('id') > 0){
                $arrImage = DB::table('brands')->where(['id' => $request ->post('id')])->get();
                if(Storage::exists('/public/media/brand/'.$arrImage['0']->image)){
                    Storage::delete('/public/media/brand/'.$arrImage['0']->image);
                }
            }
            $image = $request ->file('image');
            $ext = $image ->extension();
            $image_name = time().'.'.$ext;
            $image ->storeAs('/public/media/brand', $image_name);
            $model ->image=$image_name;
        }

        $model ->name=$request ->post('name');
        $model ->in_home=0;
        if($request ->post('in_home') != null){
            $model ->in_home=1;
        }
        $model ->status=1;
        $model ->save();
        $request ->session()->flash('message',$msg);
        return redirect('admin/brand');
    }

    public function delete(Request $request, $id)
    {
        $model = Brand::find($id);
        $model ->delete();
        $request ->session()->flash('message','Brand Deleted');
        return redirect('admin/brand');
    }

    public function status(Request $request,$status,$id)
    {
        $model = Brand::find($id);
        $model ->status=$status;
        $model ->save();
        $request ->session()->flash('message','Brand status Updated');
        return redirect('admin/brand');
    }
}
