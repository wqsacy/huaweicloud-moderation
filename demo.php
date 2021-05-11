<?php

	require 'vendor/autoload.php';

	use Wangqs\Moderation\Text;

	$text = '666666luo聊请+110亚砷酸钾六位qqweixin,fuck666666666666666';

	$ak = '';
	$sk = '';
	$endponit = '';

	$client = new Text( $ak , $sk , $endponit );

	$rs = $client->monitor( $text );

	print_r( $rs );