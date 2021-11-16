<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cmdresult;
use App\Models\Communeresult;
use App\Models\Ctdresult;
use App\Models\Office;
use App\Models\Willayaresult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function help()
    {
        return view('admin.try');
        
    }

    public function index(){
        
      
        $CommuneResults=DB::table('communes')
                        ->select('id','nom_commune','nbrma93ad')
                        ->get();

        $tmp =[];
        $results = [];

        foreach($CommuneResults as $commune){
                
            
            $tmp['id'] = $commune->id;
            $tmp['nom_commune'] = $commune->nom_commune;
            $tmp['nbrma93ad'] = $commune->nbrma93ad;

            $office_nbr_électeurs_inscrits = DB::table('offices')->where('commune_id',$commune->id)->sum('nbr_électeurs_inscrits');
            $ctdresults_nbr_électeurs_inscrits = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('nbr_électeurs_inscrits');
            $cmdresults_nbr_électeurs_inscrits = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('nbr_électeurs_inscrits');
            $tmp['nbr_électeurs_inscrits'] = $office_nbr_électeurs_inscrits + $ctdresults_nbr_électeurs_inscrits + $cmdresults_nbr_électeurs_inscrits;

            $office_nbrvotants = DB::table('offices')->where('commune_id',$commune->id)->sum('nbrvotants');
            $ctdresults_nbrvotants = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('nbrvotants');
            $cmdresults_nbrvotants = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('nbrvotants');
            $tmp['nbrvotants'] = $office_nbrvotants + $ctdresults_nbrvotants + $cmdresults_nbrvotants;

            $office_nbrdoc_contest = DB::table('offices')->where('commune_id',$commune->id)->sum('nbrdoc_contest');
            $ctdresults_nbrdoc_contest = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('nbrdoc_contest');
            $cmdresults_nbrdoc_contest = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('nbrdoc_contest');
            $tmp['nbrdoc_contest'] = $office_nbrdoc_contest + $ctdresults_nbrdoc_contest + $cmdresults_nbrdoc_contest;

            $office_nbrdoc_annuler = DB::table('offices')->where('commune_id',$commune->id)->sum('nbrdoc_annuler');
            $ctdresults_nbrdoc_annuler = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('nbrdoc_annuler');
            $cmdresults_nbrdoc_annuler = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('nbrdoc_annuler');
            $tmp['nbrdoc_annuler'] = $office_nbrdoc_annuler + $ctdresults_nbrdoc_annuler + $cmdresults_nbrdoc_annuler;

            $office_nbrvotes_exprim = DB::table('offices')->where('commune_id',$commune->id)->sum('nbrvotes_exprim');
            $ctdresults_nbrvotes_exprim = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('nbrvotes_exprim');
            $cmdresults_nbrvotes_exprim = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('nbrvotes_exprim');
            $tmp['nbrvotes_exprim'] = $office_nbrvotes_exprim + $ctdresults_nbrvotes_exprim + $cmdresults_nbrvotes_exprim;
          
          if($tmp['nbr_électeurs_inscrits']<>0){
                       $tmp['tauxparticipation'] = ($tmp['nbrvotants'] * 100)/  $tmp['nbr_électeurs_inscrits'];
   
          }else{
            $tmp['tauxparticipation'] = 0;
          }
            $tmp['tauxparticipation']=$tmp['tauxparticipation'] * 100;

            $tmp['ataba'] = ($tmp['nbrvotes_exprim'] * 5)/100;

            $WilayaSupAtaba = [];
            $i=0;
            // counting communes listes 

            $office_L1 = DB::table('offices')->where('commune_id',$commune->id)->sum('L1');
            $ctdresults_L1 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L1');
            $cmdresults_L1 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L1');
            $tmp['L1'] = $office_L1 + $ctdresults_L1 + $cmdresults_L1;
            if($tmp['L1'] >  $tmp['ataba']){
                          $WilayaSupAtaba[$i]= $tmp['L1'];
                          $i++;
             }

             $office_L2 = DB::table('offices')->where('commune_id',$commune->id)->sum('L2');
            $ctdresults_L2 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L2');
            $cmdresults_L2 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L2');
            $tmp['L2'] = $office_L2 + $ctdresults_L2 + $cmdresults_L2;
            if($tmp['L2'] >  $tmp['ataba']){
                          $WilayaSupAtaba[$i]= $tmp['L2'];
                          $i++;
             }
                $office_L3 = DB::table('offices')->where('commune_id',$commune->id)->sum('L3');
                $ctdresults_L3 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L3');
                $cmdresults_L3 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L3');
                $tmp['L3'] = $office_L3 + $ctdresults_L3 + $cmdresults_L3;
                if($tmp['L3'] >  $tmp['ataba']){
                                    $WilayaSupAtaba[$i]= $tmp['L3'];
                                    $i++;
                }
            $office_L4 = DB::table('offices')->where('commune_id',$commune->id)->sum('L4');
            $ctdresults_L4 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L4');
            $cmdresults_L4 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L4');
            $tmp['L4'] = $office_L4 + $ctdresults_L4 + $cmdresults_L4;
            if($tmp['L4'] >  $tmp['ataba']){
                            $WilayaSupAtaba[$i]= $tmp['L4'];
                            $i++;
            }

            $office_L5 = DB::table('offices')->where('commune_id',$commune->id)->sum('L5');
            $ctdresults_L5 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L5');
            $cmdresults_L5= DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L3');
            $tmp['L5'] = $office_L5 + $ctdresults_L5 + $cmdresults_L5;
            if($tmp['L5'] >  $tmp['ataba']){
                                $WilayaSupAtaba[$i]= $tmp['L5'];
                                $i++;
            }


            $office_L6 = DB::table('offices')->where('commune_id',$commune->id)->sum('L6');
            $ctdresults_L6 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L6');
            $cmdresults_L6 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L6');
            $tmp['L6'] = $office_L6 + $ctdresults_L6+ $cmdresults_L6;
            if($tmp['L6'] >  $tmp['ataba']){
                                $WilayaSupAtaba[$i]= $tmp['L6'];
                                $i++;
            }


            $office_L7 = DB::table('offices')->where('commune_id',$commune->id)->sum('L7');
            $ctdresults_L7 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L7');
            $cmdresults_L7 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L7');
            $tmp['L7'] = $office_L7 + $ctdresults_L7 + $cmdresults_L7;
            if($tmp['L7'] >  $tmp['ataba']){
                                $WilayaSupAtaba[$i]= $tmp['L7'];
                                $i++;
            }



            $office_L8 = DB::table('offices')->where('commune_id',$commune->id)->sum('L8');
            $ctdresults_L8 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L8');
            $cmdresults_L8 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L8');
            $tmp['L8'] = $office_L8 + $ctdresults_L8 + $cmdresults_L8;
            if($tmp['L8'] >  $tmp['ataba']){
                                $WilayaSupAtaba[$i]= $tmp['L8'];
                                $i++;
            }

            $office_L9 = DB::table('offices')->where('commune_id',$commune->id)->sum('L9');
            $ctdresults_L9 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L9');
            $cmdresults_L9 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L9');
            $tmp['L9'] = $office_L9 + $ctdresults_L9 + $cmdresults_L9;
            if($tmp['L9'] >  $tmp['ataba']){
                          $WilayaSupAtaba[$i]= $tmp['L1'];
                          $i++;
             }
             $office_L10 = DB::table('offices')->where('commune_id',$commune->id)->sum('L10');
            $ctdresults_L10 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L10');
            $cmdresults_L10 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L10');
            $tmp['L10'] = $office_L10 + $ctdresults_L10 + $cmdresults_L10;
            if($tmp['L10'] >  $tmp['ataba']){
                          $WilayaSupAtaba[$i]= $tmp['L10'];
                          $i++;
             }
            $office_L11 = DB::table('offices')->where('commune_id',$commune->id)->sum('L11');
            $ctdresults_L11 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L11');
            $cmdresults_L11 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L11');
            $tmp['L11'] = $office_L11 + $ctdresults_L11 + $cmdresults_L11;
            if($tmp['L11'] >  $tmp['ataba']){
                          $WilayaSupAtaba[$i]= $tmp['L11'];
                          $i++;
             }

            $office_L12 = DB::table('offices')->where('commune_id',$commune->id)->sum('L12');
            $ctdresults_L12 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L12');
            $cmdresults_L12 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L12');
            $tmp['L12'] = $office_L12 + $ctdresults_L12+ $cmdresults_L12;
            if($tmp['L12'] >  $tmp['ataba']){
                          $WilayaSupAtaba[$i]= $tmp['L12'];
                          $i++;
             }

             $office_L13 = DB::table('offices')->where('commune_id',$commune->id)->sum('L13');
            $ctdresults_L13 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L13');
            $cmdresults_L13 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L13');
            $tmp['L13'] = $office_L13 + $ctdresults_L13 + $cmdresults_L13;
            if($tmp['L13'] >  $tmp['ataba']){
                          $WilayaSupAtaba[$i]= $tmp['L13'];
                          $i++;
             }

             $office_L14 = DB::table('offices')->where('commune_id',$commune->id)->sum('L14');
             $ctdresults_L14 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L14');
             $cmdresults_L14 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L14');
             $tmp['L14'] = $office_L14 + $ctdresults_L14 + $cmdresults_L14;
             if($tmp['L14'] >  $tmp['ataba']){
                           $WilayaSupAtaba[$i]= $tmp['L14'];
                           $i++;
              }

              $office_L15 = DB::table('offices')->where('commune_id',$commune->id)->sum('L15');
              $ctdresults_L15 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L15');
              $cmdresults_L15 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L15');
              $tmp['L15'] = $office_L15 + $ctdresults_L15 + $cmdresults_L15;
              if($tmp['L15'] >  $tmp['ataba']){
                            $WilayaSupAtaba[$i]= $tmp['L15'];
                            $i++;
               }
           
            $office_L16 = DB::table('offices')->where('commune_id',$commune->id)->sum('L16');
            $ctdresults_L16 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L16');
            $cmdresults_L16 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L16');
            $tmp['L16'] = $office_L16 + $ctdresults_L16 + $cmdresults_L16;
            if($tmp['L16'] >  $tmp['ataba']){
                                $WilayaSupAtaba[$i]= $tmp['L16'];
                                $i++;
            }

            $office_L17 = DB::table('offices')->where('commune_id',$commune->id)->sum('L17');
            $ctdresults_L17 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L17');
            $cmdresults_L17 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L17');
            $tmp['L17'] = $office_L17+ $ctdresults_L17 + $cmdresults_L17;
            if($tmp['L17'] >  $tmp['ataba']){
                          $WilayaSupAtaba[$i]= $tmp['L17'];
                          $i++;
             }

             $office_L18 = DB::table('offices')->where('commune_id',$commune->id)->sum('L18');
             $ctdresults_L18 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L18');
             $cmdresults_L18 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L18');
             $tmp['L18'] = $office_L18 + $ctdresults_L18 + $cmdresults_L18;
             if($tmp['L18'] >  $tmp['ataba']){
                           $WilayaSupAtaba[$i]= $tmp['L18'];
                           $i++;
              }

              $office_L19 = DB::table('offices')->where('commune_id',$commune->id)->sum('L19');
              $ctdresults_L19 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L19');
              $cmdresults_L19 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L19');
              $tmp['L19'] = $office_L19 + $ctdresults_L19 + $cmdresults_L19;
              if($tmp['L19'] >  $tmp['ataba']){
                            $WilayaSupAtaba[$i]= $tmp['L19'];
                            $i++;
               }

               $office_L20 = DB::table('offices')->where('commune_id',$commune->id)->sum('L20');
               $ctdresults_L20 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L20');
               $cmdresults_L20 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L20');
               $tmp['L20'] = $office_L20 + $ctdresults_L20 + $cmdresults_L20;
               if($tmp['L20'] >  $tmp['ataba']){
                             $WilayaSupAtaba[$i]= $tmp['L20'];
                             $i++;
                }


                $office_L21 = DB::table('offices')->where('commune_id',$commune->id)->sum('L21');
            $ctdresults_L21 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L21');
            $cmdresults_L21 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L21');
            $tmp['L21'] = $office_L21 + $ctdresults_L21 + $cmdresults_L21;
            if($tmp['L21'] >  $tmp['ataba']){
                          $WilayaSupAtaba[$i]= $tmp['L21'];
                          $i++;
             }

            $office_L22 = DB::table('offices')->where('commune_id',$commune->id)->sum('L22');
            $ctdresults_L22 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L22');
            $cmdresults_L22 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L22');
            $tmp['L22'] = $office_L12 + $ctdresults_L22+ $cmdresults_L22;
            if($tmp['L22'] >  $tmp['ataba']){
                          $WilayaSupAtaba[$i]= $tmp['L22'];
                          $i++;
             }

             $office_L23 = DB::table('offices')->where('commune_id',$commune->id)->sum('L23');
            $ctdresults_L23 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L23');
            $cmdresults_L23 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L23');
            $tmp['L23'] = $office_L23 + $ctdresults_L23 + $cmdresults_L23;
            if($tmp['L23'] >  $tmp['ataba']){
                          $WilayaSupAtaba[$i]= $tmp['L23'];
                          $i++;
             }

             $office_L24 = DB::table('offices')->where('commune_id',$commune->id)->sum('L24');
             $ctdresults_L24 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L24');
             $cmdresults_L24 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L24');
             $tmp['L24'] = $office_L24 + $ctdresults_L24 + $cmdresults_L24;
             if($tmp['L24'] >  $tmp['ataba']){
                           $WilayaSupAtaba[$i]= $tmp['L24'];
                           $i++;
              }

              $office_L25 = DB::table('offices')->where('commune_id',$commune->id)->sum('L25');
              $ctdresults_L25 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L25');
              $cmdresults_L25 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L25');
              $tmp['L25'] = $office_L15 + $ctdresults_L25 + $cmdresults_L25;
              if($tmp['L25'] >  $tmp['ataba']){
                            $WilayaSupAtaba[$i]= $tmp['L25'];
                            $i++;
               }
           
            $office_L26 = DB::table('offices')->where('commune_id',$commune->id)->sum('L26');
            $ctdresults_L26 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L26');
            $cmdresults_L26 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L26');
            $tmp['L26'] = $office_L26 + $ctdresults_L26 + $cmdresults_L26;
            if($tmp['L26'] >  $tmp['ataba']){
                                $WilayaSupAtaba[$i]= $tmp['L26'];
                                $i++;
            }

            $office_L27 = DB::table('offices')->where('commune_id',$commune->id)->sum('L27');
            $ctdresults_L27 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L27');
            $cmdresults_L27 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L27');
            $tmp['L27'] = $office_L27+ $ctdresults_L27 + $cmdresults_L27;
            if($tmp['L27'] >  $tmp['ataba']){
                          $WilayaSupAtaba[$i]= $tmp['L27'];
                          $i++;
             }

             $office_L28 = DB::table('offices')->where('commune_id',$commune->id)->sum('L28');
             $ctdresults_L28 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L28');
             $cmdresults_L28 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L28');
             $tmp['L28'] = $office_L28 + $ctdresults_L28 + $cmdresults_L28;
             if($tmp['L28'] >  $tmp['ataba']){
                           $WilayaSupAtaba[$i]= $tmp['L28'];
                           $i++;
              }

              $office_L29 = DB::table('offices')->where('commune_id',$commune->id)->sum('L29');
              $ctdresults_L29 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L29');
              $cmdresults_L29 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L29');
              $tmp['L29'] = $office_L29 + $ctdresults_L29 + $cmdresults_L29;
              if($tmp['L29'] >  $tmp['ataba']){
                            $WilayaSupAtaba[$i]= $tmp['L29'];
                            $i++;
               }

               $office_L30 = DB::table('offices')->where('commune_id',$commune->id)->sum('L30');
               $ctdresults_L30 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L30');
               $cmdresults_L30 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L30');
               $tmp['L30'] = $office_L30 + $ctdresults_L30 + $cmdresults_L30;
               if($tmp['L30'] >  $tmp['ataba']){
                             $WilayaSupAtaba[$i]= $tmp['L30'];
                             $i++;
                }
                $office_L31 = DB::table('offices')->where('commune_id',$commune->id)->sum('L31');
                $ctdresults_L31 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L31');
                $cmdresults_L31 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L31');
                $tmp['L31'] = $office_L31 + $ctdresults_L31 + $cmdresults_L31;
                if($tmp['L31'] >  $tmp['ataba']){
                              $WilayaSupAtaba[$i]= $tmp['L31'];
                              $i++;
                 }
    
                $office_L32 = DB::table('offices')->where('commune_id',$commune->id)->sum('L32');
                $ctdresults_L32 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L32');
                $cmdresults_L32 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L32');
                $tmp['L32'] = $office_L32 + $ctdresults_L32+ $cmdresults_L32;
                if($tmp['L32'] >  $tmp['ataba']){
                              $WilayaSupAtaba[$i]= $tmp['L32'];
                              $i++;
                 }
    
                 $office_L33 = DB::table('offices')->where('commune_id',$commune->id)->sum('L33');
                $ctdresults_L33 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L33');
                $cmdresults_L33 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L33');
                $tmp['L33'] = $office_L33 + $ctdresults_L33 + $cmdresults_L33;
                if($tmp['L33'] >  $tmp['ataba']){
                              $WilayaSupAtaba[$i]= $tmp['L33'];
                              $i++;
                 }
    
                 $office_L34 = DB::table('offices')->where('commune_id',$commune->id)->sum('L34');
                 $ctdresults_L34 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L34');
                 $cmdresults_L34 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L34');
                 $tmp['L34'] = $office_L34 + $ctdresults_L34 + $cmdresults_L34;
                 if($tmp['L34'] >  $tmp['ataba']){
                               $WilayaSupAtaba[$i]= $tmp['L34'];
                               $i++;
                  }
    
                  $office_L35 = DB::table('offices')->where('commune_id',$commune->id)->sum('L35');
                  $ctdresults_L35 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L35');
                  $cmdresults_L35 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L35');
                  $tmp['L35'] = $office_L35 + $ctdresults_L35 + $cmdresults_L35;
                  if($tmp['L35'] >  $tmp['ataba']){
                                $WilayaSupAtaba[$i]= $tmp['L35'];
                                $i++;
                   }
               
                $office_L36 = DB::table('offices')->where('commune_id',$commune->id)->sum('L36');
                $ctdresults_L36 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L36');
                $cmdresults_L36 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L36');
                $tmp['L36'] = $office_L36 + $ctdresults_L36 + $cmdresults_L36;
                if($tmp['L36'] >  $tmp['ataba']){
                                    $WilayaSupAtaba[$i]= $tmp['L36'];
                                    $i++;
                }
    
                $office_L37 = DB::table('offices')->where('commune_id',$commune->id)->sum('L37');
                $ctdresults_L37 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L37');
                $cmdresults_L37 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L37');
                $tmp['L37'] = $office_L37+ $ctdresults_L37 + $cmdresults_L37;
                if($tmp['L37'] >  $tmp['ataba']){
                              $WilayaSupAtaba[$i]= $tmp['L37'];
                              $i++;
                 }
    
                 $office_L38 = DB::table('offices')->where('commune_id',$commune->id)->sum('L38');
                 $ctdresults_L38 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L38');
                 $cmdresults_L38 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L38');
                 $tmp['L38'] = $office_L38 + $ctdresults_L38 + $cmdresults_L38;
                 if($tmp['L38'] >  $tmp['ataba']){
                               $WilayaSupAtaba[$i]= $tmp['L38'];
                               $i++;
                  }
    
                  $office_L39 = DB::table('offices')->where('commune_id',$commune->id)->sum('L39');
                  $ctdresults_L39 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L39');
                  $cmdresults_L39 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L39');
                  $tmp['L39'] = $office_L39 + $ctdresults_L39 + $cmdresults_L39;
                  if($tmp['L39'] >  $tmp['ataba']){
                                $WilayaSupAtaba[$i]= $tmp['L39'];
                                $i++;
                   }
    
                   $office_L40 = DB::table('offices')->where('commune_id',$commune->id)->sum('L40');
                   $ctdresults_L40 = DB::table('ctdresults')->where('commune_id',$commune->id)->sum('L40');
                   $cmdresults_L40 = DB::table('cmdresults')->where('commune_id',$commune->id)->sum('L40');
                   $tmp['L40'] = $office_L40 + $ctdresults_L40 + $cmdresults_L40;
                   if($tmp['L40'] >  $tmp['ataba']){
                                 $WilayaSupAtaba[$i]= $tmp['L40'];
                                 $i++;
                    }


             // the last calculs for ma9a3id et tt 
             $tmp['total'] = 0;
             foreach ($WilayaSupAtaba as $var) {
                $tmp['total'] = $tmp['total'] + $var;
                 
              }
             $tmp['valMa93ad']=0;
             if($tmp['total'] <> 0){
                $tmp['valMa93ad'] =$tmp['total'] /$tmp['nbrma93ad'];
              }
              
             if( $tmp['valMa93ad']<>0){
              $tmp['L1resultsMa93ed'] = (int)($tmp['L1'] / $tmp['valMa93ad']) ;   
              $tmp['L1resultsMa93edest'] = ($tmp['L1'] % $tmp['valMa93ad']);
             }else{
                $tmp['L1resultsMa93ed'] =0;
                $tmp['L1resultsMa93edest'] =0;
             }

             if( $tmp['valMa93ad']<>0){
                $tmp['L2resultsMa93ed'] = (int)($tmp['L2'] / $tmp['valMa93ad']) ;   
                $tmp['L2resultsMa93edest'] = ($tmp['L2'] % $tmp['valMa93ad']);
               }else{
                  $tmp['L2resultsMa93ed'] =0;
                  $tmp['L2resultsMa93edest'] =0;
               }
            if( $tmp['valMa93ad']<>0){
                $tmp['L3resultsMa93ed'] = (int)($tmp['L3'] / $tmp['valMa93ad']) ;   
                $tmp['L3resultsMa93edest'] = ($tmp['L3'] % $tmp['valMa93ad']);
                 }else{
                    $tmp['L3resultsMa93ed'] =0;
                     $tmp['L3resultsMa93edest'] =0;
             }
               
             if( $tmp['valMa93ad']<>0){
              $tmp['L4resultsMa93ed'] = (int)($tmp['L4'] / $tmp['valMa93ad']) ;   
              $tmp['L4resultsMa93edest'] = ($tmp['L4'] % $tmp['valMa93ad']);
             }else{
                $tmp['L4resultsMa93ed'] =0;
                $tmp['L4resultsMa93edest'] =0;
             }
            if( $tmp['valMa93ad']<>0){
               $tmp['L5resultsMa93ed'] = (int)($tmp['L5'] / $tmp['valMa93ad']) ;   
               $tmp['L5resultsMa93edest'] = ($tmp['L5'] % $tmp['valMa93ad']);
             }else{
                $tmp['L5resultsMa93ed'] =0;
                $tmp['L5resultsMa93edest'] =0;
             }
             
             if( $tmp['valMa93ad']<>0){
                $tmp['L6resultsMa93ed'] = (int)($tmp['L6'] / $tmp['valMa93ad']) ;   
                $tmp['L6resultsMa93edest'] = ($tmp['L6'] % $tmp['valMa93ad']);
               }else{
                  $tmp['L6resultsMa93ed'] =0;
                  $tmp['L6resultsMa93edest'] =0;
               }

               if( $tmp['valMa93ad']<>0){
                $tmp['L7resultsMa93ed'] = (int)($tmp['L7'] / $tmp['valMa93ad']) ;   
                $tmp['L7resultsMa93edest'] = ($tmp['L7'] % $tmp['valMa93ad']);
               }else{
                  $tmp['L7resultsMa93ed'] =0;
                  $tmp['L7resultsMa93edest'] =0;
               }

               if( $tmp['valMa93ad']<>0){
                $tmp['L8resultsMa93ed'] = (int)($tmp['L8'] / $tmp['valMa93ad']) ;   
                $tmp['L8resultsMa93edest'] = ($tmp['L8'] % $tmp['valMa93ad']);
               }else{
                  $tmp['L8resultsMa93ed'] =0;
                  $tmp['L8resultsMa93edest'] =0;
               }

               if( $tmp['valMa93ad']<>0){
                $tmp['L9resultsMa93ed'] = (int)($tmp['L9'] / $tmp['valMa93ad']) ;   
                $tmp['L9resultsMa93edest'] = ($tmp['L9'] % $tmp['valMa93ad']);
               }else{
                  $tmp['L9resultsMa93ed'] =0;
                  $tmp['L9resultsMa93edest'] =0;
               }

               if( $tmp['valMa93ad']<>0){
                $tmp['L10resultsMa93ed'] = (int)($tmp['L10'] / $tmp['valMa93ad']) ;   
                $tmp['L10resultsMa93edest'] = ($tmp['L10'] % $tmp['valMa93ad']);
               }else{
                  $tmp['L10resultsMa93ed'] =0;
                  $tmp['L10resultsMa93edest'] =0;
               }


               if( $tmp['valMa93ad']<>0){
                $tmp['L11resultsMa93ed'] = (int)($tmp['L11'] / $tmp['valMa93ad']) ;   
                $tmp['L11resultsMa93edest'] = ($tmp['L11'] % $tmp['valMa93ad']);
               }else{
                  $tmp['L11resultsMa93ed'] =0;
                  $tmp['L11resultsMa93edest'] =0;
               }
  
               if( $tmp['valMa93ad']<>0){
                  $tmp['L12resultsMa93ed'] = (int)($tmp['L12'] / $tmp['valMa93ad']) ;   
                  $tmp['L12resultsMa93edest'] = ($tmp['L12'] % $tmp['valMa93ad']);
                 }else{
                    $tmp['L12resultsMa93ed'] =0;
                    $tmp['L12resultsMa93edest'] =0;
                 }
              if( $tmp['valMa93ad']<>0){
                  $tmp['L13resultsMa93ed'] = (int)($tmp['L13'] / $tmp['valMa93ad']) ;   
                  $tmp['L13resultsMa93edest'] = ($tmp['L13'] % $tmp['valMa93ad']);
                   }else{
                      $tmp['L13resultsMa93ed'] =0;
                       $tmp['L13resultsMa93edest'] =0;
               }
                 
               if( $tmp['valMa93ad']<>0){
                $tmp['L14resultsMa93ed'] = (int)($tmp['L14'] / $tmp['valMa93ad']) ;   
                $tmp['L14resultsMa93edest'] = ($tmp['L14'] % $tmp['valMa93ad']);
               }else{
                  $tmp['L14resultsMa93ed'] =0;
                  $tmp['L14resultsMa93edest'] =0;
               }
              if( $tmp['valMa93ad']<>0){
                 $tmp['L15resultsMa93ed'] = (int)($tmp['L15'] / $tmp['valMa93ad']) ;   
                 $tmp['L15resultsMa93edest'] = ($tmp['L15'] % $tmp['valMa93ad']);
               }else{
                 $tmp['L15resultsMa93ed'] =0;
                  $tmp['L15resultsMa93edest'] =0;
               }
               
               if( $tmp['valMa93ad']<>0){
                  $tmp['L16resultsMa93ed'] = (int)($tmp['L16'] / $tmp['valMa93ad']) ;   
                  $tmp['L16resultsMa93edest'] = ($tmp['L16'] % $tmp['valMa93ad']);
                 }else{
                    $tmp['L16resultsMa93ed'] =0;
                    $tmp['L16resultsMa93edest'] =0;
                 }
  
                 if( $tmp['valMa93ad']<>0){
                  $tmp['L17resultsMa93ed'] = (int)($tmp['L17'] / $tmp['valMa93ad']) ;   
                  $tmp['L17resultsMa93edest'] = ($tmp['L17'] % $tmp['valMa93ad']);
                 }else{
                    $tmp['L17resultsMa93ed'] =0;
                    $tmp['L17resultsMa93edest'] =0;
                 }
  
                 if( $tmp['valMa93ad']<>0){
                  $tmp['L18resultsMa93ed'] = (int)($tmp['L18'] / $tmp['valMa93ad']) ;   
                  $tmp['L18resultsMa93edest'] = ($tmp['L18'] % $tmp['valMa93ad']);
                 }else{
                    $tmp['L18resultsMa93ed'] =0;
                    $tmp['L18resultsMa93edest'] =0;
                 }
  
                 if( $tmp['valMa93ad']<>0){
                  $tmp['L19resultsMa93ed'] = (int)($tmp['L19'] / $tmp['valMa93ad']) ;   
                  $tmp['L19resultsMa93edest'] = ($tmp['L19'] % $tmp['valMa93ad']);
                 }else{
                    $tmp['L19resultsMa93ed'] =0;
                    $tmp['L19resultsMa93edest'] =0;
                 }
  
                 if( $tmp['valMa93ad']<>0){
                  $tmp['L20resultsMa93ed'] = (int)($tmp['L20'] / $tmp['valMa93ad']) ;   
                  $tmp['L20resultsMa93edest'] = ($tmp['L20'] % $tmp['valMa93ad']);
                 }else{
                    $tmp['L20resultsMa93ed'] =0;
                    $tmp['L20resultsMa93edest'] =0;
                 }

                 if( $tmp['valMa93ad']<>0){
                    $tmp['L21resultsMa93ed'] = (int)($tmp['L21'] / $tmp['valMa93ad']) ;   
                    $tmp['L21resultsMa93edest'] = ($tmp['L21'] % $tmp['valMa93ad']);
                   }else{
                      $tmp['L21resultsMa93ed'] =0;
                      $tmp['L21resultsMa93edest'] =0;
                   }
      
                   if( $tmp['valMa93ad']<>0){
                      $tmp['L22resultsMa93ed'] = (int)($tmp['L22'] / $tmp['valMa93ad']) ;   
                      $tmp['L22resultsMa93edest'] = ($tmp['L22'] % $tmp['valMa93ad']);
                     }else{
                        $tmp['L22resultsMa93ed'] =0;
                        $tmp['L22resultsMa93edest'] =0;
                     }
                  if( $tmp['valMa93ad']<>0){
                      $tmp['L23resultsMa93ed'] = (int)($tmp['L23'] / $tmp['valMa93ad']) ;   
                      $tmp['L23resultsMa93edest'] = ($tmp['L23'] % $tmp['valMa93ad']);
                       }else{
                          $tmp['L23resultsMa93ed'] =0;
                           $tmp['L23resultsMa93edest'] =0;
                   }
                     
                   if( $tmp['valMa93ad']<>0){
                    $tmp['L24resultsMa93ed'] = (int)($tmp['L24'] / $tmp['valMa93ad']) ;   
                    $tmp['L24resultsMa93edest'] = ($tmp['L24'] % $tmp['valMa93ad']);
                   }else{
                      $tmp['L24resultsMa93ed'] =0;
                      $tmp['L24resultsMa93edest'] =0;
                   }
                  if( $tmp['valMa93ad']<>0){
                     $tmp['L25resultsMa93ed'] = (int)($tmp['L25'] / $tmp['valMa93ad']) ;   
                     $tmp['L25resultsMa93edest'] = ($tmp['L25'] % $tmp['valMa93ad']);
                   }else{
                     $tmp['L25resultsMa93ed'] =0;
                      $tmp['L25resultsMa93edest'] =0;
                   }
                   
                   if( $tmp['valMa93ad']<>0){
                      $tmp['L26resultsMa93ed'] = (int)($tmp['L26'] / $tmp['valMa93ad']) ;   
                      $tmp['L26resultsMa93edest'] = ($tmp['L26'] % $tmp['valMa93ad']);
                     }else{
                        $tmp['L26resultsMa93ed'] =0;
                        $tmp['L26resultsMa93edest'] =0;
                     }
      
                     if( $tmp['valMa93ad']<>0){
                      $tmp['L27resultsMa93ed'] = (int)($tmp['L27'] / $tmp['valMa93ad']) ;   
                      $tmp['L27resultsMa93edest'] = ($tmp['L27'] % $tmp['valMa93ad']);
                     }else{
                        $tmp['L27resultsMa93ed'] =0;
                        $tmp['L27resultsMa93edest'] =0;
                     }
      
                     if( $tmp['valMa93ad']<>0){
                      $tmp['L28resultsMa93ed'] = (int)($tmp['L28'] / $tmp['valMa93ad']) ;   
                      $tmp['L28resultsMa93edest'] = ($tmp['L28'] % $tmp['valMa93ad']);
                     }else{
                        $tmp['L28resultsMa93ed'] =0;
                        $tmp['L28resultsMa93edest'] =0;
                     }
      
                     if( $tmp['valMa93ad']<>0){
                      $tmp['L29resultsMa93ed'] = (int)($tmp['L29'] / $tmp['valMa93ad']) ;   
                      $tmp['L29resultsMa93edest'] = ($tmp['L29'] % $tmp['valMa93ad']);
                     }else{
                        $tmp['L29resultsMa93ed'] =0;
                        $tmp['L29resultsMa93edest'] =0;
                     }
      
                     if( $tmp['valMa93ad']<>0){
                      $tmp['L30resultsMa93ed'] = (int)($tmp['L30'] / $tmp['valMa93ad']) ;   
                      $tmp['L30resultsMa93edest'] = ($tmp['L30'] % $tmp['valMa93ad']);
                     }else{
                        $tmp['L30resultsMa93ed'] =0;
                        $tmp['L30resultsMa93edest'] =0;
                     }

                     if( $tmp['valMa93ad']<>0){
                        $tmp['L31resultsMa93ed'] = (int)($tmp['L31'] / $tmp['valMa93ad']) ;   
                        $tmp['L31resultsMa93edest'] = ($tmp['L31'] % $tmp['valMa93ad']);
                       }else{
                          $tmp['L31resultsMa93ed'] =0;
                          $tmp['L31resultsMa93edest'] =0;
                       }
          
                       if( $tmp['valMa93ad']<>0){
                          $tmp['L32resultsMa93ed'] = (int)($tmp['L32'] / $tmp['valMa93ad']) ;   
                          $tmp['L32resultsMa93edest'] = ($tmp['L32'] % $tmp['valMa93ad']);
                         }else{
                            $tmp['L32resultsMa93ed'] =0;
                            $tmp['L32resultsMa93edest'] =0;
                         }
                      if( $tmp['valMa93ad']<>0){
                          $tmp['L33resultsMa93ed'] = (int)($tmp['L33'] / $tmp['valMa93ad']) ;   
                          $tmp['L33resultsMa93edest'] = ($tmp['L33'] % $tmp['valMa93ad']);
                           }else{
                              $tmp['L33resultsMa93ed'] =0;
                               $tmp['L33resultsMa93edest'] =0;
                       }
                         
                       if( $tmp['valMa93ad']<>0){
                        $tmp['L34resultsMa93ed'] = (int)($tmp['L34'] / $tmp['valMa93ad']) ;   
                        $tmp['L34resultsMa93edest'] = ($tmp['L34'] % $tmp['valMa93ad']);
                       }else{
                          $tmp['L34resultsMa93ed'] =0;
                          $tmp['L34resultsMa93edest'] =0;
                       }
                      if( $tmp['valMa93ad']<>0){
                         $tmp['L35resultsMa93ed'] = (int)($tmp['L35'] / $tmp['valMa93ad']) ;   
                         $tmp['L35resultsMa93edest'] = ($tmp['L35'] % $tmp['valMa93ad']);
                       }else{
                         $tmp['L35resultsMa93ed'] =0;
                          $tmp['L35resultsMa93edest'] =0;
                       }
                       
                       if( $tmp['valMa93ad']<>0){
                          $tmp['L36resultsMa93ed'] = (int)($tmp['L36'] / $tmp['valMa93ad']) ;   
                          $tmp['L36resultsMa93edest'] = ($tmp['L36'] % $tmp['valMa93ad']);
                         }else{
                            $tmp['L36resultsMa93ed'] =0;
                            $tmp['L36resultsMa93edest'] =0;
                         }
          
                         if( $tmp['valMa93ad']<>0){
                          $tmp['L37resultsMa93ed'] = (int)($tmp['L37'] / $tmp['valMa93ad']) ;   
                          $tmp['L37resultsMa93edest'] = ($tmp['L37'] % $tmp['valMa93ad']);
                         }else{
                            $tmp['L37resultsMa93ed'] =0;
                            $tmp['L37resultsMa93edest'] =0;
                         }
          
                         if( $tmp['valMa93ad']<>0){
                          $tmp['L38resultsMa93ed'] = (int)($tmp['L38'] / $tmp['valMa93ad']) ;   
                          $tmp['L38resultsMa93edest'] = ($tmp['L38'] % $tmp['valMa93ad']);
                         }else{
                            $tmp['L38resultsMa93ed'] =0;
                            $tmp['L38resultsMa93edest'] =0;
                         }
          
                         if( $tmp['valMa93ad']<>0){
                          $tmp['L39resultsMa93ed'] = (int)($tmp['L39'] / $tmp['valMa93ad']) ;   
                          $tmp['L39resultsMa93edest'] = ($tmp['L39'] % $tmp['valMa93ad']);
                         }else{
                            $tmp['L39resultsMa93ed'] =0;
                            $tmp['L39resultsMa93edest'] =0;
                         }
          
                         if( $tmp['valMa93ad']<>0){
                          $tmp['L40resultsMa93ed'] = (int)($tmp['L40'] / $tmp['valMa93ad']) ;   
                          $tmp['L40resultsMa93edest'] = ($tmp['L40'] % $tmp['valMa93ad']);
                         }else{
                            $tmp['L40resultsMa93ed'] =0;
                            $tmp['L40resultsMa93edest'] =0;
                         }
            array_push($results,$tmp);
        } 
    

        
        // var_dump($results['L1resultsMa93ed']);

         return view('admin.indexAdmin',[

        'results'=> $results,
     ]);

    }
    
    
    public function try(){

    //
}
    //  public function trrr()
    //  {





       
        // $nbrvotantsWresults= Office::groupBy('wilaya_id')
        // ->selectRaw('sum(nbrvotants) as sum, wilaya_id  ')
        // ->pluck('sum');


    //     $nbrdoc_contesWtresults= Office::groupBy('wilaya_id')
    //     ->selectRaw('sum(nbrdoc_contest) as sum, wilaya_id  ')
    //     ->pluck('sum');


    //     $nbrdoc_annulerWresults= Office::groupBy('wilaya_id')
    //     ->selectRaw('sum(nbrdoc_annuler) as sum, wilaya_id  ')
    //     ->pluck('sum');


    //     $nbrvotes_exprimWresults= Office::groupBy('wilaya_id')
    //     ->selectRaw('sum(nbrvotes_exprim) as sum, wilaya_id  ')
    //     ->pluck('sum');
