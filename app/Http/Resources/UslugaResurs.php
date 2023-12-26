<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UslugaResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nazivUsluge' => $this->nazivUsluge,
            'opisUsluge'=>$this->opisUsluge,
            'kategorija' => new KategorijaResurs($this->kategorija),
            'cenaUsluge' => $this->cenaUsluge
        ];
    }
}
