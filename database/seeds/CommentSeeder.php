<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'id' => 1,
				'user_id' => 1,
                'content_id' =>  1,
				'message' => 'Ex eam virtute oportere, ius meis mediocritatem ei. Velit deseruisse id pro, vis habemus pertinacia signiferumque an, modo integre persecuti pro ea. Atqui persequeris usu et, modo maiorum laboramus sed te. Pro eu mucius labitur suscipiantur, tota oratio legere eum et, ea nibh probo sapientem eos. Te nec iriure menandri nominati. Facete iriure intellegebat cu mea, idque nullam expetendis id sit. Ad ludus nostro indoctum mea.

Tation nostro cum ne, pri malis maiorum definiebas ea, ea novum audire mel. Minim iriure probatus cu has. Diceret vivendo eleifend sea ut, ius ceteros dignissim ad, solet eloquentiam vis et. Putent quaerendum vim ex. Sed mucius appetere at. Autem graeco liberavisse eam ad.',
				'ip' => '8.8.8.8',
				'status' => 'approved',
				'created_at' => '2016-07-05 09:31:20'
            ],
            [
                'id' => 2,
				'user_id' => 2,
                'content_id' =>  1,
				'message' => 'Ex eam virtute oportere, ius meis mediocritatem ei. Velit deseruisse id pro, vis habemus pertinacia signiferumque an, modo integre persecuti pro ea. Atqui persequeris usu et, modo maiorum laboramus sed te. Pro eu mucius labitur suscipiantur, tota oratio legere eum et, ea nibh probo sapientem eos. Te nec iriure menandri nominati. Facete iriure intellegebat cu mea, idque nullam expetendis id sit. Ad ludus nostro indoctum mea.

Tation nostro cum ne, pri malis maiorum definiebas ea, ea novum audire mel. Minim iriure probatus cu has. Diceret vivendo eleifend sea ut, ius ceteros dignissim ad, solet eloquentiam vis et. Putent quaerendum vim ex. Sed mucius appetere at. Autem graeco liberavisse eam ad.',
				'ip' => '10.10.10.10',
				'status' => 'private',
				'created_at' => '2016-07-06 09:31:20'
            ],
        ]);
    }
}
