<?php namespace App\Http\Controllers\WebAdmin;

use App\Models\WebAdmin;
use App\Http\Controllers\WebAdmin\BaseController;
use App\Http\Requests\WebAdmin\ADMloginRequest;

class ADMloginController extends BaseController {
    public function __invoke(ADMloginRequest $request) {
        /** @var WebAdmin $user */
        $username = $request->username;
        $password = $request->password;
        return $this->service->postLogin($username, $password);
    }
}
