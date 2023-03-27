@extends('layouts.panel')
@section('title')
    - Edit User
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}" title="پیشخوان">dashboard</a></li>
            <li><a href="{{route('users.index')}}" class="">users</a></li>
            <li><a href="{{route('users.edit',$user->id)}}" class="is-active">edit user</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">Edit User</p>
                <form action="{{route('users.update',$user->id)}}" class="padding-30" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="text" class="text" name="name" placeholder="full name" value="{{$user->name}}">
                    @error('name')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <input type="email" class="text" name="email" placeholder="Email" value="{{$user->email}}">
                    @error('email')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <input type="text" class="text" name="phone" placeholder="phone number" value="{{$user->phone}}">
                    @error('phone')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <select name="role" class="select">
                        <option value="user" @if($user->role === 'user') selected @endif>User</option>
                        <option value="author" @if($user->role === 'author') selected @endif>Author</option>
                        <option value="admin" @if($user->role === 'admin') selected @endif>Admin</option>
                    </select>
                    @error('role')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <button class="btn btn-webamooz_net">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
