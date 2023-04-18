<?php

namespace Nevadskiy\Quill;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

class QuillServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Nova::serving(function () {
            Nova::script('nova-quill-field', __DIR__.'/../dist/js/field.js');
        });
    }
}
