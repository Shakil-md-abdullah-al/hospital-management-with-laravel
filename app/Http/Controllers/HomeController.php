<?php

namespace App\Http\Controllers;

use App\Models\AppointmentHistory;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Food;
use App\Models\Lab;
use App\Models\LabCart;
use App\Models\LabOrder;
use App\Models\MediCart;
use App\Models\MediOrder;
use App\Models\Order;
use App\Models\Pharmachy;
use App\Models\Pres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;
use PDF;

class HomeController extends Controller
{
    public function redirect(){
        if (Auth::id())
        {
            if (Auth::user()->usertype=='0')
            {
                $doctor = doctor::all();
                $blog = Blog::all();
                $food = Food::all();
                $appointment = Doctor::all();
                return view('user.home',compact('doctor','blog','food'));
            }
            else
            {
                return view('admin.home',
                [
                    'doctors'=>Doctor::orderBy('created_at', 'desc')->get()
                ]);
            }
        }
        else
        {
            return $this->redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::id())
        {
            return $this->redirect('home');
        }
        else
        {
            $doctor = doctor::all();
            $blog = Blog::all();
            $cat = Category::all();
            $food = Food::all();
            return view('user.home',compact('doctor','blog','cat','food'));
        }
    }

    public function appointment(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'date' => 'required|date|after_or_equal:today',
            'phone' => 'required',
            'doctor' => 'required',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        $data = new Appointment(); // Create a new Appointment instance

        // Populate the appointment data
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->date = $request->input('date');
        $data->phone = $request->input('phone');
        $data->doctor = $request->input('doctor');
        $data->doctor_id = $request->input('doctor_id');
        $data->fee = $request->input('fee');
        $data->message = $request->input('message');
        $data->status = 'In Progress';

        // Find the selected doctor's data from the Doctor table
        $selectedDoctor = Doctor::find($request->input('doctor'));

        if ($selectedDoctor) {
            $data->doctor = $selectedDoctor->name; // Assuming 'name' is the doctor's name attribute
            $data->fee = $selectedDoctor->fee; // Assuming 'consultant_fee' is the doctor's fee attribute
            $data->id = $selectedDoctor->user_id; // Assuming 'consultant_fee' is the doctor's fee attribute
        }

        if (Auth::check()) {
            // If the user is logged in, associate the user ID
            $data->user_id = Auth::user()->id;

            if ($data->save()) {
                return back()->with('message', 'Appointment booked successfully. We will contact you soon.');
            } else {
                return back()->with('error', 'Failed to book the appointment. Please try again.');
            }
        } else {
            return redirect()->route('login')->with('message', 'You need to log in to make an appointment.');
        }
    }

    public function myappointment()
    {
        if (Auth::id())
        {
            $userid = Auth::user()->id;
            $appoint = Appointment::where('user_id', $userid)
                ->orderByDesc('id') // Order by ID in descending order
                ->get();
            return view('user.appointment.myappointment',compact('appoint'));
        }
        else
        {
            return back();
        }
    }


    public function cancel_appointment($id)
    {
        $data = appointment::find($id);
        $data->delete();
        return back();
    }

    public function cancelOrder($id)
    {
        $data = Order::find($id);
        $data->delete();
        return back();
    }


    public function about()
    {
        $doctor = doctor::all();
        return view('user.about.about',compact('doctor'));
    }

    public function allDoctors()
    {
        $doctor = doctor::orderBy('created_at', 'desc')->get();
        return view('user.doctor.doctor',compact('doctor'),
        ['appointment'=>Appointment::all()]);
    }
    public function doctorDetails($id)
    {
        return view('user.doctor.doctor-details',[
            'doctor'=>Doctor::find($id),
            'doc'=>Doctor::all(),
        ]);
    }


