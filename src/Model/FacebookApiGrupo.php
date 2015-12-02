<?php

namespace OpauthFacebook\Model;

use OpauthFacebook\Model\FacebookApiAppModel;

/**
 * Facebook Api Usuario
 *
 * @package       app.Plugin.FacebookApi.Model
 * @author     Joao Moraes - joaomoraesbr@gmail.com
 * @since         2015
 */

class FacebookApiGrupo extends FacebookApiAppModel {

	protected $_request = array(
		'method' => 'GET',
		'uri' => array(
			'scheme' => 'https',
			'host' => 'graph.facebook.com',
			'path' => '/',
		)
	);

	/**
	 * Retorna as informações do grupo
	 */
	public function getInfo($grupo_id = '', $fields = array()) {
		return $this->_request($grupo_id, array(
			'uri' => array(
				'query' => array(
					'fields' => implode(',', $fields),
				),
			),
		));
	}

	/**
	 * Retorna as informações do feed
	 */
	public function getFeed($grupo_id, $fields = array(), $since = false, $until = false, $limit = 30) {
		return $this->_request($grupo_id . '/feed', array(
			'uri' => array(
				'query' => array(
					'fields' => implode(',', $fields),
					'limit' => $limit,
					'since' => ($since ? $since : ''),
					'until' => ($until ? $until : ''),
				),
			),
		));
	}

	/**
	 * Retorna a imagem da página
	 */
	public function getPicture($grupo_id = '')
	{
		return $this->_request($grupo_id, array(
			'uri' => array(
				'query' => array(
					'fields' => 'picture',
					'type' => 'large',
				),
			),
		));
	}
}
