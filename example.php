<?php

use VrumAPI\Vrum as vrum;
require('vendor/autoload.php');

//======================================================================
// Data FTP 
//======================================================================
$vrum = new vrum
	(
		array(
		'urlFile' =>      '{urlFile}',
		'ftp_server'=>    '{ftp_server}',
	    'ftp_user_name'=> '{ftp_user_name}',
	    'ftp_user_pass'=> '{ftp_user_pass}'
	)
);

//======================================================================
// Feature
//======================================================================
$options = $vrum->getOptions();

$motor   = $vrum->getMotor();

//======================================================================
// Create New Deal
//======================================================================

$cars=[
	[
		'ad'         => '{ad}',
		'adpub'      => '{adpub}',
		'city'		 => '{city}',
		'state'		 => '{state}',
		'maker'      => '{maker}',
		'year_maker' => '{year_maker}',
		'year_model' => '{year_model}',
		'model'		 => '{model}',
		'model_base' => '{model_base}',
		'cody_model' => '{cody_model}',
		'fuel_type'  => '{fuel_type}',
		'motor'		 => '{motor}',
		'gear'		 => '{gear}',
		'color'		 => '{color}',
		'state_car'  => '{state_car}', //novo ou usado
		'km'		 => '{km}',
		'plate'		 => '{plate}',
		'doors'		 => '{doors}',
		'price'		 => '{price}',
		'options'    => 'option1, option2, option3, ...',
		'photos'     => [ 
			'http://serverjpg.jpg',
			'http://serverjpg.jpg',
			'http://serverjpg.jpg'

		],
		'videos'    => [
			'https://servervideo1.com',
			'https://servervideo2.com'
		]
	],

	[
		'ad'         => '{ad}',
		'adpub'      => '{adpub}',
		'city'		 => '{city}',
		'state'		 => '{state}',
		'maker'      => '{maker}',
		'year_maker' => '{year_maker}',
		'year_model' => '{year_model}',
		'model'		 => '{model}',
		'model_base' => '{model_base}',
		'cody_model' => '{cody_model}',
		'fuel_type'  => '{fuel_type}',
		'motor'		 => '{motor}',
		'gear'		 => '{gear}',
		'color'		 => '{color}',
		'state_car'  => '{state_car}', //novo ou usado
		'km'		 => '{km}',
		'plate'		 => '{plate}',
		'doors'		 => '{doors}',
		'price'		 => '{price}',
		'options'    => 'option1, option2, option3, ...',
		'photos'     => [ 
			'http://serverjpg.jpg',
			'http://serverjpg.jpg',
			'http://serverjpg.jpg'

		],
		'videos'    => [
			'https://servervideo1.com',
			'https://servervideo2.com'
		]
	]

];

$params = [
	'company' => '{company}',
	'cnpj'    => '{cnpj}',
	'cars'    =>  $cars
];

$vrum->postDeal($params);