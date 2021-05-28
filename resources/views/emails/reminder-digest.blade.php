@component('mail::message')
# Upcoming reminders.

Hey there! You have some reminders to follow up.

@component('mail::table')
|Reminder|Contact|Date|
|:-------|:------|:---|
@foreach($reminders as $reminder)
|{{$reminder['title']}}|{{$reminder['contact']['first_name']}} {{$reminder['contact']['last_name']}}|{{date('j F Y', strtotime( $reminder['reminder_date'] ))}}
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}

You don't have to reply to this email.
@endcomponent


