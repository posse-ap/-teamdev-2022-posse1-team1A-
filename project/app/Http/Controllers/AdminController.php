<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccountStatus;

class AdminController extends Controller
{
    public function userlist()
    {
        $users = User::paginate(10);
        return view('admin.user-list', compact('users'));
    }

    public function accountstop(Request $request)
    {
        
        $id = $request->id;

        $update = [
            'account_status_id' => AccountStatus::getStoppedId(),
        ];
        User::where('id', $id)->update($update);

        return redirect()->route('admin_userlist');
    }

    public function accountactive(Request $request)
    {
        
        $id = $request->id;

        $update = [
            'account_status_id' => AccountStatus::getActiveId(),
        ];
        User::where('id', $id)->update($update);

        return redirect()->route('admin_userlist');
    }
}
