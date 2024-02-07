<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Verified;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;
   

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
     protected $redirectTo = '/verified';


   protected function redirectTo()
{
    if (session('verified')) {
        return '/verified'; // Path to the new view
    }

    return $this->redirectTo;
}
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request, $id, $hash)
{
    $user = User::find($id);

    if (!$user) {
        return redirect($this->redirectPath())->with('status', 'User not found.');
    }

    if ($user->hasVerifiedEmail()) {
        return redirect($this->redirectPath())->with('status', 'Already verified.');
    }

    if ($user->markEmailAsVerified()) {
        event(new Verified($user));

        // Set the session key manually to indicate successful verification
        $request->session()->put('verified', true);
    }

    // If the user is not logged in, log them in.
    if (!auth()->check()) {
        auth()->login($user);
    }

    return redirect($this->redirectPath())->with('status', 'Verification successful.');
}


}
