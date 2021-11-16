<div>
    {{-- Success is as dangerous as failure. --}}


    <div class="input-group-centre">
        <div class="input-group ">
           
    
            <div class="col-md-6">
                <select wire:model="selectedWilaya" class="input--style-3-dropdown"name="wilaya_id">
                    <option value="" selected>ولاية مراقبتك </option>
                    @foreach($wilayas as $wilaya)
                        <option value="{{ $wilaya->id }}">{{ $wilaya->nom_wilaya }}</option>
                    @endforeach
                </select>
                <div class="select-dropdown"></div>
            </div>
        </div>
    
        @if (!is_null($selectedWilaya))
            <div class="input-group ">
               
    
                <div class="col-md-6">
                    <select wire:model="selectedCommune" class="input--style-3-dropdown"name="commune_id">
                        <option value="" selected>بلدية مراقبتك</option>
                        @foreach($communes as $commune)
                            <option value="{{ $commune->id }}">{{ $commune->nom_commune }}</option>
                        @endforeach
                    </select>
                    <div class="select-dropdown"></div>
                </div>
            </div>
        @endif
    
        @if (!is_null($selectedCommune))
            <div class="input-group ">
             
                <div class="col-md-6">
                    <select wire:model="selectedCentre" class="input--style-3-dropdown" name="centre_id">
                        <option value="" selected>مركز مراقبتك </option>
                        @foreach($centres as $centre)
                            <option value="{{ $centre->id }}">{{ $centre->nom_centre }}</option>
                        @endforeach
                    </select>
                    <div class="select-dropdown"></div>
                </div>
            </div>
        @endif
      </div>  
</div>
