<?php namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use App\Http\Controllers\Teacher\BaseController;
use App\Http\Requests\Teacher\loginRequest;

class TEAloginController extends BaseController {
    public function __invoke(loginRequest $request){
        /** @var Teacher $user */
        $teac_email = $request->teac_email;
        $password = $request->password;
        return $this->service->postLogin($teac_email, $password);
    }
}