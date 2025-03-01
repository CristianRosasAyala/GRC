<?php

use Illuminate\Database\Seeder;

class EntidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(\App\Entidad::class)->create([
			'id' => '01',
			'name' =>  'Aguascalientes',
			'abbrev' =>  'Ags.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '02',
			'name' =>  'Baja California',
			'abbrev' =>  'BC',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '03',
			'name' =>  'Baja California Sur',
			'abbrev' =>  'BCS',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '04',
			'name' =>  'Campeche',
			'abbrev' =>  'Camp.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '05',
			'name' =>  'Coahuila de Zaragoza',
			'abbrev' =>  'Coah.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '06',
			'name' =>  'Colima',
			'abbrev' =>  'Col.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '07',
			'name' =>  'Chiapas',
			'abbrev' =>  'Chis.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '08',
			'name' =>  'Chihuahua',
			'abbrev' =>  'Chih.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '09',
			'name' =>  'Distrito Federal',
			'abbrev' =>  'DF',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '10',
			'name' =>  'Durango',
			'abbrev' =>  'Dgo.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '11',
			'name' =>  'Guanajuato',
			'abbrev' =>  'Gto.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '12',
			'name' =>  'Guerrero',
			'abbrev' =>  'Gro.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '13',
			'name' =>  'Hidalgo',
			'abbrev' =>  'Hgo.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '14',
			'name' =>  'Jalisco',
			'abbrev' =>  'Jal.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '15',
			'name' =>  'México',
			'abbrev' =>  'Mex.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '16',
			'name' =>  'Michoacán de Ocampo',
			'abbrev' =>  'Mich.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '17',
			'name' =>  'Morelos',
			'abbrev' =>  'Mor.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '18',
			'name' =>  'Nayarit',
			'abbrev' =>  'Nay.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '19',
			'name' =>  'Nuevo León',
			'abbrev' =>  'NL',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '20',
			'name' =>  'Oaxaca',
			'abbrev' =>  'Oax.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '21',
			'name' =>  'Puebla',
			'abbrev' =>  'Pue.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '22',
			'name' =>  'Querétaro',
			'abbrev' =>  'Qro.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '23',
			'name' =>  'Quintana Roo',
			'abbrev' =>  'Q. Roo',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '24',
			'name' =>  'San Luis Potosí',
			'abbrev' =>  'SLP',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '25',
			'name' =>  'Sinaloa',
			'abbrev' =>  'Sin.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '26',
			'name' =>  'Sonora',
			'abbrev' =>  'Son.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '27',
			'name' =>  'Tabasco',
			'abbrev' =>  'Tab.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '28',
			'name' =>  'Tamaulipas',
			'abbrev' =>  'Tamps.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '29',
			'name' =>  'Tlaxcala',
			'abbrev' =>  'Tlax.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '30',
			'name' =>  'Veracruz de Ignacio de la Llave',
			'abbrev' =>  'Ver.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '31',
			'name' =>  'Yucatán',
			'abbrev' =>  'Yuc.',
			'country' =>  'MX'

		]);
		factory(\App\Entidad::class)->create([
			'id' => '32',
			'name' =>  'Zacatecas',
			'abbrev' =>  'Zac.',
			'country' =>  'MX'
		]);
    }
}