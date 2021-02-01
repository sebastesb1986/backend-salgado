<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfil;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $profile = function($query) {
            $query->select('name', 'lastname', 'phone', 'address', 'user_id');
        };

        $user = User::whereHas('perfil', $profile)->with(['perfil' => $profile])
        ->get();
        
        return response()->json($user);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = [
            'username' => $request->username,
            'email' => $request->email,
        ];

        $user = User::create($data);

        if($user)
        {
            $profile = $user->perfil()->create([

                'name' => $request->name,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'address' => $request->address
    
            ]);

            if($profile){

                return response()->json(
                    [
                        'profile'=>$profile,
                        'success'=> 'Usuario registrado exitosamente!',
                        'code'=>200
                    ]);

            }
            else{
                return response()->json(['error'=> 'Error al registrar el usuario!']);
            }
        }

        
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);


    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
        ];

        $user->update($data);

        if($user)
        {
            $profile = $user->perfil()->update([

                'name' => $request->name,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'address' => $request->address
    
            ]);

            if($profile){

                return response()->json(['success'=> 'Usuario actualizado exitosamente!']);

            }
            else{
                return response()->json(['error'=> 'Error al actualizar el usuario!']);
            }
        }


    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $usuDelete = $user->perfil()->delete();

        if($usuDelete)
        {
            return response()->json(['success'=> 'Usuario eliminado exitosamente!']);
        }
        else{
            return response()->json(['error'=> 'Error al eliminar el usuario!']);
        }

    }

}
