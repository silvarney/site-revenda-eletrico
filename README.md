# Projeto: Site de Revenda de Veículos Elétricos

Este documento descreve os passos para configurar o ambiente WordPress, tema, plugin e Tailwind CSS, incluindo Docker e comandos para desenvolvimento contínuo.

---

## 1. Subir containers:**
```bash
docker-compose up -d
```

Acesse `http://localhost:8000` e siga o processo de instalação do WordPress.

---

## 2. Estrutura de Plugin e Tema

### Tema: `veiculos-tema`
- Local: `wordpress/wp-content/themes/veiculos-tema`
- Arquivos obrigatórios:
  - `header.php`
  - `footer.php`
  - `index.php`
  - `functions.php`
  - `style.css` (arquivo de entrada do Tailwind)

### Plugin: `veiculos-plugin`
- Local: `wordpress/wp-content/plugins/veiculos-plugin`
- Estrutura básica com arquivos do plugin, funções e hooks.

---

## 3. Tailwind CSS

### 3.1 Comandos Tailwind

**Gerar `output.css` minificado:**
```bash
npx tailwindcss -i ./assets/css/style.css -o ./assets/css/output.css --minify
```

**Modo watch para desenvolvimento contínuo:**
```bash
npx tailwindcss -i ./assets/css/style.css -o ./assets/css/output.css --watch
```

## 4. Observações
- Certifique-se de que `output.css` esteja sendo gerado corretamente antes de atualizar o navegador.
- Use `npx tailwindcss --watch` durante o desenvolvimento para não precisar gerar manualmente a cada alteração.
- Evite subir binários grandes no GitHub (use `.gitignore` ou Git LFS se necessário).

