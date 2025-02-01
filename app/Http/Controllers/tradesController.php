<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class tradesController extends Controller
{
    public function index()
    {
        // Logic to list trades
    }

    public function show($id)
    {
        // Logic to show a specific trade
        if (session('loadid')) {
            //$loadid = session('loadid');

            // Define the API URL for accounts
            $urlTrades = 'https://my.vestrado.com/rest/accounts/trade-statistic';

            // Define the API URL for account types
            //$urlAccountTypes = 'https://my.vestrado.com/rest/dict/account-type/';

            // Set the headers
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer 9083b30e232b13336f9f6aa64bb753221d6d5d4ba1ebe441d4d78c521522f78d145110b7bc30a23016a5bbd12f561fb6225b10438bf428d0888d5b13',
            ];

            // Set the body for accounts
            $body = [
                'userId' => $id,
            ];

            // Send the POST request for accounts
            $responseAccounts = Http::withHeaders($headers)->post($urlTrades, $body);

            // Initialize account types data
            //$accountTypes = [];

            // Send the GET request for account types
            //$responseAccountTypes = Http::withHeaders($headers)->get($urlAccountTypes);

            if ($responseAccounts->successful()) {
                $data = $responseAccounts->json();
                //$accountTypes = $responseAccountTypes->json(); // Get account types data

                // Create a mapping of account type IDs to names
                // $accountTypeMap = [];
                // foreach ($accountTypes as $type) {
                //     $accountTypeMap[$type['id']] = $type['category'];
                // }

                // Add account type name to each account in the data
                // foreach ($data as &$account) {
                //     $account['accountTypeCategory'] = $accountTypeMap[$account['accountTypeId']] ?? 'N/A';
                // }

                return view('trades_view', ['data' => $data]);
                //return view('acc_overview', ['data' => $data, 'accountTypes' => $accountTypes]);
            } else {
                $error = [
                    'status' => $responseAccounts->status(),
                    'message' => $responseAccounts->body(),
                ];
                return redirect()->back()->with('error', $error['message']);
            }
        } else {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    }

    public function details($id)
    {
        // Logic to show a specific trade
        if (session('loadid')) {
            //$loadid = session('loadid');

            // Define the API URL for accounts
            $urlTrades = 'https://my.vestrado.com/rest/trades';

            // Set the headers
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer 9083b30e232b13336f9f6aa64bb753221d6d5d4ba1ebe441d4d78c521522f78d145110b7bc30a23016a5bbd12f561fb6225b10438bf428d0888d5b13',
            ];

            // Set the body for accounts
            $body = [
                'userId' => $id,
                'orders' => [
                [
                    'field' => 'closeDate',
                    'direction' => 'DESC'
                ]
                ],
                'segment' => [
                'limit' => 10000
                ]
            ];

            // Send the POST request for accounts
            $responseAccounts = Http::withHeaders($headers)->post($urlTrades, $body);

            if ($responseAccounts->successful()) {
                $data = $responseAccounts->json();

                return view('tradedetails_view', ['data' => $data]);
                //return view('acc_overview', ['data' => $data, 'accountTypes' => $accountTypes]);
            } else {
                $error = [
                    'status' => $responseAccounts->status(),
                    'message' => $responseAccounts->body(),
                ];
                return redirect()->back()->with('error', $error['message']);
            }
        } else {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    }

    public function store(Request $request)
    {
        // Logic to create a new trade
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing trade
    }

    public function destroy($id)
    {
        // Logic to delete a trade
    }
}
