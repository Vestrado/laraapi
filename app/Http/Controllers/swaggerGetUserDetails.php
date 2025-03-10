<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class swaggerGetUserDetails extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6', // Change the rules as needed
        ]);

        // Process the data (for example, authenticate the user)
        // You can use Auth::attempt() or any other logic you need

        // Example response
        //return redirect()->back()->with('success', 'Form submitted successfully!');
        $token = '9083b30e232b13336f9f6aa64bb753221d6d5d4ba1ebe441d4d78c521522f78d145110b7bc30a23016a5bbd12f561fb6225b10438bf428d0888d5b13';

        // Prepare the API request
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post('https://my.vestrado.com/rest/user/check_credentials', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Check if the response is successful
        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['id']) && $data['id'] > 0) {
                // Start the session if it is not already started
                if (!session()->isStarted()) {
                    session_start();
                }

                // Set the session variable
                session(['loadid' => $data['id']]);

                $loadid = $data['id'];

                $response2 = Http::withHeaders([
                    'accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ])->get('https://my.vestrado.com/rest/users/' . $loadid);

                // Handle successful authentication
                $data2 = $response2->json();
                return view('mainpage', [
                    'message' => 'Success',
                    'data' => $data2, // Entire response is the user details
                ]);
            } else {
                // Handle authentication failure
                return redirect()->route('login')->with('error', 'Invalid ID');
            }
        } else {
            // Handle authentication failure
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
    }

    public function mainpage2()
    {
        // Check if the session variable 'loadid' is set
        if (session('loadid')) {
            $loadid = session('loadid');

            // Fetch user details using the loadid
            $token = '9083b30e232b13336f9f6aa64bb753221d6d5d4ba1ebe441d4d78c521522f78d145110b7bc30a23016a5bbd12f561fb6225b10438bf428d0888d5b13';
            $response = Http::withHeaders([
                'accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])->get('https://my.vestrado.com/rest/users/' . $loadid);

            if ($response->successful()) {
                $data = $response->json();
                return view('mainpage', [
                    'data' => $data, // User details
                ]);
            } else {
                return redirect()->route('login')->with('error', 'Failed to fetch user details');
            }
        } else {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    }

    public function profile()
    {
        // Check if the session variable 'loadid' is set
        if (session('loadid')) {
            $loadid = session('loadid');

            // Fetch user details using the loadid
            $token = '9083b30e232b13336f9f6aa64bb753221d6d5d4ba1ebe441d4d78c521522f78d145110b7bc30a23016a5bbd12f561fb6225b10438bf428d0888d5b13';
            $response = Http::withHeaders([
                'accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])->get('https://my.vestrado.com/rest/users/' . $loadid);

            $userInfo = DB::table('users_info')->where('user_id', $loadid)->first();
            if ($userInfo) {
                $totalVolume = $userInfo->total_lots;
                $lastCloseDate = $userInfo->last_trans;
            } else {
                // Set default values or handle the case where no data is found
                $totalVolume = 0; // Default value for total volume
                $lastCloseDate = null; // Default value for last close date
            }

            if ($response->successful()) {
                $data = $response->json();
                return view('profile', [
                    'data' => $data, // User details
                    'totalVolume' => $totalVolume,
                    'lastCloseDate' => $lastCloseDate,
                ]);
            } else {
                return redirect()->route('login')->with('error', 'Failed to fetch user details');
            }
        } else {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    }

    public function profile2($id)
    {
        // Check if the session variable 'loadid' is set
        if (session('loadid')) {
            $loadid = session('loadid');

            // Fetch user details using the loadid
            $token = '9083b30e232b13336f9f6aa64bb753221d6d5d4ba1ebe441d4d78c521522f78d145110b7bc30a23016a5bbd12f561fb6225b10438bf428d0888d5b13';
            $response = Http::withHeaders([
                'accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])->get('https://my.vestrado.com/rest/users/' . $id);

            $userInfo = DB::table('users_info')->where('user_id', $id)->first();
            if ($userInfo) {
                $totalVolume = $userInfo->total_lots;
                $lastCloseDate = $userInfo->last_trans;
            } else {
                // Set default values or handle the case where no data is found
                $totalVolume = 0; // Default value for total volume
                $lastCloseDate = null; // Default value for last close date
            }

            if ($response->successful()) {
                $data = $response->json();
                return view('profile', [
                    'data' => $data, // User details
                    'totalVolume' => $totalVolume,
                    'lastCloseDate' => $lastCloseDate,
                ]);
            } else {
                return redirect()->route('login')->with('error', 'Failed to fetch user details');
            }
        } else {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    }

    public function logout()
    {
        // Clear the session
        session()->flush();

        // Optionally, you can also invalidate the session
        // session()->invalidate();

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}
