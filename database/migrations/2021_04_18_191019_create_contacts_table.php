<?php

use App\Models\Contact\Reminder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genders', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->char('type', 1)->nullable();
            $table->timestamps();
        });

        Schema::create('photos', function (Blueprint $table) {
            $table->id('id');
            $table->string('file_image');
            $table->integer('file_size')->nullable();
            $table->string('content_extension')->nullable();
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nickname')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->string('description')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('relation_to_contact', ['friend', 'family', 'business'])->nullable();
            $table->enum('relationship_status', ['married', 'single', 'dates', 'other'])->nullable();
            $table->string('birthdate_guess')->default('false')->nullable();
            $table->dateTime('birthdate')->nullable();
            $table->timestamp('last_consulted_at')->nullable();
            $table->dateTime('first_met')->nullable();
            $table->longText('first_met_info')->nullable();
            $table->string('job')->nullable();
            $table->string('company')->nullable();
            $table->dateTime('last_talked_to')->nullable();
            $table->longText('favourite_food')->nullable();
            $table->integer('number_of_activities')->default(0);
            $table->integer('number_of_gifts_ideas')->default(0);
            $table->integer('number_of_gifts_received')->default(0);
            $table->integer('number_of_gifts_offered')->default(0);
            $table->integer('number_of_tasks')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contact_id');
            $table->string('name')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::create('special_dates', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contact_id');
            $table->date('date');
            $table->integer('reminder_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::create('contact_photo', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_id');
            $table->unsignedBigInteger('photo_id');
            $table->timestamps();

            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::create('reminders', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contact_id');
            $table->boolean('is_birthday');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->dateTime('reminder_date');
            $table->string('frequency_type');
            $table->integer('frequency_number')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::create('important_dates', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['contact', 'entity']);
            $table->unsignedBigInteger('contact_id');
            $table->dateTime('date_to_remember');
            $table->string('description');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::create('gifts', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contact_id');
            $table->string('name');
            $table->longText('note')->nullable();
            $table->longText('url')->nullable();
            $table->string('currency')->nullable();
            $table->string('price')->nullable();
            $table->string('photo')->nullable();
            $table->string('status', 8)->default('idea');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::create('gift_photo', function (Blueprint $table) {
            $table->unsignedBigInteger('photo_id');
            $table->unsignedBigInteger('gift_id');
            $table->timestamps();

            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->foreign('gift_id')->references('id')->on('gifts')->onDelete('cascade');

            $table->primary(['photo_id', 'gift_id']);
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contact_id');
            $table->string('summary');
            $table->longText('detail')->nullable();
            $table->dateTime('happened_at');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::create('activity_contact', function (Blueprint $table) {
            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('contact_id');

            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::create('activity_statistics', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contact_id');
            $table->integer('year');
            $table->integer('count');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::create('debts', function ($table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contact_id');
            $table->string('in_debt')->default('no');
            $table->string('status')->default('inprogress');
            $table->string('currency');
            $table->string('amount');
            $table->longText('reason')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::create('life_events', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contact_id');
            $table->unsignedBigInteger('reminder_id');
            $table->string('name')->nullable();
            $table->mediumText('note')->nullable();
            $table->dateTime('happened_at');
            $table->boolean('happened_at_month_unknown')->default(false);
            $table->boolean('happened_at_day_unknown')->default(false);
            $table->text('specific_information')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->foreign('reminder_id')->references('id')->on('reminders')->onDelete('cascade');
        });

        Schema::create('pet_types', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->boolean('is_common');
            $table->timestamps();
        });

        Schema::create('pets', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contact_id');
            $table->string('pet_type');
            $table->string('name')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->boolean('completed')->default(0);
            $table->dateTime('completed_at')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::create('statistics', function (Blueprint $table) {
            $table->id('id');
            $table->integer('number_of_users');
            $table->integer('number_of_contacts');
            $table->integer('number_of_addresses');
            $table->integer('number_of_reminders');
            $table->integer('number_of_tasks');
            $table->integer('number_of_activities');
            $table->integer('number_of_gifts');
            $table->integer('number_of_debts');
            $table->timestamps();
        });

        DB::table('pet_types')->insert(['name' => 'Cat', 'is_common' => true]);
        DB::table('pet_types')->insert(['name' => 'Dog', 'is_common' => true]);
        DB::table('pet_types')->insert(['name' => 'Fish', 'is_common' => true]);
        DB::table('pet_types')->insert(['name' => 'Hamster', 'is_common' => false]);
        DB::table('pet_types')->insert(['name' => 'Bird', 'is_common' => false]);
        DB::table('pet_types')->insert(['name' => 'Rabbit', 'is_common' => false]);
        DB::table('pet_types')->insert(['name' => 'Other', 'is_common' => false]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts', 'genders', 'addresses', 'special_dates', 'photos', 'contact_photo', 'reminders', 'important_dates', 'gifts', 'gift_photo', 'activities', 'activity_photo', 'activity_statistics', 'debts', 'life_events', 'pets', 'pet_types', 'tasks', 'statistics');
    }
}
