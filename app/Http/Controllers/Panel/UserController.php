<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\CreateUserRequest;
use App\Http\Requests\Panel\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $users=User::paginate();
        return view('panel.users.index',compact('users'));
    }

    public function create()
    {
       return view('panel.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $data =  $request->validated();
        $data['password'] = Hash::make('password');
         User::create($data);
         $request->session()->flash('status','کاربر با موفقیت ایجاد شد.');
         return redirect(route('users.index'));
    }
    public function edit(User $user)
    {
        return view('panel.users.edit',compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update(
            $request->validated()
        );
        $request->session()->flash('status','کاربر با موفقیت ویرایش گردید.');
        return redirect()->route('users.index');
    }

    public function destroy(User $user,Request $request)
    {
        $user->delete();
        $request->session()->flash('status','کاربر با موفقیت حذف گردید.');
        return back();
    }
}
