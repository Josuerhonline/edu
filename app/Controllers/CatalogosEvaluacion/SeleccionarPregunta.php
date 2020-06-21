<?php namespace App\Controllers\CatalogosEvaluacion;
use App\Models\CatalogosEvaluacion\preguntasViewModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class SeleccionarPregunta extends BaseController {

  // public function pregunta2(){
  //   $preguntas = new preguntasViewModel();
  //   $id1=$_POST['id1'];

  //   $preguntaData = $preguntas->asObject()->select('view_preguntas.*')->where('preguntaId<>',$id1)->findAll();
  //   $cadena="<script> $(document).ready(function(){
  //     $('#pregunta2').select2();
  //     });
  //     </script>
  //     <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Seleccione una pregunta<span class='required'>*</span>
  //     </label>
  //     <div class='input-group mb-3 col-md-6'>
  //     <div class='input-group-prepend'>
  //     <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-list-ol' style='color:#2A3F54;width: 20px;height: 24px;
  //     '></i></span>
  //     </div>
  //     <select style='width: 74%' class='form-control col-md-11' id='pregunta2' name='pregunta2' >
  //     <option class='form-control' value='1' selected>< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>";
  //     foreach ($preguntaData as $p){
  //       $cadena=$cadena.'<option value='.$p->preguntaId.'>'.$p->preguntaId.'</option>';
  //     }
  //     echo  $cadena."</select>";

  //   }
  //   public function pregunta3(){
  //     $preguntas = new preguntasViewModel();
  //     $id1=$_POST['id1'];
  //     $id2=$_POST['id2'];
  //     $id4=$_POST['id4'];
  //     $id5=$_POST['id5'];
  //     $id6=$_POST['id6'];
  //     $id7=$_POST['id7'];
  //     $id8=$_POST['id8'];
  //     $preguntaData = $preguntas->asObject()->select('view_preguntas.*')->where('preguntaId<>',$id1)->where('preguntaId<>',$id2)->where('preguntaId<>',$id4)->where('preguntaId<>',$id5)->where('preguntaId<>',$id6)->where('preguntaId<>',$id7)->where('preguntaId<>',$id8)->findAll();
  //     $cadena="<script> $(document).ready(function(){
  //       $('#pregunta3').select2();
  //       });
  //       </script>
  //       <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Seleccione una pregunta<span class='required'>*</span>
  //       </label>
  //       <div class='input-group mb-3 col-md-6'>
  //       <div class='input-group-prepend'>
  //       <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-list-ol' style='color:#2A3F54;width: 20px;height: 24px;
  //       '></i></span>
  //       </div>
  //       <select style='width: 74%' class='form-control col-md-11' id='pregunta3' name='pregunta3' >
  //       <option class='form-control' value='1' selected>< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>";
  //       foreach ($preguntaData as $p){
  //         $cadena=$cadena.'<option value='.$p->preguntaId.'>'.$p->preguntaId.'</option>';
  //       }
  //       echo  $cadena."</select>";

  //     }
  //     public function pregunta4(){
  //       $preguntas = new preguntasViewModel();
  //       $id1=$_POST['id1'];
  //       $id2=$_POST['id2'];
  //       $id3=$_POST['id3'];
  //       $id5=$_POST['id5'];
  //       $id6=$_POST['id6'];
  //       $id7=$_POST['id7'];
  //       $id8=$_POST['id8'];
  //       $preguntaData = $preguntas->asObject()->select('view_preguntas.*')->where('preguntaId<>',$id1)->where('preguntaId<>',$id2)->where('preguntaId<>',$id3)->where('preguntaId<>',$id5)->where('preguntaId<>',$id6)->where('preguntaId<>',$id7)->where('preguntaId<>',$id8)->findAll();
  //       $cadena="<script> $(document).ready(function(){
  //         $('#pregunta4').select2();
  //         });
  //         </script>
  //         <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Seleccione una pregunta<span class='required'>*</span>
  //         </label>
  //         <div class='input-group mb-3 col-md-6'>
  //         <div class='input-group-prepend'>
  //         <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-list-ol' style='color:#2A3F54;width: 20px;height: 24px;
  //         '></i></span>
  //         </div>
  //         <select style='width: 74%' class='form-control col-md-11' id='pregunta4' name='pregunta4' >
  //         <option class='form-control' value='1' selected>< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>";
  //         foreach ($preguntaData as $p){
  //           $cadena=$cadena.'<option value='.$p->preguntaId.'>'.$p->preguntaId.'</option>';
  //         }
  //         echo  $cadena."</select>";

  //       }
  //       public function pregunta5(){
  //         $preguntas = new preguntasViewModel();
  //         $id1=$_POST['id1'];
  //         $id2=$_POST['id2'];
  //         $id3=$_POST['id3'];
  //         $id4=$_POST['id4'];
  //         $id6=$_POST['id6'];
  //         $id7=$_POST['id7'];
  //         $id8=$_POST['id8'];
  //         $preguntaData = $preguntas->asObject()->select('view_preguntas.*')->where('preguntaId<>',$id1)->where('preguntaId<>',$id2)->where('preguntaId<>',$id3)->where('preguntaId<>',$id4)->where('preguntaId<>',$id6)->where('preguntaId<>',$id7)->where('preguntaId<>',$id8)->findAll();
  //         $cadena="<script> $(document).ready(function(){
  //           $('#pregunta5').select2();
  //           });
  //           </script>
  //           <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Seleccione una pregunta<span class='required'>*</span>
  //           </label>
  //           <div class='input-group mb-3 col-md-6'>
  //           <div class='input-group-prepend'>
  //           <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-list-ol' style='color:#2A3F54;width: 20px;height: 24px;
  //           '></i></span>
  //           </div>
  //           <select style='width: 74%' class='form-control col-md-11' id='pregunta5' name='pregunta5' >
  //           <option class='form-control' value='1' selected>< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>";
  //           foreach ($preguntaData as $p){
  //             $cadena=$cadena.'<option value='.$p->preguntaId.'>'.$p->preguntaId.'</option>';
  //           }
  //           echo  $cadena."</select>";

  //         }
  //         public function pregunta6(){
  //           $preguntas = new preguntasViewModel();
  //           $id1=$_POST['id1'];
  //           $id2=$_POST['id2'];
  //           $id3=$_POST['id3'];
  //           $id4=$_POST['id4'];
  //           $id5=$_POST['id5'];
  //           $id7=$_POST['id7'];
  //           $id8=$_POST['id8'];
  //           $preguntaData = $preguntas->asObject()->select('view_preguntas.*')->where('preguntaId<>',$id1)->where('preguntaId<>',$id2)->where('preguntaId<>',$id3)->where('preguntaId<>',$id4)->where('preguntaId<>',$id5)->where('preguntaId<>',$id7)->where('preguntaId<>',$id8)->findAll();
  //           $cadena="<script> $(document).ready(function(){
  //             $('#pregunta6').select2();
  //             });
  //             </script>
  //             <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Seleccione una pregunta<span class='required'>*</span>
  //             </label>
  //             <div class='input-group mb-3 col-md-6'>
  //             <div class='input-group-prepend'>
  //             <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-list-ol' style='color:#2A3F54;width: 20px;height: 24px;
  //             '></i></span>
  //             </div>
  //             <select style='width: 74%' class='form-control col-md-11' id='pregunta6' name='pregunta6' >
  //             <option class='form-control' value='1' selected>< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>";
  //             foreach ($preguntaData as $p){
  //               $cadena=$cadena.'<option value='.$p->preguntaId.'>'.$p->preguntaId.'</option>';
  //             }
  //             echo  $cadena."</select>";

  //           }
  //           public function pregunta7(){
  //             $preguntas = new preguntasViewModel();
  //             $id1=$_POST['id1'];
  //             $id2=$_POST['id2'];
  //             $id3=$_POST['id3'];
  //             $id4=$_POST['id4'];
  //             $id5=$_POST['id5'];
  //             $id6=$_POST['id6'];
  //             $id8=$_POST['id8'];
  //             $preguntaData = $preguntas->asObject()->select('view_preguntas.*')->where('preguntaId<>',$id1)->where('preguntaId<>',$id2)->where('preguntaId<>',$id3)->where('preguntaId<>',$id4)->where('preguntaId<>',$id5)->where('preguntaId<>',$id6)->where('preguntaId<>',$id8)->findAll();
  //             $cadena="<script> $(document).ready(function(){
  //               $('#pregunta7').select2();
  //               });
  //               </script>
  //               <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Seleccione una pregunta<span class='required'>*</span>
  //               </label>
  //               <div class='input-group mb-3 col-md-6'>
  //               <div class='input-group-prepend'>
  //               <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-list-ol' style='color:#2A3F54;width: 20px;height: 24px;
  //               '></i></span>
  //               </div>
  //               <select style='width: 74%' class='form-control col-md-11' id='pregunta7' name='pregunta7' >
  //               <option class='form-control' value='1' selected>< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>";
  //               foreach ($preguntaData as $p){
  //                 $cadena=$cadena.'<option value='.$p->preguntaId.'>'.$p->preguntaId.'</option>';
  //               }
  //               echo  $cadena."</select>";

  //             }
  //             public function pregunta8(){
  //               $preguntas = new preguntasViewModel();
  //               $id1=$_POST['id1'];
  //               $id2=$_POST['id2'];
  //               $id3=$_POST['id3'];
  //               $id4=$_POST['id4'];
  //               $id5=$_POST['id5'];
  //               $id6=$_POST['id6'];
  //               $id7=$_POST['id7'];
  //               $preguntaData = $preguntas->asObject()->select('view_preguntas.*')->where('preguntaId<>',$id1)->where('preguntaId<>',$id2)->where('preguntaId<>',$id3)->where('preguntaId<>',$id4)->where('preguntaId<>',$id5)->where('preguntaId<>',$id6)->where('preguntaId<>',$id7)->findAll();
  //               $cadena="<script> $(document).ready(function(){
  //                 $('#pregunta8').select2();
  //                 });
  //                 </script>
  //                 <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Seleccione una pregunta<span class='required'>*</span>
  //                 </label>
  //                 <div class='input-group mb-3 col-md-6'>
  //                 <div class='input-group-prepend'>
  //                 <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-list-ol' style='color:#2A3F54;width: 20px;height: 24px;
  //                 '></i></span>
  //                 </div>
  //                 <select style='width: 74%' class='form-control col-md-11' id='pregunta8' name='pregunta8' >
  //                 <option class='form-control' value='1' selected>< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>";
  //                 foreach ($preguntaData as $p){
  //                   $cadena=$cadena.'<option value='.$p->preguntaId.'>'.$p->preguntaId.'</option>';
  //                 }
  //                 echo  $cadena."</select>";

  //               }


// TEMAS//////////////////////////////////


  public function tema1(){
    $preguntas = new preguntasViewModel();
    $id1=$_POST['id1'];
    $preguntaData = $preguntas->asObject()->select('tema')->where('preguntaId',$id1)->findAll();
    $cadena="
    <select style='width: 54%' class='form-control col-md-9' id='tema' name='tema' readonly>";
    foreach ($preguntaData as $p){
      $cadena=$cadena.'<option value='.$p->tema.'>'.$p->tema.'</option>';
    }
    echo  $cadena."</select>";

  }
  public function tema2(){
    $preguntas = new preguntasViewModel();
    $id=$_POST['idTema2'];
    $preguntaData = $preguntas->asObject()->select('tema')->where('preguntaId',$id)->findAll();
  
    $cadena="
    <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Área de capacitación<span class='required'>*</span>
    </label>
    <div class='input-group mb-3 col-md-6'>
    <div class='input-group-prepend'>
    <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-graduation-cap' style='color:#2A3F54;width: 20px;height: 24px;
    '></i></span>
    </div>
    <select style='width: 54%' class='form-control col-md-9' id='tema' name='tema' readonly>";
    foreach ($preguntaData as $p){
      $cadena=$cadena.'<option value='.$p->tema.'>'.$p->tema.'</option>';
    }
    echo  $cadena."</select>";

  }
  public function tema3(){
    $preguntas = new preguntasViewModel();
    $id=$_POST['idTema3'];
    $preguntaData = $preguntas->asObject()->select('tema')->where('preguntaId',$id)->findAll();
    $cadena="
    <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Área de capacitación<span class='required'>*</span>
    </label>
    <div class='input-group mb-3 col-md-6'>
    <div class='input-group-prepend'>
    <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-graduation-cap' style='color:#2A3F54;width: 20px;height: 24px;
    '></i></span>
    </div>
    <select style='width: 54%' class='form-control col-md-9' id='tema' name='tema' readonly>";
    foreach ($preguntaData as $p){
      $cadena=$cadena.'<option value='.$p->tema.'>'.$p->tema.'</option>';
    }
    echo  $cadena."</select>";

  }
  public function tema4(){
    $preguntas = new preguntasViewModel();
    $id=$_POST['idTema4'];
    $preguntaData = $preguntas->asObject()->select('tema')->where('preguntaId',$id)->findAll();
    $cadena="
    <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Área de capacitación<span class='required'>*</span>
    </label>
    <div class='input-group mb-3 col-md-6'>
    <div class='input-group-prepend'>
    <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-graduation-cap' style='color:#2A3F54;width: 20px;height: 24px;
    '></i></span>
    </div>
    <select style='width: 54%' class='form-control col-md-9' id='tema' name='tema' readonly>";
    foreach ($preguntaData as $p){
      $cadena=$cadena.'<option value='.$p->tema.'>'.$p->tema.'</option>';
    }
    echo  $cadena."</select>";

  }
  public function tema5(){
    $preguntas = new preguntasViewModel();
    $id=$_POST['idTema5'];
    $preguntaData = $preguntas->asObject()->select('tema')->where('preguntaId',$id)->findAll();
    $cadena="
    <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Área de capacitación<span class='required'>*</span>
    </label>
    <div class='input-group mb-3 col-md-6'>
    <div class='input-group-prepend'>
    <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-graduation-cap' style='color:#2A3F54;width: 20px;height: 24px;
    '></i></span>
    </div>
    <select style='width: 54%' class='form-control col-md-9' id='tema' name='tema' readonly>";
    foreach ($preguntaData as $p){
      $cadena=$cadena.'<option value='.$p->tema.'>'.$p->tema.'</option>';
    }
    echo  $cadena."</select>";

  }
  public function tema6(){
    $preguntas = new preguntasViewModel();
    $id=$_POST['idTema6'];
    $preguntaData = $preguntas->asObject()->select('tema')->where('preguntaId',$id)->findAll();
    $cadena="
    <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Área de capacitación<span class='required'>*</span>
    </label>
    <div class='input-group mb-3 col-md-6'>
    <div class='input-group-prepend'>
    <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-graduation-cap' style='color:#2A3F54;width: 20px;height: 24px;
    '></i></span>
    </div>
    <select style='width: 54%' class='form-control col-md-9' id='tema' name='tema' readonly>";
    foreach ($preguntaData as $p){
      $cadena=$cadena.'<option value='.$p->tema.'>'.$p->tema.'</option>';
    }
    echo  $cadena."</select>";

  }
  public function tema7(){
    $preguntas = new preguntasViewModel();
    $id=$_POST['idTema7'];
    $preguntaData = $preguntas->asObject()->select('tema')->where('preguntaId',$id)->findAll();
    $cadena="
    <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Área de capacitación<span class='required'>*</span>
    </label>
    <div class='input-group mb-3 col-md-6'>
    <div class='input-group-prepend'>
    <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-graduation-cap' style='color:#2A3F54;width: 20px;height: 24px;
    '></i></span>
    </div>
    <select style='width: 54%' class='form-control col-md-9' id='tema' name='tema' readonly>";
    foreach ($preguntaData as $p){
      $cadena=$cadena.'<option value='.$p->tema.'>'.$p->tema.'</option>';
    }
    echo  $cadena."</select>";

  }
  public function tema8(){
    $preguntas = new preguntasViewModel();
    $id=$_POST['idTema8'];
    $preguntaData = $preguntas->asObject()->select('tema')->where('preguntaId',$id)->findAll();
    $cadena="
    <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Área de capacitación<span class='required'>*</span>
    </label>
    <div class='input-group mb-3 col-md-6'>
    <div class='input-group-prepend'>
    <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-graduation-cap' style='color:#2A3F54;width: 20px;height: 24px;
    '></i></span>
    </div>
    <select style='width: 54%' class='form-control col-md-9' id='tema' name='tema' readonly>";
    foreach ($preguntaData as $p){
      $cadena=$cadena.'<option value='.$p->tema.'>'.$p->tema.'</option>';
    }
    echo  $cadena."</select>";

  }
  public function tema9(){
    $preguntas = new preguntasViewModel();
    $id=$_POST['idTema9'];
    $preguntaData = $preguntas->asObject()->select('tema')->where('preguntaId',$id)->findAll();
    $cadena="
    <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Área de capacitación<span class='required'>*</span>
    </label>
    <div class='input-group mb-3 col-md-6'>
    <div class='input-group-prepend'>
    <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-graduation-cap' style='color:#2A3F54;width: 20px;height: 24px;
    '></i></span>
    </div>
    <select style='width: 54%' class='form-control col-md-9' id='tema' name='tema' readonly>";
    foreach ($preguntaData as $p){
      $cadena=$cadena.'<option value='.$p->tema.'>'.$p->tema.'</option>';
    }
    echo  $cadena."</select>";

  }
    public function tema10(){
    $preguntas = new preguntasViewModel();
    $id=$_POST['idTema10'];
    $preguntaData = $preguntas->asObject()->select('tema')->where('preguntaId',$id)->findAll();
    $cadena="
    <label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Área de capacitación<span class='required'>*</span>
    </label>
    <div class='input-group mb-3 col-md-6'>
    <div class='input-group-prepend'>
    <span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-graduation-cap' style='color:#2A3F54;width: 20px;height: 24px;
    '></i></span>
    </div>
    <select style='width: 54%' class='form-control col-md-9' id='tema' name='tema' readonly>";
    foreach ($preguntaData as $p){
      $cadena=$cadena.'<option value='.$p->tema.'>'.$p->tema.'</option>';
    }
    echo  $cadena."</select>";

  }
}
