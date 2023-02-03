<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Account;
use App\Models\Expense;
use App\Mail\WelcomeMail;
use App\Models\AccountUser;
use App\Models\Transaction;
use App\Models\Account_User;
use App\Notifications\InviteUser;
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
    public function home()
    {
        return view('home');
    }
    public function profile()
    {
        return view('Account.profile');
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
            'email' => $request->get('email'),
            'password' => $request->get('password')

        ]);
        Mail::to($email)->send(new WelcomeMail($data));

        return redirect('login')->with('success', 'User Register Succesfully');
    }
    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect('/');
    }

    //account
    public function show_account()
    {
        $accounts = auth()->user()->accounts()->get();
        return view('Account.list', ['accounts' => $accounts]);
    }
    public function add_account()
    {
        return view('Account.index');
    }
    public function create_account(Request $request)
    {

        $request->validate([
            'account_name' => 'required',
            'balance' => 'required|numeric',
            'type' => 'in:primary,secondary'
        ]);

        //insertion using create method
        $account = Account::create([
            'account_name' => $request->account_name,
            'type' => $request->type,
            'balance' => $request->balance

        ]);

        $account->users()->sync(auth()->user()->id);
        return redirect('show_account',)->with('success', 'Account Created Succesfully');
    }
    public function edit_account($id)
    {
        $accounts = Account::find($id);
        return view('Account.editAccount', ['accounts' => $accounts]);
    }
    public function update_account(Request $request, $id)
    {
        Account::findOrFail($id)->update($request->only('account_name', 'balance', 'type'));
        return redirect('show_account')->with('status', ' Account Updated Successfully !!');
    }
    public function delete_account($id)
    {
        Account::destroy($id);
        return redirect('show_account')->with('success', ' Account Deleted Succesfully');
    }
    //Trsansaction

    public function view_transaction($id)
    {
        $transaction = Account::find($id)->transactions()->orderBy('entry_date', 'DESC')->get();
        return view('UserTrasnaction.list', ['transaction' => $transaction]);
    }
    public function transactionPage()
    {
        $account = Account::all();
        return view('UserTrasnaction.index', ['account' => $account]);
    }
    public function create_transaction(Request $request)
    {
        $transaction        = Transaction::create([
            'account_id'    =>  $request->account_name,
            'category'      => $request->category,
            'type'          => $request->type,
            'amount'        => $request->amount,
            'entry_date'    => $request->entry_date,
        ]);
        return redirect('view_transaction/' . $transaction->account_id)->with('success', 'transaction Created Succesfully');
    }
    public function edit_transaction($id)
    {

        $account = Account::all();
        $transaction = Transaction::find($id);
        return view('UserTrasnaction.edit', ['transaction' => $transaction, 'account' => $account]);
    }
    public function update_transaction(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $account = $transaction->account_id;
        $transaction->update($request->only('category', 'amount', 'type', 'entry_date', 'account_name'));
        return redirect('view_transaction/' . $account)->with('status', ' Transaction Updated Successfully !!');
    }
    public function delete_transaction($id)
    {
        $transaction = Transaction::findOrFail($id);
        $account_id = $transaction->account_id;
        $transaction->delete();

        return redirect('view_transaction/' . $account_id)->with('success', ' Transaction Deleted Succesfully');
    }
    public function show_user($id)
    {
        $users = Account::find($id)->users;
        // dd($user);
        return view('Account.userList', ['users' => $users, 'id' => $id]);
    }
    public function invite_user()
    {
        // $users = Account::find()->users;
        // dd($user);
        $user = User::where('id', '!=', auth()->user()->id)->get();
        // dd($user);
        return view('Account.invite', ['user' => $user]);
    }
    public function total_balance()
    {
        $balance = auth()->user()->accounts()->sum('balance');
        return view('Account.balance', ['balance' => $balance]);
    }
    public function total_transaction()
    {

        $transaction = auth()->user()->accounts->pluck('id');
        // $accounts = Account::whereIn('id', $transaction)->with('transactions')->get();
        $accounts = Account::whereIn('id', $transaction)->with(['transactions' => function ($q) {
            $q->orderBy('entry_date', 'DESC');
        }])->get();

        // dd($account);
        return view('Account.transaction', ['accounts' => $accounts]);
    }
    public function process_invites(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|email|unique:users,email'
        // ]);
        // $validator->after(function ($validator) use ($request) {
        $user = User::all();
        if (User::where('email', $request->input('email'))->exists()) {
            //         $validator->errors()->add('email', 'There exists an invite with this email!');
        }
        // });
        // if ($validator->fails()) {
        //     return redirect(route('invite_view'))
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        // do {
        //     $token = Str::random(20);
        // } while (Invite::where('token', $token)->first());
        // Invite::create([
        //     'token' => $token,
        //     'email' => $request->input('email')
        // ]);
        // $url = URL::temporarySignedRoute(

        //     'registration',
        //     now()->addMinutes(300),
        //     ['token' => $token]
        // );
        $user->notify(new InviteUser($user));

        return redirect('invite_user')->with('success', 'The Invite has been sent successfully');
    }
    public function add_user($id)
    {

        // $accounts = Account::find($id)->users()->get();

        // $user = Account::whereNotIn('id', [users()->id]);
        // dd($accounts);


        // return view('Account.addUser', ['accounts' => $accounts]);
    }
    public function add_user_account()
    {

        $user = User::where('id', '!=', auth()->user()->id)->get();
        dd($user);
    }
    public function account_total_balance_()
    {
        $income = Transaction::where('type', 'income')->sum('amount');
        $expense = Transaction::where('type', 'expense')->sum('amount');
        $balance = Account::where('id', 3)->sum('balance');
        $total = $balance - $expense;
        $total1 = $balance + $income;
        dd($total);
    }
}
