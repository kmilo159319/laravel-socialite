<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Str;

class resumesController extends Controller
{

    function __construct()
    {
       $this->Middleware('auth');
    }

      public function insert(Request $request){

     $mensaje = "archivo creado correctamente";
     $tipo = "success";

     $file = FacadesValidator::make($request->all(), [

            'description' => 'required',
            'pdfurl' => 'required',
        ]);

        $exist= DB::table('resumes')->where('user_id', Auth::user()->id)
        ->where('description', $request->description)->exists();

        // script para subir la imagen
        if($file->fails()){

            return response()->json(['response' => [
                'msg' => 'faltan datos en el registro',
                ]
            ], 400);

        }elseif($exist){
            return response()->json(['response' => [
                'date' => $exist,
                ]
            ], 400);
        }else{

            $imagen = $request->file("pdfurl");
            $nombreimagen = Str::slug($request->description).".".$imagen->guessExtension();
            $ruta = public_path("docsave");

            $imagen->move($ruta,$nombreimagen);

            resume::create([
                'description' => $request->description,
                'pdfurl'=>$nombreimagen,
                'upload_or_update'=> 'datetime',
                'user_id' => Auth::user()->id
            ]);

             return back();

        }
      }

      public function delete(resume $id){
            $id->delete();
            return back();
      }
}
