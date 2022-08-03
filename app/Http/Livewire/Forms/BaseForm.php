<?php


namespace App\Http\Livewire\Forms;


interface BaseForm
{
    /**
     * Handle form submit action
     *
     * @return mixed
     */
    public function submit();
}