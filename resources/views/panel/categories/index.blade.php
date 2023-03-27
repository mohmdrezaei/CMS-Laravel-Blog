@extends('layouts.panel')
@section('title')
    - categories
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('content')
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">dashboard</a></li>
            <li><a href="{{route("categories.index")}}" class="is-active">categories</a></li>
        </ul>
    </div>
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">categories</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>Id</th>
                            <th>Category name</th>
                            <th>Parent name</th>
                            <th>the operation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr role="row" class="">
                                <td><a href="">{{$category->id}}</a></td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->getParentName()}}</td>
                                <td>
                                    <a href="" class="item-delete mlg-15" title="Delete" onclick="destroyCategory(event,{{$category->id}})"><i class="fas fa-trash-alt fa-lg"></i></a>
                                    <a href="{{route('categories.edit',$category->id)}}" class="item-edit " title="Edit"><i class="fas fa-edit fa-lg"></i></a>
                                    <form action="{{route('categories.destroy',$category->id)}}" method="post" id="delete-category-{{$category->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                {{$categories->links()}}
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">Create a new Category</p>
                <form action="{{route("categories.store")}}" method="post" class="padding-30">
                    @csrf
                    <input type="text" name="slug" placeholder="Category name" class="text">
                    @error('name')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    @error('slug')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <p class="box__title margin-bottom-15">Select the Parent Category</p>
                    <select class="select" name="category_id" id="category_id">
                        <option value="">doesn't have</option>
                        @foreach($parent_categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="alert-error">{{$message}}</p>
                    @enderror
                    <button class="btn btn-webamooz_net" type="submit">add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function destroyCategory(event, id) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure to delete the category?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes. Delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-category-${id}`).submit()
                }
            })
        }

    </script>
@endsection
