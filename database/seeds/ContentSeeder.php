<?php

use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('content')->insert([
            [
                'id' => 1,
				'type' => 'article',
                'slug' =>  'sample-article',
				'status' => 'published',
				'seo_index' => false,
                'title' => 'Ex eam virtute oportere - ius meis mediocritatem',
                'seo_title' => 'Ex eam virtute oportere ius meis mediocritatem | Site Name',
				'description' => 'Lorem ipsum dolor sit amet, sed esse case et. Cu solum quodsi phaedrum sea. Quot docendi id nec, tation vocibus eam ut. Ex has meis offendit, no debitis atomorum facilisis mei.',
				'seo_description' => 'Lorem ipsum dolor sit amet, sed esse case et. Cu solum quodsi phaedrum sea.',
                'body' => '<p>Lorem ipsum dolor sit amet, sed esse case et. Cu solum quodsi phaedrum sea. Quot docendi id nec, tation vocibus eam ut. Ex has meis offendit, no debitis atomorum facilisis mei.</p>

<p>Ex eam virtute oportere, ius meis mediocritatem ei. Velit deseruisse id pro, vis habemus pertinacia signiferumque an, modo integre persecuti pro ea. Atqui persequeris usu et, modo maiorum laboramus sed te. Pro eu mucius labitur suscipiantur, tota oratio legere eum et, ea nibh probo sapientem eos.</p>

<blockquote>
<p>Te nec iriure menandri nominati. Facete iriure intellegebat cu mea, idque nullam expetendis id sit. Ad ludus nostro indoctum mea.</p>

<p><strong>- Testamonial</strong></p>
</blockquote>

<p>Tation nostro cum ne, pri malis maiorum definiebas ea, ea novum audire mel. Minim iriure probatus cu has. Diceret vivendo eleifend sea ut, ius ceteros dignissim ad, solet eloquentiam vis et. Putent quaerendum vim ex. Sed mucius appetere at. Autem graeco liberavisse eam ad.</p>

<h2>Sea in blandit probatus</h2>

<p>Eam quando essent aperiri et. Cum et modus altera definiebas. Quo dico accusata in, his ad summo regione interesset, ei sumo quas diceret mea. Eum deserunt constituam cu, in quaestio electram pri, te nam nusquam nominati. Sit ea erat saepe, ius no summo euripidis.</p>

<h3>Ne sea dolor prodesset.</h3>

<p>Ei quo pertinax necessitatibus. Debitis democritum reformidans eu qui. In perpetua dignissim adversarium has, est et amet aliquam, ex affert pertinax dissentiet eum.</p>

<h3>Lorem ipsum dolor sit amet</h3>

<p>Sed esse case et. Cu solum quodsi phaedrum sea. Quot docendi id nec, tation vocibus eam ut. Ex has meis offendit, no debitis atomorum facilisis mei.</p>

<p>Ex eam virtute oportere, ius meis mediocritatem ei. Velit deseruisse id pro, vis habemus pertinacia signiferumque an, modo integre persecuti pro ea. Atqui persequeris usu et, modo maiorum laboramus sed te. Pro eu mucius labitur suscipiantur, tota oratio legere eum et, ea nibh probo sapientem eos. Te nec iriure menandri nominati. Facete iriure intellegebat cu mea, idque nullam expetendis id sit. Ad ludus nostro indoctum mea.</p>

<p>Tation nostro cum ne, pri malis maiorum definiebas ea, ea novum audire mel. Minim iriure probatus cu has. Diceret vivendo eleifend sea ut, ius ceteros dignissim ad, solet eloquentiam vis et. Putent quaerendum vim ex. Sed mucius appetere at. Autem graeco liberavisse eam ad.</p>

<table class="ui celled table">
	<thead>
		<tr>
			<th scope="col">Feature</th>
			<th scope="col">Price</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Waterproof</td>
			<td>&pound;4.99</td>
			<td><a class="ui small button" href="#">Purchase</a></td>
		</tr>
		<tr>
			<td>Optical zoom</td>
			<td>&pound;9.99</td>
			<td><a class="ui small button" href="#">Purchase</a></td>
		</tr>
		<tr>
			<td>Magnetism</td>
			<td>&pound;16.99</td>
			<td><a class="ui small button" href="#">Purchase</a></td>
		</tr>
		<tr>
			<td>Scratch resistant</td>
			<td>&pound;2.99</td>
			<td><a class="ui small button" href="#">Purchase</a></td>
		</tr>
	</tbody>
</table>

<p>Sea in blandit probatus, eam quando essent aperiri et. Cum et modus altera definiebas. Quo dico accusata in, his ad summo regione interesset, ei sumo quas diceret mea. Eum deserunt constituam cu, in quaestio electram pri, te nam nusquam nominati. Sit ea erat saepe, ius no summo euripidis.</p>

<p>Ne sea dolor prodesset. Ei quo pertinax necessitatibus. Debitis democritum reformidans eu qui. In perpetua dignissim adversarium has, est et amet aliquam, ex affert pertinax dissentiet eum.</p>
',
				'published_at' => '2016-07-04 11:41',
				'created_at' => '2016-07-04 11:41:23'
            ],
			[
                'id' => 2,
				'type' => 'page',
                'slug' =>  'sample-page',
				'status' => 'published',
				'seo_index' => false,
                'title' => 'Te nec iriure menandri nominati',
                'seo_title' => 'Te nec iriure menandri nominati | Site Name',
				'description' => 'Lorem ipsum dolor sit amet, sed esse case et. Cu solum quodsi phaedrum sea. Quot docendi id nec, tation vocibus eam ut. Ex has meis offendit, no debitis atomorum facilisis mei.',
				'seo_description' => 'Lorem ipsum dolor sit amet, sed esse case et. Cu solum quodsi phaedrum sea.',
                'body' => '<p>Lorem ipsum dolor sit amet, sed esse case et. Cu solum quodsi phaedrum sea. Quot docendi id nec, tation vocibus eam ut. Ex has meis offendit, no debitis atomorum facilisis mei.</p>

<p>Ex eam virtute oportere, ius meis mediocritatem ei. Velit deseruisse id pro, vis habemus pertinacia signiferumque an, modo integre persecuti pro ea. Atqui persequeris usu et, modo maiorum laboramus sed te. Pro eu mucius labitur suscipiantur, tota oratio legere eum et, ea nibh probo sapientem eos.</p>

<blockquote>
<p>Te nec iriure menandri nominati. Facete iriure intellegebat cu mea, idque nullam expetendis id sit. Ad ludus nostro indoctum mea.</p>

<p><strong>- Testamonial</strong></p>
</blockquote>

<p>Tation nostro cum ne, pri malis maiorum definiebas ea, ea novum audire mel. Minim iriure probatus cu has. Diceret vivendo eleifend sea ut, ius ceteros dignissim ad, solet eloquentiam vis et. Putent quaerendum vim ex. Sed mucius appetere at. Autem graeco liberavisse eam ad.</p>

<h2>Sea in blandit probatus</h2>

<p>Eam quando essent aperiri et. Cum et modus altera definiebas. Quo dico accusata in, his ad summo regione interesset, ei sumo quas diceret mea. Eum deserunt constituam cu, in quaestio electram pri, te nam nusquam nominati. Sit ea erat saepe, ius no summo euripidis.</p>

<h3>Ne sea dolor prodesset.</h3>

<p>Ei quo pertinax necessitatibus. Debitis democritum reformidans eu qui. In perpetua dignissim adversarium has, est et amet aliquam, ex affert pertinax dissentiet eum.</p>

<h3>Lorem ipsum dolor sit amet</h3>

<p>Sed esse case et. Cu solum quodsi phaedrum sea. Quot docendi id nec, tation vocibus eam ut. Ex has meis offendit, no debitis atomorum facilisis mei.</p>

<p>Ex eam virtute oportere, ius meis mediocritatem ei. Velit deseruisse id pro, vis habemus pertinacia signiferumque an, modo integre persecuti pro ea. Atqui persequeris usu et, modo maiorum laboramus sed te. Pro eu mucius labitur suscipiantur, tota oratio legere eum et, ea nibh probo sapientem eos. Te nec iriure menandri nominati. Facete iriure intellegebat cu mea, idque nullam expetendis id sit. Ad ludus nostro indoctum mea.</p>

<p>Tation nostro cum ne, pri malis maiorum definiebas ea, ea novum audire mel. Minim iriure probatus cu has. Diceret vivendo eleifend sea ut, ius ceteros dignissim ad, solet eloquentiam vis et. Putent quaerendum vim ex. Sed mucius appetere at. Autem graeco liberavisse eam ad.</p>

<table class="ui celled table">
	<thead>
		<tr>
			<th scope="col">Feature</th>
			<th scope="col">Price</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Waterproof</td>
			<td>&pound;4.99</td>
			<td><a class="ui small button" href="#">Purchase</a></td>
		</tr>
		<tr>
			<td>Optical zoom</td>
			<td>&pound;9.99</td>
			<td><a class="ui small button" href="#">Purchase</a></td>
		</tr>
		<tr>
			<td>Magnetism</td>
			<td>&pound;16.99</td>
			<td><a class="ui small button" href="#">Purchase</a></td>
		</tr>
		<tr>
			<td>Scratch resistant</td>
			<td>&pound;2.99</td>
			<td><a class="ui small button" href="#">Purchase</a></td>
		</tr>
	</tbody>
</table>

<p>Sea in blandit probatus, eam quando essent aperiri et. Cum et modus altera definiebas. Quo dico accusata in, his ad summo regione interesset, ei sumo quas diceret mea. Eum deserunt constituam cu, in quaestio electram pri, te nam nusquam nominati. Sit ea erat saepe, ius no summo euripidis.</p>

<p>Ne sea dolor prodesset. Ei quo pertinax necessitatibus. Debitis democritum reformidans eu qui. In perpetua dignissim adversarium has, est et amet aliquam, ex affert pertinax dissentiet eum.</p>
',
				'published_at' => '2016-07-04 11:41',
				'created_at' => '2016-07-04 11:41:23'
            ],
        ]);

		DB::table('content_users')->insert([
			[
				'content_id' => 1,
				'user_id' => 1
			],
			[
				'content_id' => 1,
				'user_id' => 2
			],
			[
				'content_id' => 2,
				'user_id' => 2
			],
		]);
    }
}
