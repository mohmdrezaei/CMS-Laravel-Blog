@extends('layouts.panel')
@section('title')
- create a new user
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}" title="dashboard">ِdashboard</a></li>
            <li><a href="{{route('users.index')}}" class="">users</a></li>
            <li><a href="{{route('users.create')}}" class="is-active">Create a New User</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">Create a New User</p>
                <form action="{{route('users.store')}}" class="padding-30" method="post">
                    @csrf
                    <input type="text" name="name" class="text " placeholder="full name">
                    @error('name')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <input type="email" name="email" class="text" placeholder="Email">
                    @error('email')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <input type="text" name="phone" class="text" placeholder="phone number">
                    @error('phone')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <select name="role" class="select">
                        <option value="user" selected>User</option>
                        <option value="author">Author</option>
                        <option value="admin">َAdmin</option>
                    </select>
                    @error('role')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <button class="btn btn-webamooz_net">Creat</button>
                </form>

            </div>
        </div>
    </div>
@endsection
