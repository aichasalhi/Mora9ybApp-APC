@extends('supervisor.centreform')
   
                     
                    @section('content2levelDropdown')

                     <form class="login100-form validate-form" method="POST" action="/centretask">
                            @csrf 
                            {{-- @method('PUT') --}}

                            @livewire('two-level-dropdown', ['selectedCentre' => 1])
                    @endsection
                    @section('content2')
                    <h2 class="title"  >  إملأ الإستمارة بنتائج التصويت في مكتب مراقبتك    </h2>
                    <div class="input-group">
                        <input class="input--style-3" type="integer" placeholder="عدد المسجلين" name="nbr_électeurs_inscrits">
                    </div> 
                    <div class="input-group">
                        <input class="input--style-3" type="integer" placeholder="عدد المصوتين" name="nbrvotants">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3 " type="integer" placeholder="عدد الاوراق المتنازع عنها" name="nbrdoc_contest">
                        
                    </div>
                    
                    <div class="input-group">
                        <input class="input--style-3" type="integer" placeholder="عدد الأورق الملغاة" name="nbrdoc_annuler">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="integer" placeholder="عدد الاصوات المعبر عنها" name="nbrvotes_exprim">
                    </div>
                    <div class="btn btn--pill btn--green"><a href="#4">التالي</a></div>
                    @endsection

                    @section('content3')
                    
                
                
                    <h2 class="title" > -1- إملأ الإستمارة بنتائج التصويت في مكتب مراقبتك لكل قائمة  </h2>
                    
                    <div class="input-group">
                        <input class="input--style-3" type="integer" placeholder="001 التجمع الوطني الديموقراطي" name="L1">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="integer" placeholder=" 002 جبهة المستقبل "name="L2">
                    </div>                                        
                    <div class="input-group">
                        <input class="input--style-3" type="integer" placeholder="003 حركة البناء الوطني " name="L3">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="integer" placeholder="004 جبهة التحرير الوطني " name="L4">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="integer" placeholder="005 حركة مجتمع السلم" name="L5">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="integer" placeholder="006 الفجر جديد" name="L6">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="integer" placeholder="حزب صوت الشعب 007" name="L7">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="integer" placeholder=" 008 تجمع أمل الجزائر" name="L8">
                    </div>
                    <div class="input-group">
                    <input class="input--style-3" type="integer" placeholder="009  حركة الشباب الجزائري" name="L9">
                    </div> 

                    <div class="btn btn--pill btn--green"><a href="#5">التالي</a></div> 

                @endsection 

                 @section('content4')
                    
                
                
                <h2 class="title" > -2- إملأ الإستمارة بنتائج التصويت في مكتب مراقبتك لكل قائمة  </h2>
                                                        
                <div class="input-group">
                    <input class="input--style-3" type="integer" placeholder="010  حركةالوفاق الوطني" name="L10">
                </div> 
                <div class="input-group">
                    <input class="input--style-3" type="integer" placeholder=" 011 حزب الحرية والعدالة" name="L11">
                </div>
                 <div class="input-group">
                    <input class="input--style-3" type="integer" placeholder="012  جيل جديد" name="L12">
                </div> 
                <div class="input-group">
                    <input class="input--style-3" type="integer" placeholder="013  حزب التجديد الجزائري" name="L13">
                </div> 
                
                <div class="input-group">
                    <input class="input--style-3" type="integer" placeholder=" 014  حزب الكرامة " name="L14">
                </div>
                <div class="input-group">
                    <input class="input--style-3" type="integer" placeholder="015  جبهة القوى الاشتراكية" name="L15">
                </div>
                <div class="input-group">
                    <input class="input--style-3" type="integer" placeholder="016 جبهة الجزائر الجديدة" name="L16">
                </div>
                <div class="input-group">
                    <input class="input--style-3" type="integer" placeholder=" 017 جبهة الحكم الراشد " name="L17">
                </div>
                <div class="input-group">
                    <input class="input--style-3 " type="integer" placeholder="à18 حركة الإصلاح الوطني" name="L18">
                    
                </div>
                <div class="input-group">
                    <input class="input--style-3 " type="integer" placeholder="019 التحالف الوطني الجمهوري" name="L19"> 
                </div>
                
               
                <div class="btn btn--pill btn--green"><a href="#6">التالي</a></div>
            @endsection 

            @section('content5')
                
            <h2 class="title" > -3- إملأ الإستمارة بنتائج التصويت في مكتب مراقبتك لكل قائمة  </h2>
                                                    
            <div class="input-group">
                <input class="input--style-3" type="integer" placeholder="020 الوسيط السياسي " name="L20">
            </div>
            <div class="input-group">
                <input class="input--style-3" type="integer" placeholder=" 021 جبهة العدالة والتنمية" name="L21">
            </div>
            <div class="input-group">
                <input class="input--style-3" type="integer" placeholder=" 022 حركة الانفتاح" name="L22">
            </div>
            <div class="input-group">
                <input class="input--style-3" type="integer" placeholder=" 023 حزب العمال" name="L23">
            </div>
            <div class="input-group">
                <input class="input--style-3" type="integer" placeholder=" 024 الجبهة الوطنية الجزائرية" name="L24">
            </div>
            <div class="input-group">
                <input class="input--style-3" type="integer" placeholder=" 025 الاتحاد الوطني من أجل التنمية" name="L25">
            </div>
            <div class="input-group">
                <input class="input--style-3" type="integer" placeholder="الحزب الجزائري الاخضر للتنمية 026" name="L26">
            </div>
            <div class="input-group">
                <input class="input--style-3" type="integer" placeholder=" 027     عهد54" name="L27">
            </div>
            <div class="input-group">
                <input class="input--style-3" type="integer" placeholder="028 جبهة النضال الوطني" name="L28">
            </div>
            <div class="input-group">
                <input class="input--style-3 " type="integer" placeholder="029 حزب التجديد والتنمية" name="L29">
                
            </div>
            
            <div class="btn btn--pill btn--green"><a href="#7">التالي</a></div>
          
            
        @endsection 

       
        
        @section('contentSS')
                    
                
                
        <h2 class="title" > -4- إملأ الإستمارة بنتائج التصويت في مكتب مراقبتك لكل قائمة  </h2>
                                                
        <div class="input-group">
            <input class="input--style-3" type="integer" placeholder="030 الجبهة الوطنية للعدالة الاجتماعية " name="L30">
        </div>
        <div class="input-group">
            <input class="input--style-3 " type="integer" placeholder="031 الجبهة الديموقراطية الحرة" name="L31">
            
        </div>
        <div class="input-group">
            <input class="input--style-3" type="integer" placeholder="032 حزب الوحدة الوطنية والتنمية" name="L32">
        </div>
        <div class="input-group">
            <input class="input--style-3" type="integer" placeholder=" 033 حركة الوطنيين الأحرار" name="L33">
        </div>
        <div class="input-group">
            <input class="input--style-3" type="integer" placeholder="034 IIIII IIII" name="L34">
        </div>
        <div class="input-group">
            <input class="input--style-3" type="integer" placeholder="035 حزب العدل والبيان " name="L35">
        </div>
        <div class="input-group">
            <input class="input--style-3" type="integer" placeholder="036 حزب النور الجزائري" name="L36">
        </div>
        <div class="input-group">
            <input class="input--style-3" type="integer" placeholder=" 037  طلائع الحريات" name="L37">
        </div>
        <div class="input-group">
            <input class="input--style-3" type="integer" placeholder="038 الحزب الجمهوري الشعبي " name="L38">
        </div>
        <div class="input-group">
            <input class="input--style-3" type="integer" placeholder="039 الحركة الوطنية للعمال الجزائريين" name="L39">
        </div>
        <div class="input-group">
            <input class="input--style-3" type="integer" placeholder="040 IIIII " name="L40">
        </div>
                <div class="container-login100-form-btn">
                  <button class="btn btn--pill btn--green"  type="submit">
                    حفظ
                  </button>
                </div>
                            
                            
                        
        @endsection 
     

</form>

