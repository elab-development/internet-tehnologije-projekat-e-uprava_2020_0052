<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProblemResurs extends JsonResource
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
            'nazivProblema' => $this->nazivProblema,
            'opisProblema' => $this->opisProblema,
            'user_id' => new UserResurs($this->user),
            'datumPrijave' => $this->datumPrijave,
            'status' => $this->status
        ];
    }
}
