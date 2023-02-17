<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PuntosDeInteresTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Consultar_Puntos_De_Interes()
    {
        $response = $this->get('/api/PuntosInteres/PuntosDeInteres');

        $response->assertStatus(200);
    }

    public function test_Registrar_Punto_De_Interes_Exitoso(){
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
        $response->assertStatus(200);
    }
    public function test_Registrar_Punto_De_Interes___Operacion_fallida___error_en_Nombre(){
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->postJson('/api/PuntosInteres', [
            'Nombre'                => '',
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
        $response->assertStatus(422);
    }
    public function test_Modificar_Punto_De_Interes_Exitoso(){
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->patchJson('/api/PuntosInteres/29', [
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
        $response->assertStatus(200);
    }
    public function test_Eliminar_Punto_De_Interes(){
        $response = $this->withHeaders([
            'content-type' => 'application/json',
        ])->deleteJson('/api/PuntosInteres/28');
        $response->assertStatus(200);
    }
}
