<?php

namespace App\Http\Livewire;

use App\Models\Centre;
use App\Models\Commune;
use App\Models\Office;
use Livewire\Component;

class ContryStateCity extends Component
{
    
    
        public $communes;
        public $centres;
        public $offices;
    
        public $selectedCommune = null;
        public $selectedCentre = null;
        public $selectedOffice = null;
    
        public function mount($selectedOffice = null)
        {
            $this->communes = Commune::all();
            
            $this->centres = collect();
            $this->offices = collect();
            $this->selectedOffice = $selectedOffice;
    
            if (!is_null($selectedOffice)) {
                $office = Office::with('centre.commune')->find($selectedOffice);
                if ($office) {
                    $this->offices = Office::where('centre_id', $office->centre_id)->get();
                    $this->centres = Centre::where('commune_id', $office->centre->commune_id)->get();
                    $this->selectedCommune = $office->centre->commune_id;
                    $this->selectedCentre = $office->centre_id;
                }
            }
        }
    
        public function render()
        {
            return view('livewire\contry-state-city');
        }
    
        public function updatedSelectedCommune($commune)
        {
            $this->centres = Centre::where('commune_id', $commune)->get();
            $this->selectedCentre = NULL;
        }
    
        public function updatedSelectedCentre($centre)
        {
            if (!is_null($centre)) {
                $this->offices = Office::where('centre_id', $centre)->get();
            }
        }
    
    
        
    
}
