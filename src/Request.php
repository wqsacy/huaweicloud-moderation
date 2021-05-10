<?php
	/**
	 *
	 * Created by Wangqs
	 * Date: 2021/5/10 9:45 下午
	 */

	namespace Wangqs\Moderation;

	/**
	 *
	 * Created by Malcolm.
	 * Date: 2021/5/10  9:45 下午
	 */
	class Request
	{
		public $method = "";
		public $scheme = "";
		public $host = "";
		public $uri = "";
		public $query = array();
		public $headers = array();
		public $body = "";
	}