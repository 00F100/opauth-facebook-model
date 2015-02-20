## Facebook Model para Opauth - Cakephp

Após autenticar, faça solicitações de informações sobre usuários/páginas/grupos do Facebook.

## Dependências

> Para autenticar use: Opauth -> https://github.com/uzyn/cakephp-opauth

### Instalação

- Crie o diretório: app/Plugin/FacebookApi
- Clone o projeto (cd /path/to/app/Plugin/FacebookApi && git clone https://github.com/00F100/opauth-facebook-model.git ./)
- Inicie o plugin CakePlugin::load( $plugin, array('bootstrap' => true) );
- Configure o token do usuário na configuração: Configure::write('Opauth.Strategy.Facebook.token', '[TOKEN USUARIO]');