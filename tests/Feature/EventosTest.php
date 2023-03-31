<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\PuntosInteres;
use App\Models\Eventos;
class EventosTest extends TestCase
{
    
    public function test_ConsultarEventos()
    {
        $response = $this->get('/api/Eventos');

        $response->assertStatus(200);
    }

    public function test_RegistrarEvento_Exitoso(){
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
        ])->postJson('/api/Eventos', [
            'NombreEvento'                => 'Punto Simple',
            'LugarDelEvento'             => $id->id,
            'LugarDeVentaDeEntradas' =>'Abitab' ,
            'FechaInicio'                 => "2023-02-14",
            'FechaFin'                => '2023-02-14',
            'HoraInicio'             => '10:00:00',
            'HoraFin' => '20:00:00',
            'TipoEvento'                 => 'Evento del duko'
        ]);
        $response->assertStatus(200);
    }
    public function test_ModificarEvento_Exitoso(){
        $this->test_RegistrarEvento_Exitoso();
        $idEventos=Eventos::latest('eventos_id')->first();
        $idPuntoDeInteres=PuntosInteres::latest('id')->first();
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->patchJson('/api/PuntosInteres/'.$idEventos->id, [
            'NombreEvento'                => 'Punto Simple',
            'LugarDelEvento'             => $idPuntoDeInteres->id,
            'LugarDeVentaDeEntradas' =>'Abitab' ,
            'FechaInicio'                 => "2023-02-14",
            'FechaFin'                => '2023-02-14',
            'HoraInicio'             => '10:00:00',
            'HoraFin' => '20:00:00',
            'TipoEvento'                 => 'Evento del duko'
            
        ]);
    }
    public function test_EliminarEvento(){
        $this->test_RegistrarEvento_Exitoso();
        $id=Eventos::latest('eventos_id')->first();
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->deleteJson('/api/Eventos/'.$id->Eventos_id);
        $response->assertStatus(200);
    }
}
