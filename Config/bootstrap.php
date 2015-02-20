<?php

// Configurar a autenticação do Facebook
Configure::write('Opauth.Strategy.Facebook',
	array(
  		'app_id' => '[SEU APP ID]',
   		'app_secret' => '[SEU APP SECRET]',
   		'token' => '[TOKEN DE ACESSO]',
	)
);