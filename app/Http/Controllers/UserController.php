<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use App\Http\Requests;
use PragmaRX\Google2FA\Google2FA as TwoFactorAuth;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $authenticator;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->authenticator = new TwoFactorAuth();
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * [home description]
     * @return [type] [description]
     */
    public function home()
    {
        if(Auth::check()){

            $user = Auth::user();
            $users = UserModel::all();

            return view('users.home',compact('users','user'));

        }else{

            return redirect('/')
            ->with('flash_error', 'Unauthorized Access..')
            ->withInput();
        }
    }

    /**
     * [login description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function login(Request $request)
    {

        $secret = UserModel::getSecret($request->email);
        $checkResult = $this->authenticator->verifyKey($secret, $request->otp);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true) && $checkResult) {

            return redirect()->intended('home');

        } else {

            return redirect('/')
            ->with('flash_error', 'Your username/password combination was incorrect.')
            ->withInput();

        }
    }

    /**
     * [logout description]
     * @return [type] [description]
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $secret = $this->authenticator->generateSecretKey();
        $website = 'http://localhost:8888/laravel-app';

        $user = array('firstname' => $request->firstname, 'lastname' => $request->lastname, 'email' => $request->email, 'password' => bcrypt($request->password), 'secret' => $secret);
        $qrcode = $this->authenticator->getQRCodeGoogleUrl($request->email,$website,$secret);
        UserModel::create($user);
        return view('users.qrcode',compact('qrcode'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = UserModel::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = UserModel::find($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userUpdate=$request->all();
        $user=UserModel::find($id);
        $user->update($userUpdate);
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserModel::find($id)->delete();
        return redirect('home');
    }
}
