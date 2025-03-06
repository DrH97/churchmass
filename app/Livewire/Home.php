<?php

namespace App\Livewire;

use App\Models\Church;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.base')]
class Home extends Component
{

    use WithPagination;

    public float $latitude = -1.2;
    public float $longitude = 36.8;
    public int $radius = 2500;

    public function render()
    {

        return view('livewire.home', [
            'churches' => Church::query()
                ->selectRaw('*, ( 6371 * acos( cos( radians(:lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(:lng) ) + sin( radians(:lat) ) * sin(radians(latitude)) ) ) AS distance',
                    ['lat' => $this->latitude, 'lng' => $this->longitude]
                )
                ->where('distance', '<', $this->radius)
                ->orderBy('distance')
                ->limit(20)
                ->get(),
        ]);
    }


}
