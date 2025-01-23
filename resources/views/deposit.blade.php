@extends('layout.app')

@section('content')
<!-- Row start -->
<div class="row gx-3">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-6 col-12">

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif


                    <div class="input-group mb-1">
                        <label class="input-group-text" for="inputGroupSelect01">Deposit To</label>
                        <select class="form-select" id="inputGroupSelect01">
                        <option value="10165">Wallet 10165</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <!--------------------------- PART PAYEMENT START ---------------------------------------->
        <div class="row gx-3">
            @if (isset($data) && count($data) > 0)
                @foreach ($data as $index => $item2)
                    <div class="col-sm-3 col-12">
                        <!-- Card start -->
                        <div class="card">
                            <div class="card-body">
                                <div class="m-0 text-center">
                                    <!-- Hidden radio button -->
                                    <input type="radio" id="option-{{ $index }}" name="payment_option" value="{{ $item2['id'] ?? '' }}" class="d-none">

                                    <!-- Label for the image -->
                                    <label for="option-{{ $index }}" class="image-label">
                                        <img src="https://my.vestrado.com/{{ $item2['logo'] ?? 'N/A' }}"
                                            width="100px"
                                            height="100px"
                                            alt="{{ $item2['displayName'] ?? 'N/A' }}"
                                            title="{{ $item2['displayName'] ?? 'N/A' }}">
                                    </label>
                                    <p>{{ $item2['displayName'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Card end -->
                    </div>
                @endforeach
            @else
            <p>No agreements data available.</p>
            @endif
        </div>
        <!--------------------------- PART PAYEMENT END ---------------------------------------->
        <div class="card">
            <div class="card-body">
                <div class="col-sm-6 col-12">


                    <div class="input-group mb-1">
                        <input type="submit" name="submit" value="Continue" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->

@endsection

@section('js')
<script>
    document.querySelectorAll('input[name="payment_option"]').forEach((radio) => {
        radio.addEventListener('change', (event) => {
            const selectedValue = event.target.value;
            console.log('Selected Payment Option ID:', selectedValue);
            // Add custom logic here, such as updating a hidden form field
        });
    });
    </script>
@endsection

