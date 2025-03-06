<?php

namespace App\Livewire;

use App\Models\Church;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.base')]
class Home extends Component
{

    use WithPagination;

    public float $latitude = -1.2;
    public float $longitude = 36.8;
    public int $radius = 500;

    public bool $massesNearby = true;

    public function render()
    {

        $query = Church::query()
            ->selectRaw('*, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin(radians(latitude)) ) ) AS distance',
                [$this->latitude, $this->longitude, $this->latitude]
            );

        if ($this->massesNearby) {
            $query->whereHas('masses', function ($query) {
                $query->where('day', Carbon::today()->dayName)
                    ->whereRaw("time > strftime('%H%M', 'now', 'localtime')");
            });
        }

        $churches = $query->where('distance', '<', $this->radius)
            ->orderBy('distance')
            ->limit(20)
            ->get();

        return view('livewire.home', [
            'churches' => $churches,
            'markers' => $churches->map(function ($church) {
                return [
                    'lat' => $church->latitude,
                    'long'  => $church->longitude,
                ];
            })->toArray()
        ]);
    }


}
