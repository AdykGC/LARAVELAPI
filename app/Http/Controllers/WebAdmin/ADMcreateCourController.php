<?php namespace App\Http\Controllers\WebAdmin;

use App\Models\WebAdmin;
use App\Http\Controllers\WebAdmin\BaseController;
use App\Http\Requests\WebAdmin\ADMcreateCourRequest;


class ADMcreateCourController extends BaseController {
    public function __invoke(ADMcreateCourRequest $request) {
        /** @var WebAdmin $user */
        return $this->service->postCreateCourse($request);
    }
}
