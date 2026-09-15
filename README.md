# Solanique

Premium WordPress theme for Solanique Group.

## Brand Typography

The theme uses a Cinzel-first heading/navigation stack and a Helvetica-style body/UI stack in CSS tokens. No external font requests are loaded.

Exact brand typography requires adding licensed/local webfont files for Cinzel and Helvetica, or approved substitutes, if exact rendering is required across all devices.

## Theme Mode

The public Solanique preview is dark-only for now. The document is loaded with `html[data-sg-theme="dark"]`, and the visible light/dark toggle has been removed.

Light tokens remain in the CSS for future internal design work, but no public control should expose light mode until the client approves it again. Keep future theme styling token-driven rather than duplicating whole CSS files.

## Brightness / Illumination Control

The header and mobile menu include a sun-icon illumination toggle. This control stores the user preference in `localStorage` and applies `html[data-sg-illumination="enhanced"]`.

This is not light mode. The enhanced state stays dark-only and only softens overlay opacity, lifts graphite surface contrast, and makes silver highlights more visible. Do not repurpose it as a white/light theme without explicit client approval.

## Bilingual Preview

The theme includes a lightweight English/Spanish preview system without a translation plugin. Use `?lang=en` or `?lang=es` on any current page to switch static template copy while preserving the current path.

This preview system is intentionally simple and does not create duplicate pages, translated slugs, or rewrite rules. For production multilingual SEO, consider proper language-specific URLs or a dedicated multilingual plugin / rewrite strategy.

## Editable Content Audit

The current theme is a hybrid classic custom theme: core public pages are developer-controlled for launch stability, while selected WordPress page content areas are available for safe client editing.

Classification key:

- A. Client-editable now
- B. Should become client-editable
- C. Developer-controlled
- D. Requires approval before making editable

| Content area | Current source | Classification | Notes |
| --- | --- | --- | --- |
| Home locked copy | `inc/content.php`, `front-page.php`, `template-parts/home/` | C. Developer-controlled | Final client copy is preserved verbatim and should not be edited casually in the page editor. |
| Capital locked copy | `inc/content.php`, `page-capital.php`, `template-parts/pages/capital/` | C. Developer-controlled | Includes titles, body copy, CTA label/email, service text, and parallax copy pulled from approved content. |
| Estate locked copy | `inc/content.php`, `page-estates.php`, `template-parts/pages/estates/` | C. Developer-controlled | Visible copy remains `SOLANIQUE ESTATE`; keep approved wording intact. |
| Concierge locked copy | `inc/content.php`, `page-concierge.php`, `template-parts/pages/concierge/` | C. Developer-controlled | Long service copy remains coded to protect layout and bilingual parity. |
| The Mandate locked copy | `inc/content.php`, `page-the-mandate.php`, `template-parts/pages/the-mandate/` | C. Developer-controlled | History / Origin, Mission, Vision, Values, and final phrase remain protected. |
| Inquiry gateway copy | `page-inquiry.php`, `template-parts/pages/inquiry/` | B. Should become client-editable | Keep minimal until approved GHL/partner intake copy is supplied. |
| Inquiry optional editor slot | WordPress page editor rendered by `solanique_render_current_page_editor_slot()` | A. Client-editable now | If the Inquiry page has editor content, it renders inside a controlled premium section after the coded gateway. |
| Solanique Club copy | `page-solanique-club.php`, `template-parts/pages/solanique-club/` | B. Should become client-editable | Current copy is provisional and should move to controlled fields or approved content once finalized. |
| Solanique Club optional editor slot | WordPress page editor rendered by `solanique_render_current_page_editor_slot()` | A. Client-editable now | If the Solanique Club page has editor content, it renders inside a controlled premium section after the coded overview. |
| Privacy Policy body | WordPress page editor, with PHP fallback in `page-privacy-policy.php` | A. Client-editable now | If the Privacy Policy page has editor content, the template renders that content inside the premium legal layout. |
| Terms & Conditions body | WordPress page editor, with PHP fallback in `page-terms-conditions.php` | A. Client-editable now | If the Terms page has editor content, the template renders that content and hides the pending fallback. |
| Legal page titles | WordPress page title, with template fallback | A. Client-editable now | Legal templates use the WordPress page title when editor content is present. |
| Footer legal links | Matching WordPress pages resolved in `inc/helpers.php` | A. Client-editable now | Links appear only when matching legal pages exist; do not use fake `#` links. |
| Professional Credentials / Affiliations | `inc/partners.php`, `src/assets/images/partners/brokers/`, and `src/assets/images/partners/affiliations/` | D. Requires approval before making editable | Structured data protects logo authorization, credential labels, future affiliations, and missing license fields. |
| Hero/background images | PHP templates and source assets | D. Requires approval before making editable | Images affect parallax, crop, performance, and brand art direction. |
| CTA labels and URLs | `inc/content.php`, page templates, helper functions | B. Should become client-editable | Recommended future controlled fields: label, URL/email, aria label, and approval status. |
| Navigation labels/routes | `inc/menus.php`, WordPress pages, header/footer templates | C. Developer-controlled | Keep IA stable: no Home tab, no Client Access tab, no Investor/JV top tabs unless client re-approves. |
| Parallax scenes, animations, grids, breakpoints | CSS/JS/templates | C. Developer-controlled | These are layout systems, not client-editable content. |
| SEO baseline | `inc/seo.php` | C. Developer-controlled | Can be filtered by a developer or replaced by an SEO plugin later. |

