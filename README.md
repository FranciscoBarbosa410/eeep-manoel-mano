# 🏫 Sistema de Gerenciamento Escolar - EEEP Manoel Mano

Este é o portal institucional e sistema de gerenciamento interno desenvolvido para a **EEEP Manoel Mano** (Crateús - CE). O projeto foi construído utilizando **PHP Nativo** e práticas modernas de estilização, oferecendo uma área pública informativa e um painel administrativo seguro para a gestão de conteúdos da escola (Cursos, Notícias e Corpo Profissional).

---

## 🚀 Funcionalidades do Sistema

### 🌐 Área Pública
* **Portal de Notícias:** Carousel/Slider de destaques na página inicial, busca em tempo real por palavras-chave, paginação e visualização individual da notícia completa.
* **Guia de Cursos:** Exibição em grid dos cursos técnicos oferecidos pela instituição (ex: *Desenvolvimento de Sistemas, Enfermagem, Administração, Informática*).
* **Painel de Profissionais:** Listagem detalhada dos professores, gestores e colaboradores da escola.
* **Layout 100% Responsivo:** Interface otimizada e dinâmica para perfeito funcionamento em celulares, tablets e desktops.

### 🔐 Área Administrativa (Painel de Controle)
* **Autenticação Segura:** Tela de login para administradores com controle de sessão e validação de credenciais.
* **CRUD de Cursos:** Cadastro, edição e exclusão de cursos técnicos.
* **CRUD de Notícias:** Gerenciamento completo do portal de notícias (inclusão de capas, títulos e conteúdos formatados).

---

## 🛠️ Tecnologias Utilizadas

* **Backend:** PHP 8(Lógica estruturada e gerenciamento de sessões)
* **Frontend:** HTML5 & CSS3 (Utilizando a especificação moderna de **CSS Nesting** nativo)
* **Banco de Dados:** MySQL (Persistência de dados de usuários, notícias e cursos)
* **Fontes:** Poppins (via Google Fonts)

---

## 📦 Estrutura de Pastas Principal

```text
├── app/                  # Lógica de backend (processamento de login, queries SQL, scripts CRUD)
│   ├── login.php
│   └── ...
├── public/               # Páginas públicas e acessíveis do sistema
│   ├── index.php         # Página inicial da aplicação
│   ├── cursos.php        # Listagem de cursos técnicos
│   ├── noticias.php      # Portal e busca de notícias
│   ├── profissionais.php # Exibição do corpo docente
│   └── tela_login.php    # Portal de acesso do administrador
└── src/                  # Ativos estáticos do frontend
    ├── css/              # Arquivos de estilo unificados e responsivos
    │   ├── style.css
    └── img/              # Imagens institucionais e uploads
    └── js/              # Scripts dinâmicos para as páginas
```
---

## 🔧 Instruções de Instalação e Execução
### Pré-requisitos

#### Antes de começar, você precisará ter instalado em sua máquina:

- Um ambiente de servidor local como XAMPP, WampServer, Laragon ou o PHP instalado globalmente na máquina.

- MySQL / MariaDB (geralmente já incluso nos pacotes acima).

- Git (opcional, para clonar).

### 🧑‍💻 Uso
#### Com as ferramentas necessárias já instalada, siga os seguintes passos:
- Copie a pasta do projeto para o diretório público do seu servidor (ex.: ```C:/xampp/htdocs/eeep-manoel-mano/public```).

- Inicie o **Apache** e o **MySQL** via **XAMPP/WAMP**.
Crie o banco de dados ```eeepmm``` e importe o arquivo de esquema pelo **phpMyAdmin** ou via linha de comando **MySQL**.

- Configure as credenciais do banco nos arquivos correspondentes dentro da pasta ```app/```.

- Faça login no painel administrativo acessendo a tela de login (```public/tela_login.php```).
- Gerencie e cadastre cursos, notícias e profissionais utilizando as interfaces disponíveis após a autenticação.
- Acesse as páginas públicas em ```public/``` para visualizar as alterações e realizar buscas no sistema.