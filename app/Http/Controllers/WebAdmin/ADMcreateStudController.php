<?php namespace App\Http\Controllers\WebAdmin;

use App\Models\WebAdmin;
use App\Http\Controllers\WebAdmin\BaseController;
use App\Http\Requests\WebAdmin\ADMcreateStudRequest;


class ADMcreateStudController extends BaseController {
    public function __invoke(ADMcreateStudRequest $request) {
        /** @var WebAdmin $user */
        return $this->service->postCreateStudent($request);
    }
}

