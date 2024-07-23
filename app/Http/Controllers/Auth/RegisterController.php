<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;

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

 
     // Mostra o formulário de registro
     public function showRegistrationForm()
     {
         return view('auth.register');
     }
 
     // Realiza o registro do usuário
     public function register(Request $request)
     {
         // Valida os dados do formulário
         $this->validator($request->all())->validate();
 
         // Cria um novo usuário
         $this->create($request->all());
 
         // Faz o login do usuário recém-criado
         Auth::attempt($request->only('email', 'password'));
 
         // Redireciona para a página de tarefas após o login
         return redirect()->intended('tasks');
     }
 
     // Valida os dados do formulário de registro
     protected function validator(array $data)
     {
         return Validator::make($data, [
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
         ]);
     }
 
     // Cria um novo usuário no banco de dados
     protected function create(array $data)
     {
         return User::create([
             'name' => $data['name'],
             'email' => $data['email'],
             'password' => Hash::make($data['password']),
         ]);
     }
}
