<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;




class UserController extends Controller
{   
    use AuthorizesRequests;

    public function index()
    {
        $user = Auth::user();
        $users = User::where('user_id', $user->id)
                     ->orWhere('id', $user->id)
                     ->get();
    
        foreach ($users as $user) {
            $this->authorize('view', $user);
        }
    
        return view('users.home', [
            'users' => $users
        ]);
    }
    
    
    


    public function numberUsers()
    {

        $totalUsers = User::count();

        return $totalUsers;
    }

    /**
     * Search users by keywords/location.
     */
    public function search(Request $request)
    {
        $keywords = $request->input('keywords', '');

        $users = User::where('given_name', 'like', "%{$keywords}%")
            ->orWhere('family_name', 'like', "%{$keywords}%")
            ->orWhere('email', 'like', "%{$keywords}%")
            ->orderBy('given_name')
            ->orderBy('family_name')
            ->get();

        return view('users.home', [
            'users' => $users,
            'keywords' => $keywords,
        ]);
    }


    public function show($id)
    {

        $user = User::select(
            'users.nickname as nickname',
            'users.id as id',
            'users.given_name as given_name',
            'users.family_name as family_name',
            'users.email as email',
            'users.created_at as created_at',
            'users.updated_at as updated_at',
            'users.user_id as user_id'
        )
            ->where('users.id', $id)
            ->first();



        // Check if user exists
        if (!$user) {
            return response()->view('errors.404', ['message' => 'User not found'], 404);
        }

        return view('users.show', [
            'user' => $user,
        ]);
    }


    /**
     * Show the user create form
     *
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store users in database
     */

    public function store(Request $request)
    {

        $allowedFields = ['nickname', 'given_name', 'family_name', 'email', 'password', 'password_confirmation'];

        $validator = Validator::make($request->all(), [
            'given_name' => 'required|string',
            'family_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'given_name.required' => ' given name is required.',
            'family_name.required' => ' family name is required.',
            'email.required' => 'email address is required.',
            'password.min' => 'password must be at least 8 characters.',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $newUserData = $request->only($allowedFields);
        $newUserData['user_id'] = Auth::id();



        if (empty($newUserData['nickname'])) {
            $newUserData['nickname'] = $newUserData['given_name'];
        }

        if (!empty($newUserData['password'])) {
            $newUserData['password'] = Hash::make($newUserData['password']);
        }
      
        User::create($newUserData);


        Session::flash('success', 'User created.');


        return redirect()->route('users.home');
    }

    /**
     * Show the user edit form
     */

    public function edit(User $user)
    {

        $this->authorize('update', $user);
        return view('users.edit', ['user' => 
        $user]);
    }


    /**
     * Update a user
     */


    public function update(Request $request,  User $user)
    {
        $this->authorize('update', $user);

        $request->validate([
            'given_name' => 'required|string',
            'family_name' => 'required|string',
            'nickname' => 'nullable|string',
            'email' => 'required|email',
            'user_password' => 'nullable|string|min:6|confirmed',
        ], [
            'given_name.required' => 'Given name is required',
            'family_name.required' => 'Family name is required',
            'user_password.min' => 'Password must be at least 6 characters',
            'user_password.confirmed' => 'Passwords do not match',
        ]);


        $allowedFields = ['nickname', 'given_name', 'family_name', 'email'];

        $updateValues = $request->only($allowedFields);


        if (empty($updateValues['nickname'])) {
            $updateValues['nickname'] = $updateValues['given_name'];
        }


        if ($request->user_password) {
            $updateValues['password'] = Hash::make($request->user_password);
        }


        $updateValues['updated_at'] = now();


        $user->update($updateValues);


        Session::flash('success', 'User updated');

        return redirect()->route('users.show', $user);
    }


    /**
     * Delete a user
     */

    public function destroy(User $user)
    {

        $this->authorize('delete', $user);

        $user->delete();

        Session::flash('success', 'User deleted successfully');

        return redirect()->route('users.home');
    }
}
