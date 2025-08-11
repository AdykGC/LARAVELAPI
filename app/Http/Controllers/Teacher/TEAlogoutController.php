<?php namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use App\Http\Controllers\Teacher\BaseController;
use Illuminate\Http\Request;

class TEAlogoutController extends BaseController {
    public function __invoke(Request $request){
        /** @var Teacher $user */
        return $this->service->postLogout($request);
        
    }
}