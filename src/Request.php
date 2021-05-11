<?php
	/**
	 *
	 * Created by Wangqs
	 * Date: 2021/5/11 09:40
	 */

	namespace Wangqs\Moderation;

	/**
	 *
	 * Created by Malcolm.
	 * Date: 2021/5/11  09:40
	 */
	class Request
	{

		public $method = "";
		public $scheme = "";
		public $host = "";
		public $uri = "";
		public $query = [];
		public $headers = [];
		public $body = "";

	}