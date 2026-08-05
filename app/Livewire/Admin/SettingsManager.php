<?php

namespace App\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class SettingsManager extends Component
{
    public $shipping_charge = 60;
    public $free_shipping_threshold = 1000;

    public function mount()
    {
        $this->shipping_charge = Setting::where('key', 'shipping_charge')->value('value') ?? 60;
        $this->free_shipping_threshold = Setting::where('key', 'free_shipping_threshold')->value('value') ?? 1000;
    }

    public function saveSettings()
    {
        $this->validate([
            'shipping_charge' => 'required|numeric|min:0',
            'free_shipping_threshold' => 'required|numeric|min:0',
        ]);

        Setting::updateOrCreate(
            ['key' => 'shipping_charge'],
            ['value' => $this->shipping_charge]
        );

        Setting::updateOrCreate(
            ['key' => 'free_shipping_threshold'],
            ['value' => $this->free_shipping_threshold]
        );

        session()->flash('message', 'Settings saved successfully.');
    }

    public function render()
    {
        return view('livewire.admin.settings-manager')->layout('components.layouts.admin');
    }
}
