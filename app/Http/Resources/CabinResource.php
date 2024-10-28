<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CabinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $level = match($this->cabinlevel_id){
            1 => 'Aa',
            2 => 'Bb',
            3 => 'Cc',
        }

        // switch ($this->cabinlevel_id) {
        //   case 1:
        //        $level = 'A';
        //        break;
        //    case 2:
        //        $level = 'B';
        //        break;
        //    case 3:
        //        $level = 'C';
        //        break;
        //}

        return [

            "code" => $this->id,
            "name" => $this->name,
            "level" => $level,
            //"capacity" => $this->capacity,       
        ];
    }
}
