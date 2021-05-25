@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<div class="d-flex justify-content-lg-center">
    <div class="col" style="max-width: 45rem;">
        <div class="card card-user">
            <p class="card-text">
                <div class="author">
                <div class="block block-one"></div>
                <div class="block block-two"></div>
                <!-- <div class="block block-three"></div> -->
                </div>
                <div class="row mb-2 d-flex align-items-end justify-content-center">
                    <div class="col-auto mb-1">
                        <a href="#">
                            <img class="avatar-debt" src="{{ asset('black') }}/img/anime3.png" alt="">
                        </a>
                    </div>
                    <div class="col-auto">
                        <h2 class="title">{{$contact->first_name}} {{$contact->middle_name}} {{$contact->last_name}} @if(!empty($contact->nickname)) ({{$contact->nickname}}) @else @endif</h2>
                    </div>
                </div>
                <div class="row text-center mb-3">
                    <p class="col description">
                        <i class="border rounded-circle p-2 mx-2 fas fa-dollar-sign"></i>
                        <strong>Debts you owe or owed</strong>
                    </p>
                </div>
            </p>
        </div>
    </div>  
</div>
<hr class="dashed">
<div class="d-flex justify-content-center mt-5">
    <form action="{{ route('debt.store', $contact) }}" method="POST">
        {{csrf_field()}}
    
        <div class="card" style="max-width: 38rem; min-width: 29rem;">
            <div class="card-body text-center mt-2">
                <div class="row">
                    <div class="col-auto">
                        <a href="{{ route('contact.show', $contact->id) }}"><i class="fas fa-angle-left fa-2x"></i></a>
                    </div>
                    <div style="margin-top: -2.5px;">
                        <h3>Debt</h3>
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-around mb-4">
                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="debt_options" value="yes" checked>
                                Do you owe {{ $contact->first_name }}?
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="debt_options" value="no">
                            Do {{ $contact->first_name }} owes you?
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </div>
                
                <label for="amount"><p><strong>How much are the debt?</strong><small class="font-size:5px;">*You may change the currency</small></p></label>
                
                <div class="mb-3 d-flex justify-content-center">
                    <div class="dropdown col-auto d-inline">
                        <select name="currency" id="currency" class="form-control">
                            <!-- <option class="dropdown-item" value="">MYR</option> -->
                            @foreach ($currencies as $currency)
                                <option class="dropdown-item" value="{{ $currency->iso_code }}">{{ $currency->iso_code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="number" step="0.01" class="col-4 form-control d-inline" name="amount" id="amount" placeholder="Value . . ." >
                </div>

                <div class="mb-3">
                    <textarea type="text" class="form-control rounded px-2" value="" name="reason" id="reason" placeholder="Notes . . . (Optional)"></textarea>
                </div>
            </div>
        </div>
        <div class="col-xl-auto d-flex flex-column align-items-center">
            <div class="mb-2 mt-auto">
                <button class="btn btn-primary btn-round">Add debt</button>
            </div>
            <div>
                <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-default btn-round">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection