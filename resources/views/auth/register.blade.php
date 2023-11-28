<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}/website/assets/imgs/theme/logo.svg" />
<title>Admin - Register</title>
<x-guest-layout>
    <x-authentication-card>
        <img src="{{asset('/')}}/website/assets/imgs/theme/logo.svg" alt="" width="150px" style="margin-left:30%;margin-bottom:10px" >

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>








{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}/admin/assets/images/brand/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('/') }}/admin/assets/css/SignupPageStyle2.css">
    <script src="https://kit.fontawesome.com/422f5148d8.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title">
                <span>Registration Form</span>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" id="name" placeholder="Name" name="name" required>
                </div>
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="email"placeholder="Email" name="email" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password"placeholder="Password" name="password" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password"placeholder="Confirm Password" name="confirm password" required>
                </div>
                <div style="width: 200px;height:30px;margin-left:30%;">
                    <button type="submit" style="width: 150px;font-size:25px;border-radius:10px;">Registration</button>
                </div>
                <div style="margin-left:28%;padding-top:10px;">
                    <a href="{{ route('login') }}"
                        style="font-size: 20px;text-decoration:none;color:deeppink;border:1px solid black;background:silver">Already Register?</a>
                </div>
            </form>
        </div>
</body>

</html> --}}