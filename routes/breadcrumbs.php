<?php // routes/breadcrumbs.php

use App\Models\Debt;
use App\Models\Gift;
use App\Models\Contact;
use App\Models\Activity;
use App\Models\Reminder;
use App\Models\LifeEvent;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('home'));
});

// Home > Contact
Breadcrumbs::for('contact.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Contacts', route('contact.index'));
});

Breadcrumbs::for('home.help', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Help', route('home.help'));
});

// Home > [profile]
Breadcrumbs::for('profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('User Profile', route('profile.edit'));
});

// Contact > Create
Breadcrumbs::for('contact.create', function (BreadcrumbTrail $trail) {
    $trail->parent('contact.index');
    $trail->push('Create Contact', route('contact.create'));
});

// Home > Contact > [Name]
Breadcrumbs::for('contact.show', function (BreadcrumbTrail $trail, Contact $contact) {
    $trail->parent('contact.index');
    $trail->push($contact->first_name.' '.$contact->last_name, route('contact.show', $contact));
});

// Home > Contact > [Category]
Breadcrumbs::for('contact.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('contact.show', $id);
    $trail->push('Edit Info', route('contact.edit', $id));
});

// Home > Contact > Extra
Breadcrumbs::for('extra.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('contact.show', $id);
    $trail->push('Edit Extras', route('extra.edit', $id));
});

// Contact > Activity
Breadcrumbs::for('activity.create', function (BreadcrumbTrail $trail, Contact $contact) {
    $trail->parent('contact.show', $contact);
    $trail->push('Activity', route('activity.create', $contact));
});

// Contact > Edit Activity
Breadcrumbs::for('activity.edit', function (BreadcrumbTrail $trail, Contact $contact, Activity $activity) {
    $trail->parent('contact.show', $contact);
    $trail->push('Edit Activity', route('activity.edit', [$contact, $activity]));
});

// Contact > Reminder
Breadcrumbs::for('reminder.create', function (BreadcrumbTrail $trail, Contact $contact) {
    $trail->parent('contact.show', $contact);
    $trail->push('Reminder', route('reminder.create', $contact));
});

// Contact > Edit Reminder
Breadcrumbs::for('reminder.edit', function (BreadcrumbTrail $trail, Contact $contact, Reminder $reminder) {
    $trail->parent('contact.show', $contact);
    $trail->push('Edit Reminder', route('reminder.edit', [$contact, $reminder]));
});

// Contact > Gift
Breadcrumbs::for('gift.create', function (BreadcrumbTrail $trail, Contact $contact) {
    $trail->parent('contact.show', $contact);
    $trail->push('Gift', route('gift.create', $contact));
});

// Contact > Edit Gift
Breadcrumbs::for('gift.edit', function (BreadcrumbTrail $trail, Contact $contact, Gift $gift) {
    $trail->parent('contact.show', $contact);
    $trail->push('Edit Gift', route('gift.edit', [$contact, $gift]));
});

// Contact > Debt
Breadcrumbs::for('debt.create', function (BreadcrumbTrail $trail, Contact $contact) {
    $trail->parent('contact.show', $contact);
    $trail->push('Debt', route('debt.create', $contact));
});

// Contact > Edit Debt
Breadcrumbs::for('debt.edit', function (BreadcrumbTrail $trail, Contact $contact, Debt $debt) {
    $trail->parent('contact.show', $contact);
    $trail->push('Edit Debt', route('debt.edit', [$contact, $debt]));
});

// Contact > Contact Avatar
Breadcrumbs::for('avatar.select', function ($trail, $id) {
    $trail->parent('contact.show', $id);
    $trail->push('Avatar', route('avatar.select', $id));
});

// Contact > User Avatar
Breadcrumbs::for('user_avatar.select', function ($trail) {
    $trail->parent('profile.edit');
    $trail->push('Your Avatar', route('user_avatar.select'));
});

// Contact > Life event
Breadcrumbs::for('life-event.create', function (BreadcrumbTrail $trail, Contact $contact) {
    $trail->parent('contact.show', $contact);
    $trail->push('Life Event', route('life-event.create', $contact));
});

// Contact > Edit Life event
Breadcrumbs::for('life-event.edit', function (BreadcrumbTrail $trail, Contact $contact, LifeEvent $lifeEvent) {
    $trail->parent('contact.show', $contact);
    $trail->push('Edit Life Event', route('life-event.edit', [$contact, $lifeEvent]));
});
