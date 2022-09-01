<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();
        return view('department.index',[
            'departments'=> $departments,

          ]);
       }
       function delete($depart_id){
        Department::find($depart_id)->delete();
        return back()->with('delete', 'Object Delected Successfully!');
        }
        function edit($depart_id){
            $edit = Department::find($depart_id);
            return view('department.edit',[
              'edit'=> $edit,
            ]);
        }
        function updated(Request $request){
            
            Department::where('id',$request->company_id,)->update([
                'company_name'=>$request->company_name,
                'department_name'=>$request->department_name,
                'updated_at'=>Carbon::now(),
            ]);
            return back()-> with('success','Department Updated Successfully!');
          }
          function restore($depart_id){
         
            Department::onlyTrashed()->find($depart_id)->restore();
            return back()-> with('restore', 'Restored Successfully!');
           }
    
           function p_delete($depart_id){
            Department::onlyTrashed()->find($depart_id)->forceDelete();
            return back()-> with('p_delete', 'Permanent Delete Successfully!');
          }
          function trashed(){
            $trashed = Department::onlyTrashed()->get();
            return view('department.trashed', [
                'trashed' => $trashed,
            ]);
        }
    public function insert(Request $request){  
           
        $request->validate([
             'company_name'=>'required|unique:departments',
             'department_name'=>'required|unique:departments',
           
          
        ],[
            'company_name.required'=>'Company Name is Not Exist',
            'company_name.unique'=>'Company Name is Already Exist',
            'department_name.required'=>'Department Name is Not Exist',
            'department_name.unique'=>'Department Name is Already Exist',


        ]);


       Department::insert([
              'company_name'=>$request->company_name,
              'department_name'=>$request->department_name,
              'created_at'=>Carbon::now(),


          ]);
        return back()->with('success', 'Department Added Successfully!');
    }
   
}
