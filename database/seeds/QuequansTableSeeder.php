<?php

use Illuminate\Database\Seeder;

class QuequansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('quequans')->insert(
    		[
	    		[
	    		'id_quequan' => '1',
	    		'ten_quequan' => 'Đắk Lắk',              
	    		],
	    		[
	    		'id_quequan' => '2',
	    		'ten_quequan' => 'Đắk Nông',              
	    		],
	    		[
	    		'id_quequan' => '3',
	    		'ten_quequan' => 'Gia Lai',              
	    		],
	    		[
	    		'id_quequan' => '4',
	    		'ten_quequan' => 'Hà Tĩnh',              
	    		],
	    		[
	    		'id_quequan' => '5',
	    		'ten_quequan' => 'Khánh Hòa',              
	    		],
	    		[
	    		'id_quequan' => '6',
	    		'ten_quequan' => 'Kon Tum',              
	    		],
	    		[
	    		'id_quequan' => '7',
	    		'ten_quequan' => 'Nghệ An',              
	    		],
	    		[
	    		'id_quequan' => '8',
	    		'ten_quequan' => 'Quảng Bình',              
	    		],
	    		[
	    		'id_quequan' => '9',
	    		'ten_quequan' => 'Quảng Nam',              
	    		],
	    		[
	    		'id_quequan' => '10',
	    		'ten_quequan' => 'Quảng Ngãi',              
	    		],
	    		[
	    		'id_quequan' => '11',
	    		'ten_quequan' => 'Quảng Trị',              
	    		],
	    		[
	    		'id_quequan' => '12',
	    		'ten_quequan' => 'Thanh Hóa',              
	    		],
	    		[
	    		'id_quequan' => '13',
	    		'ten_quequan' => 'Huế',              
	    		],
	    		[
	    		'id_quequan' => '14',
	    		'ten_quequan' => 'Đà Nẵng',              
	    		],
	    		[
	    		'id_quequan' => '15',
	    		'ten_quequan' => 'TP HCM',              
	    		],
	    		[
	    		'id_quequan' => '16',
	    		'ten_quequan' => 'Hà Nội',              
	    		]
    		]
    		);
    }
}
