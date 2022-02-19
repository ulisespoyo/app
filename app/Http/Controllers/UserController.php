<?php
namespace App\Http\Controllers;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class UserController extends Controller
{

    public function index()
    {
        return view('users.index',[
            'users'=>User::latest()->get()
        ]);
    }




}
