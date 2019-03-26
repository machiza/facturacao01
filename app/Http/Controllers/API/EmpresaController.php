<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Perfil;
use App\User;
use App\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Empresa::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|string|max:191',
            'nomeCurto' => 'required|string|max:191',
            'nuit' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'telemovel1' => 'required|integer|min:9',
            'provincia' => 'required',
            'cidade' => 'required',
            'endereco' => 'required|string|max:191',
        ]);

        $empresa = Empresa::create([
            'nome' => $request['nome'],
            'nomeCurto' => $request['nomeCurto'],
            'nuit' => $request['nuit'],
            'email' => $request['email'],
            'telemovel1' => $request['telemovel1'],
            'telemovel2' => $request['telemovel2'],
            'provincia' => $request['provincia'],
            'cidade' => $request['cidade'],
            'endereco' => $request['endereco']
        ]);

        $perfil_root = Perfil::where('nome','admin')->first();

        $user = new User();
        $user->name = $empresa->nomeCurto;
        $user->email = $empresa->email;
        $user->photo = "profile.png";
        $user->password = bcrypt('demo');
        $user->empresa_id = $empresa->id;
        $user->save();
        $user->perfies()->attach($perfil_root);

        return $empresa;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