//         /////////////for ctdresults



        // $nbr_électeurs_inscritsCTDresults= Ctdresult::groupBy('wilaya_id')
        // ->selectRaw('sum(nbr_électeurs_inscrits) as sum, wilaya_id  ')
        //  ->pluck('sum')->first();
         
       
        // $nbrvotantsCTDresults= Ctdresult::groupBy('wilaya_id')
        // ->selectRaw('sum(nbrvotants) as sum, wilaya_id  ')
        // ->pluck('sum');


        // $nbrdoc_contesCTDtresults= Ctdresult::groupBy('wilaya_id')
        // ->selectRaw('sum(nbrdoc_contest) as sum, wilaya_id  ')
        // ->pluck('sum');


        // $nbrdoc_annulerCTDresults= Ctdresult::groupBy('wilaya_id')
        // ->selectRaw('sum(nbrdoc_annuler) as sum, wilaya_id  ')
        // ->pluck('sum');


        // $nbrvotes_exprimCTDresults= Ctdresult::groupBy('wilaya_id')
        // ->selectRaw('sum(nbrvotes_exprim) as sum, wilaya_id  ')
        // ->pluck('sum');


//         //////////////for cmdresults


        //  $nbr_électeurs_inscritsCMDresults= Cmdresult::groupBy('wilaya_id')
        //  ->selectRaw('sum(nbr_électeurs_inscrits) as sum, wilaya_id  ')
        //  ->pluck('sum')->first();
       
        // $nbrvotantsCMDresults= Cmdresult::groupBy('wilaya_id')
        // ->selectRaw('sum(nbrvotants) as sum, wilaya_id  ')
        // ->pluck('sum');


        // $nbrdoc_contesCMDtresults= Cmdresult::groupBy('wilaya_id')
        // ->selectRaw('sum(nbrdoc_contest) as sum, wilaya_id  ')
        // ->pluck('sum');


        // $nbrdoc_annulerCMDresults= Cmdresult::groupBy('wilaya_id')
        // ->selectRaw('sum(nbrdoc_annuler) as sum, wilaya_id  ')
        // ->pluck('sum');


        // $nbrvotes_exprimCMDresults= Cmdresult::groupBy('wilaya_id')
        // ->selectRaw('sum(nbrvotes_exprim) as sum, wilaya_id  ')
        // ->pluck('sum');


