<?php
	/**
	 *  测试
	 * Created by Wangqs
	 * Date: 2021/5/10 9:09 下午
	 */



	$text = '中华人民共和国宪法';

	$ak = '';
	$sk = '';
	$endponit = '';

	$client = new Wangqs\Moderation\Text( $ak , $sk , $endponit );

	$rs = $client->monitor( $text );

	print_r( $rs );