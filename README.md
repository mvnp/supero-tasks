# Supero! TASKS

## Projeto
Este projeto consiste num sistema de gestão diária de tarefas que pode ser evoluido conforme necessidade. Hoje, ele já adiciona, atualiza, exclui as tarefas além de ter várias funcionalidades diferenciais para gestão completa das tarefas. Dentre as funcionalidades estão:
- Cadastro das Tarefas
- Exclusão das Tarefas
- Atualização das Tarefas:
  - Novo
  - Executando
  - Aguardando
  - Urgente
  - Finalizado

O sistema está preparado para apontar o autor da tarefas e o executor das tarefas e também conta com data final para entrega da tarefa. Também foi inserido um motor de busca rápida que filtra as tarefas por status no momento da solicitação e um motor de busca especializado que busca por:
 - Intervalo das Tarefas
 - Status das Tarefas
 - Autor das Tarefas
 - Executor das Tarefas .. todas os itens podendo ser buscados simultaneamente ou de forma individual.

Foi desenhado no formato de uma timeline mostrando das tarefas mais recentes as tarefas mais futuras permitindo assim um acompanhamento cronológico das tarefas dia a dia e havendo a possibilidade através do filtro a busca de um dia em específico.

## O Código
Todo o código das pastas:
 - Controllers
 - Core
 - Models
 - Utils
 - Views foram produzidas por mim no processo de criação do sistema de tarefas. Eu usei o sistema MVC (Model, View, Controller) para separar as camadas de desenvolvimento e comentei todo o código em inglês para que além dos padrões internacionais, os devs possam se ajudar dos comentários para entendimento do projeto. 

## Composer
Foi usando composer para carregar as classes com autoload não precisando dar requires pra todo canto obedecendo assim as psr's de desenvolvimento conforme determinado pelos projetos PHP-FIG e http://br.phptherightway.com .. Foi respeitando alguns conceitos de SOLID para separação de responsabilidades.

**não refatorei o código, simplesmente escrevi e entreguei, foram 16h de trabalho**

## jQuery e javascript
Escrevi códigos javascript/ajax para dar performance ao sistema principalmente na parte de gestão das tarefas aonde não existe reload da página para mudança de status e pode ser observado quando o status é trocado pela mudança de layout que é inferida.

## PHP
O projeto está rodando no servidor em PHP7.3, versão mais atual e estável no momento.

## ModRewrite
O .htaccess e o banco de dados estão sendo anexados ao projeto.

# Abraço do Marcos