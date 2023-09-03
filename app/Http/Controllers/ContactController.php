<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Contact::all();
        return view('admin.query.view-query',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.contact.contact-page');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'email'=> 'required|email',
                'subject'=>'required',
                'message'=>'required',
            ]
        );

        $data = new Contact();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->status = 'In Progress';
        if (Auth::id())
        {
            $data->user_id = Auth::user()->id;
        }

        if ($data->save())
        {
            return back()->with('message', 'Message sent successfully');
        }else{
            return back()->with('message', 'Please fill all Require fields');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = Contact::find($id);

        $query->delete();
        return back();
    }
}
