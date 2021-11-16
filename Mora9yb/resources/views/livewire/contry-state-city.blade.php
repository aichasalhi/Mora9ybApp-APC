<div>
    {{-- In work, do what you enjoy. --}}
    
        <div class="input-group-centre">
        <div class="input-group ">
           
    
            <div class="col-md-6">
                <select wire:model="selectedCommune" class="input--style-3-dropdown"name="commune_id">
                    <option value="" selected>بلدية تصويتك</option>
                    @foreach($communes as $commune)
                        <option value="{{ $commune->id }}">{{ $commune->nom_commune }}</option>
                    @endforeach
                </select>
                <div class="select-dropdown"></div>
            </div>
        </div>
    
        @if (!is_null($selectedCommune))
            <div class="input-group ">
               
    
                <div class="col-md-6">
                    <select wire:model="selectedCentre" class="input--style-3-dropdown"name="centre_id">
                        <option value="" selected>مركز تصويتك</option>
                        @foreach($centres as $centre)
                            <option value="{{ $centre->id }}">{{ $centre->nom_centre }}</option>
                        @endforeach
                    </select>
                    <div class="select-dropdown"></div>
                </div>
            </div>
        @endif
    
        @if (!is_null($selectedCentre))
            <div class="input-group ">
             
                <div class="col-md-6">
                    <select wire:model="selectedOffice" class="input--style-3-dropdown" name="num_office">
                        <option value="" selected>مكتب تصويتك </option>
                        @foreach($offices as $office)
                            <option value="{{ $office->num_office }}">{{ $office->num_office }}</option>
                        @endforeach
                    </select>
                    <div class="select-dropdown"></div>
                </div>
            </div>
        @endif
      </div>  
   
    
</div>





