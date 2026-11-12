# Solanique

## November 12, 2026 - Release Authorization

The user authorized saving, committing, exporting and uploading the current theme
after approving the three italicized testimonials. This supersedes the local-only
release hold for the pending theme changes below, not any messaging/SMS/WhatsApp
activation. Scope: corrected bilingual closing phrase; company phone; dark V1,
light graphite/silver/gold V2 and width/centering fixes; homepage Reviews section.
Review database entries require a separate content transfer after theme upload.
Release artifacts and verified installation status are recorded in WordPress-root
`output/solanique-release-2026-11-12-reviews/`. Authorization alone is not proof
of installation or public availability. No remote Git push was requested.

## November 12, 2026 - Homepage Reviews (Local Only)

- Added `template-parts/home/reviews.php` immediately before the homepage's
  closing contact section. Dark graphite, silver type and a restrained gold
  review button reuse the current theme. English/Spanish labels follow the
  existing language system; approved page copy and footer wording are unchanged.
- The button uses the client's exact Google review-writing URL:
  `https://g.page/r/CeAaHKKd0OStECE/review`. It opens a new tab with an accessible
  announcement. Google may require the visitor to sign in before writing.
- The client supplied three approved testimonials later in this same pass:
  Claudia Mosquera, Ervin Mena and Joselin Ramirez. Their exact English wording
  and requested order are saved as local Reviews entries 37/38/39. They display
  on both language versions, with `lang="en"` on the original quotes. No Spanish
  translation, star rating, average or review count was invented. The empty
  state still renders only the invitation/button if no approved entries exist.
- Testimonials use italic text and typographic opening/closing quotation marks;
  reviewer names remain upright. This is presentation-only: stored copy is unchanged.
- `inc/reviews.php` adds a native **Reviews** admin collection for users with
  page-editing permissions. To add an approved excerpt: use the reviewer name as
  the title, exact approved text as the body, optional original HTTPS Google
  review URL, display language, original review language and explicit website
  approval checkbox; publish. No individual source URLs were supplied for these
  three, so their source links are intentionally omitted rather than fabricated.
  Use the native Order field for editorial order. Up to three eligible excerpts
  display, sorted by Order then newest date. Unapproved, draft, incomplete
  or wrong-language entries do not display. "Both languages" preserves the
  original review wording; no automatic translation is performed.
- This is a custom theme section, not a free-layout Gutenberg block or a public
  submission form. Review entries live in the WordPress database, not the theme
  ZIP. They must be added to production or migrated separately after release.
- There is **no automatic Google synchronization yet**. The write-review URL
  is not a review feed. Recommended next step: authorize the client's Google
  Business Profile connection in existing GHL Reputation, then supply the actual
  GHL review widget embed code. That widget can sync Google reviews and embed on
  WordPress; style it in GHL and replace the excerpt area rather than rendering
  duplicate feeds. Connection permissions, widget availability, display rules,
  privacy/performance implications and any costs must be reviewed before use.
  No Google API keys, scraping, plugin, third-party widget script, external
  review requests, or GHL configuration changes were added in this sprint.
  Official guide: https://help.gohighlevel.com/support/solutions/articles/155000000997-customising-review-widgets-in-reputation-management
- Source added locally only; no commit, push, export or production deployment.
- Checks: build passed (`main-Bud2oPHh.css`, 41.50 KB gzip; existing JS unchanged),
  changed PHP files lint clean, `git diff --check` clean, and 35 offline
  mocked rendering/guard assertions passed. After the user started Local,
  actual WordPress EN/ES homepage checks passed at 320, 375, 390, 430, 768, 1440
  and 1920px: no horizontal overflow, heading/button fit, 48px button target,
  visible 2px focus outline, keyboard Tab/Shift+Tab navigation and one h1.
  No console errors/warnings or visible PHP warnings were observed. Read-only
  WP-CLI confirmed registered admin UI, page-editor capabilities, no public/REST
  collection. The later approved local import created exactly three testimonials;
  all three database values matched supplied copy. A fresh 14-case EN/ES browser
  pass at the same widths verified all three original quotes and names, original
  English language attributes, no invented source links and no text/page overflow.
  Client admin editing walkthrough remains optional; no test/fake reviews were
  inserted. The guarded local importer and exact supplied JSON are in the
  evidence folder for a separately authorized production migration.
  Evidence is in WordPress-root `output/solanique-reviews-2026-11-12/`, outside
  the theme export. Browser viewport restored after testing.
- A pre-existing Spanish-preview document-language issue was observed (root
  remains `en-US`). The new review section declares its own accurate `en`/`es`
  language for assistive technology. Global language correction is separate;
  no unrelated site-wide behavior was changed during this verification pass.
- The client URL was opened in a browser and resolved to **Solanique Group**.
  Its Google Maps profile still showed `+1 647-466-6314`; an authorized profile
  owner should update this to the approved company number separately. No Google
  profile changes or review submissions were made.

## November 2, 2026 - Approved Inquiry Email Activation

The user authorized four email-only tests and publication of the four existing
inquiry acknowledgment workflows after checks. This supersedes the prior Draft
hold for those four workflows only, not seasonal campaigns, SMS or WhatsApp.

- Capital, Estates, Concierge and Inquiry now have a saved **24-hour Wait after
  their acknowledgment email**. It does not delay the first email. Re-entry stays
  ON; GHL skips a repeat enrollment while that contact is still active in the
  same department workflow. Stop on response stays OFF so replying does not end
  the cooldown early. Skipped repeats are not queued. Administrative removal
  from a workflow can bypass the remaining cooldown and must not be routine.
- Matching form + submitted inquiry consent + Email preference are still required.
  Pre-email guards retain Email DND exclusion, current Email preference and
  nonempty email. Phone/WhatsApp/blank preference remains manual follow-up.
- All four form notification panels were checked: the matching department alert
  is ON, and form-level autoresponder is OFF. No duplicate alerts or responders.
- Exactly four email action tests were requested, one per department, to the
  approved test inbox. Three immediate GHL "Email sent" confirmations were saved;
  Capital's same-day test record was verified in the approved contact conversation.
  All four same-day test records appear there. This is not a new form-triggered,
  24-hour elapsed, unsubscribe or actual inbox/reply-delivery test.
- The existing LC shared sender `send.lcmsgsndr.com` reports healthy sending.
  Dedicated Solanique SPF/DKIM/DMARC alignment remains unverified; no DNS changes.
  No Reply Address/forwarding/BCC override was added. Existing reply tracking and
  unassigned lead ownership remain unchanged; inbox alerts are not an assignment.
- Approved seasonal policies now include birthday priority on collisions and one
  explicitly preferred/permitted channel, otherwise hold. Existing 26 email and
  26 SMS drafts remain inactive. Their actual eligible audience, copy/occasion
  sign-off, public address/footer and scheduling tests are still required.
- Phone System still reports configuration required. SMS remains disabled;
  WhatsApp was explicitly deferred to the user. No phone provisioning or sending.

Activation evidence and exact final workflow state:
WordPress-root `output/solanique-automation-launch-2026-11-02/`.
No website source/layout, form fields, deployment, commit, push or export is
included in this automation pass. No historical contacts were bulk-enrolled.

## November 2, 2026 - Student Palette Clarification (Local Only)

The client's clarification supersedes the October 30 V1-light direction below:
**V1 is the fully dark Solanique option; V2 is the light student option using
graphite/black, silver and restrained gold, not green.** Both keep their current
routes, Spanish copy, student photos, map, new company phone and contact behavior.

- Restored V1 graphite surfaces, silver/platinum text, champagne accents and
  existing abstract academic background. Shared map defaults are now neutral
  graphite/silver with gold markers, not green.
- Fixed V1's two photo figures with scoped `margin-inline: auto`. At 1920px the
  figure previously started at x=0 while its matching text container started at
  x=264.5px: WordPress's unlayered figure reset overrode layered container margins.
  Both now use the same centered content alignment. Image order/crops unchanged.
- V2 retains white/light-silver reading surfaces and student imagery. Removed
  green from hero overlays, headings, links, dividers, map, dark service band,
  closing band and CTA states. Wide-screen sizing fixes remain intact.
