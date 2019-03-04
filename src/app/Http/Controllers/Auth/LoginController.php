<?php
namespace Omatech\Mage\App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use AuthenticatesUsers;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('mage::pages.auth.login');
    }

    public function redirectTo()
    {
        return route(config('mage.on_login_to_route'));
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     *
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|email|string',
            'password' => 'required|string',
        ], [
            'email.required' => __('mage.auth.validations.email.required'),
            'email.string' => __('mage.auth.validations.email.string'),
            'email.email' => __('mage.auth.validations.email.email'),
            'password.required' => __('mage.auth.validations.password.required'),
            'password.string' => __('mage.auth.validations.password.string'),
        ]);
    }
}