## Client Editing Guide

The client can safely edit published WordPress Pages for page titles, approved legal body content, and controlled supplemental content on Inquiry and Solanique Club. Privacy Policy and Terms & Conditions remain the primary editable areas because legal copy often changes after review.

Safe client editing today:

1. Go to WordPress Admin > Pages.
2. Edit Privacy Policy or Terms & Conditions to update approved legal copy.
3. Edit Inquiry or Solanique Club only for supplemental approved notes in the controlled editor slot.
4. Avoid adding an extra H1 inside the page body; the template already renders the page title as the H1.
5. Update the page title only if the public title should change.
6. Preview on mobile and desktop before publishing.

Content that should not be edited casually in WordPress Pages:

- locked Home, Capital, Estate, Concierge, and The Mandate copy
- hero and parallax background images
- navigation structure
- Professional Credentials / Affiliations logo data and credential labels
- legal or license disclosures not yet approved
- GHL/CRM embeds until the client approves the integration code

Menus can be updated in WordPress Admin > Appearance > Menus, but the approved public navigation should remain Capital, Estate, Concierge, Solanique Club, The Mandate, and Inquiry.

Professional Credentials and Professional Affiliations should be updated by a developer in `inc/partners.php` after the client confirms logo authorization, visible credential/affiliation wording, website URL, and any required license or compliance data.

Theme-owned images should be changed by a developer or asset manager. Client-uploaded editorial images belong in the WordPress Media Library, but parallax/hero images should remain curated because cropping, loading behavior, and contrast are design-critical.

## Controlled Native Editor Slots

`solanique_render_current_page_editor_slot()` provides a native WordPress content slot without turning the page into an unrestricted block canvas.

Current controlled editor slots:

- Privacy Policy body: full legal body replacement inside the legal template.
- Terms & Conditions body: full legal body replacement inside the legal template.
- Inquiry: optional supplemental content after the coded gateway.
- Solanique Club: optional supplemental content after the coded overview.

Do not use these slots for GHL embeds, forms, login, registration, username/password fields, legal claims, broker/license wording, or partner claims unless the client has supplied approved content and implementation instructions.

## Theme JSON And Editor Guardrails

`theme.json` is present to improve Block Editor consistency without converting the theme to a block theme. It defines the Solanique palette, typography scale, spacing presets, content/wide widths, and restrained default block styling.

Unsafe broad customization is intentionally limited: custom palettes, custom gradients, broad appearance tools, and ad hoc spacing scales are disabled so editor content stays close to the brand system.

## Future Editability Options

Recommended for current launch: keep the custom coded theme and add controlled editable fields only where the client needs repeatable updates.

Option 1: Current custom code theme with controlled editable fields.
Best for launch stability. The developer keeps layout, motion, SEO, accessibility, and performance controlled, while client-editable slots are added for legal text, selected CTAs, simple page notes, approved GHL embeds, and partner data through a safe admin UI later.

Option 2: Hybrid classic theme with stronger Block Editor support.
Adds more native editor slots, block patterns, and possibly custom meta fields. This keeps the current template architecture but gives the client more flexibility. This is the best next step if the client wants to maintain more content without a page builder.

Option 3: Full block theme rebuild.
Gives maximum Site Editor control but requires a larger redesign/rebuild and stronger editorial governance. Not recommended before the current launch unless the client explicitly prioritizes editor freedom over strict visual control.

The next recommended editability step is a controlled fields sprint for Inquiry, Solanique Club, CTA labels/URLs, and approved partner data after the client confirms the CRM/GHL direction.

## Technical SEO Baseline

The theme outputs a minimal public-page SEO baseline from `inc/seo.php`:

- meta description
- canonical URL
- Open Graph basics
- Twitter card basics
- conservative Organization, WebSite, WebPage, and visible-service JSON-LD where appropriate

The schema intentionally uses only known safe business information: organization name, site URL, page title, page description, and broad visible service context. It does not invent addresses, phone numbers, email addresses, founders, office locations, social profiles, reviews, ratings, offers, prices, office data, or logo data. VideoObject schema should only be added for enabled videos with real files and approved metadata.

The theme SEO output is disabled automatically when a common SEO plugin is detected, including Yoast SEO, Rank Math, All in One SEO, SEOPress, Slim SEO, and The SEO Framework. Use the `solanique_disable_theme_seo` filter to disable the theme baseline manually, or `solanique_public_seo_config` to adjust page titles and descriptions.

