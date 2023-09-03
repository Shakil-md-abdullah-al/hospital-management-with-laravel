<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PharmachyController;
use App\Http\Controllers\LabController;


Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect'])->name('home')->middleware('auth','verified');
Route::get('/all-doctors',[HomeController::class,'allDoctors'])->name('alldoctors');
Route::get('/doctor-details/{id}',[HomeController::class,'doctorDetails'])->name('doctor-details');

//Blog Home
Route::get('/all-blog',[HomeController::class,'allBlog'])->name('allblog');
Route::get('/blog-details/{id}',[HomeController::class,'blogDetails'])->name('blog-details');


//Appointment
Route::post('/appointment',[HomeController::class,'appointment'])->name('appointment');
Route::get('/myappointment',[HomeController::class,'myappointment'])->name('myappointment');
Route::get('/cancel_appointment/{id}',[HomeController::class,'cancel_appointment'])->name('cancel_appointment');

//Order
Route::get('/myorder',[HomeController::class,'myorder'])->name('myorder');
Route::get('/cancel_order/{id}',[HomeController::class,'cancelOrder'])->name('cancel_order');
Route::get('/checkout/{id}',[HomeController::class,'checkout'])->name('checkout');
Route::post('/order',[HomeController::class,'orderList'])->name('order');

//About and Contact
Route::get('/aboutus',[HomeController::class,'about'])->name('about');
Route::resource('contact',ContactController::class);

//Food
Route::get('/foodpage',[HomeController::class,'foodpage'])->name('foodpage');

//Query
Route::get('/myquery',[HomeController::class,'myQuery'])->name('myquery');
Route::get('/cancel_query/{id}',[HomeController::class,'cancel_query'])->name('cancel_query');

//Prescription
Route::get('/myaprescription',[HomeController::class,'myaPrescription'])->name('myaprescription');
Route::get('/appoint_bill/{id}',[HomeController::class,'appointBill'])->name('appoint_bill');
Route::get('/print-presc/{id}',[HomeController::class,'printPresc'])->name('print-presc');

//Lab Report
Route::get('/allreport',[HomeController::class,'allReport'])->name('all-report');
Route::post('/add-lab/{id}',[HomeController::class,'addLab'])->name('add-lab');
Route::get('/show-cartLab/',[HomeController::class,'showLabCart'])->name('show-cart-Lab');
Route::get('/order-Lab/',[HomeController::class,'orderLabCash'])->name('order-Lab');
Route::get('/cancel-lab-order/{id}',[HomeController::class,'cancelLabOrder'])->name('cancel-lab-order');
Route::get('/show-lab-order/',[HomeController::class,'showLabOrder'])->name('show-lab-order');


//Medicies
Route::get('/allmedicine',[HomeController::class,'allMedicine'])->name('all-medicine');
Route::post('/add-medicice/{id}',[HomeController::class,'addMedi'])->name('add-medicice');
Route::get('/medi-details/{id}',[HomeController::class,'mediDetails'])->name('medi-details');
Route::get('/show-cartMed/',[HomeController::class,'showCartMed'])->name('show-cartMed');
Route::get('/order-Med/',[HomeController::class,'orderMedCash'])->name('order-Med');
Route::get('/show-Medi-order/',[HomeController::class,'showMediOrder'])->name('show-Medi-order');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::resource('doctor',DoctorController::class);
    Route::resource('blog',BlogController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('food',FoodController::class);
    Route::resource('users',UserController::class);
    Route::resource('pharmachy',PharmachyController::class);
    Route::resource('lab',LabController::class);
});

//Appointment
Route::get('/showappointment',[AdminController::class,'showappointment'])->name('showappointment');
Route::get('/approve/{id}',[AdminController::class,'approve'])->name('approve');
Route::get('/cancel/{id}',[AdminController::class,'cancel'])->name('cancel');
Route::get('/history/{id}',[AdminController::class,'history'])->name('history');
Route::post('/deleteappointment/{id}',[AdminController::class,'deleteappointment'])->name('deleteappointment');

//Email
Route::get('/emailview/{id}',[AdminController::class,'emailview'])->name('emailview');
Route::post('/sendemail/{id}',[AdminController::class,'sendemail'])->name('sendemail');

Route::get('/cancel_order/{id}',[AdminController::class,'cancel_order'])->name('cancel_order');
Route::GET('/manage.order',[AdminController::class,'manageOrder'])->name('manage.order');
Route::delete('/order-delete/{id}',[AdminController::class,'orderDelete'])->name('order-delete');
Route::get('/approve-order/{id}',[AdminController::class,'approveOrder'])->name('approve-order');
Route::get('/cancel-order/{id}',[AdminController::class,'cancelOrder'])->name('cancel-order');



Route::get('/history/{id}',[AdminController::class,'history'])->name('history');
Route::get('/showhistory',[AdminController::class,'showHistory'])->name('showhistory');
Route::get('/cancelAppointDoc/{id}',[AdminController::class,'cancelAppointDoc'])->name('cancelAppointDoc');

Route::get('/pescrib/{id}',[AdminController::class,'pescrib'])->name('pescrib');
Route::post('/doctor_prescrib/{id}',[AdminController::class,'doctorPres'])->name('doctor_prescrib');
//Route::get('/checkout/{id}',[HomeController::class,'checkout'])->name('checkout');

Route::get('/approvequery/{id}',[AdminController::class,'approvequery'])->name('approvequery');


//Lab Test
Route::get('/lab-order',[AdminController::class,'labOrder'])->name('lab-order');
Route::get('/update-laborder/{id}',[AdminController::class,'updateLabOrder'])->name('update-laborder');
Route::get('/print-order/{id}',[AdminController::class,'printOrder'])->name('print-order');


//Medi Order
Route::get('/medi-order',[AdminController::class,'MediOrder'])->name('medi-order');
Route::get('/update-mediorder/{id}',[AdminController::class,'updateMediOrder'])->name('update-mediorder');
Route::get('/print-Medi-order/{id}',[AdminController::class,'printMediOrder'])->name('print-Medi-order');

