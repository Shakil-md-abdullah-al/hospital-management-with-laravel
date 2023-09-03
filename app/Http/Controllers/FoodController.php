<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.food.manage-food',[
            'foods'=>Food::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.food.add-food');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'sku'=> 'required',
                'price'=> 'required',
                'quantity'=> 'required',
                'description'=>'required',
                'image'=>'required',
            ]
        );
        Food::saveFood($request);
        return back()->with('message','Food Added Successfully');
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
        return view('admin.food.edit-food',[
            'food'=>Food::find($id),
            'foo'=>Food::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Food::updateFood($request,$id);

        return redirect('food');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $food = Food::find($id);
        if($food->image){
            if(file_exists($food->image)){
                unlink($food->image);
            }
        }
        $food->delete();
        return back();
    }
}
