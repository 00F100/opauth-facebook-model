<?php

namespace OpauthFacebook\Model;

use App\Model\AppModel;
/**
 * Facebook Api App Model
 *
 * @package       app.Plugin.FacebookApi.Model
 * @author     Joao Moraes - joaomoraesbr@gmail.com
 * @since         2015
 */

// App::uses('AppModel', 'Model');
// App::uses('CakeSession', 'Model/Datasource');
// App::uses('Hash', 'Utility');
// App::uses('HttpSocket', 'Network/Http');
// App::uses('Set', 'Utility');

class FacebookApiAppModel extends AppModel
{
	public $useTable = false;

	public $_config = array();

	protected $_request = array(
		'method' => 'GET',
		'uri' => array(
			'scheme' => 'https',
			'host' => 'graph.facebook.com',
		)
	);

	protected $_strategy = 'Facebook';

	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		if (!CakeSession::check($this->_strategy)) {
			$config = ClassRegistry::init('Opauth.OpauthSetting')
				->findByName($this->_strategy);
			if (!empty($config['OpauthSetting'])) {
				CakeSession::write($this->_strategy, $config['OpauthSetting']);
			}
		}
		$this->_config = CakeSession::read($this->_strategy);
	}

	public function set_config(array $config)
	{
		$this->_config = $config;
	}

	protected function _parseResponse($response) {
		$results = json_decode($response->body);
		if (is_object($results)) {
			$results = Set::reverse($results);
		}

		return $results;
	}

	protected function _request($path, $request = array()) {
		// preparing request
		$request = Hash::merge($this->_request, $request);
		$request['uri']['path'] .= $path;

		if(isset($request['uri']['query'])){
			$request['uri']['query'] = array_merge(array(
				'access_token' => $this->_config['token'],
			), $request['uri']['query']);
		}else{
			$request['uri']['query'] = array(
				'access_token' => $this->_config['token'],
			);
		}
		// createding http socket object for later use
		$HttpSocket = new HttpSocket(array(
			'ssl_verify_host' => false
		));

		// issuing request
		$response = $HttpSocket->request($request);

		// olny valid response is going to be parsed
		if (substr($response->code, 0, 1) != 2) {
			if (Configure::read('debugApis')) {
				debug($request);
				debug($response->body);
				die;
			}
			return false;
		}

		// parsing response
		$results = $this->_parseResponse($response);

		if(isset($results['data'])){
			return $results['data'];
		}

		return $results;
	}

	public function getConfig()
	{
		return $this->_config;
	}
}

?>