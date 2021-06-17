<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>{{ $page ?? __('Help') }} | Rapportooze</title>

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('image/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" href="{{ asset('image/favicon.ico') }}">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<!-- Icons -->
<link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
<!-- CSS -->
<link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
<link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card bg-transparent">
            <div class="card-body bg-help d-flex flex-row justify-content-center">
                <div class="navbar-wrapper">
                    <!-- <div class="navbar-toggle d-inline">
                        <a type="a" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </a>
                    </div> -->
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img src="{{asset('/image/Rappportooze_R_no_background.png')}}" style="width:30px" alt="Rapportooze Logo">
                    </a>
                </div>
                <!-- <a href="{{ route('home') }}" class="btn btn-default btn-round">Cancel</a> -->
                <h2>Hi {{ $user->name}}!</h2> 
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h3 class="text-center">Using Rapportooze</h3>


                    <div class="acc-panel" id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4 class="text-left">Contact</h4> 
                            </a>
                        </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div id="accordion_child_1">
                                <div class="card bg-default">
                                    <div class="card-header" id="headingOne_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne_child" aria-expanded="true" aria-controls="collapseOne_child">
                                            <h4 class="text-left">Add a contact</h4> 
                                        </a>
                                    </h5>
                                    </div>

                                    <div id="collapseOne_child" class="collapse show" aria-labelledby="headingOne_child" data-parent="#accordion_child_1">
                                        <div class="card-body">
                                            <p>1. On the left sidebar, go to Contacts.</p>
                                            <p>2. At the top right, click Add contact.</p>
                                            <p>3. Enter the contact's info.</p>
                                            <p>4. Click Save or Save and add more.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header" id="headingTwo_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo_child" aria-expanded="false" aria-controls="collapseTwo_child">
                                        <h4 class="text-left">View and edit a contact</h4> 
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseTwo_child" class="collapse" aria-labelledby="headingTwo_child" data-parent="#accordion_child_1">
                                        <div class="card-body">
                                            <p>1. On the Contacts page, click on a contact to view their profile.</p>
                                            <p>2. At the top right, click edit contact.</p>
                                            <p>3. Edit the contact's info.</p>
                                            <p>4. Click Save.</p>      
                                            <p>5. To add and edit extra info.</p>   
                                            <p>6. At the left card, click on the <i class="fas fa-pen-square"></i> icon.</p> 
                                            <p>7. Add or edit the contact's extra info.</p>
                                            <p>8. Click Update.</p>                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header" id="headingThree_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree_child" aria-expanded="false" aria-controls="collapseThree_child">
                                        <h4 class="text-left">Delete a contact</h4> 
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseThree_child" class="collapse" aria-labelledby="headingThree_child" data-parent="#accordion_child_1">
                                        <div class="card-body">
                                            <p>1. On the bottom-most right, click Delete contact.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="text-left">Activity</h4> 
                            </a>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <div id="accordion_child_2">
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseTwo_headingOne_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo_collapseOne_child" aria-expanded="true" aria-controls="collapseTwo_collapseOne_child">
                                        <h4 class="text-left">Add an activity</h4> 
                                        </a>
                                    </h5>
                                    </div>

                                    <div id="collapseTwo_collapseOne_child" class="collapse show" aria-labelledby="collapseTwo_headingOne_child" data-parent="#accordion_child_2">
                                        <div class="card-body">
                                            <p>1. Go to the contact's profile.</p>
                                            <p>2. On the left card, click Add activity on the Activities card.</p>
                                            <p>3. Enter the activity's details.</p>
                                            <p>4. Click Save.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseTwo_headingTwo_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo_collapseTwo_child" aria-expanded="false" aria-controls="collapseTwo_collapseTwo_child">
                                        <h4 class="text-left">Update an activity</h4> 
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseTwo_collapseTwo_child" class="collapse" aria-labelledby="collapseTwo_headingTwo_child" data-parent="#accordion_child_2">
                                        <div class="card-body">
                                            <p>1. On the activity details, click on the  <i class="fas fa-edit"></i> icon.</p>
                                            <p>2. Edit the activity's details.</p>
                                            <p>3. Click Save.</p>                   
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseTwo_headingThree_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo_collapseThree_child" aria-expanded="false" aria-controls="collapseTwo_collapseThree_child">
                                        <h4 class="text-left">Delete an activity</h4> 
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseTwo_collapseThree_child" class="collapse" aria-labelledby="collapseTwo_headingThree_child" data-parent="#accordion_child_2">
                                        <div class="card-body">
                                            <p>1. On the activity details, click on the  <i class="far fa-trash-alt"></i> icon.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h4 class="text-left">Reminder</h4> 
                            </a>
                        </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div id="accordion_child_3">
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseThree_headingOne_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseThree_collapseOne_child" aria-expanded="true" aria-controls="collapseThree_collapseOne_child">
                                        <h4 class="text-left">Add a reminder</h4> 
                                        </a>
                                    </h5>
                                    </div>

                                    <div id="collapseThree_collapseOne_child" class="collapse show" aria-labelledby="collapseThree_headingOne_child" data-parent="#accordion_child_3">
                                        <div class="card-body">
                                            <p>1. Go to the contact's profile.</p>
                                            <p>2. On the left card, click Add reminder on the Reminders card.</p>
                                            <p>3. Enter the reminder's details.</p>
                                            <p>4. Click Save.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseThree_headingTwo_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree_collapseTwo_child" aria-expanded="false" aria-controls="collapseThree_collapseTwo_child">
                                        <h4 class="text-left">Update a reminder</h4> 
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseThree_collapseTwo_child" class="collapse" aria-labelledby="collapseThree_headingTwo_child" data-parent="#accordion_child_3">
                                        <div class="card-body">
                                            <p>1. On the reminder details, click on the  <i class="fas fa-edit"></i> icon.</p>
                                            <p>2. Edit the reminder's details.</p>
                                            <p>3. Click Save.</p>                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseThree_headingThree_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree_collapseThree_child" aria-expanded="false" aria-controls="collapseThree_collapseThree_child">
                                        <h4 class="text-left">Mark a reminder as complete</h4> 
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseThree_collapseThree_child" class="collapse" aria-labelledby="collapseThree_headingThree_child" data-parent="#accordion_child_3">
                                        <div class="card-body">
                                            <p>1. On the reminder details, click on the  <i class="fas fa-check-square"></i> icon.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <h4 class="text-left">Gift</h4> 
                            </a>
                        </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <div id="accordion_child_4">
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseFour_headingOne_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseFour_collapseOne_child" aria-expanded="true" aria-controls="collapseFour_collapseOne_child">
                                        <h4 class="text-left">Add a gift</h4> 
                                        </a>
                                    </h5>
                                    </div>

                                    <div id="collapseFour_collapseOne_child" class="collapse show" aria-labelledby="collapseFour_headingOne_child" data-parent="#accordion_child_4">
                                        <div class="card-body">
                                            <p>1. Go to the contact's profile.</p>
                                            <p>2. On the left card, click Add gift on the Gifts card.</p>
                                            <p>3. Enter the gift's details.</p>
                                            <p>4. Click Save.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseFour_headingTwo_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour_collapseTwo_child" aria-expanded="false" aria-controls="collapseFour_collapseTwo_child">
                                        <h4 class="text-left">Edit a gift</h4> 
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseFour_collapseTwo_child" class="collapse" aria-labelledby="collapseFour_headingTwo_child" data-parent="#accordion_child_4">
                                        <div class="card-body">
                                            <p>1. On the gift details, click on the  <i class="fas fa-edit"></i> icon.</p>
                                            <p>2. Edit the gift's details.</p>
                                            <p>3. Click Save.</p>                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseFour_headingThree_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour_collapseThree_child" aria-expanded="false" aria-controls="collapseFour_collapseThree_child">
                                        <h4 class="text-left">Delete a gift</h4> 
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseFour_collapseThree_child" class="collapse" aria-labelledby="collapseFour_headingThree_child" data-parent="#accordion_child_4">
                                        <div class="card-body">
                                            <p>1. On the gift details, click on the  <i class="far fa-trash-alt"></i> icon.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header d-block" id="headingFive">
                        <h5 class="mb-0">
                            <a class="btn btn-link collapsed " data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <h4 class="text-left">Debt</h4> 
                            </a>
                        </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                        <div class="card-body">
                            <div id="accordion_child_5">
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseFive_headingOne_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseFive_collapseOne_child" aria-expanded="true" aria-controls="collapseFive_collapseOne_child">
                                        <h4 class="text-left">Add a debt</h4> 
                                        </a>
                                    </h5>
                                    </div>

                                    <div id="collapseFive_collapseOne_child" class="collapse show" aria-labelledby="collapseFive_headingOne_child" data-parent="#accordion_child_5">
                                        <div class="card-body">
                                            <p>1. Go to the contact's profile.</p>
                                            <p>2. On the left card, click Add debt on the Gifts card.</p>
                                            <p>3. Enter the debt's details.</p>
                                            <p>4. Click Save.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseFive_headingTwo_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive_collapseTwo_child" aria-expanded="false" aria-controls="collapseFive_collapseTwo_child">
                                        <h4 class="text-left">View and edit a debt</h4> 
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseFive_collapseTwo_child" class="collapse" aria-labelledby="collapseFive_headingTwo_child" data-parent="#accordion_child_5">
                                        <div class="card-body">
                                            <p>1. On the debt details, click on the  <i class="fas fa-edit"></i> icon.</p>
                                            <p>2. Edit the debt's details.</p>
                                            <p>3. Click Save.</p>                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseFive_headingThree_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive_collapseThree_child" aria-expanded="false" aria-controls="collapseFive_collapseThree_child">
                                        <h4 class="text-left">Mark a debt as complete</h4> 
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseFive_collapseThree_child" class="collapse" aria-labelledby="collapseFive_headingThree_child" data-parent="#accordion_child_5">
                                        <div class="card-body">
                                            <p>1. On the debt details, click on the  <i class="fas fa-check-square"></i> icon.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingSix">
                        <h5 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <h4 class="text-left">Life event and Timeline</h4> 
                            </a>
                        </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                        <div class="card-body">

                        <div id="accordion_child_6">
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseSix_headingOne_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseSix_collapseOne_child" aria-expanded="true" aria-controls="collapseSix_collapseOne_child">
                                        <h4 class="text-left">Add a life event to the timeline</h4> 
                                        </a>
                                    </h5>
                                    </div>

                                    <div id="collapseSix_collapseOne_child" class="collapse show" aria-labelledby="collapseSix_headingOne_child" data-parent="#accordion_child_6">
                                        <div class="card-body">
                                            <p>1. Go to the contact's profile.</p>
                                            <p>2. On the left bottom orange tab, click on Timeline.</p>
                                            <p>3. Click on Add a new life event a.</p>
                                            <p>4. Enter the life event's details.</p>
                                            <p>5. Click Add to Contact's timeline.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseSix_headingTwo_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix_collapseTwo_child" aria-expanded="false" aria-controls="collapseSix_collapseTwo_child">
                                        <h4 class="text-left">View or edit a life event</h4> 
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseSix_collapseTwo_child" class="collapse" aria-labelledby="collapseSix_headingTwo_child" data-parent="#accordion_child_6">
                                        <div class="card-body">
                                            <p>1. On the left bottom orange tab, click on Timeline to view the contact's timeline.</p>
                                            <p>2. To edit, click on Edit.</p>
                                            <p>3. Edit the life event's details.</p>
                                            <p>4. Click Update life event.</p>                           
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header" id="collapseSix_headingThree_child">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix_collapseThree_child" aria-expanded="false" aria-controls="collapseSix_collapseThree_child">
                                        <h4 class="text-left">Delete a life event</h4> 
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseSix_collapseThree_child" class="collapse" aria-labelledby="collapseSix_headingThree_child" data-parent="#accordion_child_6">
                                        <div class="card-body">
                                            <p>1. On invidual life event, click on Delete.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
<script src="{{ asset('black') }}/js/core/popper.min.js"></script>
<script src="{{ asset('black') }}/js/core/bootstrap.min.js"></script>
<script src="{{ asset('black') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<!-- Place this tag in your head or just before your close body tag. -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
<!-- Chart JS -->
{{-- <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script> --}}
<!--  Notifications Plugin    -->
<script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>

<script src="{{ asset('black') }}/js/black-dashboard.min.js?v=1.0.0"></script>
<script src="{{ asset('black') }}/js/theme.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
<script src="{{ asset('js/dataTables.js') }}"></script>
<script src="https://kit.fontawesome.com/9d3ccc59e0.js" crossorigin="anonymous"></script>
@stack('js')
