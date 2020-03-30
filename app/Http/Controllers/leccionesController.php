<?php

namespace App\Http\Controllers;


use App\leccione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;//esto para poder borrar informacion del storage
use App\Teacher;
use App\Course;

class leccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        // esto codigo comentado carga el api rest
         
        //  $Leccion = leccione::where('course_id', $id)->get()->load('course');
        //  return  $Leccion;

        // $id=1;
        // $Leccion = leccione::where('course_id', $id)->get()->load('course');
        
        // // $Leccion[0]->course->teacher_id;
        // $leccion_teacher = $Leccion[0]->course->teacher_id;
        // $auth_teacher = auth()->user()->teacher->id ;
        //     if( $leccion_teacher == $auth_teacher){
        //         return "si es su curso puede entrar";
        //     }
        //     else{
        //         return "jodete";
        //     }


        $id = $request->slug;
        $datos['videos']=leccione::where('course_id', $request->slug)->paginate(5);
        
        $cursos = Course::find($id);

        if($cursos->teacher_id==auth()->user()->teacher->id){
            return view('administrar-videos.index',$datos,compact('id'));
        }
        else{
            // return ['creador' => 'No eres creador del contenido'];
            return abort(404);
        }

        // return $cursos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $course_id = $request->slug; 
        return view('administrar-videos.create', compact('course_id'));
        // return view('videoCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = [
            'name' => 'required|string|max:150',
            'conten' => 'required|string|max:250',
            'video' => 'required',
            'course_id' => 'required'
        ];
        $Mensaje = ["required"=>'El :attribute es requerido'];
        $this->validate($request,$validatedData,$Mensaje);

        $datosVideo=request()->all();
        /*
         $datosVideo = array(
            'name'=> $request->name,
            'conten'=> $request->conten,
            'course_id' => 1,
         );

        
         */
        $datosVideo=request()->except('_token');

        if($request->hasFile('video')){
            $datosVideo['video']=$request->file('video')->store('videos','public');//guarda en la ruta carpeta storage/app/public/videos
        }

        leccione::insert($datosVideo);
        // return response()->json($datosVideo);
        return redirect('/courses/videos/administrar?slug='.$request->course_id)->with('Mensaje','Video agregado con exito');


        // $lecciones = new leccione();
    //        $lecciones->name = $request->name;
    //        $lecciones->conten = $request->conten;
       //       $lecciones->course_id = 1;           

    //        $file = $request->file;
    //         //return $file;
    //        if ($file){
    //           $path = public_path('/storage/videos');
    //           $fileName = time().'.'.$file->getClientOriginalExtension();
    //           $moved = $file -> move($path, $fileName);
    //           $lecciones->video = $fileName;
              
    //        }
    //        $lecciones->save();
    //        return redirect('videos'); 
 


    //    $imagen_name = time().$file->getClientOriginalName();
    //         \Storage::disk('users')->put($imagen_name,\File::get($file));
    //         $data = array(
    //             'code' => 200,
    //             'status' => 'success',
    //             'imagen' => $imagen_name
    //         );
 
    //    return "archivo guardado";

    //    return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $lecciones = leccione::find($id);
        // return $lecciones;
        // return view('videoUpdate', compact('lecciones'));
        $video=leccione::findOrFail($id);
        //return $video;
       return view('administrar-videos.edit',compact('video'));
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
        //  return "hellow ";
        $datosVideo=request()->except(['_token','_method']);
        $video=leccione::findOrFail($id);
        if($request->hasFile('video')){

            $video=leccione::findOrFail($id);

            // Storage::delete('public/'.$video->video); //primera forma para eliminar, esto es con storage facade pero no funciona
            unlink(storage_path('app/public/'.$video->video)); // esta si funciona

            $datosVideo['video']=$request->file('video')->store('videos','public');//guarda en la ruta carpeta storage/app/public/videos
        }

        leccione::where('id','=',$id)-> update($datosVideo);

        // $video=leccione::findOrFail($id);//con estas dos lineas se observa como quedo despues del update
        // return redirect('administrar-videos.edit',compact('video'))->with('MensajeEdit','Video modificado con exito');

        return redirect('/courses/videos/administrar?slug='.$video->course_id)->with('Mensaje','Video modificado con exito');
    }
    public function nada(Request $request){
        $id=5;
        // $id = $request->slug;
        // $cursos = leccione::find($id);

        $Leccion = leccione::where('course_id', $id)->get()->load('course');
        
        // return redirect('gestor....');
        return $Leccion; 
        // return $id;  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $lecciones = leccione::find($id);
        // $lecciones->delete();

        $video=leccione::findOrFail($id);

        if(unlink(storage_path('app/public/'.$video->video))){
            leccione::destroy($id);
        }
        else{
            leccione::destroy($id);
        }
        return redirect('/courses/videos/administrar?slug='.$video->course_id)->with('Mensaje','Video eliminado');
        
    }
}