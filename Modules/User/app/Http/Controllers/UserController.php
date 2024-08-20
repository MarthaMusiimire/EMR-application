<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Http\Requests\StoreUserRequest;
use Modules\User\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{

    //--------------------------------------------------------BEGIN CRUDE OPRATIONS ON USERS
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('user::index', compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user::auth.Register-user');
      
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        User::create([
            'user_name' => $validated['user_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]); 
        return redirect()->route('users.index')
                        ->with('success','User created successfully.');


    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user::Show-user', compact('user', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user::Edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update (UpdateUserRequest $request, $id)
    {
        $validated = $request->validated();
        $user = User::findOrFail($id);

        $user->update([
            'user_name' => $validated['user_name'],
            'email' => $validated['email'],
            'password' => isset($validated['password']) ? Hash::make($validated['password']) : $user->password,
            'role' => $validated['role'],
        ]);

        return redirect()->route('users.index')
                         ->with('success', 'User updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect to the index page with a success message
        return redirect()->route('users.index')
                         ->with('success', 'User deleted successfully.');
    }

//---------------------------------------------------------------END CRUDE OPRATIONS ON USERS








    //-------------------------------------------RRECOVERING DELETED USERS --------------------------------
    public function inactive()
    {
        $users = User::onlyTrashed()->get();
     
        return view('user::inactive', compact('users'));

    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->restore();

        return redirect()->route('users.inactive')
                         ->with('success', 'User activated successfully.');
    }












//--------------------------------------------------------BEGIN AUTHORIZATION
    //FOR AUTHENTICATION.
    public function showRegistrationForm()
    {
        return view('user::auth.Register-user');
    }


    public function register(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'user_name' => $validated['user_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        // Auth::login($user);

        return redirect()->intended('users');
    }


    public function showLoginForm()
    {
        return view('user::auth.Login-user');
    }


    // Handle user login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('patients');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

   


















}
