<?php

namespace App\Providers;

use App\Validators\MinhaRegraPersonalizada;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        FacadesValidator::extend('minordate','\App\Validators\MinorDateThat@validate');
        FacadesValidator::extend('cpf','\App\Validators\Cpf@validate');
    }

}
