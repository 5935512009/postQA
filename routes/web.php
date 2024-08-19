<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', [AdminController::class,'about'])->name('about');
// อธิบาย ถ้ามีการเรียกใช้งาน about ให้เกิดการทำงานที่ AdminController โดยไปเรียกใช้งาน function about

Route::get('blogs', [AdminController::class,'index'])->name('blogs'); //  name('blogs'); เอาไปเรียกใน ___.blade.php  เช่น    <a href="{{route('blogs')}}">

Route::get('questionnaires', [AdminController::class,'questions'])->name('questionnaires')->middleware('auth');
Route::get('answer/{id_questionnaire}', [AdminController::class, 'answer'])->name('answer')->middleware('auth');
Route::post('store_answer', [AdminController::class, 'storeAnswer'])->name('store_answer')->middleware('auth');
 

// ------- this route test about connect database successful
Route::get('database', function () {
    try {
        // ทดสอบการเชื่อมต่อกับฐานข้อมูล
        DB::connection()->getPdo();
        return 'Database connection is successful!';
    } catch (\Exception $e) {
        // หากการเชื่อมต่อล้มเหลว ให้แสดงข้อความแสดงข้อผิดพลาด
        return 'Could not connect to the database. Please check your configuration. Error: ' . $e->getMessage();
    }
});


Route::get('admin/username/Bay', function(){
    return "hello Admin Bay";
})->name('login');

Route::fallback(function(){
    return view('fallback');
}); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