//         ////////calcules


//  $nbr_électeurs_inscritsWresults=$nbr_électeurs_inscritsCMDresults[0] + $nbr_électeurs_inscritsCTDresults[0]+$nbr_électeurs_inscritsWresults[0];    

    // $nbrvotantsWresults=$nbrvotantsCTDresults[0]+$nbrvotantsCMDresults[0]+$nbrvotantsWresults[0];
// dd($nbr_électeurs_inscritsWresults[0]);
//         $nbrdoc_contesWtresults=$nbrdoc_contesCTDtresults[0]+$nbrdoc_contesCMDtresults[0]+$nbrdoc_contesWtresults[0];
//         $nbrdoc_annulerWresults=$nbrdoc_annulerCTDresults[0]+$nbrdoc_annulerCMDresults[0]+$nbrdoc_annulerWresults[0];
//         $nbrvotes_exprimWresults=$nbrvotes_exprimCTDresults[0]+$nbrvotes_exprimCMDresults[0]+$nbrvotes_exprimWresults[0];
       
       
//         $tauxparticipation=($nbrvotantsWresults * 100)/ $nbr_électeurs_inscritsWresults;



//         $tauxparticipation=$tauxparticipation * 100;

//          $ataba = ($nbrvotes_exprimWresults * 5)/100;


