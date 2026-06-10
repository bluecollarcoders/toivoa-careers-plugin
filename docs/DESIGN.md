---
name: Kinetic Engineering
colors:
  surface: '#111417'
  surface-dim: '#111417'
  surface-bright: '#37393d'
  surface-container-lowest: '#0c0e12'
  surface-container-low: '#191c1f'
  surface-container: '#1d2023'
  surface-container-high: '#282a2e'
  surface-container-highest: '#323539'
  on-surface: '#e1e2e7'
  on-surface-variant: '#c7c4d9'
  inverse-surface: '#e1e2e7'
  inverse-on-surface: '#2e3134'
  outline: '#918fa2'
  outline-variant: '#464556'
  surface-tint: '#c4c0ff'
  primary: '#c4c0ff'
  on-primary: '#2000a4'
  primary-container: '#5344f4'
  on-primary-container: '#e0ddff'
  inverse-primary: '#4e3eef'
  secondary: '#d2bdf3'
  on-secondary: '#382853'
  secondary-container: '#51416e'
  on-secondary-container: '#c3afe4'
  tertiary: '#ffb597'
  on-tertiary: '#591d00'
  tertiary-container: '#ad4000'
  on-tertiary-container: '#ffd8ca'
  error: '#ffb4ab'
  on-error: '#690005'
  error-container: '#93000a'
  on-error-container: '#ffdad6'
  primary-fixed: '#e3dfff'
  primary-fixed-dim: '#c4c0ff'
  on-primary-fixed: '#110068'
  on-primary-fixed-variant: '#3415d9'
  secondary-fixed: '#ebdcff'
  secondary-fixed-dim: '#d2bdf3'
  on-secondary-fixed: '#22123d'
  on-secondary-fixed-variant: '#4f3f6b'
  tertiary-fixed: '#ffdbcd'
  tertiary-fixed-dim: '#ffb597'
  on-tertiary-fixed: '#360f00'
  on-tertiary-fixed-variant: '#7e2c00'
  background: '#111417'
  on-background: '#e1e2e7'
  surface-variant: '#323539'
  deep-void: '#000000'
  electric-indigo: '#5344F4'
  soft-lilac: '#DEC9FF'
  surface-dark: '#0D1117'
typography:
  display-lg:
    fontFamily: Sora
    fontSize: 48px
    fontWeight: '700'
    lineHeight: 56px
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Sora
    fontSize: 32px
    fontWeight: '600'
    lineHeight: 40px
    letterSpacing: -0.01em
  headline-lg-mobile:
    fontFamily: Sora
    fontSize: 24px
    fontWeight: '600'
    lineHeight: 32px
  body-md:
    fontFamily: Geist
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  body-sm:
    fontFamily: Geist
    fontSize: 14px
    fontWeight: '400'
    lineHeight: 20px
  label-caps:
    fontFamily: JetBrains Mono
    fontSize: 12px
    fontWeight: '500'
    lineHeight: 16px
    letterSpacing: 0.08em
  mono-data:
    fontFamily: JetBrains Mono
    fontSize: 13px
    fontWeight: '400'
    lineHeight: 18px
rounded:
  sm: 0.125rem
  DEFAULT: 0.25rem
  md: 0.375rem
  lg: 0.5rem
  xl: 0.75rem
  full: 9999px
spacing:
  unit: 4px
  gutter: 24px
  margin-desktop: 64px
  margin-mobile: 20px
  container-max: 1280px
---

## Brand & Style

The design system is engineered for elite technical environments, evoking the focus and precision of a high-velocity software "pod." The aesthetic is rooted in a **High-Tech Minimalist** style with **Glassmorphic** accents. 

It prioritizes a "Dark Mode First" experience, utilizing deep blacks and electric gradients to create a sense of depth and energy. The visual narrative should feel like a command center: fast, precise, and sophisticated. Every element is designed to feel functional yet premium, avoiding unnecessary ornamentation in favor of structural integrity and technical clarity.

