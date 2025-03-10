<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                'openDate' => [

                    'begin' => '2025-01-01 00:00:00'
                ],
                'closeDate' => [
                    'end' => '2025-01-31 23:59:59'
                ],
                // 'ticketType' => [
                //     'buy','sell'
                // ],
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
                $totalVolume = collect($data)->sum('volume');
                $totalVolume = round(collect($data)->sum('volume'), 2);
                $lastCloseDate = collect($data)->pluck('closeDate')->first();
                $userID = collect($data)->pluck('userId')->first();

                DB::table('users_info')->insert([
                    'name' => 'Jane Doe',
                    'user_id' => $userID,
                    'total_lots' => $totalVolume,
                    'last_trans' => $lastCloseDate,
                ]);

                return view('tradedetails_view', [
                    'data' => $data,
                    'totalVolume' => $totalVolume,
                    'lastCloseDate' => $lastCloseDate,
                ]);

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

    public function details2xx($id)
    {
        // Logic to show a specific trade
        if (session('loadid')) {
            // Check if the data already exists in the users_info table
            $userInfo = DB::table('users_info')->where('user_id', $id)->first();

            if ($userInfo) {
                // Data exists, use it
                $totalVolume = $userInfo->total_lots;
                $lastCloseDate = $userInfo->last_trans;

                return view('tradedetails_view', [
                    'data' => [], // You might want to fetch the actual trade data here if needed
                    'totalVolume' => $totalVolume,
                    'lastCloseDate' => $lastCloseDate,
                ]);
            } else {
                // Data does not exist, make the API request
                $urlTrades = 'https://my.vestrado.com/rest/trades';
                $headers = [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer 9083b30e232b13336f9f6aa64bb753221d6d5d4ba1ebe441d4d78c521522f78d145110b7bc30a23016a5bbd12f561fb6225b10438bf428d0888d5b13',
                ];
                $body = [
                    'userId' => $id,
                    'openDate' => [
                        'begin' => '2025-01-01 00:00:00'
                    ],
                    'closeDate' => [
                        'end' => '2025-01-31 23:59:59'
                    ],
                    'ticketType' => [ // Add the ticketType array here
                        'buy',
                        'sell'
                    ],
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

                $responseAccounts = Http::withHeaders($headers)->post($urlTrades, $body);

                if ($responseAccounts->successful()) {
                    $data = $responseAccounts->json();
                    $totalVolume = round(collect($data)->sum('volume'), 2);
                    $lastCloseDate = collect($data)->pluck('closeDate')->first();
                    $userID = collect($data)->pluck('userId')->first();
                    $userID = $userID ?? $id; // If $userID is not available, use the $id passed to the method

                    DB::table('users_info')->insert([
                        'name' => 'Jane Doe',
                        'user_id' => $userID,
                        'total_lots' => $totalVolume,
                        'last_trans' => $lastCloseDate,
                    ]);

                    return view('tradedetails_view', [
                        // 'data' => $data,
                        'totalVolume' => $totalVolume,
                        'lastCloseDate' => $lastCloseDate,
                    ]);
                } else {
                    $error = [
                        'status' => $responseAccounts->status(),
                        'message' => $responseAccounts->body(),
                    ];
                    return redirect()->back()->with('error', $error['message']);
                }
            }
        } else {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    }

    public function details2($id)
    {
        // Logic to show a specific trade
        if (session('loadid')) {
            // Check if the data already exists in the users_info table
            $userInfo = DB::table('users_info')->where('user_id', $id)->first();

            // Make the API request
            $urlTrades = 'https://my.vestrado.com/rest/trades';
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer 9083b30e232b13336f9f6aa64bb753221d6d5d4ba1ebe441d4d78c521522f78d145110b7bc30a23016a5bbd12f561fb6225b10438bf428d0888d5b13',
            ];

            $todayDate = now()->format('Y-m-d H:i:s');

            $body = [
                'userId' => $id,
                'openDate' => [
                    'begin' => '2025-01-01 00:00:00'
                ],
                'closeDate' => [
                    'end' => $todayDate
                ],
                'closeDate' => [
                    'end' => $todayDate
                ],
                'ticketType' => [ // Add the ticketType array here
                    'buy',
                    'sell'
                ],
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

            $responseAccounts = Http::withHeaders($headers)->post($urlTrades, $body);

            if ($responseAccounts->successful()) {
                $data = $responseAccounts->json();
                // Calculate total volume with special handling for "USC" currency
                $totalVolume = collect($data)->map(function ($item) {
                    // If currency is "USC", divide volume by 1000
                    if ($item['currency'] === 'USC') {
                        return $item['volume'] / 1000;
                    }
                    // Otherwise, return the volume as is
                    return $item['volume'];
                })->sum(); // Sum all volumes

                $totalVolume = round($totalVolume, 2); // Round to 2 decimal places
                $totalVolumeori = round(collect($data)->sum('volume'), 2);
                $lastCloseDate = collect($data)->pluck('closeDate')->first();
                $userID = collect($data)->pluck('userId')->first();
                $userID = $userID ?? $id; // If $userID is not available, use the $id passed to the method

                if ($userInfo) {
                    // Data exists, update the record
                    DB::table('users_info')
                        ->where('user_id', $userID)
                        ->update([
                            'total_lots' => $totalVolume,
                            'last_trans' => $lastCloseDate,
                        ]);
                } else {
                    // Data does not exist, insert a new record
                    DB::table('users_info')->insert([
                        'name' => 'Jane Doe',
                        'user_id' => $userID,
                        'total_lots' => $totalVolume,
                        'last_trans' => $lastCloseDate,
                    ]);
                }

                return view('tradedetails_view', [
                    'data' => $data, // Uncomment if you want to pass the API data to the view
                    'totalVolume' => $totalVolume,
                    'totalVolumeori' => $totalVolumeori,
                    'lastCloseDate' => $lastCloseDate,
                ]);
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

    public function testsave()
    {
        $users = DB::table('users_info')->get();

        // Insert a new user
        DB::table('users')->insert([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
        ]);
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
