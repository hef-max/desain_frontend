<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

   <!-- CSS Link -->
   <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- CDNJS FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" >
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>


    <!-- Login Page Start -->
    <section class="login-page">
        <div class="login-container" id="login-container">
            <div class="login-box">
                <h1 class="head-title">login</h1>
                <form action="{{url('/login')}}" class="login-form" method="POST">
                @csrf
                    <div class="input-box">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" required="" class="input-bar" placeholder="username" name="username">
                    </div>
                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" required="" class="input-bar" placeholder="password" name="password">
                    </div>

                    @if(isset($error_message))
                        <p style="color:red;">{{$error_message}}</p>
                    @endif
                    <!-- css -->


                    <button class="submit">
                        login
                    </button>
                    <a class="fp-password" href="">forgot password?</a>
                </form>
                <div class="account-confirmation">
                    <h5>Don't have an account?</h5>
                    <button onclick="toggleSwitcherForm()">
                        Sign Up
                    </button>
                </div>
            </div>
            <div class="signup-box">
                <h1 class="head-title">signup</h1>
                <form action="{{url('/register')}}" class="signup-form" method="POST">
                @csrf
                    <div class="input-box">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" required="" class="input-bar" placeholder="username" name="username">
                    </div>
                    <div class="input-box">
                        <i class="fa-solid fa-at"></i>
                        <input type="email" required="" class="input-bar" placeholder="email" name="email">
                    </div>
                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" required="" class="input-bar" placeholder="password" name="password">
                    </div>
                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" required="" class="input-bar" placeholder="confirm password" name="confirm_password">
                    </div>
                    <button class="submit">
                        sign up
                    </button>
                </form>


                <div class="account-confirmation">
                    <h5>Have an account?</h5>
                    <button onclick="toggleSwitcherForm()">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </section>

     <!-- Login Page End -->

</body>
    <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
</html>
