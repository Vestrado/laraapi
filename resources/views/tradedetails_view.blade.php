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
                        <!-- Display total volume -->
                        <h3>Summary</h3>
                        <h5>Total Lots: {{ number_format($totalVolume ?? 0, 2) }}</h5>
                        <h5>Last Transaction: {{ $lastCloseDate ?? 'N/A' }}</h5>
                        <h3>Details:-</h3>
                        <table border="0" width="100%">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Account ID</th>
                                    <th>Open Date</th>
                                    <th>Closed Date</th>
                                    <th>Ticket Type</th>
                                    <th>Volume</th>
                                    <th>PL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td><strong>{{ $item['userId'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $item['login'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $item['openDate'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $item['closeDate'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $item['ticketType'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $item['volume'] ?? 'N/A' }}</strong></td>
                                        <td><strong>{{ $item['pl'] ?? 'N/A' }}</strong></td>
                                        {{-- <td><strong>{{ number_format((float)$item['totalNetDeposits'], 2) ?? 'N/A' }}</strong></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    @else
                        <p>No user data available.</p>
                    @endif



                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->

@endsection
