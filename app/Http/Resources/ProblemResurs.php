<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class ProblemResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = User::find($this->user_id);
        return [
            'id' => $this->id,
            'nazivProblema' => $this->nazivProblema,
            'opisProblema' => $this->opisProblema,
            'user' => new UserResurs($user),
            'datumPrijave' => $this->datumPrijave,
            'status' => $this->status
        ];
    }

}
