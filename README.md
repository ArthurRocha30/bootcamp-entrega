# Bootcamp Entrega — Site de Tarefas (PHP + MySQL)

Site desenvolvido em PHP e MySQL para gerenciamento simples de tarefas com autenticação segura de usuários.

## Funcionalidades
- Cadastro e login de usuários com `password_hash()` e `password_verify()`  
- Criação, listagem e edição de tarefas  
- Atualização de senha  
- Controle de acesso via sessão  

## Tecnologias utilizadas
- PHP  
- MySQL  
- HTML e CSS  

## Como executar
1. Clone o repositório:
   ```bash
   git clone https://github.com/ArthurRocha30/bootcamp-entrega.git
Execute o arquivo script.sql no MySQL.

Configure conectar.php com as credenciais do seu ambiente.

Coloque o projeto no diretório do servidor local (ex: htdocs no XAMPP).

Acesse em http://localhost/bootcamp-entrega.

Estrutura principal
bash
Copiar código
index.php              # Login
criar-conta.php         # Cadastro de usuário
listar-tarefas.php      # Listagem de tarefas
tarefa.php              # Criação/edição de tarefa
atualizar-senha.php     # Alteração de senha
conectar.php            # Conexão com o banco
script.sql              # Script do banco de dados
Possíveis melhorias
Melhorar o controle de acesso às tarefas, exibindo apenas as do usuário logado

Implementar validações adicionais nos formulários

Refinar o layout e a experiência do usuário

Observações
Todas as senhas são armazenadas com hash seguro.

As páginas são protegidas por sessão para evitar acesso não autorizado.

O projeto foi feito para fins de aprendizado e pode ser expandido facilmente.
