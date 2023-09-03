<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Pharmachy;
use Illuminate\Http\Request;

class PharmachyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pharmachy.manage-medicine',[
            'medicines'=>Pharmachy::orderByDesc('created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pharmachy.add-medicine');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'code'=> 'required',
                'price'=> 'required',
                'quantity'=> 'required',
                'description'=>'required',
                'image'=>'required',
                'vendor'=>'required',
                'date' => 'required|date|after_or_equal:today',
            ]
        );
        Pharmachy::saveMedi($request);
        return back()->with('message','Medicine Added Successfully');
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
        return view('admin.pharmachy.edit-medicine',[
            'medicine'=>Pharmachy::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        dd($request);
        Pharmachy::updateMedi($request,$id);

        return redirect('pharmachy');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medicine = Pharmachy::find($id);
        if($medicine->image){
            if(file_exists($medicine->image)){
                unlink($medicine->image);
            }
        }
        $medicine->delete();
        return back();
    }
}