Public page titles and descriptions are prepared for:

- `Solanique Group`
- `Solanique Capital`
- `Solanique Estate`
- `Solanique Concierge`
- `The Mandate | Solanique Group`
- `Inquiry | Solanique Group`
- `Client Access | Solanique Group`
- `Solanique Club | Solanique Group`
- `Privacy Policy | Solanique Group`
- `Terms & Conditions | Solanique Group`

Canonical URLs are generated from WordPress page permalinks or `home_url()` fallbacks, forced to HTTPS, and stripped of the preview `lang` query parameter. Local development hosts such as `localhost` and `.local` are suppressed from canonical output. Before production, confirm WordPress Address and Site Address use the preferred production domain.

## Google Indexing Emergency Checklist

The theme can provide clean baseline metadata, but Google indexing also depends on WordPress admin, hosting, DNS, and Search Console access.

1. WordPress Settings > Reading:
   Confirm “Discourage search engines from indexing this site” is OFF.

2. Google Search Console:
   Verify the production domain. Verify both `https://solaniquegroup.com/` and `https://www.solaniquegroup.com/`, then confirm the preferred canonical version.

3. URL Inspection:
   Inspect `https://www.solaniquegroup.com/`, `https://www.solaniquegroup.com/capital/`, `https://www.solaniquegroup.com/estates/` or `https://www.solaniquegroup.com/estate/`, `https://www.solaniquegroup.com/concierge/`, `https://www.solaniquegroup.com/solanique-club/`, `https://www.solaniquegroup.com/the-mandate/`, `https://www.solaniquegroup.com/inquiry/`, `https://www.solaniquegroup.com/privacy-policy/`, and `https://www.solaniquegroup.com/terms-conditions/`.

4. Sitemap:
   Confirm the WordPress sitemap is reachable at `/wp-sitemap.xml`, then submit it in Search Console.

5. `robots.txt`:
   Confirm `robots.txt` does not block public pages and does not block Googlebot.

6. Indexability:
   Confirm public pages do not output `noindex`, `nofollow`, or `none`, do not redirect unexpectedly, and return HTTP 200.

7. Canonical:
   Confirm all public pages canonicalize to production URLs and no local URLs remain.

8. Search operator quick checks:
   Run `site:solaniquegroup.com` and `site:www.solaniquegroup.com`.

9. Important note:
   Search operator results are not always reliable for debugging. Google Search Console URL Inspection is the source to use for indexing status.

Theme-side notes:

- `inc/seo.php` does not output `noindex` or `nofollow`.
- `inc/seo.php` appends virtual `robots.txt` guidance allowing Googlebot, Bingbot, and OAI-SearchBot discovery while avoiding training-specific crawler opt-ins.
- Canonical output is generated from WordPress page permalinks or HTTPS `home_url()` fallbacks and can be filtered with `solanique_public_page_canonical_url`.
- Query-parameter language preview links are not emitted as production hreflang alternates.
- Search Console status cannot be confirmed from theme code.

## AIO / AI Discovery Checklist

The theme includes conservative AI-search discoverability support:

- semantic page headings and visible introductory copy on public pages
- JSON-LD graph output for Organization, WebSite, WebPage, and broad visible service pages
- virtual `robots.txt` additions for Googlebot, Bingbot, and OAI-SearchBot
- public `llms.txt` at the WordPress root with canonical public paths and safety notes
- no hidden keyword stuffing, fake locations, fake social profiles, fake reviews, invented legal claims, or invented partner claims

Before production, confirm the preferred canonical domain in WordPress settings and update `/llms.txt` if the live domain differs from `https://www.solaniquegroup.com/`.

Development-only URL references:

- `SOLANIQUE_VITE_SERVER` and `vite.config.js` reference `localhost:5173` for local Vite development only.
- Production asset loading uses `assets/dist/` unless `WP_DEBUG` or a local/development WordPress environment explicitly allows the Vite dev server.

## Required WordPress Pages

Create these WordPress pages before production upload or immediately after activating the theme:

| Public page | Required slug | Template |
| --- | --- | --- |
| Home | `home` or front page assignment | `front-page.php` |
| Capital | `/capital/` | `page-capital.php` |
| Estate | `/estate/` or `/estates/` | `page-estates.php` |
| Concierge | `/concierge/` | `page-concierge.php` |
| Solanique Club | `/solanique-club/` | `page-solanique-club.php` |
| The Mandate | `/the-mandate/` | `page-the-mandate.php` |
| Inquiry | `/inquiry/` | `page-inquiry.php` |
| Privacy Policy | `/privacy-policy/` | `page-privacy-policy.php` |
| Terms & Conditions | `/terms-conditions/` or `/terms-and-conditions/` | `page-terms-conditions.php` |

Use `page-estates.php` for Estate compatibility whether the live page is created as `/estate/` or `/estates/`. Visible client copy must remain `SOLANIQUE ESTATE`.

