<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Events\BreadDataTypeRegistered;
use App\Actions\MarkOrderShipped;

class VoyagerBreadActionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        \Event::listen(BreadDataTypeRegistered::class, function ($event) {
            if ($event->dataType->slug === 'orders') {
                $event->dataType->addAction(MarkOrderShipped::class);
            }
        });
    }

    public function register()
    {
        //
    }
}
