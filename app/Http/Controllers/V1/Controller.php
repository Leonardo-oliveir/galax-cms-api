<?php

namespace App\Http\Controllers\V1;

use App\Facades\Auth\DataBaseFacade;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $business;
    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        $class = '\App\Business\\' . str_replace('App\Http\Controllers\\', '', get_class($this));
        $class = str_replace('Controller', '', $class);
        if (class_exists($class)) {
            $this->business = new $class();
        }
    }

    public function test()
    {
        dd(DataBaseFacade::getId());
        return ['bool' => 'true'];
    }
}
