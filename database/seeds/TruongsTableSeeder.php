<?php

use Illuminate\Database\Seeder;

class TruongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('truongs')->insert(
    		[
	    		[
	    		'id_truong' => '1',
	    		'ten_truong' => 'Đại học Bách khoa Đà Nẵng',              
	    		],
	    		[
	    		'id_truong' => '2',
	    		'ten_truong' => 'Đại học Sư phạm Đà Nẵng',              
	    		],
	    		[
	    		'id_truong' => '3',
	    		'ten_truong' => 'Đại học Kinh tế Đà Nẵng',              
	    		],
	    		[
	    		'id_truong' => '4',
	    		'ten_truong' => 'Đại học Ngoại ngữ Đà Nẵng',              
	    		],
	    		[
	    		'id_truong' => '5',
	    		'ten_truong' => 'Đại học Duy tân Đà Nẵng',              
	    		],
	    		[
	    		'id_truong' => '6',
	    		'ten_truong' => 'Đại học Y dược Đà Nẵng',              
	    		],
	    		[
	    		'id_truong' => '7',
	    		'ten_truong' => 'Đại học Kiến trúc Đà Nẵng',              
	    		],
	    		[
	    		'id_truong' => '8',
	    		'ten_truong' => 'Đại học TDTT Đà Nẵng',              
	    		],
	    		[
	    		'id_truong' => '9',
	    		'ten_truong' => 'Cao đẳng Công nghệ thông tin',              
	    		],
	    		[
	    		'id_truong' => '10',
	    		'ten_truong' => 'Cao đẳng Công nghệ',              
	    		],
	    		[
	    		'id_truong' => '11',
	    		'ten_truong' => 'Cao đẳng Thương mại Đà Nẵng',              
	    		],
	    		[
	    		'id_truong' => '12',
	    		'ten_truong' => 'Cao đẳng Kinh tế kế hoạch',              
	    		],
	    		[
	    		'id_truong' => '13',
	    		'ten_truong' => 'Trường khác',              
	    		],
	    		[
	    		'id_truong' => '14',
	    		'ten_truong' => 'Đã đi làm',              
	    		]
    		]
    		);
    }
}
