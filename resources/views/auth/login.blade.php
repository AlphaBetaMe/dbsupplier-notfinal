<x-guest-layout>
   
    <style>
        * {
    padding: 0px;
    margin: 0px;
    overflow-x: hidden;
}
body {
    
    position:relative;
}
header {
    
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 20vh;
    box-shadow: 5px 5px 10px rgb(0,0,0,0.3);
}
header img{
    width: 100%;
    height:100%;
}
h1 {
    letter-spacing: 1.5vw;
    font-family: 'system-ui';
    text-transform: uppercase;
    text-align: center;
}
main {
    /* position: relative; */
    display:flex;
    align-items: center;
    justify-content: center;
    height: 75vh;
    width: 100%;
    background: url('images/background.png') no-repeat center center;
    background-size: cover;
}
footer {
    height: 10vh;
    background-color: grey;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: -5px -5px 10px rgb(0,0,0,0.3);
}
footer > p {
    text-align: center;
    font-family: 'system-ui';
    letter-spacing: 3px;
}
footer > p > a {
    text-decoration: none;
    color: white;
    font-weight: bold;
}

main button{
    /* position: absolute; */
    bottom: 100px;
    right:150px;
    width: auto;
    height: 50px;
    border: 5px solid #FF7F50;
    background-color: #FF7F50 !important;
    box-shadow: -5px -5px 10px rgb(0,0,0,0.3);
    font-weight:400;
    font-size: 40px;
    border:none;
    

}
.modal .modal-dialog .modal-content .modal-header{
    background-color: #FFD700 !important;
}
    </style>
    <body>
        <header>
            <img src ="{{asset('images/ban.png')}}">
        </header>
        <main>
            <!-- <button type="button" class="btn btn text-white">Log in >></button> -->
            <br>
            <button type="button" class="btn btn text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Log In >>
            </button>

            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Log in >></button> -->

        </main>
        <footer>
            <p></p>
        </footer>
        <!-- MODAL -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5 text-white" id="staticBackdropLabel">LOG IN</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="ml-3">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </body>
    
    
</x-guest-layout>