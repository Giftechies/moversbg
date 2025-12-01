@extends('layouts.app') 
@section('content') 
 <div class="relative container max-md:mt-12 md:pt-20  py-4 md:py-8 grid-cols-12 items-center  lg:grid xxl:overflow-hidden">
    <div class="col-span-5 ">
       <div class="items-center justify-center">
          <div>
             <h5 class="h5 mt-6 text-center font-medium">Login to Your Account</h5>
          </div>
           <form method="POST" action="{{ route('login') }}" class="smt40px flex flex-col ">
        @csrf

        <!-- Email Address -->
        <div> 
             <input placeholder="Username" class="formInput" type="text" id="email"  name="email" fdprocessedid="sbed8n" value="{{old('email')}}" required /> 
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <input id="password"  placeholder="Password" class="formInput mt-8" type="password" name="password" fdprocessedid="kscpte"> 
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">&nbsp; {{ __('Remember me') }}</span>
            </label>
             @if (Route::has('password.request'))
                <a class="s-text   text-black-3" style="float: right;" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif 
        </div>

        <div class="flex items-center justify-end mt-4">
           
             <button type="submit" class="h6 rounded-lg smb32px smt32px w-full bg-prim py-3 flex items-center justify-center gap-2 text-center text-white-1 border-[var(--primary-hex)] border hover:text-[var(--primary-hex)] hover:bg-white-1" fdprocessedid="lbzb5">login</button> 
        </div>
    </form>
           
       </div>
    </div>
    <div class=" md:h-[30rem] lg:col-start-7  col-span-6 rounded-lg overflow-hidden "><img alt="Login Image"  class="w-full h-full  object-cover"  src="{{ asset('css/login_files/localimg.png')}}" style="color: transparent;"></div>
 </div>
 @endsection

