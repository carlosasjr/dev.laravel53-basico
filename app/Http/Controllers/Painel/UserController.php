<?php

namespace App\Http\Controllers\Painel;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Location;

class UserController extends Controller
{
    public function index()
    {

        //traz os dados da localização a partir do user
        /*  $user = User::find(1);

        $location = $user->location;
        $longitude = $location->longitude;
        $latitude = $location->latitude;*/

        // dd($user['name'], $longitude, $latitude);

        //Usando o with para fazer apenas uma consulta ao banco e retornar user e location
        $user = User::with('location')->find('1');
        $nome = $user->name;
        $latitude = $user->location->latitude;
        $longitude = $user->location->longitude;

       // dd($nome, $latitude, $longitude);

        //traz os dados do user a partir do location
        $location = Location::where('latitude', '=', '123')
            ->where('longitude', '=', '321')
            ->first();

        $user = $location->user->email;

        dd($user);
    }

    public function saveLocation(Request $request)
    {
       //Relacionamento One to One
        $user = User::find('4');

        $array = [
            'latitude' => '321456',
            'longitude' => '852741'
        ];

        $location = $user->location()->create($array);

        //ou

        $location = new Location($array);

        $user = $user->find('5');
        $user->location()->save($location);

        //ou criando um novo usuário com latitude

        //pega todos os dados da request
        $data = $request->all();

        if ($data) {
            $data['password'] = bcrypt($data['password']); //cryptografa a senha

            //cadastra o usuário
            $user = User::created($data);

            //castra a localização do usuário
            $location = $user->location()->create($data);
            //ou
            //$user->location()->create($request->only('latitude', 'longitude'));
        }

    }
}
