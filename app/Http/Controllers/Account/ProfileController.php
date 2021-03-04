<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Model\Account\Profiles;
use App\Model\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function get($id)
    {
        $profile = User::find($id);
        return view('account.profile', ['profile' => $profile]);
    }

    public function update(Request $request)
    {
        // $validateData = $request->validate([
        //     'name' => ['required']
        // ]);
        $result = User::where('id', $request->id)
            ->update([
                'gender' => $request->gender,
                'address' => $request->address,
                'birthday' => $request->birthday,
                ]);
        return $result;
    }
}
