<?php namespace App\Http\ViewComposers;

use App\Models\Admin;
use App\Models\ContactUs;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;


class AdminLoginComposer extends Controller {

    public function __construct() {}

    public function adminLogin(View $view) {
        $id = $this->authAdmin()->id;
        $option = Setting::where('status', 1)->firstOrFail();
        $admin_info = Admin::find($id);

        $message = ContactUs::where('view', 0)->count();

        $view->with('option', $option);
        $view->with('admin_info', $admin_info);
        $view->with('message', $message);
    }
}
