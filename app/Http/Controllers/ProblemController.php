<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProblemResurs;
use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProblemController extends BaseController
{
    //index
    public function index()
    {
        $problemi = Problem::all();
        return $this->success(ProblemResurs::collection($problemi), 'Uspesno prikazani problemi.');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivProblema' => 'required',
            'opisProblema' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error('Neispravni podaci.', $validator->errors());
        }

        $problem = new Problem();
        $problem->nazivProblema = $request->nazivProblema;
        $problem->opisProblema = $request->opisProblema;
        $problem->user_id = $request->user_id;
        $problem->datumPrijave = date('Y-m-d');
        $problem->status = Problem::STATUS_NOVO;
        $problem->save();

        return $this->success(new ProblemResurs($problem), 'Uspesno kreiran problem.');

    }
}
