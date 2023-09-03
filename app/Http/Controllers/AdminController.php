<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentHistory;
use App\Models\Contact;
use App\Models\Food;
use App\Models\LabOrder;
use App\Models\MediOrder;
use App\Models\order;
use App\Models\Pres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notification;
//use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailNotification;
use App\Models\Doctor;
use App\Models\User;
use DB;
use PDF;


class AdminController extends Controller
{
    public function showappointment()
    {
        $data = Appointment::orderBy('created_at', 'desc')->get();
        return view('admin.appointment.showappointment', compact('data'));

    }
    public function approve($id)
    {
        $data = appointment::find($id);

        $data->status ='Approved';
        $data->save();
        return back();
    }
    public function cancel($id)
    {
        $data = appointment::find($id);

        $data->status ='Canceled';
        $data->save();
        return back();
    }

    public function deleteappointment($id)
    {
        $data = Appointment::find($id);

        if ($data) {
            $data->delete();
            return back()->with('message', 'Appointment deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete appointment.');
        }
    }

    public function history($id)
    {
//        $data = Appointment::find($id);
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return back()->with('error', 'Appointment not found.');
        }

        $appointment->status = 'Completed';
        $appointment->save();
        AppointmentHistory::storeHistory($appointment);

        return back();
    }
    public function showHistory(Request $request)
    {
        // Get the currently logged-in user's ID
        $userId = $request->user()->id;

        // Retrieve the user's doctor_id from the users table
        $user = User::findOrFail($userId);
        $doctorId = $user->doctor_id;

        // Check if the doctor with the given doctor_id exists
        $doctor = Doctor::find($doctorId);

        if ($doctor) {
            // If the doctor exists, retrieve the historical data
            $data = AppointmentHistory::where('doctor_id', $doctorId)->get();
            return view('admin.history.show-history',compact('data'));
        } else {
            return back();
        }
    }

    public function cancelAppointDoc($id)
    {
        $appointment = AppointmentHistory::find($id);
//        dd($appointment);
//        dd($appointment);// Assuming "Appointment" is the model representing appointments;
        if ($appointment) {
            $appointment->status = 'Cancelled By Doctor';
            $appointment->save();

//            $data = new Appointment();
//            $data->status = 'Cancele by doctor';
//            $data->save();

            return back()->with('success', 'Appointment has been successfully cancelled.');
        } else {
            return back()->with('error', 'Appointment not found.');
        }
    }


    public function pescrib($id)
    {
        try {
            $pescrib = DB::table('appointment_histories')
                ->join('doctors', 'appointment_histories.doctor_id', '=', 'doctors.id')
                ->select('appointment_histories.*', 'doctors.name as doctor_name')
                ->where('appointment_histories.id', $id)
                ->first();

            if ($pescrib) {
                return view('admin.history.prescrib', ['prescrib' => $pescrib]);
            } else {
                return back()->with('error', 'Appointment history not found.');
            }
        } catch (QueryException $e) {
            return back()->with('error', 'Error retrieving appointment history.');
        }
    }
    public function doctorPres(Request $request)
    {
        Pres::savePres($request);
        return back()->with('message','Prescription Added Successfully');
    }



    public function emailview($id)
   {
       $data = Appointment::find($id);
       return view('admin.email.emailview',compact('data'));
   }

   public function sendemail(Request $request ,$id)
   {
       $data = Appointment::find($id);
       $details = [
           'greeting' => $request->gretting,
           'body' => $request->body,
           'actiontext' => $request->actiontext,
           'actionurl' => $request->actionurl,
           'endpart' => $request->endpart
       ];
       Notification::send($data, new SendEmailNotification($details));

       return redirect()->back();
   }

    public function showComplain()
    {
        $data = Contact::all();
        return view('admin.query.view-query',compact('data'));
    }

    public function approvequery($id)
    {
        $data = Contact::find($id);

        $data->status ='Action Taken';
        $data->save();
        return back();
    }

    public function orderList(Request $request)
    {
        dd($request->all());
        $request->validate(
            [
                'food_name'=>'required',
                'food_price'=> 'required',
                'quantity'=>'required',
                'person_name'=>'required',
                'phone'=>'required|numeric',
                'room'=>'required',
            ]
        );
        Order::saveOrder($request);
        return back()->with('message','Added Successfully');
    }
    public function approveOrder($id)
    {
        $data = Order::find($id);

        $data->status ='Approved';
        $data->save();
        return back();
    }
    public function cancel_order($id)
    {
//        $data = Order::find($id);
//        $data->delete();
//        return back();
        $order = Order::find($id);

        if ($order) {
            $order->status = 'cancelled';
            $order->save();
        }

        return back();
    }

    public function manageOrder()
    {
        return view('admin.food.manage_order', [
            'orders' => Order::all()
        ] );


    }

    public function cancelOrder($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->status = 'cancelled';
            $order->save();
        }

        return back();
    }

    public function orderDelete($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return back()->with('error', 'Order not found');
        }

        $order->delete();

        return redirect()->back()->with('success', 'Order deleted successfully');
    }

    public function labOrder()
    {
        return view('admin.lab.show-order',
        [
            'lab'=>LabOrder::orderByDesc('created_at')->get()
        ]);
    }

    public function updateLabOrder($id)
    {
        $order = LabOrder::find($id);

        $order->delivery_status='Delivered';
        $order->payment_status='Paid';
        $order->save();
        return redirect()->back();
    }

    public function printOrder($id)
    {
        $data =LabOrder::find($id);
        $pdf = PDF::loadView('admin.lab.pdf',compact('data'));
        return $pdf->download('lab_test_details.pdf');
    }


    public function MediOrder()
    {
        return view('admin.pharmachy.show-order',
            [
                'medi'=>MediOrder::orderByDesc('created_at')->get()
            ]);
    }

    public function updateMediOrder($id)
    {
        $order = MediOrder::find($id);

        $order->delivery_status='Delivered';
        $order->payment_status='Paid';
        $order->save();
        return redirect()->back();
    }

    public function printMediOrder($id)
    {
        $data =MediOrder::find($id);
        $pdf = PDF::loadView('admin.pharmachy.pdf',compact('data'));
        return $pdf->download('medicines.pdf');
    }


}
