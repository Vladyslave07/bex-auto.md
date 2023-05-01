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
        if ($this->equipment && $this->equipment->images) {
            $this->car->images = $this->equipment->images;
        } else {
            $this->car->images = $this->car->getOriginal('images');
        }

        if ($this->equipment->volumes && count($this->equipment->volumes) > 0) {
            $this->volume = $this->equipment->volumes[0]['value'];
            $this->equipment->price = $this->equipment->volumes[0]['price'];
        }
    }

    public function setPrice($price, $value)
    {
        $this->setCurrentEquipmentImages();
        $this->equipment->price = $price;
        $this->volume = $value;
    }

    public function setCurrentEquipmentImages()
    {
        if (!$this->equipment) {return;}
        if ($images = $this->equipment->images) {
            $this->car->images = $images;
        } else {
            dump($this->car);
        }
    }

    public function setDefaultVolume()
    {
        if (!$this->equipment) {return;}
        if ($volumes = $this->equipment->volumes) {
            $this->volume = $volumes[0]['value'];
            $this->equipment->price = $volumes[0]['price'];
        }
    }

    public function setDefaultEquipment()
    {
        $equipment = $this->car->equipments->first();
        if (!$equipment) {return;}
        $this->equipment = $equipment;
    }

    public function mount()
    {
        $this->setDefaultEquipment();
        $this->setDefaultVolume();
        $this->setCurrentEquipmentImages();
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
