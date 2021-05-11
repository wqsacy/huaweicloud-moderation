<?php
	/**
	 *
	 * Created by Wangqs
	 * Date: 2021/5/11 09:44
	 */

	namespace Wangqs\Moderation;

	/**
	 *
	 * Created by Malcolm.
	 * Date: 2021/5/11  09:44
	 */
	class Text
	{
		protected $categories , $signer , $endponit;

		public function __construct ( $_ak , $_sk , $_endponit , $categories = [] ) {
			$this->signer = new Signer();
			$this->signer->AppKey = $_ak;             // 构建ak
			$this->signer->AppSecret = $_sk;          // 构建sk

			$this->endponit = $_endponit;

			if ( !count( $categories ) ) {
				$this->categories = [
					"ad" ,
					"politics" ,
					"abuse" ,
					"porn" ,
					"contraband" ,
					"flood"
				];
			}
		}


		public function monitor ( $text ) {

			// 构建请求对象
			$req = new Request();
			$req->method = "POST";
			$req->scheme = "https";
			$req->host = $this->endponit;
			$req->uri = Constants::MODERATION_TEXT;

			$data = [
				// 检测场景 Array politics：涉政 porn：涉黄 ad：广告 abuse：辱骂 contraband：违禁品 flood：灌水
				"categories" => $this->categories ,
				// items: 待检测的文本列表  text 待检测文本 type 文本类型
				"items"      => [
					[
						"text" => $text ,
						"type" => 'content'
					]
				] ,
			];

			$headers = [
				"Content-Type" => "application/json" ,
			];

			$req->headers = $headers;
			$req->body = json_encode( $data );

			// 获取ak，sk方式的请求对象，执行请求
			$curl = $this->signer->Sign( $req );
			curl_setopt( $curl , CURLOPT_SSL_VERIFYPEER , false );
			curl_setopt( $curl , CURLOPT_TIMEOUT , 5 );
			$response = curl_exec( $curl );
			$status = curl_getinfo( $curl , CURLINFO_HTTP_CODE );

			curl_close( $curl );


			if ( $status == 0 ) {
				return curl_error( $curl );
			} else {

				// 验证服务调用返回的状态是否成功，如果为2xx, 为成功, 否则失败。
				if ( $status >= 200 && $status < 300 ) {
					return json_encode( json_decode( $response , true ) , JSON_UNESCAPED_UNICODE );
				} else {
					return [
						'status'   => $status ,
						'response' => $response ,
					];
				}

			}

		}
	}