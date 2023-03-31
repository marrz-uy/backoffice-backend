<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiciosEsencialesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Consultar_ServiciosEsenciales()
    {
        $response = $this->get('/api/PuntosInteres/servicios_esenciales');

        $response->assertStatus(200);
    }
    public function test_Registrar_ServicioEsencial_Exitoso(){
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
            "InformacionDetalladaPuntoDeInteres" => "{\"Tipo\":\"Hospitales\",\"Op\":\"ServicioEsencial\"}"
             
        ]);
        $response->assertStatus(200);
    }
    public function test_Modificar_ServicioEsencial(){
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
            "InformacionDetalladaPuntoDeInteres" => "{\"Tipo\":\"Cerrajerias\",\"Op\":\"ServicioEsencial\"}"
             
        ]);
        $response->assertStatus(200);
    }
}
