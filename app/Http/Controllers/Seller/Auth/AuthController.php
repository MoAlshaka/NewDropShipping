<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function get_seller_register()
    {
        return view('seller.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|unique:sellers|max:50',
            'password' => 'required|min:8|max:50',
            'confirm_password' => 'required|same:password|max:50|min:8',
            'address' => 'required|max:250',
            'phone' => 'required|max:50',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'national_id' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'payment_method' => 'required|max:50',
            'account_number' => 'required|max:100',
        ]);

        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/sellers/images'), $image_name);

        $national_id = $request->file('national_id');
        $national_id_name = time() . '.' . $national_id->getClientOriginalExtension();
        $national_id->move(public_path('assets/sellers/images/national_id'), $national_id_name);

        $seller = Seller::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' =>  str_replace(' ', '', $request->phone),
            'address' => $request->address,
            'image' => $image_name,
            'national_id' => $national_id_name,
            'payment_method' => $request->payment_method,
            'account_number' => $request->account_number,
        ]);

        Auth::login($seller);

        return redirect()->route('seller.deactivate');
    }

    public function get_seller_login()
    {
        return view('seller.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|max:50',
            'password' => 'required|max:50',
        ]);
        // Attempt to authenticate the seller
        if (auth()->guard('seller')->attempt(['email' => $request->email, 'password' => $request->password])) {

            $seller = auth()->guard('seller')->user();
            // Check if the seller is active
            if ($seller->is_active == 0) {
                return redirect()->route('seller.deactivate');
            } else {
                // If active, log in the seller and redirect to the dashboard
                auth()->guard('seller')->login($seller);
                return redirect()->route('seller.dashboard');
            }
        } else {
            // If authentication fails, redirect back with an error message
            return redirect()->back()->with([
                'error' => 'The email or password is incorrect.'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('get.seller.login');
    }

    public function deactivate()
    {
        return view('seller.auth.deactivate');
    }
}
