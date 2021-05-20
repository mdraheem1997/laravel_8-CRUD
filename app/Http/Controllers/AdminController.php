<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\admin;
// use Session;
use Image;
class AdminController extends Controller
{
    //
    public function insert_admin(Request $req)
    {
            $req->validate(
                [
                    'username'=>'required',
                    'name'=>'required',
                    'pwd'=>'required',
                    'image'=>'required|image|mimes:jpg,png,jpeg,gif',
                ]
            );
            $input = new admin;
        
            $input->username = $req->username;
            $input->name = $req->name;
            $input->password = $req->pwd;
            //$input->password = sha1($req->pwd);
            //$input->password = md5($req->pwd);


            // image insert start
            $input->image = $req->file('image')->getClientOriginalName();
 
            $path = $req->file('image')->store('uploads');
            // image insert end.
            $input->save();
            $req->session()->flash('msg',"Data Inserted Successfully");
             //return redirect('add-admin');
             return redirect('manage-admin');
    }
    public function manage_admin()
    {
        //$data['admin'] = admin::all(); for fetch all data
        //  $data['admin'] = admin::paginate(3);

        // $data['admin'] = admin::where('status',1)->paginate(3);
        $data['admin'] = admin::where('status',1)->orderby('id','DESC')->get();
        //print_r($data->toSql());
        
        // $data['admin'] = admin::with('users')->get()->toArray();
        // echo  "<pre>";
        // print_r($data);die;  //for show  data through join
        return view('manage-admin',$data);
    }
    public function edit_admin($id)
    {
        $id = base64_decode($id);
        $data['member'] = admin::find($id);
        return view('edit-admin',$data);
    }
    public function update_admin(Request $req)
    {
        $req->validate(
            [
                'username'=>'required',
                'name'=>'required',
                'pwd'=>'required',
                'image'=>'image|mimes:jpg,png,jpeg,gif',
            ]
        );

        $id = $req->hidden_id;
        $data = admin::find($id);
        $data ->username = $req->username;
        $data ->name = $req->name;
        $data ->password = $req->pwd;
        if($req->image!=''){
            // image insert start
            $data->image = $req->file('image')->getClientOriginalName();
 
            $path = $req->file('image')->store('uploads');
            // image insert end.
        }
        $data->save();
        $req->session()->flash('msg',"Data Updated Successfully");
        return redirect('manage-admin');
    }
    public function delete_admin(Request $req,$id)
    {
        
       $id = base64_decode($id);
         DB::table('admins')
                    ->where('id',$id)
                    ->update(['status'=>'0']);
        $req->session()->flash('msg',"Data Deleted");         
        return redirect('manage-admin');
// this method is use from model...
        // return admin::where('id',$id)
        //             ->update(['status'=>'0']);
    }
}