//         //  $ataba = 500;

//        // the listes
//        $i = 0;
//        $WilayaSupAtaba = [];
//        $W1results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L1) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CTD1results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L1) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD1results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L1) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W1results=$CTD1results[0]+$CMD1results[0]+$W1results[0];

//         if($W1results > $ataba){
//             $WilayaSupAtaba[$i]= $W1results;
//             $i++;
//         }
        

//         $W3results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L3) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD3results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L3) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD3results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L3) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W3results=$CTD3results[0]+$CMD3results[0]+$W3results[0];

//         if($W3results > $ataba){
//             $WilayaSupAtaba[$i]= $W3results;
//             $i++;
//         }

//         $W4results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L4) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD4results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L4) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD4results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L4) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W4results=$CTD4results[0]+$CMD4results[0]+$W4results[0];



//         if($W4results > $ataba){
//             $WilayaSupAtaba[$i]= $W4results;
//             $i++;
//         }


//         $W5results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L5) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD5results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L5) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD5results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L5) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W5results=$CTD5results[0]+$CMD5results[0]+$W5results[0];


//         if($W5results > $ataba){
//             $WilayaSupAtaba[$i]= $W5results;
//             $i++;
//         }


//         $W6results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L6) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD6results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L6) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD6results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L6) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W6results=$CTD6results[0]+$CMD6results[0]+$W6results[0];

