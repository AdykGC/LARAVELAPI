<?php namespace App\Http\Controllers\WebAdmin;

use App\Models\WebAdmin;
use App\Http\Controllers\WebAdmin\BaseController;
use App\Http\Requests\WebAdmin\ADMregisterRequest;

class ADMregisterController extends BaseController {
    public function __invoke(ADMregisterRequest $request) {
        /** @var WebAdmin $user */
        return $this->service->postRegister($request->full_name, $request->email, $request->phone, $request->username, $request->password);
    }
}