Production setup:

1. Create each required page in WordPress admin.
2. Use the exact slug listed above.
3. Go to Settings > Reading and set Homepage to the Home page.
4. Go to Settings > Permalinks and choose Post name.
5. Save permalinks after creating the required pages.
6. Assign or confirm the Primary and Footer menus.

Optional WP-CLI commands for local/dev setup:

```bash
wp post create --post_type=page --post_title="The Mandate" --post_name="the-mandate" --post_status=publish
wp post create --post_type=page --post_title="Inquiry" --post_name="inquiry" --post_status=publish
wp post create --post_type=page --post_title="Solanique Club" --post_name="solanique-club" --post_status=publish
wp post create --post_type=page --post_title="Privacy Policy" --post_name="privacy-policy" --post_status=publish
wp post create --post_type=page --post_title="Terms & Conditions" --post_name="terms-conditions" --post_status=publish
```

Template files do not create WordPress page records automatically. If `/the-mandate/`, `/inquiry/`, or `/solanique-club/` returns “page does not exist,” confirm the matching published page exists and then re-save permalinks.

Client Access is currently hidden from public navigation. Backend/client portal functionality is paused and may be integrated later.
Investor Club and JV Club are no longer public top-navigation tabs. If legacy URLs exist, `/investor-club/` and `/jv-club/` may be redirected to `/solanique-club/` after client approval.

## Navigation And Page Setup

The approved public navigation is:

- Capital
- Estate
- Concierge
- Solanique Club
- The Mandate
- Inquiry

The logo links to the front page; “Home” is not a navigation tab. If WordPress pages do not already exist, create pages with these slugs so the template hierarchy can resolve them:

- `/capital/`
- `/estate/` or `/estates/`
- `/concierge/`
- `/solanique-club/`
- `/the-mandate/`
- `/inquiry/`

The old About and Contact templates load The Mandate and Inquiry content as compatibility shells, but the public labels should remain The Mandate and Inquiry. After launch, `/about/` may be redirected to `/the-mandate/` and `/contact/` may be redirected to `/inquiry/` using a redirect plugin or server redirect if those legacy URLs exist.

Legal footer links are rendered only when the matching WordPress pages exist. Create `/privacy-policy/` and either `/terms-conditions/` or `/terms-and-conditions/` before production if those footer links should appear publicly.

## Immersive Parallax Scene System

The theme includes a reusable `solanique_render_immersive_section()` helper and `.sg-parallax-scene` / `.sg-parallax-panel` CSS pattern for pinned visual scenes. A scene owns one full-width sticky background media layer, then places glass/transparent content panels and solid dark transition panels above it so foreground content visibly scrolls over an anchored image. The helper supports a second glass panel inside the same chapter so a page can create a longer glass/solid/glass rhythm rather than isolated image sections.

The primary parallax effect is CSS-based sticky media. `src/js/modules/parallax.js` adds a restrained transform enhancement to the inner media while the scene is active, using `IntersectionObserver` and `requestAnimationFrame`. Movement is disabled under `prefers-reduced-motion: reduce`, disabled on small mobile viewports, and paused while the tab is hidden.

Append `?debugParallax=1` to a page URL to outline detected parallax scenes/media layers and log the scene IDs and speed values in the browser console. No parallax debug output appears in normal production viewing.

Implemented immersive placements:

- Home: `sg-home-immersive-geography` and `sg-home-immersive-experience`, using Toronto skyline and office tower imagery with glass/solid/glass panels.
- Capital: `sg-capital-immersive-global` and `sg-capital-immersive-portfolio`, using London financial district and modern glass commercial architecture imagery.
- Estate: `sg-estate-immersive-architecture` and `sg-estate-immersive-property`, using luxury home and night property stewardship imagery.
- Concierge: `sg-concierge-immersive-lifestyle` and `sg-concierge-immersive-service`, using private transport and concierge-service imagery.
- The Mandate: `mandate-origin`, using the complete History / Origin section as a two-panel glass editorial chapter immediately after Mission and Vision. The duplicate summarized History / Origin cutaway was removed.
- Inquiry: `sg-inquiry-immersive-private`, using reception/service imagery for private access context.
- Solanique Club: `sg-solanique-club-immersive-network`, using commercial skyscraper/network imagery for global private ecosystem context.
- Privacy Policy: generated neutral globe/global image at `src/assets/images/backgrounds/privacy-global-globe-background.jpg`.

Solid rhythm sections remain between unrelated image-backed scenes so the site avoids back-to-back visual cuts. Solid sections use lightweight generated abstract assets for depth:

