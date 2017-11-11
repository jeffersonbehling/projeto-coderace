![borala](https://github.com/jeffersonbehling/projeto-coderace/blob/master/webroot/img/logo.png)
# Borá lá?

## Conceito

O Borá Lá é um aplicativo que conecta um grupo de pessoas que querem realizar atividades semelhantes na região, esse app foi desenvolvido pensado na região do vale do jaguari, aonde as cidades são pequenas e a quantidade de lugares para sair e os eventos são muito limitados.

A ideia é simplesmente conectar pessoas que querem sair e ter uma experiencia mais personaliada. Aonde o principal diferencial do Borá Lá é que o processo de criação dos acontecimentos é simplificado e ocorre a partir do interesse das pessoas em sair para depois ser criado o "evento", diferentemente do Facebook eventos, que é mais voltado a criação de eventos profissionais e organizados.

Exemplo: 
* Bruno quer sair no sabado mas não tem nada acontecendo na cidade dele, então ele marca que tem interesse de sair, de ir beber na praça da cidade e ficar conversando
* Fernanda e José tambem querem sair, eles abrem o Borá Lá e encontram o rolê do bruno e confirmam presença e entram no grupo do WhatsApp e interagem.
* Eduarda ve que tem 3 pessoas com interesse de sair, mas não gosta de ir na praça, então ela cria que quer beber no bar da cidade.

## Iniciando

O Sistema irá disponibilizar para o usuário informações das pessoas interessadas em sair, com a opção de criar ou participar de um rolê existente.

## Estrutura

O Borá Lá é dividido em 3 partes:
* Usuarios
* Rolês
* Locais

### Usuarios

* Nome
* E-mail
* Gostos(aqui o usuario seleciona os seus gostos, essa informação irá aparecer no perfil dela)

### Rolês

* Nome do rolê
* Horario de inicio
* Lugar
* Grupo do WPP
* Descrição
* Horario que o evento foi criado(invisivel para o usuario)
* Usuario que criou(invisivel para o usuario)

### Locais

* Nome
* Endereço
* Fotos


## 1º Passo
```
git clone https://github.com/jeffersonbehling/projeto-login-auth.git
```
Depois de clonar o projeto, execute no terminal:
```
cd projeto-login-auth
```
Depois disso, execute: 
```
composer update
```
E por fim, crie duas pastas:
```
mkdir tmp
```
Verifique se a extensão ```php-gd``` está habilitado no arquivo ```php.ini```

E dê permissões para ambas
```
sudo chmod 777 -R tmp/
```
```
sudo chmod 777 -R logs/
```
Execute o comando abaixo
```
composer create-folder
```
Após isso, será criada uma pasta: ```webroot/uploads```, agora você terá que dar permissão de gravação e leitura para respectiva pasta.

## 2º Passo
- Crie a base de dados ```projeto_coderace```
- Verifique as configurações em ```config/datasources/config.php```
- Dentro de ```projeto-login-auth```
- Execute a criação das tabelas
```
composer db-migrate
```

## 3º Passo
- Popule as tabelas com alguns dados pré-definidos para usuários e menus

```
composer db-seed
```

###### Obs: O comando acima irá inserir dois usuários no banco de dados, na tabela ```users```
`Usuário e Senha: superadmin`

`Usuário e Senha: user` 

## 4º Passo
Configure um e-mail para que seja possível enviar e-mails para os Administradores do Sistema quando tem um novo usuário, para que ele possa autorizá-lo. Lembre-se de ir no gmail, e autorizar acesso para Aplicativos menos seguros em sua conta.
```
'EmailTransport' => [
        'default' => [
            'className' => 'Smtp',
            // The following keys are used in SMTP transports
            'host' => 'ssl://smtp.gmail.com',
            'port' => 465,
            'timeout' => 30,
            'username' => 'YOUR_EMAIL@GMAIL.COM',
            'password' => 'YOUR_PASS',
            'client' => null,
            'tls' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
```

## 5º Passo
- Acesse ```/projeto-login-auth/login``` e faça login.

## Tela de Login

[Login](https://github.com/jeffersonbehling/projeto-login-auth/blob/master/webroot/img/screenshots/login.png)
![alt text](https://github.com/jeffersonbehling/projeto-login-auth/blob/master/webroot/img/screenshots/login.png)
