<?php

namespace App\Http\Controllers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    // UserProvider $provider)
    {
        $this->middleware('auth');
        // $this->provider = $provider;
    }


    public function get()
    {
        // $query = $this->provider->createModel()->newQuery();
        $users = DB::select('select * from users');
        return view('home', ['users' => $users]);
    }
    public function update(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required']
        ]);
        DB::update(
            'update users set name = ? where id = ?',
            [$request->name, $request->id]
        );
    }
    public function delete(Request $request)
    {
        // validate
        DB::delete(
            'delete from users where id = ?',
            [$request->id]
        );
        return $this->get();
    }
}