- `src/assets/images/backgrounds/generated/silver-reflection-field.svg`
- `src/assets/images/backgrounds/generated/capital-connection-map.svg`
- `src/assets/images/backgrounds/generated/estate-architectural-silhouette.svg`
- `src/assets/images/backgrounds/generated/concierge-private-lines.svg`
- `src/assets/images/backgrounds/generated/inquiry-access-field.svg`
- `src/assets/images/backgrounds/generated/club-global-network.svg`
- `src/assets/images/backgrounds/generated/graphite-silver-field.svg`
- `src/assets/images/backgrounds/generated/luxury-grid-depth.svg`
- Existing generated assets retained: `global-network-lines.svg`, `metallic-orbit-field.svg`, `architectural-grid-depth.svg`

Do not load assets from `_references`, `_incoming`, or `_review` in production templates or CSS. Review-only assets remain intentionally unused until the client approves them.

Metallic title and tab treatments are silver/platinum/titanium-oriented. Muted champagne/antique gold is reserved for small accents only: fine divider lines, card hairlines, subtle CTA details, and micro-interaction highlights.

No production-safe local video files are currently available. The approved video folders contain only placeholder `.gitkeep` files, so no video has been integrated.

## Visual Brightness And Background Detail

The dark-only visual system now avoids relying on pure black as the default section surface. Dark pages use graphite, ink, charcoal, and elevated surface tokens with layered silver radial highlights so the site remains cinematic without becoming visually flat.

Brightness refinements applied:

- shared hero image masks use softer horizontal and vertical overlays so photography remains visible
- parallax scene overlays are lighter and include subtle silver highlight fields
- glass parallax panels use translucent graphite instead of heavy black coverage
- solid parallax rhythm panels are graphite bands with lightweight linework, not full black interruptions
- plain content bands use generated abstract silver/graphite background detail
- product cards, gateway panels, affiliation cards, legal sections, footer, and CTA areas now use layered surface gradients

Generated detail assets:

- `graphite-silver-field.svg`: broad silver atmospheric field for plain dark sections, footer, legal pages, and content bands
- `luxury-grid-depth.svg`: restrained architectural/grid linework for solid rhythm panels, CTAs, legal body areas, and structured page sections

Keep overlays readable: if future photography is brighter or more detailed, adjust the shared overlay tokens first before adding one-off page masks.

## Performance Recovery Notes

The theme preserves the premium parallax direction while keeping loading priorities intentional:

- Only the current page hero/LCP image is preloaded with `fetchpriority="high"`.
- Above-the-fold hero images use eager loading and high priority.
- Below-the-fold theme images default to lazy loading, async decoding, and low fetch priority.
- `sg_asset_img()` can infer intrinsic dimensions from local theme assets when a template omits width/height, reducing avoidable layout shift.
- Responsive `-640w`, `-768w`, `-960w`, and `-1440w` JPEG sidecars are used for hero and parallax background assets when present, so mobile/tablet browsers do not have to download the 2048px original.
- The Privacy Policy globe keeps the original PNG source available, but the front-end uses the optimized JPEG derivative at `src/assets/images/backgrounds/privacy-global-globe-background.jpg`.
- Parallax JavaScript is IntersectionObserver/requestAnimationFrame based, only runs for visible scenes, pauses when the tab is hidden, and skips its scroll runtime for reduced-motion users and small mobile viewports.
- Mobile keeps the layered visual treatment but simplifies sticky parallax, long panel heights, image scale, ambient hero animation, animated parallax overlays, and glass blur to reduce paint/compositing cost.
- Reveal animations avoid broad persistent `will-change` usage.
- Large glass/header blur effects should stay limited; avoid adding full-viewport `backdrop-filter` layers.
- Production builds exclude `_incoming`, `_review`, `.DS_Store`, and unsupported `.eps` assets from `assets/dist`; keep those folders for source review only.

Lighthouse should be run against a live Local/WordPress URL after every visual sprint. If `http://solanique.local` or the Local app port is unavailable, record the audit as blocked rather than guessing a score.

## Legal Page Status

Privacy Policy and Terms & Conditions pages use a premium legal layout with:

- formal page title
- last-updated line
- numbered section navigation
- structured legal sections
- privacy contact panel

Privacy Policy now renders as a public policy page for Solanique Group and no longer displays placeholder or pending-copy language. It includes website, Inquiry, email, CRM, Go High Level, and partner-system privacy context.

Both legal templates now include a controlled native WordPress editor body slot. If the WordPress page has approved editor content, the template renders that content inside the premium legal layout. If the editor is empty, the PHP fallback renders instead.

Terms & Conditions remains a structured pending legal fallback until approved editor content is added. Terms & Conditions require final legal review and approved copy before production launch.

## Professional Credentials / Affiliations

Approved production credential logos belong in:

```text
src/assets/images/partners/brokers/
```

Approved production affiliation logos belong in:

```text
src/assets/images/partners/affiliations/
```

Reference, raw, or unapproved logo packages should remain outside production output, preferably in:

```text
_references/partners/brokers/
```

Production templates must not load partner logos from `_references/`.

Structured credential/affiliation data is stored in:

```text
inc/partners.php
```

Current professional credential fields supported by `sg_get_professional_credentials()`:

