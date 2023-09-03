<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Pharmachy;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.lab.manage-report',[
            'lab'=>Lab::orderByDesc('created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lab.add-report');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $request->validate(
//            [
//                'name'=>'required',
//                'code'=> 'required',
//                'description'=> 'required',
//                'price'=> 'required|numeric',
//                'Room'=> 'required|numeric',
//            ]
//        );
//        dd($request);
        Lab::saveLab($request);
        return back()->with('message','Lab Test Added Successfully');
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
        return view('admin.lab.edit-report',[
            'lab'=>Lab::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Lab::updateLab($request,$id);

        return redirect('lab');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lab = Lab::find($id);
        $lab->delete();
        return back();
    }
}
