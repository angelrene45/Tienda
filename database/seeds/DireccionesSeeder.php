<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('direcciones')->insert([
          'codigo_postal' => '46400',
          'colonia' => 'MIGUEL DE LA MADRID',
          'calle' => 'COFRADIA',
          'numero_exterior' => '36',
          'estado' => 'JALISCO',
          'municipio' => 'TEQUILA',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '32696',
          'colonia' => 'PARAJES DEL SOL',
          'calle' => 'JUAN DE BOLONIA',
          'numero_exterior' => '8431',
          'estado' => 'CHIHUAHUA',
          'municipio' => 'CIUDAD JUAREZ',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '33810',
          'colonia' => 'HEROES DE LA REVOLUCION',
          'calle' => 'ADELITA',
          'numero_exterior' => '9',
          'estado' => 'CHIHUAHUA',
          'municipio' => 'HIDALGO DEL PARRAL',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => 'C.P 83550',
          'colonia' => 'CENTRO',
          'calle' => 'PUERTO PEÑASCO',
          'numero_exterior' => '0',
          'estado' => 'SONORA',
          'municipio' => 'SONORA',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '52928',
          'colonia' => 'LOMAS DE SAN MIGUEL',
          'calle' => 'LAUREL',
          'numero_exterior' => '71',
          'estado' => 'ESTADO DE MEXICO',
          'municipio' => 'ATIZAPAN DE ZARAGOZA',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '20116',
          'colonia' => 'TROJES DE ALONSO',
          'calle' => 'AV.INDEPENDENCIA',
          'numero_exterior' => '2351 LOCAL 24',
          'estado' => 'AGUASCALIENTES',
          'municipio' => 'AGS',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '31050',
          'colonia' => 'SANTA ROSA',
          'calle' => 'P. NEOQUI',
          'numero_exterior' => '902',
          'estado' => 'CHIHUAHUA',
          'municipio' => 'CHIHUAHUA',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '31050',
          'colonia' => 'SANTA ROSA',
          'calle' => 'P. NEOQUI',
          'numero_exterior' => '902',
          'estado' => 'CHIHUAHUA',
          'municipio' => 'CHIHUAHUA',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '98085',
          'colonia' => 'COLINAS DEL PADRE',
          'calle' => 'CERRO MIXTON',
          'numero_exterior' => '135',
          'estado' => 'ZACATECAS',
          'municipio' => 'ZACATECAS',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '98500',
          'colonia' => 'FRACC EL MAGUEY',
          'calle' => 'CACTUS',
          'numero_exterior' => '105',
          'estado' => 'ZACATECAS',
          'municipio' => 'CALERA DE VICTOR ROSALES',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      DB::table('direcciones')->insert([
          'codigo_postal' => '',
          'colonia' => '',
          'calle' => '',
          'numero_exterior' => '',
          'estado' => '',
          'municipio' => '',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

    }
}