- logo file
- logo alt text
- visible title
- secondary title if approved
- website URL
- logo authorization status
- display order
- implementation notes

Current professional affiliation fields supported by `sg_get_professional_affiliations()`:

- logo file
- logo alt text
- website URL if approved
- logo authorization status
- display order
- implementation notes

Current known credential inputs:

- Century 21 / C21HG:
  Logo source file present at `src/assets/images/partners/brokers/century-21-c21hg-logo.png`.
  Public display: logo and `Realtor`.
  License number pending, if required.

- CSI Mortgages:
  Website: `https://www.csimortgages.com`.
  Logo source file present at `src/assets/images/partners/brokers/csi-mortgages-logo.png`.
  Public display: logo and `Mortgage Agent Level 1 and 2`.
  License number pending, if required.

Separate Professional Affiliations are prepared as a future logo wall but currently render no public items because no separate approved affiliation logo files, such as Scotiabank, were found in production assets.

Brokerage, mortgage, license, partner-logo authorization, and legal disclosure language require final client/legal/compliance review before production. The Capital section renders authorized logo items only when the configured logo file is present.

The Capital page includes a centered Professional Credentials card grid rendered from `template-parts/pages/capital/broker-partners.php`. The public credential cards render logo plus approved credential label only; client/person data, license numbers, broker-industry labels, arrows, dots, and carousel controls are not displayed. No external carousel library is used.

Selected production logo assets:

- Century 21 / C21HG: `src/assets/images/partners/brokers/century-21-c21hg-logo.png`
- CSI Mortgages: `src/assets/images/partners/brokers/csi-mortgages-logo.png`

To add or update a Professional Credential item:

1. Place the approved production logo in `src/assets/images/partners/brokers/`.
2. Add or update the entry in `inc/partners.php`.
3. Confirm `logo_path`, `logo_alt`, `visible_title`, `website_url` if approved, `authorized`, and `display_order`.
4. Run `npm run build`.
5. Confirm the card renders and the logo is not distorted.

To add a Professional Affiliation item:

1. Place the approved production logo in `src/assets/images/partners/affiliations/`.
2. Add the entry to `sg_get_professional_affiliations()`.
3. Confirm the logo is authorized for publication.
4. Render logos only unless the client/compliance team approves visible names or descriptions.

Do not use logos from `_references` directly in production. Approved credential logos must be placed in `src/assets/images/partners/brokers/`, and approved affiliation logos must be placed in `src/assets/images/partners/affiliations/`. Credential wording, affiliation wording, license numbers, and logo authorization require final client/compliance approval before production.

Founder signature block has been added to The Mandate History / Origin section based on client direction:

```text
Sandra Lorena Medina Solano
Founder and CEO of Solanique Group
```

Meeting notes referenced “Solani Group” / “Solani Club,” while the active brand system uses “Solanique Group” / “Solanique Club.” Keep Solanique spelling unless the client explicitly confirms a brand-name change.

Final founder title wording and Solanique/Solani naming require client confirmation.

## Production Export Checklist

1. Run:

```bash
npm run build
```

2. Create the ZIP from `wp-content/themes`:

```bash
zip -r solanique-production.zip solanique \
  -x "solanique/node_modules/*" \
  -x "solanique/.git/*" \
  -x "solanique/.DS_Store" \
  -x "*/.DS_Store" \
  -x "solanique/_references/*" \
  -x "solanique/assets/dist/images/_incoming/*" \
  -x "solanique/assets/dist/images/_review/*" \
  -x "solanique/assets/dist/videos/_incoming/*" \
  -x "solanique/assets/dist/videos/_review/*" \
  -x "solanique/src/assets/images/_incoming/*" \
  -x "solanique/src/assets/images/_review/*" \
  -x "solanique/src/assets/videos/_incoming/*" \
  -x "solanique/src/assets/videos/_review/*"
```

3. Confirm the ZIP includes:
   `style.css`, `functions.php`, `assets/dist/`, `inc/`, `template-parts/`, and page templates.

4. Confirm the ZIP excludes:
   `node_modules`, `.git`, `_references`, `_incoming`, `_review`, and local-only files.

5. Upload:
   WordPress Admin > Appearance > Themes > Add New > Upload Theme.

6. Required post-upload checks:
   Activate theme, create required pages, set the homepage, save permalinks, confirm menus, check sitemap, check robots, check canonical output, and submit the sitemap in Search Console.

## Partner Integration Notes

Backend, login, registration, and native data collection are paused. Client Access and Inquiry are front-end gateway concepts only. GHL forms, service workflows, or partner systems should be integrated later only when the client provides approved embed code or implementation instructions.

### Future GHL Form Strategy

Do not implement native WordPress forms, username/password registration, fake account creation, or simulated submissions. Approved GHL or partner-provided forms may be embedded later when the client confirms the CRM/infrastructure decision and supplies the embed code.

