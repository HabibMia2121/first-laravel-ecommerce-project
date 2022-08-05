@extends('master_page.frontend')
@section('content')
    <div class="header-text area">
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">
                <div class="signup">
                    <label for="chk" aria-hidden="true">Customer Login & Register page</label>
                        @if (session('success_message'))
                            <div class="alert alert-success " style="width: 69%; margin-left: 15%;">
                                {{session('success_message')}}
                            </div>
                        @endif
                    <form action="{{route('customer_register.post')}}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="User name" required="">
                        @error('name')
                            <span class="text-danger" style="margin-left: 20%;">{{$message}}</span>
                        @enderror
                        <input type="email" name="email" placeholder="Email" required="">
                        @error('email')
                            <span class="text-danger" style="margin-left: 20%;">{{$message}}</span>
                        @enderror
                        <input type="number" name="phone_number" placeholder="Phone number" required="">
                        @error('phone_number')
                            <span class="text-danger" style="margin-left: 20%;">{{$message}}</span>
                        @enderror
                        <input type="text" name="address" placeholder="Address" required="">
                        @error('address')
                            <span class="text-danger" style="margin-left: 20%;">{{$message}}</span>
                        @enderror
                        <input type="password" name="password" placeholder="Password" required="">
                        @error('password')
                            <span class="text-danger" style="margin-left: 20%;">{{$message}}</span>
                        @enderror
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required="">
                        @error('password_confirmation')
                            <span class="text-danger" style="margin-left: 20%;">{{$message}}</span>
                        @enderror
                        <button class="submit_btn">Sign up</button>
                    </form>
                </div>

                <div class="login">
                    <label for="chk" aria-hidden="true">Login</label>
                    <form action="{{route('login.post')}}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Email" >
                        <input type="password" name="password" placeholder="Password">
                        <button class="submit_btn">Login</button>
                    </form>
                </div>
        </div>
    </div>

@endsection


