# -Projeto-Final-Kevin-Felipe-Silva-De-Souza_Analise-Desenvolvimento-de-Sistemas

 Sistema de Agendamento Clínico – clinica_kevin

Este projeto é um sistema de gerenciamento e agendamento de consultas médicas, permitindo o cadastro de pacientes, médicos, consultas, usuários administrativos e emissão de atestados.
O sistema foi desenvolvido utilizando PHP + MySQL/MariaDB como base para armazenamento dos dados.

Funcionalidades do Sistema
👤 Pacientes

Cadastro de pacientes

Edição e consulta de informações

Histórico de consultas

Vinculação com atestados

🩺 Médicos

Cadastro de médicos

CRM e especialidade

Visualização da agenda

Relacionamento com consultas e atestados

🗓️ Consultas

Agendamento de consultas

Associação entre paciente e médico

Definição de data, hora e descrição do atendimento

Gerenciamento completo pelo administrador

📄 Atestados Médicos

Emissão de atestados após consulta

Registro de motivo, período de afastamento e datas

Vinculação automática ao médico e paciente

🔐 Usuários do Sistema

Login

Controle de acesso por tipo (ex.: ADM, Recepção, Médico)

Armazenamento de senha

Identificação por nível (campo tipo)

Estrutura do Banco de Dados

A base clinica_kevin contém 5 tabelas principais:

📍 1. paciente

Armazena os dados do paciente.

Campo	Tipo	Descrição
id_paciente	INT	Identificador
nome_paciente	VARCHAR(100)	Nome completo
cpf_paciente	VARCHAR(14)	CPF
data_nasc_paciente	DATE	Data de nascimento
sexo_paciente	CHAR(1)	Sexo
fone_paciente	VARCHAR(20)	Telefone
email_paciente	VARCHAR(100)	E-mail
endereco_paciente	VARCHAR(100)	Endereço
📍 2. medico
Campo	Tipo	Descrição
id_medico	INT	Identificador
nome_medico	VARCHAR(100)	Nome
crm_medico	VARCHAR(10)	CRM
especialidade_medico	VARCHAR(20)	Especialidade
📍 3. consulta

Tabela que conecta paciente → médico.

Campo	Tipo
id_consulta	INT
paciente_id_paciente	INT
medico_id_medico	INT
data_consulta	DATE
hora_consulta	TIME
descricao_consulta	TEXT
📍 4. atestado

Gerado após a consulta.

Campo	Tipo
id_atestado	INT
paciente_id_paciente	INT
medico_id_medico	INT
data_emissao	DATE
motivo	VARCHAR(255)
afastado	VARCHAR(255)
data_inicio	DATE
data_fim	DATE
📍 5. usuarios

Para login no sistema.

Campo	Tipo
id	INT
nome	VARCHAR(255)
email	VARCHAR(255)
usuario	VARCHAR(255)
senha	VARCHAR(255)
tipo	CHAR(1)

🔗 Relacionamentos do Sistema

Paciente 1 — N Consulta

Médico 1 — N Consulta

Paciente 1 — N Atestado

Médico 1 — N Atestado

⚙️ Tecnologias Utilizadas

PHP 8+

MySQL/MariaDB 10.4+

phpMyAdmin

HTML + CSS + Bootstrap

XAMPP/Laragon/WAMP (ambiente)

🚀 Como Importar o Banco

Abra o phpMyAdmin

Clique em Importar

Selecione o arquivo .sql

Aguarde o carregamento

A base clinica_kevin aparecerá pronta

📁 Estrutura Recomendada do Sistema (PHP)
_clinica_kevin
 ├── conexao.php
 ├── pacientes/
 ├── medicos/
 ├── consultas/
 ├── atestados/
 ├── usuarios/
 ├── assets/
 └── index.php
 
 🔐 Login do Sistema (exemplo do seu banco)

Usuário: kevin
Senha: 1234567m
Tipo: 1 (Administrador)

