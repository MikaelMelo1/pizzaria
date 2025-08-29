

# Pizzaria 


## 🧾 Descrição

A aplicação permite aos usuários montar e fazer pedidos de pizzas personalizadas, além de gerenciar os pedidos com funcionalidades de atualização de status e exclusão. O sistema integra front-end e back-end, com uma interface responsiva e um banco de dados MySQL para armazenar informações.

---

## 📸 Captura de Tela

Abaixo está uma prévia da interface da aplicação Pizzaria Delícia, exibida em desktop e dispositivos móveis:

<img width="908" height="420" alt="image" src="https://github.com/user-attachments/assets/cb5c563b-efa2-46b5-ad84-6ccb61e5dbdd" />



Página principal com o banner "Faça seu Pedido" e seção interativa para personalizar pizzas, incluindo borda, massa e até três sabores.

---

## 🚀 Tecnologias Utilizadas

- **PHP**: Para lógica do back-end e processamento de pedidos.
- **MySQL**: Banco de dados relacional para armazenamento de bordas, massas, sabores e pedidos.
- **JavaScript**: Para interatividade no front-end.
- **HTML5**: Estruturação da interface.
- **CSS3**: Estilização e layout responsivo.
- **Bootstrap**: Framework CSS para design responsivo e componentes de interface.
- **Font Awesome**: Ícones para botões de ações (atualizar e excluir).

---

## 📌 Funcionalidades

- **Montagem de Pedidos**: Interface interativa para selecionar borda, massa e até três sabores de pizza.
- **Gerenciamento de Pedidos**: Tabela para visualizar pedidos, com opções para atualizar status (ex.: aguardando, em preparo, entregue) e excluir pedidos.
- **Integração com Banco de Dados**: Armazenamento e recuperação de dados de pizzas e pedidos usando MySQL.
- **Validação de Entrada**: Limitação de até três sabores por pedido e mensagens de feedback para o usuário.
- **Notificações**: Exibição de mensagens de sucesso ou erro após ações como criar, atualizar ou excluir pedidos.
- **Layout Responsivo**: Interface adaptável para desktops e dispositivos móveis.

---

## 🛠️ Como Executar

Siga os passos abaixo para configurar e executar o projeto localmente:

1. **Clone o repositório**:
   ```bash
   git clone https://github.com/MikaelMelo1/pizzaria
   ```

2. **Configure o servidor local**:
   - Instale um servidor local como **XAMPP** ou **WAMP**.
   - Coloque os arquivos do projeto na pasta raíz do servidor (ex.: `htdocs/pizarria`).

3. **Configure o banco de dados MySQL**:
   - Abra o **phpMyAdmin** no navegador ou o MySQL Workbench
   - Crie um banco de dados chamado `pizzaria`.
   - Importe o arquivo `pizzaria.sql` (disponível no repositório) para criar as tabelas necessárias (`pizzas`, `pedidos`, `bordas`, `massas`, `sabores`, `pizza_sabor`, `status`).

4. **Configure a conexão com o banco de dados**:
   - Edite o arquivo `conn.php` com as credenciais do seu banco de dados (host, usuário, senha, nome do banco).

5. **Acesse o projeto**:
   - Inicie o servidor local.
   - Acesse via navegador: `http://localhost/pizarria`.

---

## 📂 Estrutura do Projeto

- **index.php**: Página principal para montar e enviar pedidos de pizza.
- **dashboard.php**: Página para gerenciar pedidos, com tabela de visualização, atualização de status e exclusão.
- **process/pizza.php**: Script PHP para processar a criação de pedidos.
- **process/orders.php**: Script PHP para gerenciar ações de atualização e exclusão de pedidos.
- **conn.php**: Configuração da conexão com o banco de dados MySQL.
- **templates/**: Contém os arquivos `header.php` e `footer.php` para estruturação das páginas.
- **pizzaria.sql**: Arquivo com o esquema do banco de dados.