GHL integration data is prepared in `inc/crm.php` through `sg_get_crm_forms()` and `sg_render_crm_form_slot()`. Current entries are disabled and render nothing publicly until approved embed code or approved external form URLs are supplied.

Future GHL form planning:

1. Capital service pages may link to a Capital-specific GHL form.
2. Estate service pages may link to an Estate-specific GHL form.
3. Concierge service pages may link to a Concierge-specific GHL form.
4. Solanique Club may link to a club-specific intake form.
5. Inquiry may support a service interest dropdown for Capital, Estate, Concierge, and Solanique Club.
6. Future Inquiry fields may include name, phone, and email only inside the approved GHL/partner system.
7. JV / service-provider interest should include an open field for area of specialization, such as construction, renovation, advisory, or other expertise.
8. Investor Club interest should remain responsible and should not promise returns, access, acceptance, outcomes, or investment performance.

Required GoHighLevel inputs before activation:

- embed code or approved form URL
- target page and service line
- language version
- notification email or routing destination
- CRM pipeline/stage mapping
- consent checkbox wording
- Privacy Policy link behavior
- hidden fields for source tracking if approved
- export field schema
- approval status

### GoHighLevel Data Backup Plan

No native WordPress database mirror is currently implemented. If GoHighLevel is selected, establish a manual backup/export operating rhythm before launch:

1. Export contacts weekly as CSV.
2. Export companies, opportunities, and pipelines monthly if those objects are used.
3. Send exports to a Solanique-controlled recipient or secure Solanique-controlled storage.
4. Use a consistent filename such as `solanique-ghl-contacts-YYYY-MM-DD.csv`.
5. Maintain a field dictionary for every active form.
6. Keep screenshots or written documentation of active GHL workflows, pipelines, tags, and notifications.
7. Run periodic import tests in a non-production workspace to confirm the exported data is usable.
8. Review CRM export policies, costs, access controls, security posture, and data ownership before final integration.

Future technical options may include a webhook, serverless backup endpoint, encrypted database mirror, or admin-only export dashboard. Do not build those custom systems until the client confirms the CRM/infrastructure decision.

### CRM And Data Ownership Pending Review

Client is evaluating Go High Level and alternatives. Contact database exportability, costs, security posture, ownership controls, and platform lock-in risks require review before final integration. No native WordPress data collection, username/password registration, native client portal, or payment collection is currently implemented by the theme.

GHL or partner-provided forms should only be embedded after approval. The follow-up CRM/data ownership review is scheduled for August 25, 2026 at 7:30 PM Colombia time.

Required client or production inputs:

- official social media URLs
- optional official pillar emails for Capital, Estate, and Concierge
- Terms copy
- Legal copy
- Accessibility statement copy
- broker name
- broker license number
- required real estate disclosure wording
- required mortgage disclosure wording
- approved investment, opportunity, partner, and service disclaimers
- approved agent-level names, descriptions, requirements, and distinctions
- any additional approved partner company logos
- approved partner company names and service descriptions
- authorization for the business-loan partner logo before publication
- compressed logo package
- license information supplied by the client
- final Inquiry copy
- final Client Access copy
- final Solanique Club copy
- GHL inquiry form/embed code, if the client wants GHL visible on Inquiry
- approved second video asset
- Google Search Console access
- preferred canonical domain: `https://solaniquegroup.com` or `https://www.solaniquegroup.com`
- final production image optimization/compression pass

Terms, Legal, and Accessibility pages require final legal copy before production.
Official social media URLs are required before production.
Solanique Club copy is provisional. Final client-provided copy is pending.
Approved video asset pending. No production video integrated.
Inquiry registration requires approved GHL/partner embed code after the CRM/data ownership decision.
Homepage/Mandate relationship and return-flow strategy pending client discussion. Current implementation uses logo as homepage return.
Broker/license information, disclaimers, agent levels, partner logos, and partner descriptions are structurally prepared but require approved client content before publication.

## Media Asset System

Theme-owned design images live in `src/assets/images/`. Use the category folders for intent:

- `hero/`
- `capital/`
- `estates/`
- `concierge/`
- `about/`
- `backgrounds/`
- `general/`

Theme-owned videos live in `src/assets/videos/`.

Approved production video folders:

- `src/assets/videos/presentation/`
- `src/assets/videos/capital/`
- `src/assets/videos/estate/`
- `src/assets/videos/concierge/`
- `src/assets/videos/brand/`

Raw, pending, review-only, or unapproved videos should remain in `_incoming`, `_review`, or `_references` and must not be rendered on the public website.

Video manifest and modal infrastructure:

- `inc/videos.php` defines `sg_get_service_videos()`, `sg_get_enabled_service_videos()`, `sg_render_video_trigger()`, and `sg_render_service_video_slot()`.
- `template-parts/components/video-modal.php` provides the shared accessible video modal shell.
- `src/js/modules/video-modal.js` opens approved local videos manually, traps focus, closes on Escape, restores trigger focus, and pauses/unloads video on close.
- `src/css/components/video-modal.css` controls modal layout and responsive behavior.

