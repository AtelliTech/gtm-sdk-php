<?php

namespace gtm;

/**
 * Response.
 * 
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @since 1.0.0
 * @version 1.0.0
 */
class Response
{
	/**
	 * @const string STATUS_SUCCESS
	 */
	public const STATUS_SUCCESS = 'success';

	/**
	 * @const string STATUS_FAIL
	 */
	public const STATUS_FAIL = 'fail';

	/**
	 * @const string STATUS_UNKNOWN
	 */
	public const STATUS_UNKNOWN = 'unknown';

	/**
	 * 
	 */
	public static function getResponse($response)
	{
		$status = array_key_exists('status', $response) ? $response['status'] : Response::STATUS_UNKNOWN;
		$data = array_key_exists('result', $response) ? $response['result'] : [];
		$message = array_key_exists('message', $response) ? $response['message'] : '';

		$result = [
            'status' => $status,
            'data' => $data
        ];

        if (!empty($message)) {
        	$result = array_merge($result, ['message' => $message]);
        }

        return $result;
	}
}