<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class BrukerController extends Controller
{
  public function index()
  {
      return view('login');
  }

  public function registration()
  {
      return view('registration');
  }

  public function postLogin(Request $request)
  {
      request()->validate([
      'epost' => 'required',
      'passord' => 'required',
      ]);

      $credentials = $request->only('epost', 'passord');
      if (Auth::attempt($credentials)) {
          // Authentication passed...
          return redirect()->intended('dashboard');
      }
      return Redirect::to("login")->withSuccess('Opps! You have entered invalid credentials');
  }

  public function postRegistration(Request $request)
  {
      request()->validate([
      'fornavn' => 'required',
      'epost' => 'required|epost|unique:bruker',
      'passord' => 'required|min:6',
      ]);

      $data = $request->all();

      $check = $this->create($data);

      return Redirect::to("dashboard")->withSuccess('Great! You have Successfully loggedin');
  }

  public function dashboard()
  {

    if(Auth::check()){
      return view('dashboard');
    }
     return Redirect::to("login")->withSuccess('Opps! You do not have access');
  }

  public function create(array $data)
  {
    return User::create([
      'fornavn' => $data['fornavn'],
      'epost' => $data['epost'],
      'passord' => Hash::make($data['passord'])
    ]);
  }

  public function logout() {
      Session::flush();
      Auth::logout();
      return Redirect('login');
  }
}