Current pending video slots:

- Solanique presentation EN
- Solanique presentation ES
- Smart Capital video 1
- Smart Capital video 2
- Estate video 1
- Estate video 2
- Concierge video
- Brand vision / luxury concept video

All video manifest entries are disabled because no approved production-safe video files are currently present. Do not show public video buttons until the matching local file, poster if needed, title, trigger label, language, and approval status are confirmed.

Client-editable content images belong in the WordPress Media Library, not in the theme. Theme assets should be reserved for design-critical imagery that ships with the theme.

Never place files manually inside `assets/dist/`. That directory is generated by Vite during the build process and can be cleared at any time.

Original iStock files, source downloads, layered design files, and licensing archives should remain outside the theme repository. Only optimized, web-ready files should be committed to `src/assets/`.

Use SEO-friendly filenames:

```text
solanique-[category]-[description]-[number].jpg
```

Examples:

- `solanique-hero-luxury-architecture-01.jpg`
- `solanique-capital-private-investment-meeting-01.jpg`
- `solanique-estates-modern-residence-01.jpg`
- `solanique-concierge-luxury-lifestyle-01.jpg`

Use `sg_asset_uri()` when a template needs a theme asset URL, `sg_asset_img()` for safe image markup, and `sg_asset_picture()` when future AVIF/WebP sources are available. Always include meaningful alt text for meaningful images; use `alt=""` only for decorative imagery.

### Asset Sorting Workflow

1. Place new unsorted images in `src/assets/images/_incoming/`.
2. Place new unsorted videos in `src/assets/videos/_incoming/`.
3. Run `npm run sort:assets`, or ask Codex to run the Solanique asset sorting task.
4. Review `src/assets/asset-manifest.csv` after sorting.
5. Check `src/assets/images/_review/` and `src/assets/videos/_review/` manually before using any review assets.
6. Do not place files manually in `assets/dist/`; Vite generates that directory.
7. Commit only web-ready optimized assets to the theme.
8. Keep original iStock/source files, licensing archives, and layered design files outside the theme.

## SG Layout System

The SG Layout System is a small set of token-driven CSS utilities for composing responsive pages without a CSS framework. All public classes use the `sg-` prefix and are designed to work with semantic HTML.

### Container

Use `.sg-container` to center content with responsive side padding. Add a size modifier when a section needs a specific maximum width.

```html
<div class="sg-container sg-container--lg">
	<p>Luxury advisory content with a controlled line length.</p>
</div>
```

Available modifiers:

- `.sg-container--sm`
- `.sg-container--md`
- `.sg-container--lg`
- `.sg-container--xl`
- `.sg-container--full`

### Section

Use `.sg-section` for consistent vertical spacing. Color variants use the theme color tokens.

```html
<section class="sg-section sg-section--dark">
	<div class="sg-container">
		<h2>Private Client Advisory</h2>
		<p>Structured guidance for high-value estate and concierge decisions.</p>
	</div>
</section>
```

Available modifiers:

- `.sg-section--sm`
- `.sg-section--lg`
- `.sg-section--dark`
- `.sg-section--light`

### Grid

Use `.sg-grid` for responsive CSS Grid layouts. Column modifiers collapse to one column on small screens.

```html
<div class="sg-grid sg-grid--3">
	<article class="sg-card">Capital</article>
	<article class="sg-card">Estates</article>
	<article class="sg-card">Concierge</article>
</div>
```

Use `.sg-grid--auto` when the layout should create as many balanced columns as the available width allows.

```html
<div class="sg-grid sg-grid--auto">
	<article class="sg-card">Market intelligence</article>
	<article class="sg-card">Acquisition planning</article>
	<article class="sg-card">Lifestyle management</article>
</div>
```

Available modifiers:

- `.sg-grid--2`
- `.sg-grid--3`
- `.sg-grid--4`
- `.sg-grid--auto`
- `.sg-grid--center`

### Stack

Use `.sg-stack` for vertical rhythm when children should remain in a single column.

```html
<div class="sg-stack sg-stack--lg">
	<h2>Discreet, structured, precise.</h2>
	<p>Every engagement is shaped around the client relationship.</p>
	<a class="sg-button" href="/inquiry/">Start Inquiry</a>
</div>
```

Available modifiers:

- `.sg-stack--sm`
- `.sg-stack--lg`

### Cluster

Use `.sg-cluster` for horizontal groups that should wrap naturally, such as actions, badges, and compact navigation.

```html
<div class="sg-cluster sg-cluster--between">
	<a class="sg-button" href="/inquiry/">Start Inquiry</a>
	<a class="sg-button sg-button--secondary" href="/the-mandate/">The Mandate</a>
</div>
```

Available modifiers:

- `.sg-cluster--center`
- `.sg-cluster--between`
- `.sg-cluster--end`
