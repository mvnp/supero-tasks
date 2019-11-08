# Yeti! Framework

## UPDATE
Todas as views do adminlte podem ser acessadas para modificação no diretório abaixo e o controller que faz gestão dessas views é o Adminlte.php na pasta Controllers
- **views/administrador/adminlte**

É requisito trabalhar e enviar pull requests na branch **dev**

## Olá a todos! Feliz por estarem aqui!
Desenvolvi esse framework PHP baseado em vídeo-aulas dessa playlist (https://www.youtube.com/watch?v=Aw28-krO7ZM&list=PL7A20112CF84B2229), juntas essas aulas somam 6:00:00 e transformando em aprendizado, acho que dá pra multiplicar o esforço por 10, o que dá umas 60 horas para desenvolver passo a passo.

## Funcional e PHP7
Este framework foi desenvolvido na versão 5.6.40 do PHP mas ao trocar o servidor para a versão 7.2.22, o framework não deixou de funcionar, então é totalmente compatível com as versões mais novas do PHP.

## Pŕoximos passos
Os proxímos passos provavelmente consistem em integrar uma interface administrativa baseada no Bootstrap 4.0 talvez usando o AdminTLE e também colocar todas essas classes para carregar com composer. O paradigma MVC foi sado, então é daquele jeito:

- faz as pesquisas na model
- pega o resultado no controller
- transfere o resultado para as views

## jQuery e javascript
A jQuery está carregada no MVC e já existe por exemplo na url ***Dashboard*** um insert via ajax. Cada controller tem sua pasta nas views, é uma forma bem organizada de colocar os arquivos e não se perder no processo de desenvolvimento. Header e footer são carregados uma vez para todas as views, também podem ser persinalizados os headers e footers para cada view (vide /core/View.php)

## Setup
Basta renomear o **config.example.php** para **config.php** e colocar os dados da sua hospedagem ou do seu localhost. Depois acesse http://meusdominio/minpasta caso o projeto esteja em alguma pasta ou acessar a raiz caso projeto esteja na raiz. Precisa gerar no banco de dados um primeiro usuário e senha para começar a mexer na dashboard.

## Gerando uma senha - Faça depois da última linha do index.php
echo Hash::create("sha256", "123456", HASH_PASSWORD_KEY);

## ModRewrite
O .htaccess e o banco de dados estão sendo anexados ao projeto para que possam usá-los como base e configurações para configurar e usar o projeto.

### Valeu galera

#### Aguardo contribuições de código