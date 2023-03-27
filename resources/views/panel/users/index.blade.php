@extends('layouts.panel')
@section('title')
    - users management
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">dashboard</a></li>
            <li><a href="{{route('users.index')}}" class="is-active">users</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('users.index')}}">All users</a>
                <a class="tab__item" href="{{route('users.create')}}">Create a new user</a>
            </div>
        </div>

            <p class="box__title border-bottom">Users</p>
        <hr>

        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row ">
                    <th >Id</th>
                    <th>full name</th>
                    <th>Email</th>
                    <th>pone number</th>
                    <th>User level</th>
                    <th>registry date</th>
                    <th>the operation</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr role="row" class="">
                        <td><a href="">{{$user->id}}</a></td>
                        <td><a href="">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->created_at->format('Y-m-d')}}</td>
                        <td>
                            @if(auth()->user()->id !== $user->id && $user->role !== "admin")
                                <a href="{{route('users.destroy',$user->id)}}" class="item-delete mlg-15" title="Delete"
                                   onclick="destroyUser(event,{{$user->id}})"><i class="fas fa-trash-alt fa-lg"></i></a>
                            @endif
                            <a href="{{route('users.edit',$user->id)}}" class="item-edit " title="Edit"><i class="fas fa-edit fa-lg"></i></a>
                            <form action="{{route('users.destroy',$user->id)}}" method="post"
                                  id="delete-user-{{$user->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
        <div class="text-center">
            {{$users->links()}}
        </div>
    </div>
@endsection
@section('script')
    <script>
        function destroyUser(event, id) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure to delete the user?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes. Delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-user-${id}`).submit()
                }
            })
        }

    </script>
@endsection