//         if($W6results > $ataba){
//             $WilayaSupAtaba[$i]= $W6results;
//             $i++;
//         }

//         $W7results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L7) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CTD7results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L7) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD7results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L7) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W7results=$CTD7results[0]+$CMD7results[0]+$W7results[0];

//         if($W7results > $ataba){
//             $WilayaSupAtaba[$i]= $W7results;
//             $i++;
//         }

//         $W8results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L8) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD8results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L8) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD8results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L8) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W8results=$CTD8results[0]+$CMD8results[0]+$W8results[0];
//         if($W8results > $ataba){
//             $WilayaSupAtaba[$i]= $W8results;
//             $i++;
//         }

//         $W10results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L10) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD10results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L10) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD10results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L10) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W10results=$CTD10results[0]+$CMD10results[0]+$W10results[0];


//         if($W10results > $ataba){
//             $WilayaSupAtaba[$i]= $W10results;
//             $i++;
//         }


//         $W11results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L11) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD11results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L11) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD11results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L11) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W11results=$CTD11results[0]+$CMD11results[0]+$W11results[0];


//         if($W11results > $ataba){
//             $WilayaSupAtaba[$i]= $W11results;
//             $i++;
//         }

//         $W12results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L12) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CTD12results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L12) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD12results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L12) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W12results=$CTD12results[0]+$CMD12results[0]+$W12results[0];

