@extends('layouts.user', ['pageSlug' => 'dashboard'])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card" style="border-radius: 1rem;">
            <div class="card-body mb-3">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-3" style="min-width=3rem">
                            <p class="card-title mb-4">Contacts</p>
                            <span class="bg-success border-0 rounded p-1 px-4">
                                <strong>{{ $contactsCount }}</strong>
                            </span>
                        </div>
                        <div class="col-3">
                            <p class="card-title mb-4">Debts</p>
                            <span class="bg-success border-0 rounded p-1 px-4">
                                <strong>{{ $debtsCount }}</strong>
                            </span>
                        </div>
                        <div class="col-3">
                            <p class="card-title mb-4">Gifts</p>
                            <span class="bg-success border-0 rounded p-1 px-4">
                                <strong>{{ $giftsCount }}</strong>
                            </span>
                        </div>
                        <div class="col-3" style="min-width=3rem">
                            <p class="card-title mb-4">Activities</p>
                            <span class="bg-success border-0 rounded p-1 px-4">
                                <strong>{{ $activitiesCount }}</strong>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
<div class="row justify-content-center mt-4">
    <div class="col-md-4">
        <div class="card" style="border-radius: 1rem;">
            <div class="card-body">
                <p class="card-text text-center title">Upcoming reminders</p>
                <hr class="bold mb-3">
                <div class="py-2">
                    <div class="badge bg-primary text-wrap text-uppercase mb-2" style="width: 6rem; font-size: 0.8rem;">
                    <strong>{{ date('M Y', strtotime($month)) }}</strong>
                    </div>
                    <div class="card-body">
                        @if (!$reminderMonth->isEmpty())
                            @foreach ($reminderMonth as $reminders)
                                <p class="card-text">• <strong class="text-uppercase badge bg-default text-wrap my-2" style="width: 4rem">{{ date('j F', strtotime( $reminders->reminder_date )) }}</strong> &nbsp;&nbsp; {{ $reminders->title }}
                                    &nbsp;-
                                    @foreach ($contacts as $contact) 
                                        <a href="{{ route('contact.show', $contact->id) }}">
                                            @if ($reminders->contact_id == $contact->id) 
                                                {{ $contact->first_name }} {{ $contact->last_name }} 
                                            @endif
                                        </a>
                                    @endforeach
                                </p>
                            @endforeach
                            @if (count($reminderMonth) >= 5)
                                <small class="d-flex">&nbsp;&nbsp;&nbsp; . . . and more .</small> 
                            @endif
                        @else
                            <p class="card-text">...</p>
                        @endif
                    </div>
                </div>
                <div class="py-2">
                    <div class="badge bg-primary text-wrap text-uppercase mb-2" style="width: 6rem; font-size: 0.8rem;">
                        <strong>{{ date('M Y', strtotime($monthTwo)) }}</strong>
                    </div>
                    <div class="card-body">
                        @if (!$reminderMonthTwo->isEmpty())
                            @foreach ($reminderMonthTwo as $reminders)
                                <p class="card-text">• <strong class="text-uppercase badge bg-default text-wrap my-2" style="width: 4rem">{{ date('j F', strtotime( $reminders->reminder_date )) }}</strong> &nbsp;&nbsp; {{ $reminders->title }}
                                    &nbsp;-
                                    @foreach ($contacts as $contact) 
                                        <a href="{{ route('contact.show', $contact->id) }}">
                                            @if ($reminders->contact_id == $contact->id) 
                                                {{ $contact->first_name }} {{ $contact->last_name }} 
                                            @endif
                                        </a>
                                    @endforeach
                                </p>
                            @endforeach
                            @if (count($reminderMonthTwo) >= 5)
                                <small class="d-flex">&nbsp;&nbsp;&nbsp; . . . and more .</small> 
                            @endif
                        @else
                            <p class="card-text">...</p>
                        @endif
                    </div>
                </div>
                <div class="py-2">
                    <div class="badge bg-primary text-wrap text-uppercase mb-2" style="width: 6rem; font-size: 0.8rem;">
                        <strong>{{ date('M Y', strtotime($monthThree)) }}</strong>
                    </div>
                    <div class="card-body">
                        @if (!$reminderMonthThree->isEmpty())
                            @foreach ($reminderMonthThree as $reminders)
                                <p class="card-text">• <strong class="text-uppercase badge bg-default text-wrap my-2" style="width: 4rem">{{ date('j F', strtotime( $reminders->reminder_date )) }}</strong> &nbsp;&nbsp; {{ $reminders->title }}
                                    &nbsp;-
                                    @foreach ($contacts as $contact) 
                                        <a href="{{ route('contact.show', $contact->id) }}">
                                            @if ($reminders->contact_id == $contact->id) 
                                                {{ $contact->first_name }} {{ $contact->last_name }} 
                                            @endif
                                        </a>
                                    @endforeach
                                </p>
                            @endforeach
                            @if (count($reminderMonthThree) >= 5)
                                <small class="d-flex">&nbsp;&nbsp;&nbsp; . . . and more .</small> 
                            @endif
                        @else
                            <p class="card-text">...</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col">
    </div> -->
    <div class="col-md-4">
        <div class="card mb-5" style="border-radius: 1rem;">
            <div class="card-body">
                <p class="card-text text-center title">Last visited profile . . .</p>
                <hr class="bold mb-3">
                <p class="card-text">. . .</p>
            </div>
        </div>
        <div class="card" style="border-radius: 1rem;">
            <div class="card-body">
                <p class="card-text text-center title">Recent occasions . . .</p>
                <hr class="bold mb-4">
                @if (!$recentOccassions->isEmpty())
                    @foreach ($recentOccassions as $key=>$recentOcc)
                        <p class="card-text"> <strong class="text-uppercase badge bg-default text-wrap mb-3" style="width: 1.7rem">{{ ++$key }}.</strong> &nbsp;&nbsp; "{{ $recentOcc->summary }}" with 
                            @foreach ($contacts as $contact)
                                <a href="{{ route('contact.show', $contact->id) }}">
                                    @if ($recentOcc->contact_id == $contact->id) 
                                        {{ $contact->first_name }} {{ $contact->last_name }} 
                                    @endif
                                </a>
                            @endforeach
                            on <strong class="fs-italic">{{ date('j F Y', strtotime( $recentOcc->happened_at )) }}</strong>
                        </p>
                    @endforeach
                    @if (count($recentOccassions) >= 5)
                        <small class="d-flex">&nbsp;&nbsp;&nbsp; . . . and more .</small> 
                    @endif
                @else
                    <p class="card-text">...</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
