![Texto do seu parágrafo](https://github.com/ednosmab/aluraplay/assets/37445442/d7f54778-ca4a-4cb6-9c26-152840cb7acc)

# aluraplay
Um simples CRUD em MVC com PDO Respository, serviço de login e upload de arquivos.

## Tecnologias utilizadas
- HTML5
- CSS3
- PHP 8.2
- Composer para utilizar autoload
- Banco de dados Sqlite

### Iniciando o sistema com o servidor embutido do PHP via localhost
#### Via terminal
$ php -S localhost:8000 -t public/

#### Acessando o sistema via navegador
http://localhost:8000

#### Dados de acesso
E-mail: edson@edson.com.br
Senha: 123456

### Adicionando novo vídeo
1- No menu superior escolher a opção de novo vídeo
![1](https://github.com/ednosmab/aluraplay/assets/37445442/64bc0d11-19c2-45a0-9f31-ea96de8cfde5)

2- Após escolher o vídeo do YouTube, entrar na opção de Compartilhar seguido de Incorporar
![2](https://github.com/ednosmab/aluraplay/assets/37445442/bbb371ec-7e7e-4052-a708-107f6b686ba4)

3- Copiar o link do vídeo que será adicionado
![3](https://github.com/ednosmab/aluraplay/assets/37445442/a38212d1-918d-4030-8c41-790890bb2fbf)

4- Copiar o nome de seu título
![4](https://github.com/ednosmab/aluraplay/assets/37445442/ecca5a1f-e476-407e-8edb-46700b233710)

5- Incluir o link com o nome do título do vídeo e clicar no botão Enviar
![5](https://github.com/ednosmab/aluraplay/assets/37445442/0a5ea0e6-9b4b-4e8b-b987-4913d23a38cf)

6- Após o envio do formulário com os dados preenchidos do vídeo, o sistema redirecionará para a tela inicial mostrando o novo vídeo que foi adicionado com sucesso
![6](https://github.com/ednosmab/aluraplay/assets/37445442/b29d8fa7-7138-4ea0-8e17-d4b188a0b546)
![6-2](https://github.com/ednosmab/aluraplay/assets/37445442/9cfc8cce-2b01-4033-8c5d-894bfdd62a32)

### Adicionando vídeo via json
#### Recomendado utilizar o Postaman para enviar a request
Adicione o domínio: localhost

Crie o cookie de sessão: PHPSESSID=<id da sessão criada após logar no sistema>; Path=/;
* Necessário verificar o ID da sessão na opção Ferramentas do Desenvolvedor > Aplication > Storege > Cookies > http://localhost:8000 > Name: PHPSESSID > Value: id da sessão

* Body > raw
```
{
    "url": "https://www.youtube.com/embed/Qhk6xu53kho",
    "title": "Logins seguros - Armazenando senhas corretamente | Dias de Dev"
}
```
 Caso o envio ocorra com sucesso a resposta do cabeçalho será 201 - corresponte a criado
