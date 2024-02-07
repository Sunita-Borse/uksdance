<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include any additional CSS stylesheets or external libraries here -->
    <style>
        body {
            font-family: 'Arial', sans-serif; /* Use your preferred font family */
            background-color: #f8f9fa; /* Set your preferred background color */
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            margin-top: 50px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
           
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
        }

        .form-input {
            width: -webkit-fill-available;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #495057;
        }

        .submit-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .forgot-password {
            font-size: 14px;
            color: #6c757d;
            text-align: right;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Logo -->
        <div class="logo" >
            <a href="/"><img src="{{ asset('/public/assets/img/ukslogo2.png') }}" alt="Logo" class="img-fluid"></a>
        </div>

         @if($errors->any())

        
                @foreach($errors->all() as $error)

               <p style="color:red;">
                    {{ $error }}</p>
              

                @endforeach

           

        @endif

        <form method="POST" action="{{ route('resetpassword') }}">
            @csrf

            <div class="form-group">
                
                <input type="hidden"  class="form-input"  name="id" value="{{ $user[0]['id'] }}" required autofocus />
            </div>

             <div class="form-group">
                  <label for="email" class="form-label">Enter Passowrd</label>
                <input type="password"  class="form-input"  name="password"  required autofocus />
            </div>

             <div class="form-group">
                  <label for="email" class="form-label">Enter Confirm Passowrd</label>
                <input type="password"  class="form-input"  name="password_confirmation"  required autofocus />
            </div>


           

            

            <!--div class="form-group remember-me">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember" />
                    {{ __('Remember me') }}
                </label>
            </div-->

            <div class="form-group">
                <button type="submit" class="submit-btn">Reset Password</button>
            </div>
        </form>

        <div class="forgot-password">
         
                <a href="/login">Login</a>
          
        </div>
    </div>

    <!-- Include any additional scripts or JavaScript libraries here -->
</body>
</html>
