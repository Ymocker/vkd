<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
			[
				'id'      => 1,
				'name'     => 'site visitors',
				'hit'  => 0
			],
			[
				'id'      => 2,
				'name'     => '/page/1',
				'hit'  => 0
			],
			[
				'id'      => 3,
				'name'     => '/page/2',
				'hit'  => 0
			],
			[
				'id'      => 4,
				'name'     => '/page/4',
				'hit'  => 0
			],
			[
				'id'      => 5,
				'name'     => '/page/5',
				'hit'  => 0
			],
			[
				'id'      => 6,
				'name'     => '/page/0',
				'hit'  => 0
			],
			[
				'id'      => 7,
				'name'     => '/page/search',
				'hit'  => 0
			],
			[
				'id'      => 8,
				'name'     => '/ads/',
				'hit'  => 0
			],
			[
				'id'      => 9,
				'name'     => '/about/about',
				'hit'  => 0
			],
			[
				'id'      => 10,
				'name'     => '/about/contact',
				'hit'  => 0
			],
			[
				'id'      => 11,
				'name'     => '/about/tariff',
				'hit'  => 0
			],
			[
				'id'      => 12,
				'name'     => '/number/',
				'hit'  => 0
			],
                        [
				'id'      => 13,
				'name'     => '/search/',
				'hit'  => 0
			],
            [
				'id'      => 14,
				'name'     => '/about/send/message',
				'hit'  => 0
			],
        ]);
    }
}
