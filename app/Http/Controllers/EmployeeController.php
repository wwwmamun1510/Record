<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function index(){ 
        $employee = Employee::all(); 
        return view('employee.index',[
            'employee'=> $employee,

          ]);
    }
    function delete($employ_id){
        Employee::find($employ_id)->delete();
        return back()->with('delete', 'Object Delected Successfully!');
        }

        function edit($employ_id){
           $edit = Employee::find($employ_id);
           return view('employee.edit',[
             'edit'=> $edit,

           ]);
         }
      
        function updated(Request $request){
            
            Employee::where('id',$request->employee_id,)->update([
                'employee_name'=>$request->employee_name,
                'department_name'=>$request->department_name,
                'Position_name'=>$request->Position_name,
                'age'=>$request->age,
                'salary'=>$request->salary,
                'updated_at'=>Carbon::now(),
            ]);
            return back()-> with('success','Employee Updated Successfully!');
          }
          function restore($employ_id){
            Employee::onlyTrashed()->find($employ_id)->restore();
            return back()-> with('restore', 'Restored Successfully!');
           }
    
           function p_delete($employ_id){
            Employee::onlyTrashed()->find($employ_id)->forceDelete();
            return back()-> with('p_delete', 'Permanent Delete Successfully!');
          }
          function trashed(){
            $trashed =  Employee::onlyTrashed()->get();
            return view('employee.trashed', [
                'trashed' => $trashed,
            ]);
        }
    
        public function insert(Request $request){ 
        $request->validate([
             'employee_name'=>'required|unique:employees',
             'department_name'=>'required|unique:employees',
             'Position_name'=>'required|unique:employees',
             'age'=>'required|unique:employees',
             'salary'=>'required|unique:employees',
           
          
        ],[
            'employee_name.required'=>'Company Name is Not Exist',
            'employee_name.unique'=>'Company Name is Already Exist',
            'department_name.required'=>'Department Name is Not Exist',
            'department_name.unique'=>'Department Name is Already Exist',
            'Position_name.required'=>'PositionName is Not Exist',
            'Position_name.unique'=>'Position Name is Already Exist',
            'age.required'=>'Age Name is Not Exist',
            'age.unique'=>'Age Name is Already Exist',
            'salary.required'=>'Salary Name is Not Exist',
            'salary.unique'=>'Salary Name is Already Exist',


        ]);
      
        Employee::insert([
              'employee_name'=>$request->employee_name,
              'department_name'=>$request->department_name,
              'Position_name'=>$request->Position_name,
              'age'=>$request->age,
              'salary'=>$request->salary,
              'created_at'=>Carbon::now(),


          ]);
        return back()->with('success', 'Employee Added Successfully!');
    }
}
