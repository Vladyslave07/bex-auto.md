<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EquipmentTemplate extends Component
{
    public $car;
    public $equipment;


    public function setEquipment($equipmentId)
    {
        $this->equipment = $this->car->equipments->where('id', $equipmentId)->first();
        if ($this->equipment) {
            $this->car->images = $this->equipment->images;
        }
    }

    public function mount()
    {
        $this->equipment = $this->car->equipments->first();
    }

    public function render()
    {
        return view('livewire.equipment-template', [
            'car' => $this->car,
            '$equipment' => $this->equipment,
        ]);
    }
}
