<?php

namespace App\Http\Controllers;

use App\Http\Resources\KategorijaResurs;
use App\Models\Kategorija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategorijaController extends BaseController
{
    public function index()
    {
        $kategorije = Kategorija::all();
        return $this->success(KategorijaResurs::collection($kategorije), 
        'Uspesno prikazane kategorije.');
    }

    public function show($id)
    {
        $kategorija = Kategorija::find($id);
        if ($kategorija) {
            return $this->success(new KategorijaResurs($kategorija), 
            'Uspesno prikazana kategorija.');
        } else {
            return $this->error('Kategorija ne postoji.', null, 404);
        }
    }

    public function store(Request $request)
    {
        //validate
        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivKategorije' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error('Neispravni podaci.', $validator->errors());
        }

        $kategorija = new Kategorija();
        $kategorija->nazivKategorije = $request->nazivKategorije;
        $kategorija->save();
        return $this->success(new KategorijaResurs($kategorija), 'Uspesno kreirana kategorija.');
    }

    public function update(Request $request, $id)
    {
        //validate
        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivKategorije' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error('Neispravni podaci.', $validator->errors());
        }

        $kategorija = Kategorija::find($id);
        if ($kategorija) {
            $kategorija->nazivKategorije = $request->nazivKategorije;
            $kategorija->save();
            return $this->success(new KategorijaResurs($kategorija), 'Uspesno izmenjena kategorija.');
        } else {
            return $this->error('Kategorija ne postoji.', null, 404);
        }
    }

    public function destroy($id)
    {
        $kategorija = Kategorija::find($id);
        if ($kategorija) {
            $kategorija->delete();
            return $this->success(null, 'Uspesno obrisana kategorija.');
        } else {
            return $this->error('Kategorija ne postoji.', null, 404);
        }
    }
}
