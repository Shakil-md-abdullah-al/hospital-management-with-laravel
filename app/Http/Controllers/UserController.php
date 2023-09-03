<?php

namespace App\Http\Controllers;

use App\Models\Pharmachy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.manage-user',[
            'users'=>User::orderByDesc('created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.add-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request);
//        dd($request->all());
            User::saveUser($request);

            return back()->with('message', 'Added Successfully');

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
        // Get the user by ID
        $user = User::find($id);

        // Define the user roles with their corresponding names
        $userRoles = [
            0=>'Regular User',
            1 => 'Super Admin',
            2 => 'Doctor',
            3 => 'Food',
            4 => 'Receptionist',
            5 => 'Lab and Medicines',
        ];

        return view('admin.user.edit-user', [
            'userRoles' => $userRoles,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->usertype = $request->usertype;
            $user->doctor_id = $request->doctor_id;
            // $user->user_type = $request->user_type; // Uncomment if needed
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;

            if ($request->has('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();
        }
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
