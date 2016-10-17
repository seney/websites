<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::group(['middleware'=>['web']], function(){
    Route::get('/', 'PagesController@getIndex');
    Route::get('contact', 'PagesController@getContact');
    Route::get('about', 'PagesController@getAbout');

    Route::resource('posts','PostController');
    Route::resource('posts/index/{$perPage?}', 'PostController@index');
});

//get item(s)
Route::get('test', function(){
    echo '<form action = "test" method="POST">';
    echo '<input type="hidden" name="_token" value="'.csrf_token().'"/>';
    echo '<input type="submit" value="submit"/>';
    echo '<input type="hidden" name="_method" value="POST"/>';
    echo '</form>';
});
//create item
Route::post('test', function(){
    return 'POST';
});
//edit item
Route::put('test', function(){
    return 'PUT';
});
//get delete
Route::delete('test', function(){
    return 'DELETE';
});

Route::get('customer/{id}', function($id){
    $customer = App\Customer::find($id);
//    print_r($customer);
    echo 'Hello! My name is ' .$customer->name .'.<br />';
    $orders = $customer->orders;
    foreach ($orders as $order){
        echo $order->name .'<br />';
    }
});

Route::get('get_customer/{name}', function($name){
    $customer = App\Customer::where('name', '=', $name)->first();
    print_r($customer);
});

Route::get('orders', function(){
    $orders = App\Order::all();

    foreach ($orders as $order){
//        $customer = App\Customer::find($order->customer_id);//before crreate relationship
        echo $order->name .'ordered by '.$order->customer->name. '.<br/>';
    }
});

Route::get('mypage', function(){
    $customers = App\Customer::all();
    $data = array('customers'=> $customers);
    return view('mypage', $data);
});