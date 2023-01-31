<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Account;
use App\Models\Expense;
use App\Mail\WelcomeMail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);
        $account = Account::create([
            'account_name' => 'Zignuts',
            'type' => 'primary',
            'balance' => 30000,
        ]);
        $user->accounts()->sync($account);

        $email = $request->get('email');
        $data = ([
            'name' => $request->get('name'),
            'email' => $request->get('email')
        ]);
        Mail::to($email)->send(new WelcomeMail($data));

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
    public function show_user()
    {
        $users = User::all();
        $account = Account::all();
        return view('User.list', ['users' => $users]);
    }
    // //account crud
    // public function account()
    // {

    //     $account = User::all();
    //     return view('account', ['accounts' => $account]);
    //     // return view('editAccount');
    // }
    // public function createAccount(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|confirmed|min:8'
    //     ]);

    //     //insertion using create method
    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password)

    //     ]);
    //     return redirect('account')->with('success', 'Account Inserted Succesfully');
    // }
    // public function editAccount($id)
    // {
    //     $accounts = User::find($id);
    //     return view('editAccount', ['accounts' => $accounts]);
    // }
    // public function updateAccount(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //     ]);

    //     User::findOrFail($id)->update($request->only('name', 'email'));
    //     // dd('sone')
    //     return redirect(route('account'))->with('status', 'User Account Updated Successfully !!');
    // }

    // public function destroyAccount($id)
    // {
    //     User::destroy($id);
    //     return redirect('home')->with('success', 'User Account Deleted Succesfully');
    // }
    // public function loggedUser()
    // {
    //     return view('loggedUser');
    // }
    // //expense crud
    // public function create(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'amount' => 'required|numeric',
    //         'entrydate' => 'required|date'
    //     ]);

    //     //insertion using create method
    //     Expense::create([
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'amount' => $request->amount,
    //         'entrydate' => $request->entrydate
    //     ]);
    //     return redirect('expense')->with('success', 'Expense Inserted Succesfully');
    // }
    // public function expense()
    // {
    //     $expenses = Expense::all();
    //     return view('expense', ['expenses' => $expenses]);
    // }
    // public function editExpense($id)
    // {
    //     $expenses = Expense::find($id);
    //     return view('editExpense', ['expenses' => $expenses]);
    // }
    // public function updateExpense(Request $request, $id)
    // {

    //     Expense::findOrFail($id)->update($request->only('name', 'description', 'amount', 'entrydate'));
    //     // dd('sone')
    //     return redirect(route('expense'))->with('status', 'Expense Updated Successfully !!');
    // }
    // public function destroyExpense($id)
    // {
    //     Expense::destroy($id);
    //     return redirect(route('expense'))->with('status', 'Expense Deleted Successfully !!');
    // }
    // //profile crud
    // public function profile()
    // {
    //     return view('profile');
    // }
    // public function editProfile($id)
    // {
    //     $profiles = User::find($id);
    //     return view('editProfile', ['profiles' => $profiles]);
    // }
    // public function updateProfile(Request $request, $id)
    // {
    //     User::findOrFail($id)->update($request->only('name'));
    //     // dd('sone')
    //     return redirect('home')->with('status', 'User Account Updated Successfully !!');
    // }
    // public function destroyProfile($id)
    // {
    //     User::destroy($id);
    //     return redirect('home')->with('success', 'User Account Deleted Succesfully');
    // }
    // //userAccount crud
    // public function accountUser()
    // {
    //     $accounts = Account::all();

    //     return view('accountUser', ['accounts' => $accounts]);
    //     // return view('accountUser');
    // }
    // public function userAccount(Request $request, $id)
    // {
    //     $accounts = User::find($id)->accounts;

    //     return view('userAccount', ['accounts' => $accounts]);
    // }
    // public function createUseraccount(Request $request)
    // {
    //     $request->validate([
    //         'bank_name' => 'required',
    //         'account_no' => 'required|numeric',
    //         'iafc_code' => 'required'
    //     ]);

    //     //insertion using create method
    //     Account::create([
    //         'bank_name' => $request->bank_name,
    //         'account_no' => $request->account_no,
    //         'iafc_code' => $request->iafc_code,
    //         'user_id' => auth()->id()

    //     ]);

    //     return redirect('accountUser')->with('success', 'Account Inserted Succesfully');
    // }
    // public function edituserAccount($id)
    // {
    //     $accounts = Account::find($id);
    //     return view('edituserAccount', ['accounts' => $accounts]);
    // }
    // public function updateuserAccount(Request $request, $id)
    // {
    //     Account::findOrFail($id)->update($request->only('bank_name', 'account_no', 'iafc_code'));
    //     return redirect('accountUser')->with('status', 'User Account Updated Successfully !!');
    // }
    // public function deleteuserAccount($id)
    // {
    //     Account::destroy($id);
    //     return redirect('accountUser')->with('success', 'User Account Deleted Succesfully');
    // }

    // //Transaction Crud
    // public function transaction()
    // {
    //     $transaction = Transaction::simplePaginate(5);
    //     $account = Account::all();
    //     return view('transaction', ['transactions' => $transaction], ['accounts' => $account]);
    // }
    // public function createTransaction(Request $request)
    // {
    //     $request->validate([
    //         'category' => 'required',
    //         'amount' => 'required|numeric',
    //         'type' => 'in:expense,income,transfer'
    //     ]);

    //     //insertion using create method
    //     Transaction::create([
    //         'category' => $request->category,
    //         'type' => $request->type,
    //         'amount' => $request->amount,
    //         'account_id' => $request->account_id,
    //         'user_id' => auth()->id(),


    //     ]);

    //     return redirect('transaction')->with('success', 'Transaction Inserted Succesfully');
    // }
    // public function editTransaction($id)
    // {
    //     $transactions = Transaction::find($id);
    //     return view('editTransaction', ['transactions' => $transactions]);
    // }
    // public function updateTransaction(Request $request, $id)
    // {
    //     Transaction::findOrFail($id)->update($request->only('category', 'account_id', 'amount', 'type'));
    //     return redirect('accountUser')->with('status', 'Transaction Updated Successfully !!');
    // }
    // public function deleteTransaction($id)
    // {
    //     Transaction::destroy($id);
    //     return redirect('transaction')->with('success', 'Transaction Deleted Succesfully');
    // }



    /*Account Crud*/
}
