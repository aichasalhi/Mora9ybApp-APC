<?php

namespace App\Http\Livewire;

use App\Models\Centre;
use App\Models\Commune;
use App\Models\Willaya;
use Livewire\Component;

class TwoLevelDropdown extends Component
{


        public $wilayas;
        public $communes;
        public $centres;
    
        public $selectedWilaya = null;
        public $selectedCommune = null;
        public $selectedCentre = null;
    
        public function mount($selectedCentre = null)
        {
            $this->wilayas = Willaya::all();
            $this->communes = collect();
            $this->centres = collect();
            $this->selectedCentre = $selectedCentre;
    
            if (!is_null($selectedCentre)) {
                $centre = Centre::with('commune.wilaya')->find($selectedCentre);
                if ($centre) {
                    $this->centres = Centre::where('commune_id', $centre->commune_id)->get();
                    $this->communes = Commune::where('wilaya_id', $centre->commune->wilaya_id)->get();
                    $this->selectedWilaya = $centre->commune->wilaya_id;
                    $this->selectedCommune = $centre->commune_id;
                }
            }
        }
        public function render()
        {
            return view('livewire\two-level-dropdown');
        }
      
    
        public function updatedSelectedWilaya($wilaya)
        {
            $this->communes = Commune::where('wilaya_id', $wilaya)->get();
            $this->selectedCommune = NULL;
        }
    
        public function updatedSelectedCommune($commune)
        {
            if (!is_null($commune)) {
                $this->centres = Centre::where('commune_id', $commune)->get();
            }
        }
    
    
        
    
}