//         if($W12results > $ataba){
//             $WilayaSupAtaba[$i]= $W12results;
//             $i++;
//         }
        
//         ///////////////////////////////////////////////////////////////////
       
     
       
//         $W13results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L13) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD13results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L13) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD13results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L13) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W13results=$CTD13results[0]+$CMD13results[0]+$W13results[0];

//         if($W13results > $ataba){
//             $WilayaSupAtaba[$i]= $W13results;
//             $i++;
//         }

//         $W14results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L14) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD14results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L14) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD14results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L14) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W14results=$CTD14results[0]+$CMD14results[0]+$W14results[0];
//         if($W14results > $ataba){
//             $WilayaSupAtaba[$i]= $W14results;
//             $i++;
//         }


//         $W15results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L15) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD15results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L15) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD15results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L15) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W15results=$CTD15results[0]+$CMD15results[0]+$W15results[0];


//         if($W15results > $ataba){
//             $WilayaSupAtaba[$i]= $W15results;
//             $i++;
//         }


//         $W16results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L16) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CTD16results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L16) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD16results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L16) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W16results=$CTD16results[0]+$CMD16results[0]+$W16results[0];

//         if($W16results > $ataba){
//             $WilayaSupAtaba[$i]= $W16results;
//             $i++;
//         }


//         $W19results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L19) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD19results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L19) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD19results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L19) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W19results=$CTD19results[0]+$CMD19results[0]+$W19results[0];

//         if($W19results > $ataba){
//             $WilayaSupAtaba[$i]= $W19results;
//             $i++;
//         }

//         $W20results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(20) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CTD20results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L20) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD20results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L20) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W20results=$CTD20results[0]+$CMD20results[0]+$W20results[0];

//         if($W20results > $ataba){
//             $WilayaSupAtaba[$i]= $W20results;
//             $i++;
//         }

//         $W21results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L21) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CTD21results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L21) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD21results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L21) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W21results=$CTD21results[0]+$CMD21results[0]+$W21results[0];

//         if($W21results > $ataba){
//             $WilayaSupAtaba[$i]= $W21results;
//             $i++;
//         }

//         $W22results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L22) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CTD22results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L22) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD22results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L22) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W22results=$CTD22results[0]+$CMD22results[0]+$W22results[0];

//         if($W22results > $ataba){
//             $WilayaSupAtaba[$i]= $W22results;
//             $i++;
//         }


//         $W24results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L24) as sum, wilaya_id  ')
//         ->pluck('sum');
        
//         $CTD24results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L24) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD24results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L24) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W24results=$CTD24results[0]+$CMD24results[0]+$W24results[0];

//         if($W24results > $ataba){
//             $WilayaSupAtaba[$i]= $W24results;
//             $i++;
//         }

//         $W25results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L25) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD25results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L25) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD25results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L25) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W25results=$CTD25results[0]+$CMD25results[0]+$W25results[0];
//         if($W25results > $ataba){
//             $WilayaSupAtaba[$i]= $W25results;
//             $i++;
//         }

        
//         /////////////////////////////////////////////////////
       
     
       
//         $W27results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L27) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CTD27results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L27) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD27results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L27) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W27results=$CTD27results[0]+$CMD27results[0]+$W27results[0];

//         if($W27results > $ataba){
//             $WilayaSupAtaba[$i]= $W27results;
//             $i++;
//         }

//         $W28results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L28) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD28results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L28) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD28results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L28) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W28results=$CTD28results[0]+$CMD28results[0]+$W28results[0];

//         if($W28results > $ataba){
//             $WilayaSupAtaba[$i]= $W28results;
//             $i++;
//         }


//         $W29results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L29) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CTD29results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L29) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD29results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L29) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W29results=$CTD29results[0]+$CMD29results[0]+$W29results[0];

//         if($W29results > $ataba){
//             $WilayaSupAtaba[$i]= $W29results;
//             $i++;
//         }

//         $W30results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L30) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CTD30results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L30) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD30results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L30) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W30results=$CTD30results[0]+$CMD30results[0]+$W30results[0];

//         if($W30results > $ataba){
//             $WilayaSupAtaba[$i]= $W30results;
//             $i++;
//         }

//         $W31results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L31) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD31results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L31) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD31results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L31) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W31results=$CTD31results[0]+$CMD31results[0]+$W31results[0];

//         if($W31results > $ataba){
//             $WilayaSupAtaba[$i]= $W31results;
//             $i++;
//         }

//         $W32results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L32) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD32results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L32) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD32results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L32) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W32results=$CTD32results[0]+$CMD32results[0]+$W32results[0];
//         if($W32results > $ataba){
//             $WilayaSupAtaba[$i]= $W32results;
//             $i++;
//         }

