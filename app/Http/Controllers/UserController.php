<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response {
        $data['users'] = User::where('is_admin', '!=', 7)->latest()->paginate(10);

        return response()->view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response {
        $data = [
            'user' => User::find($id),
        ];

        return response()->view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource profile in storage.
     *
     * @param Request $request
     * @param int     $id
     * @return RedirectResponse
     */
    public function updateProfile(Request $request, int $id): RedirectResponse {
        $request->validate(['name' =>'required|string', 'email' => ['required', 'email', Rule::unique('users')->ignore($id)]]);

        try {
            User::find($id)->update($request->all());

            return updateOk('Profile updated successfully');
        } catch(Exception $e) {
            return toastError($e->getMessage(), 'Unable to update password');
        }
    }

    /**
     * Update the specified resource password in storage.
     *
     * @param Request $request
     * @param int     $id
     * @return RedirectResponse
     */
    public function updatePassword(Request $request, int $id): RedirectResponse {
        $request->validate(
            ['current_password' => 'current_password', 'password' => 'required|confirmed'],
            ['current_password' => 'The current password is incorrect']
        );

        try {
            User::find($id)->update(['password' => Hash::make($request->input('password'))]);

            return updateOk('Password changed successfully');
        } catch(Exception $e) {
            return toastError($e->getMessage(), 'Unable to change password');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse {
        if(User::destroy($id)) {
            return back()->with('toast_success', 'User deleted.');
        } else {
            return toastError('unable to delete user', 'Unable to delete user');
        }
    }
}
