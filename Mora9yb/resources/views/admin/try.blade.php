
    <ul>
        {{-- @if($ofresultbinaa->count()) --}}
                         {{-- @foreach ($ofresultbinaas as $ofresultbinaa) --}}
                             <li>
                             <h1>binaa results </h1>
                                 <h2> {{  $binaacentreresults  }} </h2>
                             </li>
                             <li>
                                <h1>karama results </h1>
                                <h1> {{  $karamacentreresults  }} </h1>
                            </li>
                         {{-- @endforeach --}}
                 
                     
                         {{-- @else
                         <li>
                             <h3  class="text-danger"> لم يتم الحساب بعد </h3>
                         </li>
                         @endif --}}
                      

      </ul>
