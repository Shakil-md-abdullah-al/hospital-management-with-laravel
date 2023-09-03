<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.doctor.manage-doctor',[
            'doctors'=>Doctor::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctor.add-doctor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'phone'=> 'required',
                'speciality'=> 'required',
                'time'=> 'required',
                'day'=>'required',
                'image'=>'required',
                'fee'=>'required|numeric',
            ]
        );
        Doctor::saveDoctor($request);
        return back()->with('message','Doctor Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.doctor.edit-doctor',[
            'doctor'=>Doctor::find($id),
            'doctors'=>Doctor::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Doctor::updateDoctor($request,$id);

        return redirect('doctor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctors = Doctor::find($id);
        if($doctors->image){
            if(file_exists($doctors->image)){
                unlink($doctors->image);
            }
        }
        $doctors->delete();
        return back();
    }
}
