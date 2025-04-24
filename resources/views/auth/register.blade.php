@extends('base')
@section('title', 'Register')
<div class="centered-div">
    <div class="container">
        <div class="col" style="width: 100vh;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left;"><strong>Register</strong></h4>
                    </div>

                    @if(Session("success"))
                    <span class="alert alert-success">
                        {{ session('success') }}
                    </span>
                    @endif

                    @if(Session("error"))
                    <span class="alert alert-danger">
                        {{ session('error') }}
                    </span>
                    @endif

                    <div class="card-body">
                        <form method="post" action="{{ route('auth.userRegister')}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>

                        <a href="{{ route('auth.index') }}">Go back to login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 