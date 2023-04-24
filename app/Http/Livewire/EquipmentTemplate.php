<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EquipmentTemplate extends Component
{
    public $car;
    public $equipment;
    public $volume;


    public function setEquipment($equipmentId)
    {
        $this->equipment = $this->car->equipments->where('id', $equipmentId)->first();
        if ($this->equipment) {
            $this->car->images = $this->equipment->images;
        }
    }

    public function setPrice($price, $value)
    {
        $this->equipment->price = $price;
        $this->volume = $value;
    }

    public function mount()
    {
        $equipment = $this->car->equipments->first();
        if ($equipment) {
            $this->equipment = $equipment;
            if ($equipment->volumes) {
                $this->volume = $equipment->volumes[0]['value'];
            }
        }
    }

    public function render()
    {
        return view('livewire.equipment-template', [
            'car' => $this->car,
            'equipment' => $this->equipment,
            'volume' => $this->volume,
        ]);
    }
}
