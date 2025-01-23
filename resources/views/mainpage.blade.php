@extends('layout.app')

@section('content')
<!-- Row start -->
<div class="row gx-3">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Welcome, {{ $data['firstName'] }}</div>
                <p style="text-align: center;"><strong>Your last login:</strong> {{ $data['lastLoginDate'] }}</p>
            </div>
            <div class="card-body">
                <div class="card-320">



                    @if($data)

                    @else
                        <p style="text-align: center; color: red;">No user data available.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->




@endsection
