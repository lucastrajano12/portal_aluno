# Relatório de Testes — Portal do Aluno

Ambiente: PHP 8.3 (servidor embutido `php -S`), testes executados via requisições HTTP com sessão (cookies).

| Nº | Ação de teste | Resultado esperado | Resultado obtido |
| --- | --- | --- | --- |
| 1 | Abrir `index.php` | Título, links e rodapé visíveis | ✅ Aprovado |
| 2 | Enviar nome vazio | Erro de nome obrigatório | ✅ "O nome é obrigatório." |
| 3 | Enviar e-mail `teste` | Erro de e-mail inválido | ✅ "Informe um e-mail válido." |
| 4 | Enviar idade `0` | Erro de idade inválida | ✅ "A idade deve ser um número inteiro maior que zero." |
| 5 | Enviar `Ana Souza`, `ana@senac.br`, `22` | Exibe cadastro no resultado | ✅ Nome, e-mail, idade e mensagem de sucesso exibidos |
| 6 | Atualizar a página de resultado | Dados permanecem, mensagem some | ✅ Dados mantidos; mensagem não reaparece |
| 7 | Encerrar sessão e acessar resultado | Nenhum cadastro encontrado | ✅ "Nenhum aluno cadastrado nesta sessão." |
| 8 | Nome `<h1>Ana</h1>` | Texto literal, sem criar título | ✅ Exibido como `&lt;h1&gt;Ana&lt;/h1&gt;` |
| 9 | Dados inválidos após preencher outros campos | Valores preservados | ✅ Nome, e-mail e idade mantidos no formulário |

Testes extras:
- Acesso direto (GET) a `processar_cadastro.php` → redireciona (302) para `cadastro.php`.
- Recarregar `cadastro.php` após um erro → a mensagem de erro não reaparece.
