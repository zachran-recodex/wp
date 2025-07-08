# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a WordPress theme boilerplate that combines Vite, TailwindCSS, and WordPress development. The theme provides a modern development environment with hot module replacement, CSS compilation, and production builds.

## Development Commands

### Setup

```bash
npm install
```

### Development

```bash
npm run dev
```

Starts Vite development server on <http://localhost:3000> with live reload. Ensure `IS_VITE_DEVELOPMENT` is set to `true` in functions.php or wp-config.php.

### Production Build

```bash
npm run build
```

Builds production assets to the `dist/` folder. Set `IS_VITE_DEVELOPMENT` to `false` after building.

## Architecture

### Asset Management

- **Entry Point**: `main.js` - imports all CSS and JS assets
- **Development**: Vite dev server serves assets with HMR
- **Production**: Built assets are served from `dist/` folder using manifest.json
- **Asset Loading**: Handled by `inc/inc.vite.php`

### WordPress Integration

- **Functions**: `functions.php` - minimal setup, includes Vite integration
- **Templates**: Standard WordPress PHP templates (index.php, page.php, etc.)
- **Theme Structure**: Standard WordPress theme with modern build tools

### Styling

- **TailwindCSS**: JIT compilation configured in `tailwind.config.js`
- **Content Sources**: Scans PHP files for Tailwind classes
- **Safelist**: `safelist.txt` - classes used in CMS content
- **PostCSS**: Processes CSS with autoprefixer and nested support

### Build Configuration

- **Vite Config**: `vite.config.js` - development server and build settings
- **Live Reload**: Watches PHP files for changes during development
- **HTTPS Support**: Available with certificate generation (see README)

## Development Workflow

1. Run `npm install` to install dependencies
2. Set `IS_VITE_DEVELOPMENT` to `true` in functions.php
3. Start development with `npm run dev`
4. Edit PHP templates and assets - browser refreshes automatically
5. For production: run `npm run build` and set `IS_VITE_DEVELOPMENT` to `false`

## Important Files

- `functions.php` - WordPress theme setup and Vite integration toggle
- `inc/inc.vite.php` - Handles asset loading for development/production
- `main.js` - Entry point for all assets
- `assets/css/styles.css` - Main stylesheet
- `vite.config.js` - Build configuration
- `tailwind.config.js` - TailwindCSS configuration
- `safelist.txt` - TailwindCSS classes to preserve during purge
