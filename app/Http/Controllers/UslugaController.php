<?php

namespace App\Http\Controllers;

use App\Http\Resources\UslugaResurs;
use App\Models\Usluga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UslugaController extends BaseController
{
    public function index()
    {
        $usluge = Usluga::all();
        return $this->success(UslugaResurs::collection($usluge), 'Uspesno prikazane usluge.');
    }

    public function show($id)
    {
        $usluga = Usluga::find($id);
        if ($usluga) {
            return $this->success(new UslugaResurs($usluga), 'Uspesno prikazana usluga.');
        } else {
            return $this->error('Usluga ne postoji.', null, 404);
        }
    }

    public function store(Request $request)
    {
        //validate
        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivUsluge' => 'required',
            'opisUsluge' => 'required',
            'kategorija_id' => 'required',
            'cenaUsluge'=> 'required'
        ]);

        if ($validator->fails()) {
            return $this->error('Neispravni podaci.', $validator->errors());
        }

        $usluga = new Usluga();
        $usluga->nazivUsluge = $request->nazivUsluge;
        $usluga->opisUsluge = $request->opisUsluge;
        $usluga->kategorija_id = $request->kategorija_id;
        $usluga->cenaUsluge=$request->cenaUsluge;
        $usluga->save();
        return $this->success(new UslugaResurs($usluga), 'Uspesno kreirana usluga.');
    }

    public function update(Request $request, $id)
    {
        //validate
        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivUsluge' => 'required',
            'opisUsluge' => 'required',
            'kategorija_id' => 'required',
            'cenaUsluge'=> 'required'
        ]);

        if ($validator->fails()) {
            return $this->error('Neispravni podaci.', $validator->errors());
        }

        $usluga = Usluga::find($id);
        if ($usluga) {
            $usluga->nazivUsluge = $request->nazivUsluge;
            $usluga->opisUsluge = $request->opisUsluge;
            $usluga->kategorija_id = $request->kategorija_id;
            $usluga->cenaUsluge=$request->cenaUsluge;
            $usluga->save();
            return $this->success(new UslugaResurs($usluga), 'Uspesno izmenjena usluga.');
        } else {
            return $this->error('Usluga ne postoji.', null, 404);
        }
    }

    public function destroy($id)
    {
        $usluga = Usluga::find($id);
        if ($usluga) {
            $usluga->delete();
            return $this->success(null, 'Uspesno obrisana usluga.');
        } else {
            return $this->error('Usluga ne postoji.', null, 404);
        }
    }
}
