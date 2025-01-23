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
                    @if (isset($data))
                        <table border="0" width="50%">
                            <tr>
                                <td>First Name</td>
                                <td>: <strong>{{ $data['firstName'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>: <strong>{{ $data['lastName'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Client ID</td>
                                <td>: <strong>{{ $data['id'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Date of birth</td>
                                <td>: <strong>{{ $data['birthDate'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: <strong>{{ $data['email'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Mobile Number</td>
                                <td>: <strong>{{ $data['phone'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Communication Language</td>
                                <td>: <strong>{{ $data['language'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Country of Residence</td>
                                <td>: <strong>{{ $data['country'] }}</strong></td>
                            </tr>
                            <tr>
                                <td>Notification Preferences</td>
                                <td>
                                    <strong>
                                        @foreach($data['notificationPreferences'] as $preference)
                                            {{ $preference }}<br>
                                        @endforeach
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td>SMS Notification</td>
                                <td>: <strong>-</strong></td>
                            </tr>
                            <tr>
                                <td>2FA</td>
                                <td>: <strong>-</strong></td>
                            </tr>
                            <tr>
                                <td>Proof of Address (POA)</td>
                                <td>: <strong>-</strong></td>
                            </tr>
                            <tr>
                                <td>National ID, Driver's License or Passport</td>
                                <td>: <strong>-</strong></td>
                            </tr>
                            <tr>
                                <td>Profile approved</td>
                                <td>: <strong>-</strong></td>
                            </tr>
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
