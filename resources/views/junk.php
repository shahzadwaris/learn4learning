// Route::group(['Public'], function () {
// Route::get('/test', 'UserController@test')->name('test');
// Route::get('/pusher', function () {
// return view('notification');
// })->name('test');

// Route::post('/', function (Request $request) {
//
\Stripe\Stripe::setApiKey('sk_test_51H573bAck9Vq5GyH2cREs4YHjRAQtbJfp5jOtFnuwZH8vVSiFrWzAISz3MRYJc4UUZO1qWKCU9lVYfwCjNCXi5V600tiKmzh88');
// try {
// \Stripe\Charge::create([
// 'amount' => 300 * 100,
// 'currency' => 'usd',
// 'source' => $request->input('stripeToken'),
// 'description' => 'Test payment.',
// ]);
// Session::flash('success-message', 'Payment done successfully !');
// return Redirect::back();
// } catch (\Exception $e) {
// Session::flash('fail-message', 'Error! Please Try again.');
// return Redirect::back();
// }
// });

// Route::get('/tst', function () {
// // event(new App\Events\MyEvent('Someone'));
// return 'Event has been sent!';
// });

// Route::get('/push', 'ForParentController@push')->name('push');
// });


//page schedule view 4
// Route::group(['Public'], function () {
// Route::get('/test', 'UserController@test')->name('test');
// Route::get('/pusher', function () {
// return view('notification');
// })->name('test');

// Route::post('/', function (Request $request) {
//
\Stripe\Stripe::setApiKey('sk_test_51H573bAck9Vq5GyH2cREs4YHjRAQtbJfp5jOtFnuwZH8vVSiFrWzAISz3MRYJc4UUZO1qWKCU9lVYfwCjNCXi5V600tiKmzh88');
// try {
// \Stripe\Charge::create([
// 'amount' => 300 * 100,
// 'currency' => 'usd',
// 'source' => $request->input('stripeToken'),
// 'description' => 'Test payment.',
// ]);
// Session::flash('success-message', 'Payment done successfully !');
// return Redirect::back();
// } catch (\Exception $e) {
// Session::flash('fail-message', 'Error! Please Try again.');
// return Redirect::back();
// }
// });

// Route::get('/tst', function () {
// // event(new App\Events\MyEvent('Someone'));
// return 'Event has been sent!';
// });

// Route::get('/push', 'ForParentController@push')->name('push');
// });


//page schedule view 4
            <?php 
                if(isset($lessin_index[0])){
    $auth=Auth::User()->id;
               $Book0=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.date')
                        ->where('student_lessons.user_id', $auth)
                        ->where('student_lessons.id',$lessin_index[0])

                        ->get();

$dateid=$Book0[0]->date;


           $Book1=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.*' , 'subjects.name as sub_name' , 'student_lessons.id as student_lessons_id')
                        ->where('student_lessons.user_id', $auth)
                        ->where('lessons.date', $dateid)
                        ->where('student_lessons.id',$lessin_index[0] )

                        ->get();


?>