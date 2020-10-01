<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use App\Howitwork;
use Stripe\Customer;
use App\Models\Lesson;
use App\Models\Payment;
use Stripe\Subscription;
use App\Models\ForParent;
use App\Models\ForStudent;
use App\Models\ForTeacher;
use App\ShedulePagePoster;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class PageController extends Controller
{
    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        return view('pages.icons');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schedulePoster()
    {
        $data=ShedulePagePoster::all();
//       dd($data);
        return view('pages.schedule-poster', compact('data'));
    }

    public function editPoster(Request $request, $id)
    {
        $data=ShedulePagePoster::where('id', $id)->update([
            'title'      => $request['title'] ? $request['title'] : 'title',
            'discription'=> $request['discription'] ? $request['discription'] : 'discription',
        ]);
        return redirect()->back();
    }

    public function mockupschedule()
    {
        $data=ShedulePagePoster::all();

        //dd($data);
        return view('frontend.pages.mockup-schedule', compact('data'));
    }

    public function howitworks()
    {
        $data=Howitwork::all();

        return view('frontend.pages.howitworks', compact('data'));
    }

    public function forParent()
    {
        $data=ForParent::all();

        return view('frontend.pages.parents', compact('data'));
    }

    public function forTeachers()
    {
        $data=ForTeacher::all();

        return view('frontend.pages.teachers', compact('data'));
    }

    public function forStudents()
    {
        $data=ForStudent::all();

        return view('frontend.pages.students', compact('data'));
    }

    /**
     * Display maps page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        return view('pages.maps');
    }

    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function tables()
    {
        return view('pages.tables');
    }

    /**
     * Display notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
    public function rtl()
    {
        return view('pages.rtl');
    }

    /**
     * Display typography page
     *
     * @return \Illuminate\View\View
     */
    public function typography()
    {
        return view('pages.typography');
    }

    /**
     * Display upgrade page
     *
     * @return \Illuminate\View\View
     */
    public function upgrade()
    {
        return view('pages.upgrade');
    }

    public function howItPoster()
    {
        $data=Howitwork::all();
        return view('pages.how-it-works', compact('data'));
    }

    public function editHowItWorks(Request $request, $id)
    {
        $data=Howitwork::where('id', $id)->update([
            'title'      => $request['title'] ? $request['title'] : 'title',
            'discription'=> $request['discription'] ? $request['discription'] : 'discription',
        ]);
        return redirect()->back();
    }

    public function forTeacher()
    {
        $data=ForTeacher::all();

        return view('pages.for-teachers', compact('data'));
    }

    public function editforTeacher(Request $request, $id)
    {
        $data=ForTeacher::where('id', $id)->update([
            'title'      => $request['title'] ? $request['title'] : 'title',
            'discription'=> $request['discription'] ? $request['discription'] : 'discription',
        ]);
        return redirect()->back();
    }

    public function forStudent()
    {
        $data=ForStudent::all();
        return view('pages.for-students', compact('data'));
    }

    public function editforStudent(Request $request, $id)
    {
        $data=ForStudent::where('id', $id)->update([
            'title'      => $request['title'] ? $request['title'] : 'title',
            'discription'=> $request['discription'] ? $request['discription'] : 'discription',
        ]);
        return redirect()->back();
    }

    public function forParents()
    {
        $data=ForParent::all();
        return view('pages.for-patents', compact('data'));
    }

    public function editforParents(Request $request, $id)
    {
        $data=ForParent::where('id', $id)->update([
            'title'      => $request['title'] ? $request['title'] : 'title',
            'discription'=> $request['discription'] ? $request['discription'] : 'discription',
        ]);
        return redirect()->back();
    }

    public function allTeachers()
    {
        $data=User::where('type', 'teacher')->get();
        return view('pages.all-teachers', compact('data'));
    }

    public function allStudents()
    {
        $data=User::where('type', 'student')->get();

        return view('pages.all-students', compact('data'));
    }

    public function Userid($id)
    {
        $user=Auth::loginUsingId($id);
    }

    public function newUsers()
    {
        $data=User::where('approved_at', null)->get();
        return view('pages.newusers', compact('data'));
    }

    public function adminUsersApprove($id)
    {
        User::where('id', $id)->update([
            'approved_at'=> Carbon::now(),
        ]);

        return redirect()->back()->with('message', 'E-mail is Approved');
    }

    public function studentLesson($id)
    {
        $lesssonDetail=Lesson::where('id', $id)->get();
        $url          =$lesssonDetail[0]['link'];
        $data         =explode('=', $url);
        $video        =$data[1];
        foreach ($lesssonDetail as $key=>$lesssonDetil) {
            $lesssonDetail[$key]['teacher_fname']    =User::where('id', $lesssonDetil['user_id'])->pluck('fname')->first();
            $lesssonDetail[$key]['teacher_lname']    =User::where('id', $lesssonDetil['user_id'])->pluck('lname')->first();
            $lesssonDetail[$key]['teacher_thumbnail']=User::where('id', $lesssonDetil['user_id'])->pluck('thumbnail')->first();
            $lesssonDetail[$key]['video']            =$video;
        }
//        dd($lesssonDetail);
        return view('frontend.pages.students.student-lesson-page', compact('lesssonDetail'));
    }

    public function teacherProfile($id)
    {
        $user=User::where('id', $id)->get();
        return view('frontend.pages.teachers.teacher-profile', compact('user'));
    }

    public function edit_profile()
    {
        echo   $Authid=Auth::User()->id;
        exit();
        $GetData=DB::table('users')->where('users.id', $Authid)->select('users.*')->first();
        return view('frontend.pages.teachers.edit_profile')->with('GetData', $GetData);
    }

    public function stirpepaymentgatway(Request $request)
    {
        // dd($request->all());
        $this->validate(request(), [
            'type'        => 'required',
            'stripeToken' => 'required',
            'donate'      => 'required',
        ]);
        if ($request->type == 2) {
            $this->createSubscription($request->card_holder_name, $request->stripeToken, $request->donate);
        }
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $status = \Stripe\PaymentIntent::create([
                'amount'                   => ($request->donate * 100),
                'currency'                 => 'GBP',
                'payment_method'           => $request->stripeToken,
                'error_on_requires_action' => true,
                'confirm'                  => true,
            ]);
        } catch (\Stripe\Exception\CardException $e) {
            echo 'Error code is:' . $e->getError()->code;
            session()->flash('alert-warning', $e->message);
            return redirect('/credits');
        }
        if ($status->status == 'succeeded') {
            session()->flash('alert-success', 'Thank for your donation!');
            return redirect()->back();
        }
        session()->flash('alert-danger', 'Something went wrong please check your card details!');
        return redirect()->back();
    }

    public function createSubscription($name, $token, $id)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $customer = Customer::create([
            'name'             => $name,
            'payment_method'   => $token,
            'invoice_settings' => [
                'default_payment_method' => $token,
            ],
        ]);

        $plan = Subscription::create([
            'customer' => $customer->id,
            'items'    => [[
                'price'    => $this->checkPackage($id),
                'quantity' => 1,
            ]],
        ]);
        if ($plan->status == 'status') {
            session()->flash('alert-success', 'Thank you for your subscription!');
            return redirect()->back();
        }
        session()->flash('alert-danger', 'Something went wrong please check your card details!');
        return redirect()->back();
    }

    public function checkPackage($id)
    {
        switch ($id) {
            case 5:
                $id = 0;
                break;

            case 10:
                $id = 1;
                break;

            case 20:
                $id = 2;
                break;

            case 50:
                $id = 3;
                break;

            default:
                break;
        }
        $packages = ['price_1HWy6tGKdlAygQ49RNAqO5Zp', '', ''];
        return $packages[$id];
    }

    // public function stripePayment(Request $request){

    public function stripePayment(Request $request)
    {
        try {
            $status = \Stripe\PaymentIntent::create([
                'amount'                   => $donate,
                'currency'                 => 'USD',
                'customer'                 => $user->stripe_customer_id,
                'payment_method'           => $request->card,
                'error_on_requires_action' => true,
                'confirm'                  => true,
                'setup_future_usage'       => 'on_session',
            ]);
        } catch (\Stripe\Exception\CardException $e) {
            echo 'Error code is:' . $e->getError()->code;
            $payment_intent_id = $e->getError()->payment_intent->id;
            $payment_intent    = \Stripe\PaymentIntent::retrieve($payment_intent_id);
            session()->flash('alert-warning', $e->message);
            return redirect('/credits');
        }

        // $filename = Str::random(10);

        // try {
        //     $charge=Stripe::charges()->create([
        //         'amount'        => 100,
        //         'currency'      => 'USD',
        //         'description'   => 'Your product info',
        //         'source'        => $request->stripeToken,
        //     ]);
        // } catch (Exception $e) {
        // }

        // if ($charge > 1) {
        //     $payment         = new Payment();
        //     $payment->name   =$request->name;
        //     $payment->mail   =$request->email;
        //     $payment->address=$request->address;
        //     $payment->city   =$request->city;
        //     $payment->state  =$request->state;
        //     $payment->country=$request->country;
        //     $payment->amount =$request->total;
        //     $payment->phone  =$request->phone;
        //     $payment->invoice= $filename;
        //     $payment->save();
        //     if ($charge) {
        //         return view('User.payment.invoiced');
        //     }
        // }
    }

    public function paypalpaymentgatwway()
    {
        return view('frontend.pages.paypalpaymentgatwways');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            'amount'      => 100 * 100,
            'currency'    => 'usd',
            'source'      => $request->stripeToken,
            'description' => 'Test payment from itsolutionstuff.com.',
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
