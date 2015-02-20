[PORTUGUÊS]

## Facebook Model para Opauth - Cakephp

Após autenticar, faça solicitações de informações sobre usuários/páginas/grupos do Facebook.

## Dependências

> Para autenticar use: Opauth -> https://github.com/uzyn/cakephp-opauth

### Instalação

- Crie o diretório: app/Plugin/FacebookApi
- Clone o projeto (cd /path/to/app/Plugin/FacebookApi && git clone https://github.com/00F100/opauth-facebook-model.git ./)
- Inicie o plugin CakePlugin::load( $plugin, array('bootstrap' => true) );
- Configure o token do usuário na configuração: Configure::write('Opauth.Strategy.Facebook.token', '[TOKEN USUARIO]');
- importe o Model do Facebook para seu controller utilizando:

> "$uses = array('FacebookApi.FacebookApiUsuario')"

- Faça suas pesquisas utilizando:

> $this->FacebookApiUsuario->getInfo()

--------------------------------------

[ENGLISH]

## Facebook Model to Opauth - Cakephp

After logging in, make requests for information about users/pages/groups Facebook.

## ependencies

> To authenticate use: Opauth -> https://github.com/uzyn/cakephp-opauth

### Installation

- Create the directory: app/Plugin/FacebookApi
- Clone the project: (cd /path/to/app/Plugin/FacebookApi && git clone https://github.com/00F100/opauth-facebook-model.git ./)
- Start plugin CakePlugin::load( $plugin, array('bootstrap' => true) );
- Configure the user token in the configuration: Configure::write('Opauth.Strategy.Facebook.token', '[TOKEN USUARIO]');
- Import the Model of Facebook for your controller using:

> "$uses = array('FacebookApi.FacebookApiUsuario')"

- Do your search using:

> $this->FacebookApiUsuario->getInfo()