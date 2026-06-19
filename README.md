# Costa Air — tema phpVMS 8

Tema frontend público para [phpVMS 8](https://www.phpvms.net), estendendo o tema `seven`.

## Instalação

Copie esta pasta para `resources/views/layouts/costa-air/` na instalação phpVMS.

Copie os assets do tema para a pasta pública:

```bash
mkdir -p public/costa-air
cp assets/logo.svg public/costa-air/
```

## Configuração

`theme.json`:

```json
{
  "name": "costa-air",
  "extends": "seven",
  "asset-path": "costa-air"
}
```

Ative em **Admin → Settings → Theme** (`general.theme` = `costa-air`), depois:

```bash
php artisan theme:refresh-cache
php artisan view:clear
```

## Paleta

| Token | Cor |
|-------|-----|
| Ferrari red | `#ff2800` |
| Dark red | `#c41e00` |
| Gold (hover) | `#ffd700` |

## Estrutura

| Arquivo | Função |
|---------|--------|
| `app.blade.php` | Layout principal, CSS de marca |
| `nav.blade.php` | Navbar Costa Air |
| `assets/logo.svg` | Logo (publicar em `public/costa-air/`) |
| `users/index.blade.php` | Página `/pilots` em cards |
| `theme.json` | Manifesto do tema |

Páginas não presentes aqui são herdadas do tema `seven`.

## GitHub

Repositório: [github.com/tarcisiodier/phpvms-theme-costa-air](https://github.com/tarcisiodier/phpvms-theme-costa-air)

### Publicar (primeira vez)

Na pasta do tema:

```bash
cd resources/views/layouts/costa-air

# Autenticar no GitHub (uma vez na máquina)
gh auth login

# Criar o repo e enviar o código
gh repo create phpvms-theme-costa-air --public --source=. --remote=origin --push \
  --description "phpVMS 8 frontend theme — Costa Air (Bootstrap 5, extends seven)"
```

Se o remote `origin` já existir mas o repo ainda não foi criado:

```bash
gh repo create phpvms-theme-costa-air --public --push
```

### Atualizações

```bash
git add .
git commit -m "Descrição da mudança"
git push
```
