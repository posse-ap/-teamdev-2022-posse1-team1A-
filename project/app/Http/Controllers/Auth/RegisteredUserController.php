<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AccountStatus;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nickname' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone_number' => 'required|numeric',
            'company' => 'required',
            'department' => 'required',
            'length_of_service' => 'required',
            'is_search_target' => 'required',
            'password' => 'required',
            'terms_of_service' => 'required',
        ]);

        if ($request->icon) {
            $icon = $request->file('icon');
            $icon->storeAs('', $icon->getClientOriginalName(), 'public');
            $iconPath = 'storage/' . $icon->getClientOriginalName();
        } else {
            $iconPath = User::getDefaultIcon();
        }

        $user = User::create([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'icon' => $iconPath,
            'telephone_number' => $request->telephone_number,
            'company' => $request->company,
            'department' => $request->department,
            'length_of_service' => $request->length_of_service,
            'is_search_target' => $request->is_search_target,
            'account_status_id' => AccountStatus::getActiveId(),
            'peer_id' => Str::random(16),
            'role_id' => Role::getUserId(),
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