Aplicação CRUD no Projeto


A seguir apresento como o CRUD foi aplicado em cada entidade do sistema.

📌 CRUD – Paciente

Operação	- Descrição
Create	- Cadastrar novo paciente
Read - Listar pacientes cadastrados
Update -	Editar informações do paciente
Delete -	Excluir paciente

📌 CRUD – Médico
Operação -	Descrição
Create -	Cadastro de médico
Read -	Visualização dos médicos
Update -	Alterar CRM ou especialidade
Delete -	Apagar médico

📌CRUD – Consulta
Operação -	Descrição
Create -	Agendar consulta
Read -	Mostrar consultas agendadas
Update -	Reagendar horário
Delete -	Cancelar consulta

📌CRUD – Atestado
Operação - Descrição
Create -	Emitir atestado
Read -	Listar atestados emitidos
Update -	Ajustar datas de afastamento
Delete -	Remover atestado

Cadastro de Paciente (Create)
INÍCIO
    LER nome, cpf, data_nasc, sexo, telefone, email, endereço
    SE nome NÃO ESTÁ VAZIO E cpf NÃO ESTÁ VAZIO ENTÃO
        INSERIR dados na tabela PACIENTE
        EXIBIR "Cadastro realizado com sucesso"
    SENÃO
        EXIBIR "Erro: Preencha todos os campos obrigatórios"
    FIM-SE
FIM

Listagem de Consultas (Read)
INÍCIO
    CONSULTAR tabela CONSULTA
    PARA cada registro encontrado FAÇA
        EXIBIR id_consulta, paciente, médico, data, hora, descrição
    FIM-PARA
FIM

Atualizar Consulta (Update)
INÍCIO
    LER id_consulta
    LER nova_data, nova_hora
    SE id_consulta existe NA TABELA CONSULTA ENTÃO
        ATUALIZAR consulta SET data = nova_data, hora = nova_hora
        EXIBIR "Consulta atualizada com sucesso"
    SENÃO
        EXIBIR "Erro: Consulta não encontrada"
    FIM-SE
FIM

Excluir Médico (Delete)
INÍCIO
    LER id_medico
    SE id_medico EXISTE NA TABELA MEDICO ENTÃO
        REMOVER registro correspondente
        EXIBIR "Médico excluído"
    SENÃO
        EXIBIR "Médico não encontrado"
    FIM-SE
FIM

Representação do Fluxograma (texto)
[INÍCIO]
   ↓
[LOGIN DO USUÁRIO]
   ↓
[VALIDAR USUÁRIO]
   ├── NÃO → [ERRO] → volta ao LOGIN
   └── SIM → continua
   ↓
[SELECIONAR MÉDICO]
   ↓
[VER HORÁRIOS DISPONÍVEIS]
   ↓
[SELECIONAR DATA E HORA]
   ↓
[GRAVAR CONSULTA NO BANCO]
   ↓
[EXIBIR MENSAGEM DE SUCESSO]
   ↓
[FIM]

Algoritmo Agendar_Consulta
Algoritmo Agendar_Consulta

Início
    Escreva("Digite o código do paciente: ")
    Leia id_paciente

    Escreva("Digite o código do médico: ")
    Leia id_medico

    Escreva("Informe a data da consulta: ")
    Leia data_consulta

    Escreva("Informe o horário da consulta: ")
    Leia hora_consulta

    Se (id_paciente existe) E (id_medico existe) Então
        Inserir na tabela CONSULTA:
            (paciente_id_paciente,
             medico_id_medico,
             data_consulta,
             hora_consulta)
        Escreva("Consulta agendada com sucesso!")
    Senão
        Escreva("Erro: paciente ou médico não encontrado.")
    FimSe
Fim

Autor

Kevin Felipe
📧kevin.fsilvas@gmail.com

🔗 GitHub: Autor

Kevin Felipe
📧 contato@email.com

🔗 GitHub: 










