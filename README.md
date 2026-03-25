## Tecnologias
- PHP 8+
- Laravel 10
- Laravel/ui (Auth)
- Docker

## Funcionalidades da Aplicação

1. Uma página inicial com a lista de contatos existentes.
2. Uma página com um formulário para adicionar novos contatos.
3. Uma página para exibir os detalhes de um contato.
4. Permitir a edição de um registro existente.
5. Permitir a exclusão de um registro existente.

## Permitir a exclusão de um registro existente.
Um contato é uma entidade com **4 campos**:
- id
- person_id
- ddd
- number(phone)
- email

Uma pessoa é uma entidade com **3 campos**
- id
- name
- avatar(image)

Regras: 
- O nome deve ser uma string com tamanho maior que 5 caracteres.
- O contato deve conter 9 dígitos.
- O e-mail deve ser um e-mail válido.

Na página de listagem:
- Cada linha deve ter um link para editar o contato.
- Deve haver um botão para excluir o contato.
- A exclusão deve ser feita como soft delete, utilizando os recursos nativos do Laravel.

Na página de detalhes do contato:
- Devem ser exibidos todos os campos do contato, além do link para edição e o botão de exclusão.
- Deve ser implementada uma página independente para exibição dos detalhes, e não um popup.

Regras adicionais:
- O contato (telefone) e o e-mail devem ser únicos. Dois contatos não podem ter o mesmo telefone ou e-mail.

## Para rodar o projeto
```
docker-compose up -d
```
```
docker exec -it php bash
```
```
composer install
```