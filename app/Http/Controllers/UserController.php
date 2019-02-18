<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {
        if (!$this->middleware('auth')){
            redirect('/');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', '<>', 1)->paginate(15);
        return view('users.list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        if ($request['password'] == $request['newPassword'])
            $request['password'] = bcrypt($request['password']);
        else
            return redirect('user/create')->with('status', trans('user.error_create_user'));

        if ($request['date_of_birth'] != null)
            $request['date_of_birth'] = Carbon::parse($request['date_of_birth'])->format('Y-d-m');

        try {
            $user::create($request->all());
            return redirect('user/create')
                ->with('status', trans('user.create_user'))
                ->with('status_box', 'success');
        } catch (\Exception $e) {
            return redirect('user/create')
                ->with('status', trans('user.error_create_user'))
                ->with('status_box', 'danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $user
     * @return \Illuminate\Http\Response
     */
    public function edit(int $user)
    {
        if (!empty($user)) {
            $user = User::where('id', $user)->firstOrFail();
            return view('users.edit', compact('user'));
        } else redirect('user/list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $new_user = User::where('id', $request->id)->firstOrFail();
            $new_user->name = $request->name;
            $new_user->last_name = $request->last_name;
            $new_user->email = $request->email;
            $new_user->save();
            return redirect('user/edit/' . $new_user->id)
                ->with('status_box', 'success')
                ->with('status', trans('user.update_user'))
                ;
        } catch (\Exception $e) {
            return redirect('user/edit/' . $new_user->id)
                ->with('status_box', 'danger')
                ->with('status', 'user.error_update_user')
                ;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $user)
    {
        try {
            User::where('id', $user)->delete();
            return redirect('user/list')
                ->with('status', trans('user.delete_user'));
        } catch (\Exception $e) {
            return redirect('user/list')->with('status', trans('user.error_delete_user'));
        }
    }
}