- QA: 20 fresh layout cases across both pages at 320, 375, 390, 430, 768, 1024,
  1440, 1920, 2560 and 3440px passed; images loaded, no page overflow, one h1,
  correct phone and unchanged visible main content. Both mobile maps support
  keyboard selection with visible focus. Sampled text contrast passed (minimum
  5.97:1 on tested light surfaces); not a full accessibility audit. Console clean.
- Build passes; no PHP/JS, GHL, production, commit, push or export changes for
  this palette correction. Evidence: WordPress-root
  `output/solanique-palette-correction-2026-11-02/`.

## October 30, 2026 - Local Landing Refinements and Saved Seasonal Drafts

This entry supersedes historical V1-dark and old-company-phone instructions
below. It does **not** authorize or record deployment. The October 24 release
remains the last recorded production theme release. No commit/push/export was
performed for this correction sprint.

- V1 (`/international-student-program/`) now has scoped light silver/white reading
  surfaces, graphite text/headings, existing Solanique typography and restrained
  gold details. Its photographic hero and closing band retain dark contrast.
  Main-site dark styling is unchanged. V1 and V2 remain distinct Spanish pages.
- V2 keeps its student-friendly palette. Before-change public checks at 1920
  and 3440px found no page horizontal overflow, but a fixed 688px hero and 750px
  portrait panels, plus an oversized region map, produced weak wide-screen
  proportions. The local correction uses a viewport-aware bounded hero,
  90rem editorial containers, capped portrait/map sizes and shrinkable grid
  children. No viewport-scaled font sizing or global container change was added.
- Student CSS is unlayered but component-scoped, like the prior V2 approach,
  because WordPress's unlayered global styles otherwise override layered colors.
- `solanique_get_company_phone()` in `inc/helpers.php` is the website source of
  truth: display `+1 647 947 5580`, machine `+16479475580`. Both program contact
  links use it. No active old-number match remained in theme PHP/template source.
  Historical notes/PDFs/received messages were not rewritten. The read-only local
  WordPress audit found no active old-number matches in the inspected posts,
  options or post metadata. Production database content was not changed.
- GHL Business Profile previously showed `+1 647-466-9314`; the new number was
  saved and confirmed after reload. This is distinct from the old `466-6314`
  number in the program templates. Phone System reports configuration required:
  the new number is **not verified as an SMS sender**. No number was bought,
  ported, disconnected or activated for WhatsApp. GHL timezone remains Bogotá.
- GHL email-template and snippet libraries were empty before this work. There
  are now **26 branded email templates and 26 text snippets**, EN/ES for 13
  occasions, all labeled `DRAFT REVIEW`. They are reusable drafts, not scheduled
  campaigns or new workflow responders. The client approved the sender
  Solanique Group / inquiry@solaniquegroup.com; it was saved on all 26 email
  templates. Authentication/reply delivery remains unverified. No test,
  enrollment or message send was performed.
- All four existing acknowledgment workflows were rechecked November 2 as Draft
  with zero total/active enrollments. Their email and disabled SMS message bodies
  were reviewed across October 30 and November 2; none contains the old company
  number. The four public forms also had no old company-number reference.
  Existing responder rules and form fields were not changed. This is a scoped
  audit, not a claim about every historical CRM message or account setting.
- Default LC Email unsubscribe insertion was confirmed ON; no duplicate manual
  tag was added. Public mailing address and delivered Spanish opt-out/footer
  behavior need approval/testing before campaigns may launch.
- Native Scheduler is contactless and cannot directly send to contacts. Birthday
  Reminder is contact-based. No misleading Scheduler-to-contact-send workflow
  was created. Proposed launch path, suppression, audience/language rules,
  collision policy, leap-day decision and sources are in the handoff below.
- The latest bilingual closing-line correction already present in
  `inc/content.php` was preserved, not reverted or reworded.

Review materials are outside the theme, at WordPress-root
`output/solanique-refinements-2026-10-30/`: before screenshots from production,
GHL save evidence, `messaging/calendar.csv`, `inventory.json`, `MESSAGES.md`,
`AUTOMATION-READINESS.md`, and exact saved-template/snippet manifests. Offline
component HTML was generated during the initial outage, but was not used as
runtime proof; actual WordPress checks subsequently passed. Do not package these
review artifacts as production theme assets or equate local files with deployment.

**Recorded QA:** build, three changed PHP lints, calendar/SMS checks and diff
whitespace passed; the scoped CSS detector returned no issues. After Local
recovered, both pages passed all ten requested widths (20 cases, 320-3440px),
including loaded-image/overflow checks. Seven main pages passed 14 mobile/desktop
regression cases; 52 saved-email desktop/mobile previews passed. Both maps passed
keyboard checks and incoming English queries still rendered Spanish. Sampled
solid-surface text contrast was at least 5.95:1; this is not a full accessibility
audit or image-background contrast guarantee. Console checks were clean. The
read-only database audit passed all 12 exact closing-line checks. Reduced-motion
source fallbacks were preserved; a fresh OS-level reduced-motion test and new
Lighthouse measurement were not performed. Technical QA is not client sign-off.

**Approved policies:** Inquiry seasonal sender; 10 AM known recipient-local time
(Toronto only where explicitly approved; GHL remains Bogota); Easter Sunday;
March 1 for February 29 birthdays in non-leap years; exclude unknown language
and missing documented recurring-message permission. Unknown timezone stays held.
**Remaining:** actual eligible audience records, copy/occasion approval, public
mailing address/footer, sender authentication/replies, SMS connectivity,
birthday/holiday collision and one-channel-versus-both policy, scoped testing and
separate activation/release approval. No inquiry consent was promoted to marketing
permission. Latest follow-through: November 2, 2026; nothing deployed or sent.

Premium WordPress theme for Solanique Group.

## October 24 Release Authorization

**Production verified October 24:** both pages are published at
`https://solaniquegroup.com/international-student-program/` (page 60, original
template) and `https://solaniquegroup.com/international-student-program-v2/`
(page 62, V2 template). WordPress confirmed the fresh theme replacement and
LiteSpeed confirmed a full cache purge. Deployed assets `main-DmfzBBvv.css` and
`app-CfR_540f.js` match local SHA-256 hashes. Theme implementation commit:
`cb00ac9`. The following local-only sections are historical review records.

Production checks passed: six program route/language cases preserve all 68 source
strings; all 15 photo variants respond; 16 program responsive cases (320–1920px)
and 14 main-page smoke cases (390/1440px) have no page overflow. All seven main
pages have one h1 and no video UI/nav or hero intake actions in the tested checks.
Explorers retain 6/6/7 services/images. The Capital non-hero GHL dialog still uses
its existing form ID; Escape closes it and restores focus. No submission or
workflow change occurred. `/videos/` returns a 302 to Home, not a public gallery.
Raw uploaded videos remain stored/reachable; no private-storage claim is made.
No new Lighthouse, complete accessibility or email-delivery audit is claimed.

The user explicitly requested publication of **both** student-page versions and
committing all current theme work. This supersedes the earlier local-only hold
and recommendation to publish only one option. Prepare both program routes using
their dedicated templates, keep the current main navigation, preserve video
retirement and hero-intake removal, and verify the actual production result.
Release evidence is recorded separately under WordPress-root
`output/solanique-release-2026-10-24-student-pages/`; authorization is not itself
proof of deployment. Existing content-claim review notes remain factual limitations,
not newly verified school, housing, immigration or safety assurances. No GHL or
workflow publication is included in this theme/page release.

## Student Program Design Options (October 24, 2026; Local Only)

The client explicitly approved lighter, student-focused sections for **Version 2
only**. The global site remains dark; V1 retains its graphite/silver direction.
Neither option is deployed or final client approval. No commit, push, export,
production page/menu change or GHL operation was performed.

- V1: `http://solanique.local/international-student-program/`, local page 35.
- V2: `http://solanique.local/international-student-program-v2/`, local page 36,
  template `page-international-student-program-v2.php`. It uses the same
  `sg_get_student_program_copy()` source data rather than a new translation.
- Both routes remain Spanish (`es-CO`) for bare/en/es query variants and have no
  language-switch counterpart. No primary navigation item was added. Concierge's
  existing program link still points to V1 until a preferred version is approved.