## Colors

The palette is anchored by **Deep Void (#000000)** and **Electric Indigo (#5344F4)**, creating a high-contrast environment that demands attention. 

- **Primary:** Electric Indigo is used for key actions, active states, and brand-defining gradients.
- **Secondary:** Soft Lilac provides a sophisticated counterpoint, used for subtle highlights and high-readability text on dark backgrounds.
- **Backgrounds:** Use `#05070A` for the base canvas, with `#0D1117` (Surface Dark) for container backgrounds to establish hierarchy through tonal layering.
- **Accents:** Utilize linear gradients blending Primary to Secondary (45-degree angle) for high-impact elements like primary buttons or progress indicators.

## Typography

This design system employs a three-tier typographic hierarchy to balance futurism with technical utility:

1.  **Display & Headlines (Sora):** A geometric sans-serif that provides a bold, modern voice. Use tight tracking for large headlines to emphasize a high-density, "pod" feel.
2.  **Body (Geist):** A clean, developer-centric font that ensures maximum legibility for documentation and long-form technical content.
3.  **Labels & Metadata (JetBrains Mono):** Monospaced type is used for all metadata, labels, and status indicators to reinforce the engineering-first identity.

Always prioritize vertical rhythm, ensuring line heights allow for comfortable reading amidst a dense UI.

## Layout & Spacing

The layout follows a **Rigid Grid System** based on a 4px baseline. 

- **Desktop:** A 12-column fluid grid with 24px gutters. Use wide margins (64px) to create a centered "focus zone" for engineering workflows.
- **Tablet:** 8-column grid with 20px gutters.
- **Mobile:** 4-column grid with 16px gutters.

Spacing should be tight and efficient. Components within a group should use 8px or 12px gaps, while major sections are separated by 64px or 80px to prevent visual clutter. Use "Safe Area" padding for all edge-to-edge containers on mobile devices.

## Elevation & Depth

Hierarchy is established through **Tonal Layering** and **Neon Glows** rather than traditional shadows.

1.  **Surface 0 (Base):** `#05070A` – The main application background.
2.  **Surface 1 (Cards/Panels):** `#0D1117` – Elevated containers with a 1px border of `#FFFFFF10`.
3.  **Surface 2 (Popovers/Tooltips):** `#161B22` – Floating elements with a subtle 12px blur backdrop and a faint glow of Primary Color (`#5344F420`).

Avoid heavy drop shadows. Instead, use thin, high-contrast borders (ghost borders) and backdrop blurs to separate layers, maintaining a flat, architectural feel.

## Shapes

The shape language is **Technical and Precise**. 

A `Soft (0.25rem)` radius is the standard for almost all UI components, including buttons, input fields, and cards. This small radius keeps the interface looking sharp and professional while subtly softening the "brutalist" edges. 

Exceptions:
- **Status Tags/Chips:** Use a fully rounded "Pill" shape to distinguish them from interactive buttons.
- **Interactive States:** On hover, certain elements may transition from 4px to 8px roundedness to indicate "flexibility" or focus.

## Components

- **Buttons:** Primary buttons use a linear gradient (`#5344F4` to `#DEC9FF`). Secondary buttons are ghost-style with a white border and transparent background. Use all-caps for button text using the Label font.
- **Inputs:** Dark backgrounds (`#0D1117`) with a 1px border. On focus, the border glows with the Primary color.
- **Cards:** No shadows. Use Surface 1 color with a subtle top-border highlight (2px) using the Primary gradient for "featured" content.
- **Chips/Badges:** Monospaced text inside a low-opacity tinted background (e.g., `#5344F415`). 
- **Progress Bars:** Thin (4px) lines with the Primary gradient. Use a "glow" effect on the leading edge of the progress indicator.
- **Lists:** Clean rows with 1px dividers (`#FFFFFF05`). Icons should be simple, thin-stroke (1.5px) vectors.
