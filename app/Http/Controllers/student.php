<?php

namespace App\Http\Controllers;

use App\Models\student as ModelsStudent;
use App\Models\studentClass;
use Illuminate\Http\Request;

class student extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student =ModelsStudent::all();
        return view('index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $student =ModelsStudent::all();
        return view('AddStudent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');
        $Student =new ModelsStudent;
        $Student->name=$data['name'];
        $Student->phone=$data['phone'];
        $Student->email=$data['email'];
        $Student->address=$data['address'];
        $Student->save();

        $lastinsertedId= $Student->id;


        $studentClass =new studentClass;
        $studentClass->student_id=$lastinsertedId;
        $studentClass->class=$data['class'];
        $studentClass->section=$data['section'];
        $studentClass->save();

        
        $student =ModelsStudent::all();
        return view('index', compact('student'))->with('message', "Data Added Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student =ModelsStudent::all();
        return view('index',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function dropdown(){
        
        $student =ModelsStudent::all();
        return view('create',compact('student'));
    }


    public function singledate(Request $request){

       //dd("saro");
 
        $id =$request->input('id');
         
        $onestudent =ModelsStudent::find($id);
        $class=studentClass::where('student_id',$id)->get();
      //  dd($class);

        return response()->json(['success' => true,'student'=> $onestudent,'classAB'=>$class]);

    }
    public function update(Request $request)
    {
        
        $id =$request->input('Id');
        $name=$request->input('name');
        $phone=$request->input('phone');
        $email=$request->input('email');
        $address=$request->input('address');

        //dd($id."**".$name."**".$phone."**".$email."**".$address);


       $onestudentC=ModelsStudent::find($id);
       //dd($onestudentC);
       $onestudentC->name=$name;
       $onestudentC->phone=$phone;
       $onestudentC->email=$email;
       $onestudentC->Address=$address;
       $onestudentC->save();        
        
       //Book::where('author', 'John Doe')->update(['title' => 'Updated Title']);
       $student =ModelsStudent::all();
       return view('index',compact('student'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