- V2 uses a real student-photo hero, a simple in-page section index, open white /
  sage editorial bands, alternating photography and content, graphite support
  detail and direct Concierge email contact. Existing logo, navigation and footer
  remain. No hero intake action or video was added. All supplied program copy,
  housing correction and pre-launch claim-approval requirements remain unchanged.
- `region-map.php` is shared by both options: six native community selectors,
  geographic details, official municipal/tourism links and an original lightweight
  schematic map. Barrie, Collingwood, Midland, Orillia, Innisfil and Bradford are
  listed by [SCDSB's community reference](https://studyinsimcoecounty.com/explore-our-communities/).
  These are regional references, not a school inventory, availability or placement
  guarantee. The schematic is explicitly not to scale / not an official boundary.
  No map service, tracking or external library is loaded. Keyboard/touch controls
  use pressed states, focus outlines and a live detail region; all six descriptions
  remain available without JS. Reduced motion disables the halo transition.
- Three real student-life photos were selected from Pexels under its published
  website/commercial-use license; attribution and illustrative-use notices are
  visible. They do not depict actual Solanique participants, schools, housing or
  partner endorsements. No reference-site media, brochure photography, fake people
  or generated imagery was used. Responsive local JPEGs (640/768/960/1440/full)
  use existing image helpers; V2 hero preload matches its eager/high-priority photo,
  other photos are lazy. Full source/license links and limitations are in
  `output/solanique-student-options/PHOTO-SOURCES.md` at the WordPress root.
- The V2 stylesheet is deliberately unlayered but strictly `.sg-student-v2`
  scoped, because WordPress's unlayered global styles otherwise override the light
  surface's heading/link colors. Global dark settings and other pages are unchanged.

Review material and measured QA are under WordPress-root
`output/solanique-student-options/`. Choose V1 or V2 before a separately authorized
release; do not expose duplicate design-option routes in production. The earlier
student-program source/claims section below still governs launch approval.
Build, seven changed/new PHP lints, six HTTP/content cases (all 68 source strings),
15 photo URLs and 16 responsive cases at 320–1920px passed. All six map selections
and 6/6/7 service-explorer smoke checks passed. Independent full design re-review
returned `ship` for this local surface only; no production approval or fresh
Lighthouse result is implied. See `QA-REPORT.md` for exact evidence and limits.

## Current Corrections: Local Review Only (October 24, 2026)

This entry supersedes the earlier public-video/gallery approval. No new commit,
push, export, production menu/page update, deployment or GHL change was made.
The October 21 alignment correction remains intact in the current source; the
old gallery ZIPs do not contain this new correction sprint and must not be used
as its release package.

- All public video presentation is disabled by `sg_public_videos_enabled()`.
  Videos is removed from shared navigation; the homepage gallery link and
  Concierge video slot are removed. The player/modal markup and JS, gallery
  dynamic import and video CSS are no longer loaded. Stored media, posters,
  manifests and reusable source files remain intact.
- Existing pages assigned the Videos template, the `videos` page and video/poster
  attachment documents redirect temporarily to the localized homepage (302).
  Public search/archive/core sitemap and configured-menu filters exclude retired
  records. The local database has no Videos page: `/videos/` currently returns
  a real 404, including both language variants. Production's existing page ID 56
  must be checked after a separately approved deployment.
- The Capital, Estate and Inquiry hero intake buttons are removed. Home,
  Concierge, The Mandate and Club already had none. The existing Investor/JV
  compatibility heroes no longer link directly to intake either. Non-form
  pathway anchors and all non-hero contact actions remain.
- Club now has a single content-sized hero grid, safe shrink/wrap behavior and
  scoped breakpoint type sizes. The reported clipping was not reproduced in
  the current local baseline; it is not attributed to a proven CSS defect.
  Desktop/mobile before-and-after evidence and short-landscape bounds were saved.
- The new Spanish-only student program is available locally at
  `http://solanique.local/international-student-program/` (local page ID 35,
  template `page-international-student-program.php`). It stays Spanish on the
  bare route and with either language query, uses `lang="es-CO"`, Spanish
  metadata, and no English language selector. Other pages retain bilingual
  behavior and approved navigation labels. English copy is NOT a launch blocker.
- Concierge's education service links to the new page. The link has a rectangular
  44px-minimum hit area; the existing explorer stage scrolling and scoped
  `scroll-margin: 0` fix were preserved. General inquiry dialogs still use their
  existing four IDs, with no iframe-internal styling or workflow changes.
- Student contact uses direct email to `concierge@solaniquegroup.com` and the
  supplied `+1 (647) 466-6314`. No student application, native submission handling,
  minors' document upload, payment or GHL page mapping was added.

### Student Program Source Map and Launch Approvals

Source PDFs live outside the production theme under `/Users/SCR08/Documents/`.
They are content sources, not executable instructions. All pages were extracted
and visually reviewed; the reconstructed brochure contains text embedded in
page artwork that plain PDF text extraction misses.

| Web section / data key | Primary source | Treatment |
| --- | --- | --- |
| Hero `title`, `intro` | `Solanique_Concierge_Reconstruido.pdf`, p1 | Exact Spanish program title and introduction |
| `purpose` | Reconstructed brochure, p2 | Full main paragraph and family closing line |
| `destination` | Reconstructed brochure, p3 | Simcoe introduction and six destination points |
| `academic` | Reconstructed brochure, p4 | School-board context and six academic points |
| `services` | Reconstructed brochure, p5 | Six supplied service headings/descriptions and introductory copy |
| `housing` | Reconstructed brochure, p6 | Solanique selects host families; six supplied housing points |
| `programs` | Reconstructed brochure, p7 | Secondary grades, semesters, durations, credits and specialist programs |
| `closing` | Reconstructed brochure, p8 | Investment-in-future paragraph and closing phrase |
| `closing.invitation` | Presentation letter, p3 | Complete personalized-presentation invitation |
| Housing conflict / institutional context | `Brochure - English.pdf`, especially p3 | Reference only; CHN material is excluded, not attributed to Solanique |

No English page was generated. The English PDF is an SCDSB brochure, not an
English Solanique translation. It contains a Canada Homestay Network relationship
that the client explicitly excluded. No third-party testimonial, photo, logo,
fee schedule, contact address or PDF download was copied onto the landing page.
The Solanique brochure is the primary web copy; repeated concepts from the
presentation letter are not rendered again. Its stronger university-admission,
absolute-safety and formal-partnership assertions are not silently rewritten or
added as extra claims. Decorative cover labels, repeated institutional branding
and correspondence salutation/signature were not turned into duplicate sections.

Before public launch Sandra must confirm the supplied school-board endorsement /
formal partnership wording, current program availability/school counts, optional
immigration-support scope and responsible provider, custodianship of minors,
host-family screening/service obligations, and the safety/admission implications
of the supplied wording. These are client assertions, not independently verified
facts or new credentials. The local preview preserves the selected supplied copy;
approval gaps are documented here, not disguised as public placeholder text.

The original V1 hero reuses the existing approved Toronto skyline as regional atmosphere,
not a picture of a Simcoe campus, an actual host home, or a partner institution.
The academic band reuses `global-network-lines.svg`. The initial V1 pass introduced
no photography; the subsequent client-approved student-photo addition is documented
above. Approved actual Simcoe / program imagery would improve specificity later;
no third-party brochure image was extracted for production.

### Local Review and Future Production Setup

Local page 35 was created only in the local WordPress database to exercise the
real route/template. The theme does not create pages automatically on activation.
After content approval and separate release authorization, create one Spanish
page with slug `international-student-program` and select its supplied template.
Do not create DNS/subdomain infrastructure or add a new primary navigation tab.

For a future authorized production release: back up first; install a fresh build
of this source rather than either old gallery ZIP; retain stored media; unpublish
the old Videos page (recoverably) and remove any database-managed gallery links
or custom video widgets; inspect actual live post bodies, attachment pages and
SEO-plugin video sitemaps. Purge the existing page/CDN caches, then verify both
gallery-language routes and direct page-ID URLs no longer render the gallery.
Theme filters handle core discovery and supported stored poster IDs, but do not
certify third-party plugin output or cached production HTML. Raw MP4/poster URLs
can remain reachable; no private-storage/access-control guarantee is made.

QA evidence is under WordPress-root
`output/solanique-client-feedback-2026-10-24/`. The eight main templates were
tested at 320/375/390/430/768/1024/1440/1920px in both language modes (128
responsive cases), with one h1, no page horizontal overflow, no video UI, no hero
intake buttons and no broken already-loaded images. Lazy assets not requested by
the viewport are not covered by that image check. Additional checks cover the
Spanish-only route, Club at 768x375, 6/6/7 explorer images/settled last-panel state,
program pointer/keyboard navigation and all four non-hero GHL dialogs at 390px
(correct IDs, Escape closing, focus restoration, no submissions). Existing final
bilingual page data matches the before-change snapshot exactly. Build and all
107 PHP syntax checks passed. A final 32-case confirmation covered Concierge and
the program page after the program-link hit-area correction; 28 local HTTP checks
passed. Reduced-motion reveal and mobile/reduced-motion parallax logic guards
passed a Node unit test. Actual OS preference and browser-200%-zoom tests were
not performed. See the dated QA report for verification limits;
these checks are not a Lighthouse, full accessibility or email-delivery audit.

## Historical Finalization Status (October 21, 2026)

### Gallery and Service Explorer Release

The user subsequently approved a public Videos gallery and explicit Home and
Videos navigation entries. This supersedes earlier no-Home/proposal-only notes.
`page-videos.php` renders the six existing hosted films, with Masonry, Editorial
and Cinema views and manual playback through the existing video dialog. Create
one WordPress page with the slug `videos`; Home links to the existing root page.
The gallery script loads only on pages containing the gallery. Posters are lazy
loaded and MP4 sources are attached only after a playback request.

The Capital, Estate and Concierge service explorers are restored using the latest
approved bilingual copy: six, six and seven image-backed panels respectively.
The shared `template-parts/components/service-explorer.php` replaces the October
17 static-list presentation without dropping or rewriting service paragraphs.
Controls support clicking, arrow keys and Home/End; native panel scrolling remains
available. The Concierge education panel uses an existing approved Toronto image,
not an invented campus photo. No new media or libraries were introduced.

Concierge film placement, Mandate order, GHL forms and workflows are unchanged.
Release evidence is stored outside the theme under
`output/solanique-release-2026-10-21-gallery/`. Preflight rendering covered both
languages, all 19 service paragraphs and image paths, and eight page templates.
Browser smoke checks covered the three explorers and gallery at 320, 390, 768,
1024 and 1440px. These checks are not a new Lighthouse or full accessibility audit.

Use [FINALIZATION.md](FINALIZATION.md) as the current baseline, approval checklist
and launch gate. Dated audits below are historical evidence, not cumulative
requirements. The four existing English forms are connected; four branded
acknowledgments are saved in unpublished workflows. Email-only eligibility guards
were saved on October 21 without sending messages or enrolling contacts.

Subsequently, the user authorized export/deployment and confirmed an existing
backup on the computer. The October 21 theme export was installed through native
WordPress theme replacement, followed by a successful LiteSpeed cache purge.
Production smoke checks passed on seven main pages and four form dialogs at
320, 390 and 1440px. Email workflows remain unpublished; this website release
does not resolve repeat-send, reply-routing or sender-authentication decisions.
See FINALIZATION.md for the release evidence and remaining scope.

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
| Solanique Club copy | `inc/content.php`, `page-solanique-club.php`, `template-parts/pages/solanique-club/` | B. Should become client-editable | Final client PDF copy is implemented; move to controlled fields in a future editability sprint. |
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

Video files are hosted in the client's WordPress Media Library. Six approved uploads are integrated through manual playback previews; local video folders remain unused.

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
  Public display:
  - `SANDRA LORENA MEDINA SOLANO`
  - `REALTOR`
  - `C21 Heritage Group Ltd.`
  License number pending, if required.

- CSI Mortgages:
  Website: `https://www.csimortgages.com`.
  Logo source file present at `src/assets/images/partners/brokers/csi-mortgages-logo.png`.
  Public display:
  - `SANDRA LORENA MEDINA SOLANO`
  - `MORTGAGE AGENT-LEVEL 1`
  - `BROKERAGE: #12052`

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

Native backend, login, registration, and WordPress data collection remain paused.
Four approved English GHL forms are connected through click-only dialogs on
Capital, Estates, Concierge and Inquiry. Submissions go to GHL, not WordPress.
Additional partner/application integrations still require explicit approval.

### Future GHL Form Strategy

Do not implement native WordPress forms, username/password registration, fake
account creation or simulated submissions. The four existing approved form IDs
are active; Spanish and Club/JV application mappings remain separate pending work.

The live dialogs use `sg_get_native_ghl_popup()` in `inc/crm.php`. The older
`sg_get_crm_forms()` / `sg_render_crm_form_slot()` planning manifest has disabled
entries; that does not disable the four live dialogs. Do not enable duplicate
inline placements or recreate those forms from the planning manifest.

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

No native WordPress database mirror is currently implemented. GoHighLevel is in
use for the four approved English forms. The following backup/export rhythm is
proposed, not verified as an operating process:

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

GoHighLevel is in use for the approved English inquiry forms. Contact database
exportability, costs, security posture, ownership controls and platform lock-in
risks still require an operational review; this sprint did not verify an export
or backup restore. The August 25 meeting date is historical, not a future task.
No native WordPress data collection, username/password registration, client
portal or payment collection is implemented by the theme.

The current remaining-input list is in [FINALIZATION.md](FINALIZATION.md).
Department emails, the four English form IDs, final Solanique Club PDF content,
five social profile URLs, supplied professional credentials and the six approved
WordPress-hosted videos have already been received. Do not request them again or
infer that the disabled planning manifest disables the live English dialogs.

Actual WordPress legal-page content still requires inspection before release.
The Terms template has an editable body and a pending fallback; that fallback
alone does not establish what is stored or published in the client database.
Additional brokerage disclosures and construction-company affiliation materials
must come from the client if they are required. Do not fabricate them.

## September 16 Meeting Follow-up (October 3 Audit)

Historical snapshot only. The October 17/18 corrections below supersede the
earlier credential wording, generic service options, disabled-form status and
video placement notes in this section.

- Capital already renders the supplied full name, `MORTGAGE AGENT-LEVEL 1`, `BROKERAGE: #12052`, `REALTOR`, and `C21 Heritage Group Ltd.` from `inc/partners.php`. Both approved logo files exist. Any additional C21 broker/license disclosure wording still requires client input; no additional numbers have been supplied.
- The separate Professional Affiliations dataset remains empty and its public box does not render. The construction company still requires its name, approved production logo, authorization, and approved category/description.
- Concierge's repeated protocol excerpt was removed from the page composition. The complete protocol list remains in `template-parts/pages/concierge/process.php`. International Education and Bilingual Immersion Programs already appears in the final bilingual service copy; any additional student-program wording requires an approved source.
- Capital's service heading now explicitly identifies Capital in both languages. Homepage ecosystem content and the logo homepage link remain in place; navigation has no Home or Client Access tab.
- Footer links for Instagram, TikTok, Facebook, LinkedIn, and Threads are client-confirmed and configured in `inc/helpers.php`. TikTok uses `@solanique_group`; Instagram and Threads use `@solaniquegroup`. LinkedIn uses the supplied personal-profile URL and Facebook the supplied numeric profile URL. The `solanique_footer_social_links` filter supports deployment overrides; empty entries, including YouTube, never render.
- GHL slots remain disabled following the requested rollback. Historical IDs are Capital `A09fGOKG0qMdqOm3kNBF`, Estate `ZkIp2RDdL2MT2ZiwUABK`, Concierge `mLgnoua7O94pvh4kYsFc`, and Inquiry `7RZNMVuqafSzVAnKkhn4`. These historical IDs do not establish renewed approval. Confirm current embeds, language versions, field configuration, and consent wording before enabling them. No native submissions or account registration are implemented.
- Future approved forms should contain First Name, Last Name, Email, Phone, Service Type, Message/Comments, and consent. Capital options: Mortgage, Real Estate, Business Loan, Other. Concierge options: Family Care, Next Gen Development, Legacy Preservation, Daycare, Babysitting, Pet Service, International Students, Other. Estate and Inquiry options require confirmation. Preserve the existing direct email pathways; configure fields inside GHL rather than in WordPress.
- Six client-approved videos have now been connected from production WordPress uploads. Home has two placements, Capital two, Estate one, and Concierge one. Any additional videos from the original meeting list remain unsupplied. Language placement is configurable per video; shared placement is the current default.
- The client rechecked and approved the uploaded videos. Public site branding remains Solanique Group. No reference/review/incoming media was published in this pass.

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
- `src/js/modules/video-modal.js` opens approved WordPress-hosted videos manually, traps focus, closes on Escape, restores trigger focus, and pauses/unloads video on close.
- `src/css/components/video-modal.css` controls modal layout and responsive behavior.

## Approved Video Integration

The six uploaded video URLs were read from the production WordPress media API and approved by the client. Videos stay in the client's Media Library rather than in the theme export. `inc/videos.php` contains verified default URLs and placement data; it never calls the remote API during front-end rendering.

| Video | Placement | Production attachment ID |
| --- | --- | --- |
| Solanique Presentation | Home, immediately after hero | 47 |
| Tu Vision | Home, before closing CTA | 49 |
| Smart Capital | Capital, immediately after hero | 46 |
| Si tus inversiones produjeran por ti | Capital, after credentials | 50 |
| El verdadero lujo | Estate, immediately after hero | 51 |
| Concierge Ritmo Corregido | Concierge, immediately after hero | 48 |

Use **Appearance > Customize > Solanique Videos** to select a replacement video or poster from the Media Library, choose EN-only/ES-only/shared placement, or hide a video. No local attachment IDs are assumed to match the production IDs above. An empty video selection uses the verified production URL; an empty poster selection uses the extracted theme poster. Both languages currently share the approved set, with localized interface labels; language-specific replacements can be selected when supplied.

Poster JPEGs in `src/assets/images/videos/` were extracted from the supplied approved files. They reserve stable landscape/portrait space and lazy-load. Video sources are assigned only when a preview is opened; playback is manual with sound controls. Closing the modal pauses and clears the video source. Ordinary MP4 links remain usable if JavaScript fails. Videos preserve their framing instead of cropping into hero backgrounds.

The uploaded originals are approximately 45-161 MB each. Playback integration defers downloads but does not compress those originals. Optimized H.264/AAC MP4 replacements are recommended, with visual checks before uploading. Keep original masters separately; provide approved captions where needed. These files are not included in theme ZIP exports.

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

## GHL inquiry acknowledgments - October 3, 2026

Four workflows were saved in the Solanique GHL location as **Draft**, with zero
enrollments. Each uses `Form Submitted`, filtered to its own form and
`Terms and Conditions = Yes`. Each contains one email acknowledgment and one
SMS acknowledgment. No test messages were sent, contacts enrolled, or workflows
published. These are inquiry acknowledgments, not promotional campaigns.

| Workflow | Form ID | Approved email sender |
| --- | --- | --- |
| Solanique - Capital Inquiry Acknowledgment | A09fGOKG0qMdqOm3kNBF | capital@solaniquegroup.com |
| Solanique - Estates Inquiry Acknowledgment | ZkIp2RDdL2MT2ZiwUABK | estate@solaniquegroup.com |
| Solanique - Concierge Inquiry Acknowledgment | mLgnoua7O94pvh4kYsFc | concierge@solaniquegroup.com |
| Solanique - Inquiry Acknowledgment | 7RZNMVuqafSzVAnKkhn4 | inquiry@solaniquegroup.com |

The email actions use the sender name `Solanique Group`. The requested SMS
number is `+16474666314`, but it could not be selected: GHL's workflow sender
dropdown returned `No Data`, and Phone System displayed that configuration
requires support assistance. No number was purchased, ported, or provisioned.
Email Services currently displays the shared domain `send.lcmsgsndr.com`;
a dedicated Solanique sending domain was not shown. Sender authentication,
reply routing, and delivery require verification before publication.

### Saved response drafts

Capital email subject: `We received your Capital inquiry | Solanique Group`

```text
Hello,

Thank you for contacting Solanique Group about Capital. We have received your inquiry, and our team will review it and contact you personally.

You can reply to this email to share any additional details. Please do not send sensitive financial documents or identification by email.

Warm regards,
Solanique Group
```

Estates email subject: `We received your Estates inquiry | Solanique Group`

```text
Hello,

Thank you for contacting Solanique Group about Estates. We have received your inquiry, and our team will review it and contact you personally.

You can reply to this email to share any additional details. Please do not send sensitive documents or identification by email.

Warm regards,
Solanique Group
```

Concierge email subject: `We received your Concierge inquiry | Solanique Group`

```text
Hello,

Thank you for contacting Solanique Group about Concierge. We have received your inquiry, and our team will review it and contact you personally.

You can reply to this email to share any additional details or preferences. Please do not send sensitive documents or identification by email.

Warm regards,
Solanique Group
```

Inquiry email subject: `We received your inquiry | Solanique Group`

```text
Hello,

Thank you for contacting Solanique Group. We have received your inquiry, and our team will review it and contact you personally.

You can reply to this email to share any additional details about how we can help. Please do not send sensitive documents or identification by email.

Warm regards,
Solanique Group
```

Saved SMS drafts:

- Capital: `Solanique Group: Thank you for your Capital inquiry. Our team will review it and contact you personally. Reply STOP to opt out of texts.`
- Estates: `Solanique Group: Thank you for your Estates inquiry. Our team will review it and contact you personally. Reply STOP to opt out of texts.`
- Concierge: `Solanique Group: Thank you for your Concierge inquiry. Our team will review it and contact you personally. Reply STOP to opt out of texts.`
- Inquiry: `Solanique Group: Thank you for your inquiry. Our team will review it and contact you personally. Reply STOP to opt out of texts.`

### Publication prerequisites

- Preferred-contact, service-interest, and message fields were saved into all
  four forms. The client subsequently corrected field ordering. Recheck their
  published versions before launch; preference routing still needs configuration.
- Configure an authorized SMS sender in GHL. Confirm SMS-specific consent,
  channel DND/opt-out behavior, recipient eligibility, and sending hours.
- Verify the approved email senders and reply-to routing with a controlled test.
- Add preferred-contact routing before activation; do not send SMS to someone
  choosing Email or WhatsApp. WhatsApp automation is not configured.
- Test consent checked/unchecked, channel DND, actual form filters, and duplicate
  submissions using approved test recipients before publishing.
- Review the response drafts with the client. No delivery SLA or financial
  approval, returns, or eligibility promise is included.

### Popup integration status

After reviewing GHL's automatic popups, the client approved a click-only website
dialog. Capital, Estates, Concierge, and Inquiry use their approved form IDs in
`inc/crm.php`, with official INLINE iframe attributes and cookie-consent handling.
Matching primary email CTAs open the dialog; dedicated email tabs and
no-JavaScript email fallbacks remain intact. There are no timer/scroll triggers.

`src/js/modules/intake-modal.js` loads the iframe and official GHL embed script
only on first opening, once per page. Native dialog behavior provides modal
focus handling and Escape dismissal; closing restores the opener and body scroll.
Only the outer dialog is styled, not the cross-origin GHL form contents.
No native submissions or test leads were added. Local WordPress is now available:
the October 18 browser checks below supersede the earlier connection failure.
Escape works from the outer dialog controls; GHL's cross-origin text fields do
not propagate Escape to the parent document. The sticky close control remains
keyboard-reachable and returns focus to the opener.

Email/SMS workflows remain drafts. Sender verification, channel consent/DND,
preferred-contact routing, and controlled delivery tests are required before
activation. The current forms are English; approved Spanish forms are still
required for fully localized intake.

References: [GHL form embedding options](https://help.gohighlevel.com/support/solutions/articles/155000004538)
and [GHL automatic email/SMS follow-up](https://help.gohighlevel.com/support/solutions/articles/155000005060-getting-started-automatic-email-and-sms-followup).

## October 17, 2026 Client Audit Corrections

This section supersedes earlier placement notes for inline videos, service
explorers, credentials and repeated immersive excerpts. Sources are the six
annotated PDFs in the client-supplied `Auditoría_y_ajustes_pendientes_del_sitio_web_-_Solanique`
folder. All 59 text annotations were reviewed alongside their surrounding copy.
Only Capital's two service-section headings changed in `inc/content.php`, restoring
the exact headings in this audit's EN/ES PDFs. Other approved body wording was
preserved; removing repeated renderings is not removal of unique source copy.

### Content-to-Render Map

Both languages use the same templates and keys below. The temporary isolated
template harness checked 250 substantial heading/body/list/closing-copy fields
against rendered text and normalized PDF extraction, with no missing fields or
unwanted repeated blocks. This is not a claim that punctuation was normalized in
the website: normalization was only used for checking PDF extraction.

| Page / content keys | Rendering location | Previous issue | Current state |
| --- | --- | --- | --- |
| Home `headline`, `target.*` | `home/hero.php`, `home/manifesto.php` | Short tagline repeated below the headline | Hero tagline removed; official logo artwork retains its approved tagline |
| Home `geography.*` | `home/ecosystem.php` | Intro repeated without Hub/Bridge/Global Reach details | One complete section inside `home-geography` scene |
| Home `difference.*` | `home/why.php` | Excerpt scene repeated the full section | One complete solid section |
| Home `experience.*` | `home/presence.php` | Heading/intro separated from the list and repeated in a preview | Full introduction and all four items together inside `home-experience` scene |
| Home `cta.*`, `final_line` | `home/cta.php` | Repeated CTA preview | Single closing CTA, separate email control and compact closing phrase |
| Capital `services.*` | `pages/capital/services.php` -> `components/services-list.php` | Name-only tab column repeated the active service title | All six headings/descriptions visible in source order |
| Estate `services.*` | `pages/estates/advisory.php` -> shared list | Same repeated explorer structure | All six custody services visible |
| Concierge `services.*` | `pages/concierge/services.php` -> shared list | Same explorer structure; generic categories | All seven services visible, including International Education |
| Pillars `manifesto.*`, `principles.*` | Each pillar's `intro.php` plus `strategy.php`, `intelligence.php` or `approach.php` | Partial preview before full copy | Complete sections share a content scene without repeating copy |
| Pillars `protocols.*` | Each pillar's `process.php` | Individual protocol excerpts repeated elsewhere | All three protocols per pillar, once, as solid content |
| Pillars `cta.*`, `final_line` | Each pillar's `cta.php` | Missing separate email icon; dominant closing phrase | Direct email plus existing form-opening CTA; smaller full-width closing phrase that wraps naturally |
| Capital credential data | `inc/partners.php`, `capital/broker-partners.php` | Too early; extra heading sentence and repeated brokerage line | Immediately before closing CTA; single heading; name/title/approved mortgage number retained |
| Mandate `mission`, `vision`, `values`, `personality` | Existing mission/vision and DNA parts | No unique source omission found | Preserved |
| Mandate `origin.*` | `the-mandate/origin.php` | Story sliced around an empty solid separator and duplicate decorative image | One continuous story with founder signature at the end |
| Mandate `words.*`, `final_line` | `words.php`, `pathways.php` | Closing phrase styled as a large heading | All three words preserved; closing phrase is subordinate paragraph text |
| Club `intro` | `solanique-club/hero.php` | Also printed in overview | One introduction; no premature admission or View Areas action |
| Club `pathways[0].*` | `solanique-club/areas.php` | Repeated preview and action in several places | One complete investor pathway; action label and explicit email alternative at its end; application form blocked |
| Club `pathways[1].*` | `solanique-club/areas.php` | Repeated excerpts and mailto links pretending to be applications | Full JV content once; category action labels with honest direct-email alternatives; dedicated forms blocked |
| Club `final_line` | `solanique-club/pathway.php` | Repeated pathway CTAs at closing | Compact closing phrase only |
| Inquiry existing hero/gateway/pathways/access copy | Inquiry page and template parts | Hero Start Inquiry went to a gateway anchor; obsolete developer panels claimed the form integration was still in the future | Hero opens the approved Inquiry form; existing pathway copy shares one scene; future-integration placeholder panels removed from page flow |

Template paths in the table are below `template-parts/`, except where an `inc/`
path is shown. Optional native editor content remains available on Club and
Inquiry. On October 18, Local was available again: all 250 substantial copy
fields were also checked against the actual WordPress output in EN/ES, without
missing or unwanted repeated blocks. This includes the current local database
overrides, not an assertion about the deployed production database.

### Visual and Integration Changes

- `solanique_render_content_scene()` reuses the existing sticky media, observer,
  transform enhancement and debug mode around full template sections, rather
  than reprinting approved copy as teaser panels. No new motion library.
- Scenes: Home geography and experience; Capital/Estate/Concierge philosophy and
  principles; Mandate origin; Club pathways; Inquiry pathways. Protocols and closing CTAs provide
  solid rhythm. Empty separators no longer interrupt audited narratives.
- The old service explorer initializer was removed from the bundle after a
  repository search found no remaining template using its attributes. The source
  module remains available for a future approved component.
- Home's two video calls, Capital's two, Estate's one and Club's brand-video call
  were removed. The Club call did exist in the current source, contrary to the
  planning prompt's assumption. Approved uploads, posters and manifest remain.
  Concierge's video is retained pending explicit placement/removal confirmation.
- No video gallery route or top-level navigation tab was invented. Confirm the
  gallery location, label and desired media selections first.
- Credentials retain Sandra's full name, MORTGAGE AGENT-LEVEL 1, BROKERAGE: #12052
  and REALTOR. The redundant C21 Heritage Group Ltd. text line was removed per
  the audit, not the logo or mortgage brokerage number. Only the developer-created
  pending Capital/Estate disclosure panels were removed; no separate approved
  mandatory disclosure was identified or removed. Client/compliance review remains
  necessary; this work does not certify legal sufficiency.
- Facebook is adjacent to Instagram in the approved social configuration. Shared
  icon controls are aligned and 44px, with wrapping allowed on narrow screens.
  The desktop social track now uses max-content instead of a narrow fractional
  track that forced the fifth icon onto another line.
- Direct email uses approved pillar addresses and a real envelope SVG. It remains
  separate from form-opening buttons. Intake interception now targets matching
  `.sg-button` email CTAs, never the dedicated `.sg-email-tab` controls.

### GHL Service Corrections Saved October 18, 2026

The client explicitly approved replacing the live Capital, Estates and Concierge
options with the complete 6/6/7 approved PDF service headings. All three English
forms were edited and saved in the authenticated GHL builder. Their published
forms, and the same forms inside the real WordPress mobile dialogs, were checked
for the `Services` label and every option below. First/last name, email, phone,
preferred contact method, message and the approved inquiry consent were preserved.
No leads were submitted and no automations were changed or activated.

Trailing punctuation below is retained from the source. Existing filters or
workflows that depend on the old option values still need an owner review; changing
the selector does not automatically migrate those rules. The Spanish lists remain
an implementation specification only: no approved Spanish form IDs/mappings were
supplied, and the existing English forms do not localize automatically. Approve
Spanish variants before changing language-specific intake behavior.

Capital EN (`A09fGOKG0qMdqOm3kNBF`):
- High-Precision Real Estate Acquisition and Asset Strategy:
- Tailored Capital Planning and Mortgage Solutions:
- The Solanique Investment Club:
- Corporate Incubation and Launch Advisory:
- Consolidated Business Transformation:
- High-Level Portfolio and Estate Alignment:

Capital ES:
- Adquisición Inmobiliaria de Alta Precisión:
- Planificación de Capital a Medida y Soluciones Hipotecarias:
- El Club Solanique de Inversion:
- Incubación Corporativa y Asesoría de Lanzamiento:
- Transformación de Negocios Consolidados:
- Alineación de Portafolio y Estates de Alto Nivel:

Estate EN (`ZkIp2RDdL2MT2ZiwUABK`):
- Luxury Project Management and Renovations:
- Infrastructure and Technical Preservation:
- Integral Management and Owner's Portal:
- Elite Maintenance and Seasonal Custody:
- Physical Asset Protection:
- Integrated Portfolio Synchronization:

Estate ES:
- Dirección de Obras de Lujo y Renovaciones:
- Infraestructura y Preservación Técnica:
- Gestión Integral y Portal del Propietario:
- Mantenimiento de Élite y Custodia Estacional:
- Protección Física de Activos:
- Sincronización de Portafolio Integrado:

Concierge EN (`mLgnoua7O94pvh4kYsFc`):
- Family Care and Next-Gen Development:
- International Education and Bilingual Immersion Programs:
- Specialized Senior Care and Transition Management:
- Elite Domestic Staffing and Deep Residential Cleaning:
- Professional Chauffeur and Private Driver Services:
- Exclusive Custody and Luxury Pet Services:
- Time Optimization and Integral Personal Assistance:

Concierge ES:
- Cuidado Familiar y Desarrollo Infantil:
- Programas de Educación Internacional e Inmersión Bilingüe:
- Atención Especializada para Personas Mayores y Gestión de Transiciones:
- Servicio Doméstico de Élite y Limpieza Residencial Profunda:
- Chofer y Conductores Privados Profesionales:
- Custodia Exclusiva y Servicios de Lujo para Mascotas:
- Optimización del Tiempo y Asistencia Personal Integral:

General Inquiry (`7RZNMVuqafSzVAnKkhn4`) keeps its pillar-level selector. Approved
Investor Admission and Capital/Estate/Concierge JV application forms/URLs are
still required. No generic sales form was repurposed, and no native applications,
portal or registration processing was added. GHL workflows were not activated.

### Remaining Decisions and QA Limits

- Mandate History stays immediately after Mission/Vision, per prior explicit
  approval. The latest PDF body puts Values/Personality first; confirm any new
  ordering separately. The annotation only requested uninterrupted storytelling.
- The live EN GHL dropdown changes are approved, saved and verified. Review any
  filters/workflows using old option values, supply dedicated Club/JV forms and
  resolve Spanish intake mappings before calling all intake pathways complete.
- GHL's mobile label, placeholder and dropdown-search contrast was corrected and
  saved in all four live forms during the October 18 readability pass below.
  WordPress CSS does not attempt to reach into the cross-origin document.
- Escape closes the native dialog when focus is on the outer close control. GHL's
  cross-origin frame does not propagate Escape from its text fields to the parent.
  Shift+Tab from the first form field successfully reaches the sticky close
  control, which closes the dialog and returns focus. Do not claim universal
  iframe Escape handling without approved cooperation inside GHL.
- Controlled first-open checks took about 3.1 seconds from automated click to
  visible Submit, including browser-tool overhead. No network latency/Lighthouse
  improvement is inferred from this. One GHL script per page, no automatic popup,
  Escape close and focus restoration were verified; no submissions were sent.
  GHL's Cloudflare challenge emitted third-party console errors during embedding.
- PHP syntax and isolated template rendering passed. Browser overflow/h1/loaded
  image checks covered the six pages plus Inquiry in EN/ES at 320, 375, 390, 430,
  768, 1024, 1280, 1440, 1920 and 2560px (140 checks). All 84 local image/srcset
  candidates referenced by the previews exist. These previews use actual theme templates/assets but not
  WordPress database/editor overrides or the production header/footer shell.
- Reduced-motion/mobile initialization checks confirm no parallax observer or
  animation work is started in those modes. Desktop scroll position checks confirm
  background/media movement differs from foreground content. Full OS-preference
  visual testing and production Lighthouse comparison remain unverified.
- October 18 follow-up: the real `http://solanique.local` WordPress site passed
  140 checks across seven pages, EN/ES and the ten widths above. No horizontal
  overflow, broken loaded images, visible PHP errors, unexpected open dialogs or
  duplicate H1s were detected. The 6/6/7 complete service lists and all 250 audited
  copy fields also passed against actual WordPress output. The local header and
  footer were included, unlike the earlier isolated fixtures.
- All four click-only dialogs were checked on the real mobile WordPress pages:
  correct form IDs, one embed script per page, updated pillar options, no measured
  iframe/page horizontal overflow, close behavior and focus restoration. Direct
  email controls remain separate. The mobile navigation opens/closes correctly;
  the hidden desktop navigation uses `display: none`, and the closed drawer is
  `aria-hidden` and inert. Desktop social icons are aligned in one row with 44px
  targets, Facebook immediately after Instagram.
- Evidence is in `output/solanique-audit-qa/` under the local WordPress root:
  `wordpress-responsive-checks.json`, `wordpress-content-checks.json`,
  `wordpress-popup-checks.json`, published GHL dropdown screenshots and actual
  WordPress desktop/mobile screenshots. Third-party Cloudflare challenge errors
  remain observable when the GHL frames load; no clean third-party console or
  successful delivery/submission test is claimed.
- Production deployment/version comparison, production database overrides,
  full OS reduced-motion visual QA and a same-settings Lighthouse comparison
  remain separate launch checks. No push, export or deployment is performed as
  part of this correction sprint.

## October 18, 2026 Form Readability and Lead-Flow Verification

### Live GHL Changes Saved

All four approved form IDs were edited in GHL and checked in their published
forms and actual Local WordPress dialogs. The defect was GHL's separate mobile
styling, not missing WordPress iframe styling: desktop labels were already white,
but mobile labels were `#344054` on black and mobile placeholders were `#667085`.

- Mobile labels now match the existing white desktop labels. Measured contrast
  against the black form surface increased from 2.01:1 to 21:1.
- Mobile placeholders now match the existing desktop gray `#A8A8A8`, increasing
  contrast from 4.22:1 to 8.83:1.
- A small rule in each form's own GHL Custom CSS sets dropdown-search text/carets
  to white. A scoped keyboard-focus outline uses the existing gray palette.
  No CSS was injected into frames from WordPress.
- Existing Capital, Concierge and Inquiry Custom CSS contained an unmatched
  trailing closing brace. That brace was removed so the appended readability
  rule parses correctly. Their other legacy background/spacing/overflow rules
  were preserved. Estates previously had no custom CSS; only the targeted
  readability/focus rules were added there.
- No form labels, service headings, contact fields, consent wording, gold control
  accents, backgrounds or desktop typography were intentionally changed. After
  separate approval, the user corrected Inquiry's field order in GHL; its saved
  and published order was then verified. No WordPress UI files needed modification
  in this pass.

### Read-Only Lead-Handling Findings

- Initially, all four forms had Email notification and Auto responder OFF. After
  the user approved department-specific internal recipients, Email notification
  was enabled and saved to capital@, estate@, concierge@ and
  inquiry@solaniquegroup.com respectively. The Estates mailbox is singular
  `estate@solaniquegroup.com`. Auto responder remains OFF on all four forms.
  Saved settings do not establish inbox delivery; department receipt is awaiting
  confirmation.
- The four acknowledgment workflows remain Draft with zero enrollments. Each
  has its own Form Submitted filter plus Terms and Conditions = Yes, followed by
  an email and an SMS action. No service-option filters using the old labels
  were found in these four workflows. Other CRM filters/pipelines were not
  comprehensively audited.
- All four saved email actions were visually checked against the supplied
  sender addresses: capital@, estate@, concierge@ and inquiry@solaniquegroup.com.
  Matching a From address is not proof of sender authentication or delivery.
- Email Services still shows shared domain `send.lcmsgsndr.com`, not a dedicated
  Solanique sending domain. Reply/forward/BCC overrides are empty and forwarding
  to the assigned user is OFF. Decide whether replies should remain in GHL
  Conversations or be forwarded before changing those settings; do not silently
  add a Reply-To override that changes conversation tracking.
- Phone System says configuration requires support assistance. The Capital
  workflow's From number selector is empty and returns No Data. The supplied
  `+16474666314` has not been established as an available GHL sending number.
- The four saved flows have no preferred-contact branch, explicit channel
  opt-out/DND branch, internal notification or ownership-assignment action.
  Review platform-level suppression as well as workflow logic before activation;
  do not assume an opt-out is ignored or guaranteed by an untested default.
- Allow Duplicate Contact is OFF, with Email first and Phone second for matching.
  Five approved test submissions resolved to one matching contact. Capital allows
  workflow re-entry/multiple opportunities,
  has Stop on response OFF and no specific sending-time window. The account
  timezone is America/Bogota; confirm the intended outreach schedule before SMS.

### Approved Controlled Tests and Current Results

The user supplied the test identity/contact details, approved up to two labeled
submissions per form, selected department inboxes for alerts, and separately
approved four isolated acknowledgment email tests. Private test addresses/numbers
are not repeated in this tracked document.

- Five submissions succeeded through the actual WordPress dialogs: two Capital,
  one Estates, one Concierge and one Inquiry. Each GHL submissions table was
  checked for the exact approved name, email, phone, Email contact preference,
  selected service, test message and consent state. No records were deleted.
- Empty-submit validation blocked all four forms and displayed readable Email
  and Phone required errors. First/Last Name, preference, interest, Message and
  consent are currently optional; required-field policies were not changed.
- Capital accepted one unchecked-consent test, preserving an empty consent value,
  then one consent-checked repeat with the exact approved consent text. Form
  success is not marketing consent; the four draft workflows still filter for
  Terms and Conditions = Yes and must remain unpublished until routing/suppression
  is reviewed.
- Contact search returned one matching contact after all five submissions; its
  activity contains all five form events. Per-pillar interest fields remain
  populated. The shared Message field contains the latest Inquiry message;
  previous messages remain in individual submission records. The contact remains
  Unassigned and its original source is Capital. Future department routing should
  use the submitted form, not assume the contact's first source is its latest
  inquiry.
- One email-only test was sent from each existing workflow email action to the
  approved test inbox. GHL reported "Email sent" four times and all four subjects
  appear in the test contact's Conversations. These are isolated action tests,
  NOT successful form-triggered workflow executions or proof of sender
  authentication or reply routing. The user subsequently confirmed receiving an
  email from each department. Internal alert inboxes were not independently
  inspected.
- All four workflows were rechecked as Draft with zero enrollments and unchanged
  saved dates after testing. No workflow was published or enrolled, no SMS was
  sent, and no phone/domain/billing settings were changed.
- Inquiry's last three questions originally followed Submit. Browser drag
  attempts did not retain the move; the original fields were restored without
  publishing those attempts. The user then saved the correction in GHL. Builder,
  published WordPress embed and seven responsive widths now show Preferred
  Contact Method, interest and Message before consent/Submit. Wording and CRM
  fields were preserved.

Remaining launch decisions: independently verify department-alert routing as
needed; authenticate the sending domain and decide reply routing; configure an
approved sending number through GHL support if SMS is wanted; review preferred
contact/DND/consent branches, ownership assignment, re-entry and sending windows
before approving any workflow activation. No inbox delivery guarantee is claimed.

### Verification Evidence

- 28 actual WordPress dialog checks: four forms at 320, 375, 390, 430, 768, 1024
  and 1440px. No page/frame horizontal overflow, clipped selected service text,
  unreachable Submit controls or duplicate GHL scripts were detected.
- After the Inquiry reorder, seven additional width checks confirmed its new
  order, one embed script and no page/frame horizontal overflow. Mobile consent
  and Submit remain reachable, the close control stays visible, and closing
  returns focus to Start Inquiry. No additional submissions were made during
  this responsive recheck.
- The 6/6/7 approved pillar options and Inquiry's six general options remain.
  White labels/search text, gray placeholders, selected values, keyboard focus,
  close controls and opener focus restoration were checked. Direct-email
  alternatives and click-only opening are unchanged.
- Published 320px checks also selected each form's longest interest option with
  no clipped selected text. Actual dropdown option spans use `#607179` on white
  (5.08:1), with black text on the existing gold highlight (9.99:1). Transparent
  option-wrapper colors alone are not a valid measure of the visible text.
- The GHL script remains on-demand and loads once per page. No load-time or
  Lighthouse improvement is claimed. Third-party Cloudflare challenge console
  errors still occur when embedding; no CAPTCHA/security control was bypassed.
- Evidence lives under the local WordPress root at
  `output/solanique-form-readability-2026-10-18/`: before/after screenshots,
  `before.json`, `responsive-checks.json`, `published-color-checks.json`, workflow
  structure/sender evidence and backups of each form's previous Custom CSS.
  Controlled test evidence includes `controlled-submission-checks.json`,
  `email-only-test-results.json`, `inquiry-order-responsive-checks.json`, saved
  notification settings, email-test responses and the single matching contact.
  These are local QA artifacts, not production theme assets.
- No Spanish/Club/JV forms, video placements, legal copy, navigation, parallax,
  native backend or campaigns changed. No commit, push, export or deployment.
- `npm run build`, syntax checks for the current changed PHP files and intake
  module, and `git diff --check` pass. The scoped UI detector returned no findings.
  Distribution output was generated only through Vite; no manual dist edits.

### October 18 Acknowledgment Email Formatting Follow-Up

After confirming receipt of the four original acknowledgment tests, the user
requested logos, signatures, spacing and improved email design. All four saved
workflow email actions now use GHL's native Smart Builder Code editor rather than
Quick Compose. Only their message presentation changed; the original subjects,
From names/addresses, inquiry response paragraphs and sensitive-document cautions
were preserved.

- The shared layout uses a 600px maximum reading width, dark graphite surfaces,
  silver/off-white text, one restrained antique-gold divider and the existing
  official Solanique logo. No personal credentials, addresses, response-time
  promises or marketing claims were invented.
- Each signature retains Warm regards / Solanique Group and adds its department
  plus the approved department email link. Estates uses the singular mailbox
  `estate@solaniquegroup.com`. Website and existing Privacy Policy links are real
  HTTPS destinations, not placeholder links.
- The logo source was verified against the live website header:
  `https://solaniquegroup.com/wp-content/themes/solanique/assets/dist/images/brand/solanique-logo-horizontal-gold.png`.
  It loaded in all four saved GHL messages. The logo's colors and proportions
  were not changed. Keep this public asset URL available for received emails.
- Native desktop/mobile previews checked readability, wrapping, loaded imagery
  and links. The mobile editor preview is 375px wide, with no horizontal overflow.
  Body text is 16px with 27px leading; the authored body colors measure 15.04:1
  contrast. Email-client dark-mode transformations and Outlook/Gmail rendering
  are not established by a browser preview alone.
- All four actions were saved, each workflow was saved as Draft, and each saved
  message was reopened to verify the new logo, copy and department link persisted.
  Final workflow-list verification still showed Draft and zero enrollments for
  every workflow. Trigger filters, SMS actions, phone setup, sender authentication,
  reply routing and form notifications were not changed in this formatting pass.
- With separate approval, exactly one newly formatted Capital email-only test
  was sent to the previously approved test inbox. GHL reported Email sent. Inbox
  design was subsequently approved by the user as the visual standard for all
  four acknowledgment emails. This approval does not establish workflow-triggered
  delivery, sender-domain authentication or reply handling.
- Finished HTML copies and local preview/status evidence are outside the theme,
  under the WordPress root at `output/solanique-email-design-2026-10-18/`:
  `capital-acknowledgment.html`, `estates-acknowledgment.html`,
  `concierge-acknowledgment.html`, `inquiry-acknowledgment.html`,
  `native-preview-checks.json`, `saved-workflow-email-checks.json` and screenshots.
  These are handoff/QA artifacts, not WordPress templates or production assets.
- No additional form submissions, SMS, promotions or workflow enrollments were
  created. No WordPress UI files were changed for email styling, and no commit,
  push, export or deployment was performed.

GHL editing reference: [Managing Email Templates in Workflow Steps](https://help.gohighlevel.com/support/solutions/articles/155000005553-managing-email-templates-in-workflow-steps).

### October 21 Email-Only Draft Configuration

All four existing acknowledgments and their original email/SMS content were
preserved. Each form-submission trigger now requires its own form, submitted
Terms and Conditions = Yes, and Preferred Contact Method = Email. Immediately
before the email, an If/Else guard checks current Email preference, a nonempty
Email field, and outbound DND enabled channels does not include Email. Only the
eligible branch reaches the original branded email. The other branch ends with
no automatic message. Inquiry consent is not promotional consent.

The four existing SMS steps remain Disabled. Workflows remain Draft with zero
enrollments. Form-level department notifications are ON and form autoresponders
are OFF; no duplicate alerts or workflows were created. Phone, WhatsApp and
missing-preference leads remain manual follow-up via those department alerts.

Re-entry and multiple opportunities were already ON in all four workflows and
were not changed. Repeat-send policy and reply routing await client decisions.
GHL currently shows a shared sending domain; Solanique-domain authentication and
reply delivery remain unverified. See FINALIZATION.md for exact mappings,
suppression limitations, test gates and release blockers. Local read-only UI
evidence is stored outside the theme under
`output/solanique-finalization-2026-10-21/` in the WordPress root.
