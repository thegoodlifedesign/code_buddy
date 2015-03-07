<?php namespace ThreeAccents\Auth\Http\Controllers;

use Illuminate\Bus\Dispatcher;
use Illuminate\Contracts\Auth\Guard;
use ThreeAccents\Auth\Commands\UserLogInCommand;
use ThreeAccents\Auth\Commands\UserRegisterCommand;
use ThreeAccents\Auth\Http\Requests\LoginRequest;
use ThreeAccents\Auth\Http\Requests\RegisterRequest;
use ThreeAccents\Core\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * @param RegisterRequest $request
     * @param Dispatcher $dispatcher
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegister(RegisterRequest $request)
    {
        $this->dispatchFrom(UserRegisterCommand::class, $request);

        dd('nope');

        return redirect()->route('login');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            $this->dispatchFrom(UserLogInCommand::class, $request);

            return redirect()->intended('/'.$this->auth->user()->username);
        }

        return redirect()
            ->back()
            ->withInput($request->only('username', 'remember'))
            ->withErrors([
                'email' => 'These credentials do not match our records.',
            ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/');
    }
}