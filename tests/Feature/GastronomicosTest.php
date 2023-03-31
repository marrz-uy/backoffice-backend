<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GastronomicosTest extends TestCase
{
    public function test_Consultar_Gastronomicos()
    {
        $response = $this->get('/api/PuntosInteres/gastronomicos');

        $response->assertStatus(200);
    }
    public function test_Registrar_Gastronomico_Exitoso(){
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
            "InformacionDetalladaPuntoDeInteres" => "{\"ComidaVegge\":\"0\",\"Tipo\":\"Comida rapida\",\"Op\":\"Gastronomicos\",\"Alcohol\":\"0\",\"MenuInfantil\":\"0\"}"
             
        ]);
        $response->assertStatus(200);
    }
    public function test_Modificar_Gastronomico(){
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
            "InformacionDetalladaPuntoDeInteres" => "{\"ComidaVegge\":\"0\",\"Tipo\":\"Comida rapida\",\"Op\":\"Gastronomicos\",\"Alcohol\":\"0\",\"MenuInfantil\":\"0\"}"
             
        ]);
        $response->assertStatus(200);
    }
}
