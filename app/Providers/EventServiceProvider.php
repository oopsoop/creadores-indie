<?php namespace CreadoresIndie\Providers;

use CreadoresIndie\Events\DiscussionWasCreated;
use CreadoresIndie\Events\ReplyWasCreated;
use CreadoresIndie\Listeners\GenerateSocialPreview;
use CreadoresIndie\Listeners\NewDiscussion;
use CreadoresIndie\Listeners\NewReply;
use CreadoresIndie\Listeners\UserLoggedIn;
use CreadoresIndie\Listeners\UserRegistered;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            UserRegistered::class
        ],
        Login::class => [
            UserLoggedIn::class
        ],
        DiscussionWasCreated::class => [
            NewDiscussion::class,
            GenerateSocialPreview::class
        ],
        ReplyWasCreated::class => [
            NewReply::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