    public function foodpage()
    {
        $food = Food::orderBy('created_at', 'desc')->get();
        return view('user.food.all-food', compact('food'));
//        $food = Food::all();
//        return view('user.food.all-food',compact('food'));
    }
    public function myorder()
    {
        if (Auth::id())
        {
            $userid = Auth::user()->id;
            $order = Order::where('user_id',$userid)->get();
//            dd($order);
            return view('user.order.myorder',compact('order'));
        }
        else
        {
            return back();
        }
    }

    public function allBlog()
    {
        $blog = Blog::orderBy('created_at', 'desc')->get();
        $cat = Category::all();
        return view('user.blog.blog',compact('blog','cat'));
    }

   public function blogDetails($id)
   {
       $blog = Blog::find($id);

       if (!$blog) {
           return abort(404); // Handle blog not found
       }

       // Retrieve related blogs based on the category of the current blog
       $relatedBlogs = Blog::where('category', $blog->category)
           ->where('id', '!=', $id) // Exclude current blog
           ->limit(3) // Limit to 3 related blogs
           ->get();

//       return view('user.blog.blog-details', compact('blog', 'relatedBlogs'));
       return view('user.blog.blog-details',[
           'blog'=>Blog::find($id),
           'blo'=>Blog::all(),
           'relatedBlogs'=>$relatedBlogs
       ]);
   }



    public function checkout($id)
    {
//        $food = Food::find($id);
//        dd($food);
        return view('user.order.checkout',
            [
                'food' => Food::find($id),
                'foo'=>Food::all(),
            ]);
    }

    public function orderList(Request $request)
    {
        $request->validate(
            [
                'quantity'=>'required|numeric',
                'person_name'=> 'required',
                'room'=>'required|numeric',
                'phone'=>'required|numeric',
            ]
        );
        if (!empty($request)) {
            Order::saveOrder($request);
            return back()->with('message', 'Order placed successfully. We will contact you soon.');
        } else {
            return back()->with('message', 'Failed to save the order. Please fill all required fields.');
        }
    }

  public function contactform(Request $request)
  {
      $request->validate(
          [
              'name'=>'required',
              'email'=> 'required|email',
              'subject'=>'required',
              'message'=>'required',
          ]
      );
      $query = new Contact();
      $query->name = $request->name;
      $query->email = $request->email;
      $query->subject = $request->suject;
      $query->message = $request->message;
      $query->status = 'In Progress';
      if (Auth::id())
      {
          $query->user_id = Auth::user()->id;
      }
      if ($query->save())
      {
          return back()->with('message', 'Message sent successfully');
      }else{
          return back()->with('message', 'Failed , Try again');
      }
  }

    public function myQuery()
    {
        if (Auth::id())
        {
            $userid = Auth::user()->id;
            $query = contact::where('user_id',$userid)->get();
            return view('user.contact.my-query',compact('query'));
        }
        else
        {
            return back();
        }
    }
    public function cancel_query($id)
    {
        $query = contact::find($id);
        $query->delete();
        return back();
    }


    public function myaPrescription()
    {
        if (Auth::id())
        {
            $userid = Auth::user()->id;
            $prescrib = Pres::where('user_id', $userid)
                ->orderByDesc('id') // Order by ID in descending order
                ->get();
            return view('user.prescrib.my-prescrip',compact('prescrib'));
        }
        else
        {
            return back();
        }
    }

    public function appointBill($id)
    {
        return view('user.prescrib.my-bill-p',
        [
            'prescrib'=>Pres::find($id)
        ]);

    }
    public function printPresc($id)
    {
        $data =Pres::find($id);
        $pdf = PDF::loadView('user.prescrib.pdf',compact('data'));
        return $pdf->download('prescription.pdf');
    }

    public function allReport()
    {
        return view('user.test.all-test',
        [
            'lab'=>Lab::orderBy('created_at', 'desc')->get()
        ]);
    }


