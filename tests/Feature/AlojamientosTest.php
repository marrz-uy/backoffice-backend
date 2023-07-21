<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlojamientosTest extends TestCase
{
    public function test_Consultar_Alojamientos()
    {
        $response = $this->get('/api/PuntosInteres/alojamientos');

        $response->assertStatus(200);
    }
    public function test_Registrar_Alojamiento_Exitoso(){
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
            "InformacionDetalladaPuntoDeInteres" => "{\"Costos\":\"100\",\"Tipo\":\"Hostel\",\"Op\":\"Alojamiento\",\"Calificaciones\":\"50\",\"TvCable\":\"0\",\"Piscina\":\"1\",\"Wifi\":\"1\",\"BanoPrivad\":\"1\",\"Casino\":\"1\",\"Bar\":\"1\",\"Restaurante\":\"1\",\"Desayuno\":\"1\",\"AireAcondicionado\":\"1\"}"
             
        ]);
        $response->assertStatus(200);
    }
    public function test_Modificar_Alojamiento(){
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
            "InformacionDetalladaPuntoDeInteres" => "{\"Costos\":\"100\",\"Tipo\":\"Hostel\",\"Op\":\"Alojamiento\",\"Calificaciones\":\"50\",\"TvCable\":\"0\",\"Piscina\":\"1\",\"Wifi\":\"1\",\"BanoPrivad\":\"1\",\"Casino\":\"1\",\"Bar\":\"1\",\"Restaurante\":\"1\",\"Desayuno\":\"1\",\"AireAcondicionado\":\"1\"}"
             
        ]);
        $response->assertStatus(200);
    }
}
