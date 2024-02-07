<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\PasswordReset;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    public function loadRegister()
    {
        if(Auth::user() && Auth::user()->is_admin == 1){
            return redirect('/admin/dashboard');
         }
         elseif(Auth::user() && Auth::user()->is_admin == 0){
             return redirect('/dashboard');
         }
        return view('register');
    }

    public function studentRegister(Request $request)
    {
        $request->validate([
            'name'=>'string|required|min:2',
            'email'=>'string|email|required|max:100|unique:users',
            'password'=>'string|required|confirmed|min:6'
            ]);
            
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            
            return back()->with('success','Your Registration has been successfull.');
            
    }


    public function loadlogin()
    {


        if(Auth::user() && Auth::user()->is_admin == 1){
           return redirect('/admin/dashboard');
        }
        elseif(Auth::user() && Auth::user()->is_admin == 0){
            return redirect('/dashboard');
        }
        return view ('login');
    }

    public function userLogin(Request $request)
    {

        $request->validate([

         'email'=>'string|required|email',
         'password'=>'string|required'

        ]);

        $userCredential = $request->only('email','password');
        if(Auth::attempt($userCredential))
        {

            if(Auth::user()->is_admin == 1){

                return redirect('/admin/dashboard');

            }
            else{
                return redirect('/dashboard');
            }

        }

        else{
            return back()->with('error','Username & Password is incorrect');

        }
    }


    public function loadDashboard()
    {
         $formSubmitted = session()->get('form_submitted', false);
    //dd($formSubmitted);  // Add this line to debug
    return view('student.dashboard', compact('formSubmitted'));
        //return view('student.dashboard');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

     public function forgotpasswordload()
    {
        return view('forgot-password');
    }

    public function forgotpassword(Request $request)
    {
        try{

            $user = User::where('email',$request->email)->get();
            //dd($user);
            if(count($user) > 0){
              $token = Str::random(40);
              $domain = URL::to('/');
              $url = $domain.'/reset-password?token='.$token;
               
               $data['url'] = $url;
               $data['email'] = $request->email;
               $data['title'] = 'Password Reset';
               $data['body'] = 'Please click on below link to reset your password';

               Mail::send('forgotpassowrdmail',['data'=>$data], function($message) use ($data){
                   $message->to($data['email'])->subject($data['title']);
               });
                
                $dateTime = Carbon::now()->format('Y-m-d H:i:s');

                PasswordReset::updateOrCreate(
                  ['email' => $request->email],
                  [ 
                      'email' => $request->email,
                      'token' => $token,
                      'created_at' => $dateTime
                  ]
                );

              return back()->with('success', 'Please check your email to reset your passowrd');

            }
            else{
                return back()->with('error', 'Email is not exists');

            }
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

   public function resetPasswordload(Request $request)
{
    $resetData = PasswordReset::where('token', $request->token)->get();
   //dd($resetData);
   if(isset($request->token)  && count($resetData) > 0 ){
        $user = User::where('email', $resetData[0]['email'])->first();
      // dd($user);
         return view('resetpassword', compact('user'));
   }
    else{
        return view('404');
    }

    }
   
   
    public function resetpassword(Request $request){
      
      $request->validate([
        'password' => 'required|string|min:6|confirmed',
       
    ]);

    $user = User::find($request->id);
   // dd($user);
    $user->password = Hash::make($request->password);
    $user->save();

    PasswordReset::where('email',$user->email)->delete();

   
    }

    public function logout(Request $request)
     {

        $request->session()->flush();
        Auth::logout();
        return redirect('/');
     }

}



