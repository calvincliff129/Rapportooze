
<div style="margin-top: -2rem">
    <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
            <p class="card-text">
                <a href="{{ route('life-event.create', $contact->id) }}" class="btn btn-sm btn-round d-inline" style="font-size: 0.8em;">
                    <i class="position-absolute translate-middle fas fa-plus-circle" style="font-size: 2.1em; margin-left: -1rem; color: blueviolet;"></i> 
                    &nbsp;&nbsp;&nbsp;&nbsp; Add a new life event
                </a>
            </p>
            <p>
                <strong>{{ $contact->first_name }} {{ $contact->last_name }}'s Timeline</strong>
            </p>
        </div>
    </div>
    <hr class="wide" style="margin-top: -0.2rem">
    @if ( !$lifeEvents->isEmpty() )
        <div class="card border border-default bg-transparent timeline">
            <div class="timeline__wrap">
                <div class="timeline__items">
                    @foreach($lifeEvents as $lifeEvent)
                        <div class="timeline__item my-3">
                            <div class="card-body timeline__content bg-transparent border border-info">
                                <h5 class="card-title">• {{ date('j M Y', strtotime($lifeEvent->happened_at)) }}</h5>
                                <p class="badge bg-default text-wrap mb-3">{{ $lifeEvent->name }}</p>
                                @if (!empty( $lifeEvent->note ))
                                    <div>
                                        {{ $lifeEvent->note }}
                                    </div>   
                                @endif
                                <div class="d-flex">
                                    <a href="{{ route('life-event.edit', [$contact->id, $lifeEvent->id]) }}" class="btn btn-success btn-link"><small>Edit</small></a>
                                    <form action="{{ route('life-event.destroy', [$contact->id, $lifeEvent->id]) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button class="btn btn-warning btn-link"><small>Delete</small></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <p class="card-text text-center">Nothing here yet . . .</p>
    @endif
</div>
