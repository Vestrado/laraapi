@extends('layout.app')

@section('content')
<!-- Row start -->
<div class="row gx-3">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-body">
                <div class="card-320">

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (isset($data) && count($data) > 0)
                        <h3>Account Overview</h3>
                        <table border="0" width="100%">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Account ID</th>
                                    <th>Server ID</th>
                                    <th>Total Net Deposit</th>
                                    <th>Traded Lots</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td><strong>{{ $item['userId'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $item['loginSid'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $item['serverId'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $item['totalNetDeposits'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $item['tradedLots'] ?? 'N/A' }}</strong></td>
                                        {{-- <td><strong>{{ number_format((float)$item['totalNetDeposits'], 2) ?? 'N/A' }}</strong></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No user data available.</p>
                    @endif

                    @if (isset($accountTypes) && count($accountTypes) > 0)
                        <h3>Account Types</h3>
                        <table border="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Account Type ID</th>
                                    <th>Account Type Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accountTypes as $type)
                                    <tr>
                                        <td><strong>{{ $type['id'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $type['name'] ?? 'N/A' }}</strong></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No account types available.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->

@endsection
