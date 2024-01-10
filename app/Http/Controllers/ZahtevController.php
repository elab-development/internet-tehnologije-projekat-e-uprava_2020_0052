<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZahtevResurs;
use App\Models\Zahtev;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZahtevController extends BaseController
{
    public function index()
    {
        $zahtevi = Zahtev::all();
        return $this->success(ZahtevResurs::collection($zahtevi), 'Uspesno prikazani zahtevi.');
    }

    public function show($id)
    {
        $zahtev = Zahtev::find($id);
        if ($zahtev) {
            return $this->success(new ZahtevResurs($zahtev), 'Uspesno prikazan zahtev.');
        } else {
            return $this->error('Zahtev ne postoji.', null, 404);
        }
    }

    public function store(Request $request)
    {
        //validate
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'usluga_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error('Neispravni podaci.', $validator->errors());
        }

        $zahtev = new Zahtev();
        $zahtev->datumUsluge = date('Y-m-d');
        $zahtev->user_id = $request->user_id;
        $zahtev->usluga_id = $request->usluga_id;
        $zahtev->save();
        return $this->success(new ZahtevResurs($zahtev), 'Uspesno kreiran zahtev.');
    }

    public function update(Request $request, $id)
    {
        //validate
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'usluga_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error('Neispravni podaci.', $validator->errors());
        }

        $zahtev = Zahtev::find($id);
        if ($zahtev) {
            $zahtev->datumUsluge = $request->datumUsluge;
            $zahtev->user_id = $request->user_id;
            $zahtev->usluga_id = $request->usluga_id;
            $zahtev->save();
            return $this->success(new ZahtevResurs($zahtev), 'Uspesno izmenjen zahtev.');
        } else {
            return $this->error('Zahtev ne postoji.', null, 404);
        }
    }

    public function destroy($id)
    {
        $zahtev = Zahtev::find($id);
        if ($zahtev) {
            $zahtev->delete();
            return $this->success(null, 'Uspesno obrisan zahtev.');
        } else {
            return $this->error('Zahtev ne postoji.', null, 404);
        }
    }

    public function zahteviKorisnika($id)
    {
        $zahtevi = Zahtev::where('user_id', $id)->get();
        return $this->success(ZahtevResurs::collection($zahtevi), 'Uspesno prikazani zahtevi.');
    }

    public function paginacija(Request $request)
    {
        $pageSize = min($request->get('page_size'), 100);
        $zahtevi = Zahtev::paginate($pageSize);
        return $this->success(ZahtevResurs::collection($zahtevi), 'Uspesno prikazani zahtevi.');
    }
}