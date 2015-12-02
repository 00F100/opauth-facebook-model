<?php
/**
 * Facebook Api Pagina
 *
 * @package       app.Plugin.FacebookApi.Model
 * @author     Joao Moraes - joaomoraesbr@gmail.com
 * @since         2015
 */

App::uses('FacebookApiAppModel', 'FacebookApi.Model');

class FacebookApiPagina extends FacebookApiAppModel {

	protected $_request = array(
		'method' => 'GET',
		'uri' => array(
			'scheme' => 'https',
			'host' => 'graph.facebook.com',
			'path' => '/',
		)
	);

	/**
	 * Retorna as informações da página
	 */
	public function getInfo($page_id = '', $fields = array()) {
		return $this->_request($page_id, array(
			'uri' => array(
				'query' => array(
					'fields' => implode(',', $fields),
				),
			),
		));
	}

	/**
	 * Retorna a imagem da página
	 */
	public function getPicture($page_id)
	{
		return $this->_request($page_id, array(
			'uri' => array(
				'query' => array(
					'fields' => 'picture',
					'type' => 'large',
				),
			),
		));
	}
}
