# BelSKS WordPress Theme - Agent Instructions

## Project Overview
This is a custom WordPress theme for **BelSKS**, a warehouse logistics and enterprise equipment company. The theme is built from scratch using the `_s` (Underscores) starter theme as a base but has been heavily customized.

## Tech Stack & Constraints
- **CMS:** WordPress
- **CSS Framework:** Tailwind CSS v4 (Loaded via CDN, **NO Node.js/npm**)
- **Icons:** Lucide Icons (Loaded via CDN)
- **Fonts:** Google Fonts (Inter, all weights)
- **JavaScript:** Vanilla JS (No jQuery dependency for custom scripts)
- **Build Tool:** None (Direct file editing)

## Directory Structure
```
belsks/
├── header.php          # Header template (Desktop & Mobile)
├── footer.php          # Footer template
├── front-page.php      # Homepage template
├── functions.php       # Theme functions, enqueues, and configurations
├── style.css           # Custom CSS overrides and specific styles
├── img/                # Static images (logos, icons)
│   ├── header-logo.svg
│   ├── phone-icon.svg
│   └── burger.svg
└── ...
```

## Key Files & Responsibilities

### `header.php`
- Contains the main navigation, logo, search, and theme toggle.
- **Mobile Header:** Fixed height of `78px`. Contains logo, search input, and burger menu.
- **Mobile Menu:** Opens absolutely below the header. Background is white. Toggles burger icon to 'X' when open.
- **Desktop Header:** Two-row layout. Top row: Phones/Contact | Search/Theme/Lang. Bottom row: Navigation.

### `footer.php`
- Dark background (`#0f172a`) regardless of theme mode.
- 5-column grid layout: Logo/Social, Catalog, Services, Info, Contacts.
- Bottom section: Legal info, payment systems, consumer protection contacts.

### `front-page.php`
- Homepage layout including Hero, Directions, Services, About, Projects, News, and Contact Form sections.
- Uses Tailwind classes for layout and styling.

### `functions.php`
- Enqueues Tailwind CSS, Lucide Icons, and Google Fonts.
- Contains Tailwind configuration script (`@theme` and `@custom-variant dark`).
- Handles custom styles injection via `wp_head`.

### `style.css`
- Contains critical overrides that Tailwind CDN doesn't handle well or needs `!important` for.
- Defines specific colors for header/footer.
- Handles mobile menu positioning and body scroll lock.
- Custom H1 typography.

## Design System & Preferences

### Colors
- **Primary Text:** `#222222`
- **Header Background:** White (Light), `#1f2937` (Dark)
- **Footer Background:** `#0f172a` (Always dark)
- **Footer Links:** `#E2E8F0` (Hover: `#ffffff`)
- **Accent/Links:** `#1e3a5f` (Primary), `#2563eb` (Hover)
- **Search Border:** `#D0D6E8`

### Typography
- **Font Family:** Inter
- **H1:**
    - Desktop: `54px`, Semibold (600), Line-height 120%
    - Mobile: `28px`, Semibold (600), Line-height 120%
- **Header Links:** `16px` (Nav), `14px` (Top bar)

### Components
- **Logo:**
    - Desktop: `120px` width
    - Mobile: `70px` width
- **Search Input:**
    - Desktop: `396px` width, `48px` height, Radius `8px`
    - Mobile: `200px` width, `44px` height, Radius `8px`
- **Theme Toggle:**
    - Custom toggle switch with Moon/Sun icons.
    - Persists preference in `localStorage`.

## Development Guidelines
1.  **No Build Step:** All changes must be made directly to PHP/CSS files. Do not attempt to run `npm install` or `npm run build`.
2.  **Tailwind Usage:** Use Tailwind utility classes in PHP templates. For complex or overriding styles, use `style.css` or inline `<style>` blocks in `functions.php`.
3.  **Icons:** Use Lucide icons via `<i data-lucide="icon-name"></i>`. Ensure `lucide.createIcons()` is called after DOM updates (e.g., opening mobile menu).
4.  **Dark Mode:** Use `dark:` prefix for Tailwind classes. Ensure custom CSS in `style.css` also has `.dark` variants.
5.  **Mobile First:** Ensure all layouts are responsive. Test mobile menu behavior carefully.

## Current Session State
- Header and Footer are fully implemented.
- Homepage (`front-page.php`) is scaffolded with all sections.
- Mobile menu is functional with absolute positioning.
- Dark mode toggle is working.
- Search input styling is finalized.