//         $W33results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L33) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CTD33results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L33) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD33results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L33) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W33results=$CTD33results[0]+$CMD33results[0]+$W33results[0];

//         if($W33results > $ataba){
//             $WilayaSupAtaba[$i]= $W33results;
//             $i++;
//         }


//         $W34results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L34) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD34results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L34) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD34results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L34) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W34results=$CTD34results[0]+$CMD34results[0]+$W34results[0];

//         if($W34results > $ataba){
//             $WilayaSupAtaba[$i]= $W34results;
//             $i++;
//         }


//         $W35results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L35) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD35results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L35) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD35results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L35) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W35results=$CTD35results[0]+$CMD35results[0]+$W35results[0];

//         if($W35results > $ataba){
//             $WilayaSupAtaba[$i]= $W35results;
//             $i++;
//         }

//         $W36results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L36) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD36results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L36) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD36results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L36) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W36results=$CTD36results[0]+$CMD36results[0]+$W36results[0];

//         if($W36results > $ataba){
//             $WilayaSupAtaba[$i]= $W36results;
//             $i++;
//         }

        
        
       
//      /////////////////////////////////////////////



//      $W37results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L37) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD37results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L37) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD37results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L37) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W37results=$CTD37results[0]+$CMD37results[0]+$W37results[0];

//         if($W37results > $ataba){
//             $WilayaSupAtaba[$i]= $W37results;
//             $i++;
//         }

//         $W38results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L38) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD38results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L38) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD38results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L38) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W38results=$CTD38results[0]+$CMD38results[0]+$W38results[0];

//         if($W38results > $ataba){
//             $WilayaSupAtaba[$i]= $W38results;
//             $i++;
//         }

//         $W39results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L39) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD39results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L39) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD39results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L39) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W39results=$CTD39results[0]+$CMD39results[0]+$W39results[0];

//         if($W39results > $ataba){
//             $WilayaSupAtaba[$i]= $W39results;
//             $i++;
//         }

//         $W40results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L40) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD40results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L40) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD40results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L40) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W40results=$CTD40results[0]+$CMD40results[0]+$W40results[0];

//         if($W40results > $ataba){
//             $WilayaSupAtaba[$i]= $W40results;
//             $i++;
//         }

//         $W41results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L41) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CTD41results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L41) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD41results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L41) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W41results=$CTD41results[0]+$CMD41results[0]+$W41results[0];

//         if($W41results > $ataba){
//             $WilayaSupAtaba[$i]= $W41results;
//             $i++;
//         }

//         $W42results= Office::groupBy('wilaya_id')
//         ->selectRaw('sum(L42) as sum, wilaya_id  ')
//         ->pluck('sum');

//         $CTD42results= Ctdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L42) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $CMD42results= Cmdresult::groupBy('wilaya_id')
//         ->selectRaw('sum(L42) as sum, wilaya_id  ')
//         ->pluck('sum');
//         $W42results=$CTD42results[0]+$CMD42results[0]+$W42results[0];

//         if($W42results > $ataba){
//             $WilayaSupAtaba[$i] = $W42results;
//             $i++;
//         }
// /////LISTE COMMUNES
//     $total = 0;
// foreach ($WilayaSupAtaba as $var) {
//     $total = $total + $var;
    
// }

// // $Somme = $Somme;
// $Ma93ad=0;
// if($total <> 0){
//     $Ma93ad = $total /34;
// }

// $W16resultsMa93ed=(int)($W16results / $Ma93ad) ;
// $W16resultsMa93edrest=($W16results % $Ma93ad);

// // $Ma93ad = $total /36;







// here na7asbo every think for communes results 

// $nbr_électeurs_inscritsCresults= Office::groupBy('commune_id')
//         ->selectRaw('sum(nbr_électeurs_inscrits) as sum, commune_id  ')
//         ->pluck('sum');

      

// $nbrvotantsCresults= Office::groupBy('commune_id')
// ->selectRaw('sum(nbrvotants) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $nbrdoc_contesCtresults= Office::groupBy('commune_id')
// ->selectRaw('sum(nbrdoc_contest) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $nbrdoc_annulerCresults= Office::groupBy('commune_id')
// ->selectRaw('sum(nbrdoc_annuler) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $nbrvotes_exprimCresults= Office::groupBy('commune_id')
// ->selectRaw('sum(nbrvotes_exprim) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// extract info for centre direct results 



//  $nbr_électeurs_inscritsCTDresults= Ctdresult::groupBy('commune_id')
//         ->selectRaw('sum(nbr_électeurs_inscrits) as sum, commune_id  ')
//          ->pluck('sum');
         
       
//         $nbrvotantsCTDresults= Ctdresult::groupBy('commune_id')
//         ->selectRaw('sum(nbrvotants) as sum, commune_id  ')
//         ->pluck('sum','commune_id');


//         $nbrdoc_contesCTDtresults= Ctdresult::groupBy('commune_id')
//         ->selectRaw('sum(nbrdoc_contest) as sum, commune_id  ')
//         ->pluck('sum','commune_id');


//         $nbrdoc_annulerCTDresults= Ctdresult::groupBy('commune_id')
//         ->selectRaw('sum(nbrdoc_annuler) as sum, commune_id  ')
//         ->pluck('sum','commune_id');


//         $nbrvotes_exprimCTDresults= Ctdresult::groupBy('commune_id')
//         ->selectRaw('sum(nbrvotes_exprim) as sum, commune_id  ')
//         ->pluck('sum','commune_id');


        //////////////extract info for cmdresults


        //  $nbr_électeurs_inscritsCMDresults= Cmdresult::groupBy('commune_id')
        //  ->selectRaw('sum(nbr_électeurs_inscrits) as sum, commune_id  ')
        //  ->pluck('sum');
       
        // $nbrvotantsCMDresults= Cmdresult::groupBy('commune_id')
        // ->selectRaw('sum(nbrvotants) as sum, commune_id  ')
        // ->pluck('sum','commune_id');


        // $nbrdoc_contesCMDtresults= Cmdresult::groupBy('commune_id')
        // ->selectRaw('sum(nbrdoc_contest) as sum, commune_id  ')
        // ->pluck('sum','commune_id');


        // $nbrdoc_annulerCMDresults= Cmdresult::groupBy('commune_id')
        // ->selectRaw('sum(nbrdoc_annuler) as sum, commune_id  ')
        // ->pluck('sum','commune_id');


        // $nbrvotes_exprimCMDresults= Cmdresult::groupBy('commune_id')
        // ->selectRaw('sum(nbrvotes_exprim) as sum, commune_id  ')
        // ->pluck('sum','commune_id');




        // dd($nbr_électeurs_inscritsCMDresults);
// $nbr_électeurs_inscritsCresults = array();

//   $nbr_électeurs_inscritsCresults = $nbr_électeurs_inscritsCMDresults[0] + $nbr_électeurs_inscritsCTDresults[0] + $nbr_électeurs_inscritsCresults[0];    
  
//les calcules
        // for($i = 1; $i<4 ;$i++)
        // {
           

            //    $nbrvotantsCresults[$i]=$nbrvotantsCTDresults[0]+$nbrvotantsCMDresults[0]+$nbrvotantsCresults[0];
            
            //         $nbrdoc_contesCtresults[$i]=$nbrdoc_contesCTDtresults[0]+$nbrdoc_contesCMDtresults[0]+$nbrdoc_contesCtresults[0];
            //         $nbrdoc_annulerCresults[$i]=$nbrdoc_annulerCTDresults[0]+$nbrdoc_annulerCMDresults[0]+$nbrdoc_annulerCresults[0];
            //         $nbrvotes_exprimCresults[$i]=$nbrvotes_exprimCTDresults[0]+$nbrvotes_exprimCMDresults[0]+$nbrvotes_exprimCresults[0];
                   
                   
                    // $tauxparticipation[$i]=($nbrvotantsCresults[$i] * 100)/ $nbr_électeurs_inscritsCresults[$i];
            
            
            
                    // $tauxparticipation[$i]=$tauxparticipation[$i] * 100;
            
                    //  $ataba[$i] = ($nbrvotes_exprimCresults[$i] * 5)/100;
            

        // }






// // the listes

// $C1results= Office::groupBy('commune_id')
// ->selectRaw('sum(L1) as sum, commune_id  ')
// ->pluck('sum','commune_id');

