# Costa Air — tema phpVMS 8

Tema frontend público para [phpVMS 8](https://www.phpvms.net), estendendo o tema `seven`.

## Instalação

Copie esta pasta para `resources/views/layouts/costa-air/` na instalação phpVMS.

Assets estáticos (logo, favicon, etc.) vão em `public/costa-air/` (fora deste repositório, se versionados à parte).

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
| `theme.json` | Manifesto do tema |

Páginas não presentes aqui são herdadas do tema `seven`.
