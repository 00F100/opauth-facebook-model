<?php
/**
 * FacebookApiUsuario
 *
 * @package       app.Plugin.FacebookApi.Controller
 * @author     Joao Moraes - joaomoraesbr@gmail.com
 * @since         ListaBox 2015
 */

App::uses('FacebookApiAppModel', 'FacebookApi.Model');

class FacebookApiUsuario extends FacebookApiAppModel {

	protected $_request = array(
		'method' => 'GET',
		'uri' => array(
			'scheme' => 'https',
			'host' => 'graph.facebook.com',
			'path' => '/',
		)
	);

	/**
	 * Retorna as informações do usuário
	 */
	public function getInfo($usuario_id = 'me', $fields = array())
	{
		if(count($fields) > 0){
			return $this->_request($usuario_id, array(
				'uri' => array(
					'query' => array(
						'fields' => implode(',', $fields),
					),
				),
			));
		}else{
			return $this->_request($usuario_id);
		}
	}

	/**
	 * Retorna a imagem do usuario
	 */
	public function getPicture($usuario_id = 'me')
	{
		return $this->_request($usuario_id, array(
			'uri' => array(
				'query' => array(
					'fields' => 'picture',
					'type' => 'large',
				),
			),
		));
	}

	/**
	 * Retorna as páginas do usuário
	 */
	public function getPages($usuario_id = 'me', $fields = array())
	{
		if(count($fields) > 0){
			return $this->_request($usuario_id . '/accounts', array(
				'uri' => array(
					'query' => array(
						'fields' => implode(',', $fields),
					),
				),
			));
		}else{
			return $this->_request($usuario_id . '/accounts');
		}
	}

	/**
	 * Retorna os grupos do usuário
	 */
	public function getGroups($usuario_id = 'me', $fields = array())
	{
		return $this->_request($usuario_id . '/groups', array(
			'uri' => array(
				'query' => array(
					'fields' => implode(',', $fields),
				),
			),
		));
		//privacy		
		// return $this->_request($usuario_id . '/groups');
	}
}
