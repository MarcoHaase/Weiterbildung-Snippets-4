<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friendship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getusers() {
        //$data = json_encode(User::all());
        $user = Auth::user()->id;
        $data = json_encode(
            User::select(
                "users.*",
                "friendship.userid as isfriend")
                ->leftJoin("friendship", function($q) use ($user)
                    {
                        $q->on('friendship.friendid', '=', 'users.id')
                        ->on('friendship.userid', '=', User::raw($user));
                        
                    })
                ->get()
        );
        //var_dump($data);
        //exit();
        return $data;
    }

    public function fetchuser($id) {
        $data = json_encode(User::find($id));
        //var_dump($data);
        //exit();
        return $data;
    }
    
    public function tfriend($friendid) {
        $friendship = Friendship::where('userid', Auth::user()->id)
        ->where('friendid', $friendid)
        ->get();

        if (!isset($friendship[0])) {
            $friendship = new Friendship;
            $friendship->userid = Auth::user()->id;
            $friendship->friendid = $friendid;
            $friendship->save();
            return "true";
        }else{
            $friendship = Friendship::where('userid', Auth::user()->id)->where('friendid', $friendid)->delete();
            return "false";
        }
        
    }
    
    public function saveuser() {  
        $data = [
            'name' => request('name')["first"] . " " . request('name')["last"],
            'email' => request('email'),
            'password' => request('login')["password"],
            'gender' => request('gender'),
            'title' => request('name')["title"],
            'street' => request('location')["street"]["name"] . " " . request('location')["street"]["number"],
            'city' => request('location')["city"],
            'state' => request('location')["state"],
            'postcode' => request('location')["postcode"],
            'dob' => request('dob')["date"],
            'registered' => request('registered')["date"],
            'phone' => request('phone'),
            'cell' => request('cell'),
            'picture' => request('picture')["large"],
            'nat' => request('nat'),
        ];

        $user = new User;
        $user->name = $data["name"];
        $user->email = $data["email"];
        $user->password = Hash::make($data["password"]);
        $user->gender = $data["gender"];
        $user->title = $data["title"];
        $user->street = $data["street"];
        $user->city = $data["city"];
        $user->state = $data["state"];
        $user->postcode = $data["postcode"];
        $user->dob = $data["dob"];
        $user->registered = $data["registered"];
        $user->phone = $data["phone"];
        $user->cell = $data["cell"];
        $user->picture = $data["picture"];
        $user->nat = $data["nat"];

        $user->save();
        return "ok";
    }
}
