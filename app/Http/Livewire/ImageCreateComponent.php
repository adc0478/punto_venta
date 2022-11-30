<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\imagenes;
use App\Models\portadas;
use Livewire\Component;
class ImageCreateComponent extends Component
{
    public $lista_img =[];
    public $prod_id;
    public $imagen;
    public $name;

    protected $listeners=['ver_imagenes'=>'listar_img','reset_img'=>'reset_img','borrar_img'=>'borrar_img'];
    public function borrar_img($id,$file){
        if (unlink( $_SERVER['DOCUMENT_ROOT'] . $file)){
            imagenes::destroy($id);
        }
    }
    public function listar_img($id_prod){
        $this->prod_id = $id_prod;
    }    
    public function reset_img(){
        $this->prod_id = " ";
    }
    public function subir_img(request $request){
        if ($request->prod_id == ""){return "Falta id";};
        if (!isset($_FILES['foto'])){return 'no cargo una imagen';};    
        if ($_FILES['foto']['type'] == 'image/png' || $_FILES['foto']['type'] == 'image/jpeg') {
            $destino = 'img/'. $request->prod_id . '-' . $_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'],$destino);
            $salida = imagenes::updateOrCreate(['url'=>$destino],['producto_id'=>$request->prod_id]);
            if ($request->portada == 1) {
                if (sizeof(portadas::where('producto_id',$request->prod_id)->get()) < 1){
                    portadas::updateOrCreate(['imagen_id'=>$salida->id, 'producto_id'=>$request->prod_id]);  
                }
                
            }
            echo "se cargo la siguiente imagen " . $destino;
        }else{
            return 'Archivo no soportado';
        }
    }
    public function existe_portada($id){
        $consulta = imagenes::select()->where('portada',1)->where('producto_id',$id)->get();
        if (isset($consulta[0])){
            return true;
        };
        return false;
    }
    public function quitar_img($id){
        imagenes::destroy($id);
    }
    public function retornar_lista_img(){
        if ($this->prod_id ==""){return [];};
        return imagenes::listar_imagemes($this->prod_id);
    }
    public function render()
    { 
        $this->lista_img = $this->retornar_lista_img();
        //$this->emit('emitir_lista_img',$this->lista_img); 
        return view('livewire.image-create-component');
    }
}