    public function addLab(Request $request, $id)
    {
        if (Auth::id()) {
            $userId = Auth::user(); // Get the authenticated user's ID
//            dd($userId);
            // Implement the add to cart logic here using the $userId
            $test = Lab::find($id);
//            dd($products);
            LabCart::saveLab($request, $id, $userId, $test);
            return back()->with('message', 'Test added to cart successfully.');

//            return view('user.products.add-to-cart',
//            [
//                'cart'=>Cart::saveCart($request,$id,$userId,$products),
////                'user'=>$userId,
////                'products'=>$products
//            ])->with('message', 'Product added to cart successfully.');
        } else {
            return redirect()->route('login')->with('message', 'Please log in to add products to cart.');
        }
    }

    public function showLabCart()
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        $cartItems = LabCart::where('user_id', $userId)->get(); // Retrieve cart items for the user
//dd($cartItems);
        return view('user.test.show-cart', [
            'cart' => $cartItems
        ]);
    }

    public function orderLabCash()
    {

        $userId = Auth::id(); // Get the authenticated user's ID
//            dd($userId);

        $data = LabCart::where('user_id','=',$userId)->get();
//        dd($data);


        foreach ($data as $data)
        {
            $order = new LabOrder();
            $order->name =$data->name;
            $order->email =$data->email;
            $order->phone =$data->phone;
            $order->address =$data->address;


            $order->user_id =$data->user_id;
            $order->test_id =$data->test_id;
            $order->test_name =$data->test_name;
            $order->price =$data->price;
            $order->payment_status ='Cash On Delivery';
            $order->delivery_status ='Processing';

            $order->save();
            $cart_id = $data->id;
            $cart= LabCart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back();
    }

    public function showLabOrder()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $dataa = LabOrder::where('user_id', $user->id)->get();

            return view('user.test.order', compact('dataa'));
        }
    }
    public function cancelLabOrder($id)
    {
        $data = LabOrder::find($id);

        if ($data) {
            $data->delivery_status = 'Cancelled';
            $data->save();
        }
        return redirect()->back();
    }



    public function allMedicine()
    {
        return view('user.medicine.all-medicine',
            [
                'medicine'=>Pharmachy::orderBy('created_at', 'desc')->get()
            ]);
    }

    public function mediDetails($id)
    {
        $data = Pharmachy::find($id);

        return view('user.medicine.medi-details',compact('data'));
    }


    public function addMedi(Request $request, $id)
    {
        if (Auth::check()) {
            $userId = Auth::user(); // Get the authenticated user's ID
            $test = Pharmachy::find($id);
            MediCart::saveMed($request, $id, $userId, $test);
            return back()->with('message', 'Medicine added to cart successfully.');
        } else {
            return redirect()->route('login')->with('message', 'Please log in to add products to cart.');
        }
    }

    public function showCartMed()
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        $cartItems = MediCart::where('user_id', $userId)->get(); // Retrieve cart items for the user
//dd($cartItems);
        return view('user.medicine.show-cart', [
            'cart' => $cartItems
        ]);
    }

    public function orderMedCash()
    {

        $userId = Auth::id(); // Get the authenticated user's ID
//            dd($userId);

        $data = MediCart::where('user_id','=',$userId)->get();
//        dd($data);

//dd($data);
        foreach ($data as $data)
        {
            $order = new MediOrder();
            $order->u_name =$data->u_name;
            $order->m_name =$data->m_name;
            $order->email =$data->email;
            $order->phone =$data->phone;
//            $order->address =$data->address;


            $order->user_id =$data->user_id;
            $order->m_id =$data->m_id;
            $order->price =$data->price;
            $order->quantity =$data->quantity;
            $order->vendor =$data->vendor;
            $order->date =$data->date;

            $order->payment_status ='Cash On Delivery';
            $order->delivery_status ='Processing';

            $order->save();
            $cart_id = $data->id;
            $cart= MediCart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back();
    }


    public function showMediOrder()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $dataa = MediOrder::where('user_id', $user->id)->get();

            return view('user.medicine.order', compact('dataa'));
        }
    }



}
