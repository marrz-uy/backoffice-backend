<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\PuntosInteres;
use App\Models\Eventos;
use App\Models\TourPredefinido;

class TourPredefinidoTest extends TestCase
{
    
    public function test_Consultar_TourPredefinido()
    {
        $response = $this->get('/api/tourPredefinido');

        $response->assertStatus(200);
    }
    public function test_RegistroTourPredefinido_Exitoso()
    {
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->postJson('/api/PuntosInteres', [
            'Nombre'                => 'Punto Simple',
            'Departamento'             => 'Montevideo',
            'Ciudad' =>'Montevideo' ,
            'Direccion'                 => "18 de julio 1302",
            'HoraDeApertura'                => '10:00',
            'HoraDeCierre'             => '18:00',
            'Facebook' => 'Facebook Re loquito',
            'Instagram'                 => 'Insta re loquito',
            'Descripcion'                => 'Breve Descricpion',
            'Latitud'             => '1000',
            'Longitud' =>'2000',
            'TipoDeLugar'                 => "Espacio cerrado",
            'RestriccionDeEdad'                => "Todas",
            'EnfoqueDePersonas'             => "Grupo",
            
        ]);
        $id=PuntosInteres::latest('id')->first();
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->postJson('/api/tourPredefinido', [
            'nombreTourPredefinido'                => 'Tour nocturno de FeelUy2',
            'horaDeInicioTourPredefinido'             => '12:00:00',
            'descripcionTourPredefinido' =>'Un tour creado para disfrutar de la noche montevideana' ,
            'puntosdeInteresTour'                 => "$id->id"
            
        ]);
        $response->assertStatus(200);
    }
    public function test_ModificarTourPredefinido_Exitoso()
    {
        $this->test_RegistroTourPredefinido_Exitoso();

        $idPuntoDeInteres=PuntosInteres::latest('id')->first();
        $idTourPredefinido=TourPredefinido::latest('id')->first();
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->patchJson('/api/tourPredefinido', [
            'nombreTourPredefinido'                => 'Tour nocturno de FeelUy3',
            'horaDeInicioTourPredefinido'             => '12:00:00',
            'descripcionTourPredefinido' =>'Un tour creado para disfrutar de la noche montevideana' ,
            'id'=>$idTourPredefinido->id,
            'puntosdeInteresTour'                 => "$idPuntoDeInteres->id"
            
        ]);
        $response->assertStatus(200);
    }
    public function test_EliminarTourPredefinido(){
        $this->test_RegistroTourPredefinido_Exitoso();
        $id=TourPredefinido::latest('id')->first();
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->deleteJson('/api/tourPredefinido/'.$id->id);
        $response->assertStatus(200);
    }
}
