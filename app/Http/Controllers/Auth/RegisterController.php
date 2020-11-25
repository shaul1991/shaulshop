<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\UserRegister\Dto\UserRegisterDto;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function register(AuthRegisterRequest $request)
    {
        $UserRegisterDto = new UserRegisterDto(
            $request->get('name'),
            $request->get('email'),
            $request->get('password'),
            $request->get('phone_number')
        );

        event(new Registered($user = $this->create($UserRegisterDto)));

        $this->guard()->login($user);

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * @param UserRegisterDto $UserRegisterDto
     * @return mixed
     */
    protected function create(UserRegisterDto $UserRegisterDto)
    {
        return User::create(
            [
                'name' => $UserRegisterDto->getName(),
                'email' => $UserRegisterDto->getEmail(),
                'password' => $UserRegisterDto->getPassword(),
                'phone_number' => $UserRegisterDto->getPhoneNumber(),
            ]
        );
    }
}
