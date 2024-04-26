<?php

namespace App\Http\Controllers;
use App\Models\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){

        $students=StudentModel::all();
        return view('StudentList',compact('students'));
    }

    public function addStudent(){

        return view('AddStudent');
    }

    public function createStudent(Request $request){
       $vaidation= $request->validate([
            'name'=>'required',
            'email'=>'required|unique:student,email',
            'phone'=>'required|unique:student,phone',
            'image'=>'required|image|mimes:png,jpg,jpeg',
        ],[
            'name.requierd'=>'Name Field not be empty',
            'email.requierd'=>'Email Field not be empty',
            'phone.requierd'=>'Phone Field not be empty',
        ]);

            $student= new StudentModel;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->save();




            if($request->image){

                $ext= $request->image->getClientOriginalExtension();
                $fileName=time().'.'.$ext;
                $request->image->move(public_path('image'),$fileName);
                $student->image= $fileName;
                $student->save();
            }


        return redirect()->route('list.student')->with('info','Data insert Success');
    }

    public function editStudent($id){
        $student= StudentModel::find($id);
         return view('EditStudent' , compact('student'));
    }

    public function updateStudent(Request $request){
        $student=StudentModel::find($request->id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        if($request->image){
            $ext= $request->image->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $request->image->move(public_path('image'),$fileName);
            $student->image= $fileName;
            $student->save();
        }

        return redirect()->route('list.student')->with('info','Data Update Success');

    }
    public function deleteStudent($id){
        $student= StudentModel::find($id);
        $student->delete();
        return redirect()->route('list.student')->with('info','Data Delete Success');
    }
}
