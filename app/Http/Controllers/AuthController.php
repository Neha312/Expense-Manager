<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        //validation
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        //login code
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }
        return redirect('login')->withErrors('Login Detaile are not Valid');
    }
    public function register_view()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        //validation code
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);


        //save in database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);
        return redirect('login')->with('success', 'User Register Succesfully');
    }

    public function home()
    {
        return view('home');
    }
    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect('/');
    }

    public function account()
    {

        $account = User::all();
        return view('account', ['accounts' => $account]);
        // return view('editAccount');
    }
    public function createAccount(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]);

        //insertion using create method
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);
        return redirect('account')->with('success', 'Account Inserted Succesfully');
    }
    public function editAccount($id)
    {
        $accounts = User::find($id);
        return view('editAccount', ['accounts' => $accounts]);
    }
    public function updateAccount(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        User::findOrFail($id)->update($request->only('name', 'email'));
        // dd('sone')
        return redirect(route('account'))->with('status', 'User Account Updated Successfully !!');
    }

    public function destroyAccount($id)
    {
        User::destroy($id);
        return redirect('home')->with('success', 'User Account Deleted Succesfully');
    }
    public function loggedUser()
    {
        return view('loggedUser');
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'entrydate' => 'required|date'
        ]);

        //insertion using create method
        Expense::create([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'entrydate' => $request->entrydate
        ]);
        return redirect('expense')->with('success', 'Expense Inserted Succesfully');
    }
    public function expense()
    {
        $expenses = Expense::all();
        return view('expense', ['expenses' => $expenses]);
    }
    public function editExpense($id)
    {
        $expenses = Expense::find($id);
        return view('editExpense', ['expenses' => $expenses]);
    }
    public function updateExpense(Request $request, $id)
    {

        Expense::findOrFail($id)->update($request->only('name', 'description', 'amount', 'entrydate'));
        // dd('sone')
        return redirect(route('expense'))->with('status', 'Expense Updated Successfully !!');
    }
    public function destroyExpense($id)
    {
        Expense::destroy($id);
        return redirect(route('expense'))->with('status', 'Expense Deleted Successfully !!');
    }
    public function profile()
    {
        return view('profile');
    }
    public function editProfile($id)
    {
        $profiles = User::find($id);
        return view('editProfile', ['profiles' => $profiles]);
    }
    public function updateProfile(Request $request, $id)
    {
        User::findOrFail($id)->update($request->only('name', 'email'));
        // dd('sone')
        return redirect('home')->with('status', 'User Account Updated Successfully !!');
    }
    public function destroyProfile($id)
    {
        User::destroy($id);
        return redirect('home')->with('success', 'User Account Deleted Succesfully');
    }
}
