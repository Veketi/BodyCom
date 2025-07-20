# **BodyCom**

![Laravel](https://img.shields.io/badge/Laravel-11-red)
![Vue.js](https://img.shields.io/badge/Vue.js-3-green)
![License](https://img.shields.io/badge/license-MIT-blue)

## **Descrição:**

O BodyCom é um projeto acadêmico com o objetivo de ampliar os conhecimentos na área de **Desenvolvimento Web** através de um simples site de cálculo de IMC com **Login**, **Histórico** e **Middleware**. 

Para usar a aplicação o usuário precisa criar uma conta. Caso o usuário tente acessar as páginas **Home** e **Tabela** sem estar logado, ele será redirecionado para a página de login pelo **Middleware**. Após o login é possível calcular o seu IMC na página home e acessar a página tabela para checar o histórico de IMCs.

Entre as tecnologias utilizadas estão:
* **PHP 8:** Linguagem do Back-End.
* **Laravel 11:** Framework do Back-End.
* **InertiaJs:** "Framework" para conectar o Back-End com o Front-End.
* **SQLite:** Sistema Gerenciador de Banco de Dados leve baseado em arquivos.
* **JavaScript:** Linguagem do Front-End.
* **Vue.js 3:** Framework do Front-End.
* **HTML & CSS:** Linguagens de Marcação e Estilização.
* **TailwindCSS:** Como Framework de CSS.

## **Requisitos:**
Para executar essa aplicação localmente são necessários:
* **PHP**
* **Composer** 
* **NodeJs**

## **Passo a Passo:**

### 1. **Instalar o Laravel via Composer:**

Precisamos instalar o Framework Laravel para executar o projeto.

```bash
composer global require laravel/installer
```

### 2. **Clonar o repositório e entrar na pasta:**

Após a instalação do Laravel, clone o repositório e entre na pasta do projeto.

```bash
git clone https://github.com/Veketi/BodyCom.git
cd BodyCom
```

### 3. **Instalar dependências do Laravel:**

Para instalar todas as dependências do Laravel, digite:

```bash
composer install
```

### 4. **Instalar as dependências do Vue.js:**

Para instalar as dependências do Vue.js, digite:

```bash
npm install
```

### 5. **Criação do banco de dados**

**5.1.** Criar o arquivo sqlite:

* **Linux/MacOs:**

```bash
touch ./database/database.sqlite
```

* **Windows - PowerShell:**

```pwsh
New-Item .\database\database.sqlite
```

* **Windows - Prompt de Comando (CMD):**

```cmd
type nul > .\database\database.sqlite
```

**5.2.** Criar as tabelas do Banco de dados:

```bash
php artisan migrate
```

### 6. **Iniciar os Servidores:**

Para executar essa aplicação é necessário executar dois servidores. O primeiro servidor é do Laravel e o segundo é do Vite. Recomendo que se abra dois terminais/Prompts de Comando para iniciar a aplicação.

**6.1.** No primeiro terminal/prompt digite o seguinte:

```bash
php artisan serve
```

**6.2.** No segundo terminal/prompt digite o seguinte:

```bash
npm run dev
```

### 7. **Abrir aplicação no Navegador**

Para testar a aplicação: 

Abra a aplicação em: [http://127.0.0.1:8000](http://127.0.0.1:8000)

OU

Clique no link do terminal/prompt que está rodando o servidor do Laravel. 