@extends('layout.app')
@section('content')

<div class = "container-fluid">
    <div class = "row space-bottom">
        <div class = "col-md-6">
            <div class = "col-md-12 main-box">
                <span>PAYMENT IN (PAYMENT CLEARANCE)</span>
            </div>
        </div>
        <div class = "col-md-6">
            <div class = "col-md-12 main-box">
                <span>PAYMENT OUT (REFUND)</span>
            </div>
        </div>
    </div>
    <div class = "row space-bottom">
        <div class = "col-md-6">
            <div class = "row">
                <div class = "col-md-3">
                    <div class = "col-md-12 secondary-box">
                        <span class = "head">TOTAL</span>
                        <div class = "details all">
                            <div class = "first-details" id = "ttlPayIn">
                                RM 0.00
                            </div>
                            <div class = "second-details" id = "allRecPayIn">
                                0 record
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "col-md-3">
                    <div class = "col-md-12 secondary-box">
                        <span class = "head">COMPLETE</span>
                        <div class = "details in">
                            <div class = "first-details" id = "ttlPayInComplete">
                                RM 0.00
                            </div>
                            <div class = "second-details" id = "completeRecPayIn">
                                0 record
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "col-md-3">
                    <div class = "col-md-12 secondary-box">
                        <span class = "head">PENDING</span>
                        <div class = "details out">
                            <div class = "first-details" id = "ttlPayInPending">
                                RM 0.00
                            </div>
                            <div class = "second-details" id = "pendingRecPayIn">
                                0 record
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "col-md-3">
                    <div class = "col-md-12 secondary-box">
                        <span class = "head">CANCEL</span>
                        <div class = "details out">
                            <div class = "first-details" id = "ttlPayInCancel">
                                RM 0.00
                            </div>
                            <div class = "second-details" id = "cancelRecPayIn">
                                0 record
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "col-md-6">
            <div class = "row">
                <div class = "col-md-3">
                    <div class = "col-md-12 secondary-box">
                        <span class = "head">TOTAL</span>
                        <div class = "details all">
                            <div class = "first-details" id = "ttlPayOut">
                                RM 0.00
                            </div>
                            <div class = "second-details" id = "allRecPayOut">
                                0 record
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "col-md-3">
                    <div class = "col-md-12 secondary-box">
                        <span class = "head">COMPLETE</span>
                        <div class = "details in">
                            <div class = "first-details" id = "ttlPayComplete">
                                RM 0.00
                            </div>
                            <div class = "second-details" id = "completeRecPayOut">
                                0 record
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "col-md-3">
                    <div class = "col-md-12 secondary-box">
                        <span class = "head">PENDING</span>
                        <div class = "details out">
                            <div class = "first-details" id = "ttlPayPending">
                                RM 0.00
                            </div>
                            <div class = "second-details" id = "pendingRecPayOut">
                                0 record
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "col-md-3">
                    <div class = "col-md-12 secondary-box">
                        <span class = "head">CANCEL</span>
                        <div class = "details out">
                            <div class = "first-details" id = "ttlPayCancel">
                                RM 0.00
                            </div>
                            <div class = "second-details" id = "cancelRecPayOut">
                                0 record
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class = "row space-bottom">
        <div class = "col-md-6">
            <div class = "col-md-12 third-box">
                <span class = "head">PAYMENT IN - BY USING</span>
                <div class = "details-chart" id = "chart-pie-clearance">

                </div>
            </div>
        </div>
        <div class = "col-md-6">
            <div class = "col-md-12 third-box">
                <span class = "head">PAYMENT OUT - BY USING</span>
                <div class = "details-chart" id = "chart-pie-refund">

                </div>
            </div>
        </div>
    </div>
    <div class = "row space-bottom">
        <div class = "col-md-12">
            <div class = "col-md-12 last-box">
                <span class = "head">MONTHLY PAYMENT OUT & IN</span>
                <div class = "details-chart" id = "chart-line">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('/assets/js/JsLibrary/canvasjs.min.js') }}"></script>
    <script src="{{ asset('/assets/js/main-dashboard.js') }}"></script>
    <!-- <script>
        $.ajax({
            url: "{{ route('main.dashboard') }}",
            type: "GET",
            dataType: "json",
            success: function(response) {
                
            },
            error: function(error) {
                console.log(error);
            }
        });
    </script> -->
@endsection
