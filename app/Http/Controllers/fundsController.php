<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class fundsController extends Controller
{
    public function paymentlistpost()
    {
        if(session('loadid'))
        {
            //$loadid = session('loadid');
            // Define the API URL
            $url = 'https://my.vestrado.com/rest/payment-systems';

            // Set the headers
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer 9083b30e232b13336f9f6aa64bb753221d6d5d4ba1ebe441d4d78c521522f78d145110b7bc30a23016a5bbd12f561fb6225b10438bf428d0888d5b13',
            ];

            // Set the body
            $body = [
                'cid' => "0",
            ];

            // Send the POST request
            $response = Http::withHeaders($headers)->post($url, $body);

            if ($response->successful()) {
                $data = $response->json();
                // Filter the data to include only the item with "displayOrder": 6
                $filteredData = array_filter($data, function ($item) {
                    return $item['displayOrder'] === 1;
                });
                return view('deposit', ['data' => $data]);
            } else {
                $error = [
                    'status' => $response->status(),
                    'message' => $response->body(),
                ];
                return redirect()->back()->with('error', $error['message']);
            }
        } else {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    }

    public function paymentlist()
    {
        // Check if the session variable 'loadid' is set
        if (session('loadid')) {
            $sid = "3-10165";

            // Fetch user details using the loadid
            $token = '9083b30e232b13336f9f6aa64bb753221d6d5d4ba1ebe441d4d78c521522f78d145110b7bc30a23016a5bbd12f561fb6225b10438bf428d0888d5b13';
            $response = Http::withHeaders([
                'accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])->get('https://my.vestrado.com/rest/payment-systems/deposit/' . $sid);

            if ($response->successful()) {
                $data = $response->json();
                return view('deposit', [
                    'data' => $data, // User details
                ]);
            } else {
                return redirect()->route('login')->with('error', 'Failed to fetch user details');
            }
        } else {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    }
}
