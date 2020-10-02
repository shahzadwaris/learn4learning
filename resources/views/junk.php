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