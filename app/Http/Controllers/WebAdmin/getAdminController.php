<?php namespace App\Http\Controllers\WebAdmin;

use App\Models\WebAdmin;
use App\Http\Controllers\WebAdmin\BaseController;

class getAdminController extends BaseController{
    public function __invoke() {
        /** @var WebAdmin $admin */
        $user = auth()->user();
        return $this->service->getWebAdminInformation($user);
    }
}