// $C3results= Office::groupBy('commune_id')
// ->selectRaw('sum(L3) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C4results= Office::groupBy('commune_id')
// ->selectRaw('sum(L4) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C5results= Office::groupBy('commune_id')
// ->selectRaw('sum(L5) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C6results= Office::groupBy('commune_id')
// ->selectRaw('sum(L6) as sum, commune_id  ')
// ->pluck('sum','commune_id');

// $C7results= Office::groupBy('commune_id')
// ->selectRaw('sum(L7) as sum, commune_id  ')
// ->pluck('sum','commune_id');

// $C8results= Office::groupBy('commune_id')
// ->selectRaw('sum(L8) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C10results= Office::groupBy('commune_id')
// ->selectRaw('sum(L10) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C11results= Office::groupBy('commune_id')
// ->selectRaw('sum(L11) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C12results= Office::groupBy('commune_id')
// ->selectRaw('sum(L12) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// ///////////////////////////////////////////////////////////////////



// $C13results= Office::groupBy('commune_id')
// ->selectRaw('sum(L13) as sum, commune_id  ')
// ->pluck('sum','commune_id');

// $C14results= Office::groupBy('commune_id')
// ->selectRaw('sum(L14) as sum, commune_id  ')
// ->pluck('sum','commune_id');

// $C15results= Office::groupBy('commune_id')
// ->selectRaw('sum(L15) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C16results= Office::groupBy('commune_id')
// ->selectRaw('sum(L16) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C19results= Office::groupBy('commune_id')
// ->selectRaw('sum(L19) as sum, commune_id  ')
// ->pluck('sum','commune_id');

// $C20results= Office::groupBy('commune_id')
// ->selectRaw('sum(L20) as sum, commune_id  ')
// ->pluck('sum','commune_id');

// $C21results= Office::groupBy('commune_id')
// ->selectRaw('sum(L21) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C22results= Office::groupBy('commune_id')
// ->selectRaw('sum(L22) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C24results= Office::groupBy('commune_id')
// ->selectRaw('sum(L24) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C25results= Office::groupBy('commune_id')
// ->selectRaw('sum(L25) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// /////////////////////////////////////////////////////



// $C27results= Office::groupBy('commune_id')
// ->selectRaw('sum(L27) as sum, commune_id  ')
// ->pluck('sum');

// $C28results= Office::groupBy('commune_id')
// ->selectRaw('sum(L28) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C29results= Office::groupBy('commune_id')
// ->selectRaw('sum(L29) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C30results= Office::groupBy('commune_id')
// ->selectRaw('sum(L30) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C31results= Office::groupBy('commune_id')
// ->selectRaw('sum(L31) as sum, commune_id  ')
// ->pluck('sum','commune_id');

// $C32results= Office::groupBy('commune_id')
// ->selectRaw('sum(L32) as sum, commune_id  ')
// ->pluck('sum','commune_id');

// $C33results= Office::groupBy('commune_id')
// ->selectRaw('sum(L33) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C34results= Office::groupBy('commune_id')
// ->selectRaw('sum(L34) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C35results= Office::groupBy('commune_id')
// ->selectRaw('sum(L35) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C36results= Office::groupBy('commune_id')
// ->selectRaw('sum(L36) as sum, commune_id  ')
// ->pluck('sum','commune_id');




// /////////////////////////////////////////////



// $C37results= Office::groupBy('commune_id')
// ->selectRaw('sum(L37) as sum, commune_id  ')
// ->pluck('sum','commune_id');

// $C38results= Office::groupBy('commune_id')
// ->selectRaw('sum(L38) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C39results= Office::groupBy('commune_id')
// ->selectRaw('sum(L39) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C40results= Office::groupBy('commune_id')
// ->selectRaw('sum(L40) as sum, commune_id  ')
// ->pluck('sum','commune_id');


// $C41results= Office::groupBy('commune_id')
// ->selectRaw('sum(L41) as sum, commune_id  ')
// ->pluck('sum','commune_id');

// $C42results= Office::groupBy('commune_id')
// ->selectRaw('sum(L42) as sum, commune_id  ')
// ->pluck('sum','commune_id');





//  return view('admin.indexAdmin'

//           ,[
//             'nbr_électeurs_inscritsCresults'=> $nbr_électeurs_inscritsCresults,
            
//              'nbrvotantsWresults'=>$nbrvotantsWresults,
//             'nbrdoc_contesWtresults'=>$nbrdoc_contesWtresults,
//             'nbrdoc_annulerWresults'=>$nbrdoc_annulerWresults,
//             'nbrvotes_exprimWresults'=>$nbrvotes_exprimWresults,

//             ///LISTES
//             'W1results'=>$W1results,
//             'W3results'=>$W3results,
//             'W4results'=>$W4results,
//             'W5results'=>$W5results,
//             'W6results'=>$W6results,
//             'W7results'=>$W7results,
//             'W8results'=>$W8results,
//             'W10results'=>$W10results,
//             'W11results'=>$W11results,
//             'W12results'=>$W12results,
//             /////
//             'W13results'=>$W13results,
//             'W14results'=>$W14results,
//             'W15results'=>$W15results,
//             'W16results'=>$W16results,
//             'W19results'=>$W19results,
//             'W20results'=>$W20results,
//             'W21results'=>$W21results,
//             'W22results'=>$W22results,
//             'W24results'=>$W24results,
//             'W25results'=>$W25results,
//             /////
//             'W27results'=>$W27results,
//             'W28results'=>$W28results,
//             'W29results'=>$W29results,
//             'W30results'=>$W30results,
//             'W31results'=>$W31results,
//             'W32results'=>$W32results,
//             'W33results'=>$W33results,
//             'W34results'=>$W34results,
//             'W35results'=>$W35results,
//             'W36results'=>$W36results,
//             /////
//             'W37results'=>$W37results,
//             'W38results'=>$W38results,
//             'W39results'=>$W39results,
//             'W40results'=>$W40results,
//             'W41results'=>$W41results,
//             'W42results'=>$W42results,
//             ///// 


//             ////////////LISTES COMMUNES
            // 'nbr_électeurs_inscritsCresults'=> $nbr_électeurs_inscritsCresults,
            // 'nbrvotantsCresults'=>$nbrvotantsCresults,
            // 'nbrdoc_contesCtresults'=>$nbrdoc_contesCtresults,
            // 'nbrdoc_annulerCresults'=>$nbrdoc_annulerCresults,
            // 'nbrvotes_exprimCresults'=>$nbrvotes_exprimCresults,
// ///////////////////LISTES

//             'C1results'=>$C1results,
//             'C3results'=>$C3results,
//             'C4results'=>$C4results,
//             'C5results'=>$C5results,
//             'C6results'=>$C6results,
//             'C7results'=>$C7results,
//             'C8results'=>$C8results,
//             'C10results'=>$C10results,
//             'C11results'=>$C11results,
//             'C12results'=>$C12results,
//             /////
//             'C13results'=>$C13results,
//             'C14results'=>$C14results,
//             'C15results'=>$C15results,
//             'C16results'=>$C16results,
//             'C19results'=>$C19results,
//             'C20results'=>$C20results,
//             'C21results'=>$C21results,
//             'C22results'=>$C22results,
//             'C24results'=>$C24results,
//             'C25results'=>$C25results,
//             /////
//             'C27results'=>$C27results,
//             'C28results'=>$C28results,
//             'C29results'=>$C29results,
//             'C30results'=>$C30results,
//             'C31results'=>$C31results,
//             'C32results'=>$C32results,
//             'C33results'=>$C33results,
//             'C34results'=>$C34results,
//             'C35results'=>$C35results,
//             'C36results'=>$C36results,
//             /////
//             'C37results'=>$C37results,
//             'C38results'=>$C38results,
//             'C39results'=>$C39results,
//             'C40results'=>$C40results,
//             'C41results'=>$C41results,
//             'C42results'=>$C42results,
//             ///// 
            // 'tauxparticipation' =>$tauxparticipation,
            // 'Attaba'=>$ataba,
//             'total' => $total,
//             'Ma93ad' => $Ma93ad,
//             'WilayaSupAtaba' =>$WilayaSupAtaba,
//             'W16resultsMa93edrest' =>$W16resultsMa93edrest,
//             'W16resultsMa93ed' => $W16resultsMa93ed

            
    //   ] );
        
    //  }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.indexAdmin',[
            'willayaresult'=> Willayaresult::find($id),
            'communeresult'=> Communeresult::find($id)
        ]);
        
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}