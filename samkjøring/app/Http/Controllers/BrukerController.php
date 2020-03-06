<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
//Use App\User;
Use App\Bruker;
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

          //dd($credentials);
      return Redirect::to("login")->withSuccess('Opps! You have entered invalid credentials');
  }

  public function postRegistration(Request $request)
  {
      request()->validate([
      'fornavn' => 'required',
      'epost' => 'required|email|unique:bruker',
      'passord' => 'required|min:6',
      ]);

      $data = $request->all();

      $check = $this->create($data);


      //dd($check);
      return Redirect::to("dashboard")->withSuccess('Great! You have Successfully loggedin');
  }

  public function dashboard()
  {

    /*if(Auth::check()){
      return view('dashboard');
    }
     return Redirect::to("login")->withSuccess('Opps! You do not have access');*/
     return view('dashboard');
   }


  public function create(array $data)
  {
    return Bruker::create([
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
