<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use App\Models\Evaluacion;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Styde\Html\Facades\Alert;
use Validator;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $date = Carbon::now()->toDateString();
        $evaluacion = Evaluacion::whereDate('fecha_inicio','<=',$date)->whereDate('fecha_fin','>=',$date)->get();
        if ($evaluacion->count()>0) {
            return Validator::make($data, [
                'dni' => 'required|max:8|unique:users,dni',
                'password' => 'required|min:6|confirmed',
            ]);
        }else{
            return Validator::make($data, [
                'dni' => 'accepted',
            ],[
                'dni.accepted'=>'La inscripcion no esta habilitada'
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $role = Catalogo::Table('ROLES')->where('codigo','alum')->first();
        return User::create([
            'dni' => $data['dni'],
            'password' => $data['password'],
            'activo' => true,
            'idrole'=>$role->id
        ]);


    }
}
