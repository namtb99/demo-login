<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class HomeController extends Controller
{
    public function __construct()
    {
        
    }


    public function get()
    {
        //        $users = DB::select('select * from users');
        $users = User::all();
        return view('home', ['users' => $users]);
    }
    public function update(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required']
        ]);
        //        DB::update(
        //            'update users set name = ? where id = ?',
        //            [$request->name, $request->id]
        //        );
        $result = User::where('id', $request->id)
            ->update(['name' => $request->name]);
        return redirect('/home');
    }
    public function delete(Request $request)
    {
        // validate
        // DB::delete(
        //     'delete from users where id = ?',
        //     [$request->id]
        // );
        $result = User::destroy($request->id);
        return redirect('/home');
    }
}
