# Solanique Finalization Checklist

## November 17: Authorized Consolidated Theme Release

- [x] User authorizes committing/publishing all recent theme changes.
- [x] Rebuild/lint, commit `5cd8757` and push the reviewed changes to origin/main.
- [x] Produce and install a clean 541-file current-theme archive; preserve WordPress data
  and the already-enabled Spanish student form setting.
- [x] Purge cache and verify public assets, phone, Simcoe image, student dialog,
  existing department forms, both languages and responsive layouts.

Eighteen anonymous page cases pass; both live built assets match local hashes.
Measured responsive QA: seven main routes at 390/1440 and student V1/V2 at
320/390/768/1440/3440, without horizontal overflow. No new Lighthouse or submission
delivery test is claimed. Evidence and clean ZIP are in the dated release folder.
No CRM messaging activation or account/billing change is included in this release.

## November 17: V1 Student Form Connection

- [x] User approves proposed questions for immediate connection; user fixes order.
- [x] Verify public Spanish GHL questions precede Message, consent and Submit.
- [x] Publish only the CRM/V1 button patch; retain before/after backups. Save
  `hxcGEXtxmFPRogVvXU72` and enabled approval control in native Customizer.
- [x] Verify click-only opening, lazy iframe, one embed script, Escape/focus return,
  responsive widths 320/375/390/430/768/1024/1440 and no horizontal overflow.
- [x] Verify public anonymous HTML after LiteSpeed URL purge, unchanged four
  department IDs and unchanged V2; build/PHP/routing/diff checks pass.
- [x] User explicitly authorizes student-only initial-height correction. Save exact
  approved PHP, recheck persistence, purge route cache and verify anonymous HTML.
  Normal first loads at 320/390/1440 retain scrollTop 0; frame-element inspection can
  cause its own scrolling, so final QA avoids that focus/inspection side effect.
- [ ] Student department alerts/workflows and scoped end-to-end submission tests
  remain separate work. No new alert, autoresponder or test was enabled/sent.

This limited live integration is not deployment of all outstanding local changes.
English student form remains separate/unlinked; V2 and hero CTAs unchanged.

## November 16: Later Company-Number Decision and Handoff

Supersedes the phone separation in the historical entries below.

- [x] Company AND WhatsApp number confirmed as `+1 647 466 6314`.
- [x] Local shared phone helper updated; GHL Business Profile saved and reloaded.
- [x] All 26 local seasonal email HTML files updated; Spanish birthday GHL save
  verified. No sends, imports, purchases or new workflow activation.
- [x] Prepare Spanish four-page contacts guide, three-page review checklist and
  unsent client email. Verify native Contacts-only CSV import setup without data.
- [ ] Recheck English birthday saved content after editor rendering failure, then
  update/verify the remaining 25 saved GHL seasonal phone references.
- [ ] Obtain specific Meta asset/access approval; no OAuth grant made. Explain
  WhatsApp native/app/third-party options and obtain any billing authorization.
- [ ] Finish student form order and client approvals before tests/link activation.
- [ ] Confirm meeting availability separately. No invitation or client email sent.

Build, helper PHP lint and exact phone values pass. New website phone changes
remain local; November 12 is still the last verified production theme release.
The prior Google phone suggestion is no longer needed under the latest number
decision; no public Google edit was submitted.

## November 16: Saved CRM Session Verified

- [x] Open saved Solanique GHL login using Sebastian's Chrome profile.
- [x] Record client-confirmed WhatsApp Business `+1 647 466 6314`, separate from
  company voice/contact phone `+1 647 947 5580`; GHL business phone is already correct.
- [x] Recheck all four inquiry workflows show Published. Capital trigger/eligibility,
  24-hour cooldown and disabled SMS verified; no workflow changes or sends.
- [x] Obtain approval and save separate ES/EN student presentation review drafts:
  ES `hxcGEXtxmFPRogVvXU72`; EN `Ny674NtxyDuyYqj2fqI4`. Student dropdowns use
  separate language-specific field IDs. Notifications/autoresponders remain OFF.
- [x] Check saved rendered forms at actual 320/390px: no horizontal overflow;
  consent unchecked. No personal data, submissions or messages used in QA.
- [ ] Correct student form order manually in GHL: all questions, then Message,
  consent and Submit. Browser dragging does not retain the move. Re-save/recheck.
- [ ] Approve required fields/privacy/routing, configure the future Concierge
  alert, authorize scoped tests and only then enable the dedicated website ID.
  Both drafts stay unlinked and the local approval gate remains empty/OFF.
  Draft names do not make GHL share endpoints private.
- [ ] Authorize/complete Google-owner connection for review syncing. GHL shows
  Connect and No Reviews Yet; no new access granted.
- [ ] Decide on paid GHL WhatsApp activation. Its UI offers Agency Purchase at
  $10/month, not a connected number. No purchase, billing or channel change made.

Google phone-suggestion authorization is still pending separately. The old number
is now confirmed as the WhatsApp endpoint; do not confuse a WhatsApp destination
with the approved company voice number. The November 15 account-login blocker is
resolved, but connection/approval gates remain. See the dated CRM status evidence.

## November 15: Meeting Follow-Through - Local Only

- [x] Fill V1 Simcoe's empty editorial column with an existing responsive student
  photo, retaining attribution and illustrative-use limitations.
- [x] Prepare gated, dedicated Spanish student-form wiring using the existing
  click-only dialog; empty/off defaults retain email and generate no iframe.
- [x] Prepare a Spanish contacts import/export PDF and a bilingual seasonal-message
  review PDF, plus student questions, attribution draft and client approval checklist.
- [x] Verify public Google weekly hours already match the meeting agreement.
- [ ] Sign into GHL; create/review the real dedicated student form and its alert,
  connect the verified Google profile/widget, and recheck current automation state.
- [ ] Submit/verify the Google phone correction after explicit approval, or use
  Solanique's owner account. A public edit is prepared but was blocked before
  submission. No unrelated profile/SMS endpoint was edited. Confirm WhatsApp separately.
- [ ] Receive student-copy revisions, remaining two reviews, approved historical
  attribution and seasonal-copy/audience approval. Prepared materials are not sent.
- [ ] Obtain scoped testing/release approval after these account/content checks.

No campaigns/SMS/WhatsApp activated, no submissions/tests sent, no production
deployment, no commit/push/export. Evidence and client documents are outside the
theme in `output/solanique-follow-through-2026-11-15/`. November 12 remains the last
verified deployed theme. Historical pending lists below are not new instructions.

## November 12: Theme Release Verified

- [x] User authorizes save, commit, clean export and upload of current theme.
- [x] Preserve pending closing-message, phone and both student-palette changes.
- [x] Verify clean ZIP/build/PHP: 541 files, 112 PHP files lint clean; release
  archive fingerprint is in the November 12 release manifest.
- [x] Commit runtime as `3ff2b78`; native WordPress confirms theme update success.
- [x] Anonymous public CSS/JS hashes match the release; 18 HTTP page checks pass.
- [x] Transfer approved reviews to production 67/69/72; public names/texts match,
  italics/quotation marks present in both language versions.
- [x] LiteSpeed purge confirmed; main/student responsive checks pass as detailed
  in README and the release artifact directory. No GHL activation or Git push.

## November 12: Homepage Reviews - Published

- [x] Add a bilingual homepage review invitation before the closing contact area.
- [x] Link the client's exact Google review-writing destination.
- [x] Add native staff-managed Reviews entries with source/language/approval gates.
- [x] Keep empty state honest: no testimonials, ratings or counts were invented.
- [x] Verify the actual WordPress empty state in EN/ES at seven widths from
  320-1920px; keyboard navigation, visible focus and no horizontal overflow.
- [x] Read-only WP-CLI verifies native registration and editor permissions;
  collection has no public route/REST endpoint.
- [x] Add client-supplied Claudia/Ervin/Joselin testimonials exactly as supplied
  to local entries 37/38/39, ordered and original-English on both page versions.
- [x] Verify populated EN/ES layouts at seven widths from 320-1920px, all three
  texts/names match, no overflow, no fake ratings or invented Google attribution.
- [ ] Optional individual source URLs and any approved Spanish translations.
- [ ] Optional automatic sync: authorize Google Business Profile in GHL Reputation,
  obtain actual review-widget embed and review appearance/privacy/performance.
  No automatic feed or external review script is enabled by this local change.
- [x] Deploy theme and separately add the three approved review database entries.

## November 2: Approved Inquiry Email Activation

- [x] Obtain fresh approval for four email-only tests and the four inquiry workflows.
- [x] Save a 24-hour post-email cooldown in each existing department workflow.
- [x] Preserve consent/Email-only triggers, DND/preference guards and disabled SMS.
- [x] Verify matching department form alerts ON and form autoresponders OFF.
- [x] Request exactly four tests and verify all four same-day GHL conversation
  records; save three immediate Email sent confirmations. No fifth test sent.
- [x] Publish the four inquiry workflows under the scoped user authorization.
- [x] Record approved birthday-over-holiday and single permitted/preferred-channel
  policies. These are not yet activated seasonal automations.
- [ ] Confirm actual inbox/reply delivery and separately test form-triggered
  suppression, duplicates and elapsed cooldown if required. No new form tests
  were authorized in this pass.
- [ ] Verify corporate sender authentication and any desired reply forwarding;
  no DNS/global-routing changes made. Existing shared sending service is healthy.
- [ ] Resolve seasonal eligible audience, final copy/public footer and scheduling
  checks before separate activation. SMS is blocked by account configuration.
- [ ] WhatsApp setup deferred explicitly to the user; no changes made.

Earlier Draft-only and no-message statements below are historical. This pass
does not authorize website deployment or activate seasonal/SMS/WhatsApp sending.
Evidence: WordPress-root `output/solanique-automation-launch-2026-11-02/`.

## November 2: Student Palette Clarification - Local Only

- [x] Restore V1's full dark Solanique palette, superseding V1-light notes below.
- [x] Center both V1 photo figures with the text containers, including ultrawide.
- [x] Keep V2 light/student-focused; replace green with graphite, silver and gold.
- [x] Preserve both routes, Spanish copy, images/map and updated company phone.
- [x] Pass 20 responsive cases, loaded images, copy comparison, two keyboard map
  checks and sampled contrast; console clean and npm run build passes.
- [ ] Obtain client visual approval and separate release authorization.

No production publication, GHL edit, commit, push or export. Review evidence:
WordPress-root `output/solanique-palette-correction-2026-11-02/`.

## October 30: Refinements and Seasonal Messaging - Not a Release

- [x] Preserve the existing local bilingual closing-line correction.
- [x] Apply scoped V1 light/silver/graphite branding and V2 wide-screen sizing.
- [x] Centralize the approved public phone: +1 647 947 5580 / +16479475580.
- [x] Update both program contact links; no active old number remains in theme PHP.
- [x] Save GHL Business Profile phone and verify it after reload.
- [x] Audit Phone System: configuration required; SMS sender remains unverified.
- [x] Save 26 EN/ES email templates and 26 SMS text snippets as DRAFT REVIEW.
- [x] Prepare 2026-2028 calendar, recurrence/source notes and SMS segment estimates.
- [x] Recheck all four acknowledgment workflows: Draft and zero enrollments.
- [x] Keep existing inquiry responders, opt-outs, timezone and sender setup unchanged.
- [x] Build, three changed PHP lints, diff whitespace and scoped CSS detector pass.
- [x] Complete recorded WordPress QA: 20 student-page sizes, 14 main-page cases,
  loaded images, map keyboard checks, Spanish routing and database phone audit.
- [x] Preview 26 saved emails on desktop/mobile (52 passing cases); no sends.
- [x] Inspect four public forms and four acknowledgment email/SMS bodies for old
  company numbers; no matches. Workflows rechecked November 2: Draft, zero enrolled.
- [x] Record sender inquiry@solaniquegroup.com, 10 AM recipient-local, Easter
  Sunday, March 1 leap-day fallback and exclusion of unknown language/permission.
  Save approved sender on all 26 seasonal email templates; leave account timezone.
- [ ] Confirm actual eligible recurring audience records, sender authentication/
  replies, mailing address/footer, SMS connectivity and collision/channel policy.
- [ ] Verify native scheduling/leap-day behavior with separately approved tests.
- [ ] Approve respectful remembrance copy and optional family/religious occasions.
- [ ] Obtain separate testing, activation and website release authorization.

Evidence, saved CRM IDs, drafts and sources:
WordPress-root `output/solanique-refinements-2026-10-30/`.
No test messages, campaigns, enrollments, new workflow responders, commits,
pushes, exports or deployment occurred. Historical production entries below
remain historical. Local layout QA is recorded, not production deployment or
final client sign-off. Fresh OS reduced-motion testing and Lighthouse were not run.

## October 24: Both Student Pages Authorized for Release

**Completed and verified on production:** original page 60 at
`/international-student-program/`; lighter page 62 at
`/international-student-program-v2/`. Correct native page templates were selected
and WordPress confirmed publication for each. Theme replacement and LiteSpeed
cache purge succeeded. Public CSS/JS hashes match `main-DmfzBBvv.css` /
`app-CfR_540f.js`; implementation is committed as `cb00ac9`.
Six content/language HTTP cases, 15 image URLs, 16 program responsive cases and
14 main-page smoke cases passed. The Capital dialog opens the existing form,
Escape closes it and restores focus; no form submission or automation action.
Videos remains absent; the former gallery route redirects 302 to Home. Release
proof is under WordPress-root `output/solanique-release-2026-10-24-student-pages/`.
Previous local-only hold entries below are historical, superseded by this release.

User requested: publish both student versions and commit everything. This
supersedes the previous publication hold and single-version recommendation only
for the current theme/page release. Both Spanish routes are to be created with
their dedicated templates; main navigation remains unchanged, public videos stay
retired and hero intake actions remain removed. GHL/workflow settings are outside
scope. Deployment must still be verified; see WordPress-root release evidence in
`output/solanique-release-2026-10-24-student-pages/` for actual status.

## Student Landing Alternatives: October 24, Local Only

V2 is available locally at `/international-student-program-v2/` (page 36, dedicated
template), with the client's explicit approval for lighter sections on this option
only. V1 remains `/international-student-program/` (page 35, dark). Both use the
same unchanged Spanish content data and now include a shared schematic Simcoe
community explorer. V1 adds two student-life photos; V2 uses three locally stored,
responsive Pexels photographs with visible illustrative-use notices. Source/license
links and geographic limitations are recorded in WordPress-root
`output/solanique-student-options/PHOTO-SOURCES.md`. No actual school placement or
host-family availability is implied by the map or stock photos.

No video, hero intake CTA, new navigation tab, student application, GHL change,
production publication, export or git operation was added. Concierge still points
to V1. Choose the preferred layout before release and publish only that version;
the existing supplied-claim confirmations below still apply. WordPress page 36 is
local preview setup, not a production page or a launch-ready approval.

## October 24 Corrections: Local Only, Production Hold Continues

The client superseded public video/gallery approval: remove all public video
presentation, not only its navigation tab. Source now removes gallery discovery,
the remaining Concierge film slot, player initialization/markup and video CSS;
retained gallery/video/poster source and stored media are not deleted. Gallery
pages assigned `page-videos.php`, `/videos/` page records and video/poster
attachment documents redirect to the localized homepage; missing routes retain
their real 404. Search, core sitemap and configured-menu filters exclude retired
records. Raw uploaded media URLs remain public unless separately restricted.

Capital/Estate/Inquiry and existing Investor/JV compatibility hero intake links
are removed; non-hero GHL contacts still work. Club received scoped sizing/wrapping
protection; the current baseline did not reproduce the reported clipping, so no
unproven root cause is claimed. The 6/6/7 explorer copy/images and unpublished
inner-stage scrolling correction were preserved.

Spanish-only student page: local WordPress page 35 at
`http://solanique.local/international-student-program/`, with the dedicated page
template and contextual Concierge education link. It remains Spanish even for
`?lang=en`, and has no student GHL form or hero form action. Contact uses the
supplied Concierge email and phone. README records the PDF-to-section mapping,
CHN exclusion, retained supplied service wording and pre-launch confirmation
items (SCDSB status, immigration provider/scope, custodianship, screening and
safety/admission implications). No English translation is needed for this page.

This is not a deployment or final client approval. No commit, push, export,
production WordPress change, DNS change, GHL modification, message, workflow
publication or submission occurred. Existing October 21 ZIPs are not this release.
After approval, production needs the new WordPress page and retirement/cache/
plugin-output checks described in README; do not treat local checks as live proof.

Local QA: build and 107 PHP lints pass; 128 responsive cases, three language-query
variants, short-landscape Club checks, complete unchanged bilingual source data,
settled explorer image/content bounds and four non-hero dialog regressions were
checked. Desktop/mobile screenshots and JSON reports are in WordPress-root
`output/solanique-client-feedback-2026-10-24/`. No form was submitted. No fresh
Lighthouse, OS-level reduced-motion or actual browser-200%-zoom audit is claimed.
An additional 32 responsive confirmation cases and 28 HTTP checks passed. A Node
logic test verified immediate reduced-motion reveals and no parallax frames for
mobile/reduced-motion settings; this is not OS/browser preference verification.

Baseline: October 21, 2026. This document supersedes older pending-input lists;
dated QA reports remain historical evidence. Configuration is not activation or
proof of end-to-end delivery. The overall finalization sprint is not complete.

## October 21 Website Release Update

### Subsequent Gallery / Explorer Release

Production publication was verified: Videos page ID 56 is published at `/videos/`
using the Videos template. Home/Videos navigation and all 6/6/7 service explorers
are live. WordPress confirmed replacement with
`solanique-production-2026-10-21-gallery-final.zip`, then LiteSpeed confirmed
"Purged all caches successfully." Both gallery languages show the correct new
interface labels. All 38 rendered service items across English/Spanish match the
approved source copy exactly after whitespace normalization. Twenty responsive
production smoke checks and twelve gallery-view checks passed with no page
horizontal overflow. Manual video playback reached readyState 4 and advanced
past ten seconds; no source is attached before interaction. Capital's existing
GHL dialog still opens with the correct form and Escape returns focus. No form
submission or workflow publication occurred.

A subsequent local-only scroll-alignment fix is packaged in
`solanique-production-2026-10-21-gallery-release.zip` but is NOT yet deployed.
It isolates service selection to the inner stage and clears inherited page-anchor
scroll margins, fixing a partially obscured description after selection.
Preflight confirmed the last card's copy fits the stage on desktop and remains
inside the card on mobile. Build, 105-file PHP lint, copy/image checks and
`git diff --check` passed. Chrome control was repeatedly interrupted during tab
switching before this last upload; finish that upload and purge, then recheck
the production assets and selected-card bounds. Do not confuse the two ZIPs.

Current deployed assets: `app-BvG1qdIN.js`, `main-Dd6r3ZPu.css`.
Prepared alignment-fix assets: `app-DIYgFKm9.js`, `main-CZWHpKX4.css`.
The gallery chunk is `video-gallery-DwvgG0xs.js` in both packages.
No fresh Lighthouse or OS-level reduced-motion test was performed. Existing
third-party GHL/Cloudflare console errors were observed; no new theme error was
identified. Spanish gallery labels translate, but the pre-existing document
language attribute remains `en-US` on the Spanish query preview; that is outside
this release's layout scope and should be reviewed separately.

The user explicitly authorized Home and Videos navigation, gallery publication,
theme export/deployment and restoration of the three image-based service explorers.
This supersedes earlier navigation restrictions and gallery proposal-only status.
The new gallery reuses the six approved hosted videos and existing accessible
playback dialog, with Masonry, Editorial and Cinema views. Capital/Estate/Concierge
render all 6/6/7 services and images from the current bilingual approved copy.
Neither Concierge video placement nor Mandate order was changed. No GHL edits,
messages, workflow activation, commits or pushes are included in this release.

Build and PHP lint passed. An isolated actual-template preflight verified both
languages and 20 responsive page cases; Local WordPress was not available, so this
is not represented as local WordPress runtime QA. Deployment and production proof
are recorded separately in `output/solanique-release-2026-10-21-gallery/`.

The user separately authorized exporting/uploading the current theme, authorized
SCR08 Chrome autofill login, and confirmed an existing backup export on the PC.
Backup existence was user-confirmed; no new live backup or restore test was made.
WordPress reported "Theme updated successfully" after replacing the active
Solanique theme with `solanique-production-2026-10-21.zip`. Production runs
WordPress 7.1.3/PHP 8.3.35, meeting the package requirements.

LiteSpeed initially served stale Estate markup. A fresh request showed the new
composition; the existing plugin's Purge All action then reported successful
purging. Ordinary public URLs subsequently served the new structure and current
`app-C9gkLzDr.js` / `main-BFOi9bq2.css` assets. No cache optimization/security
settings, plugins, WordPress page content or navigation settings were changed.

Release smoke checks covered Home, Capital, Estate, Concierge, The Mandate,
Inquiry and Solanique Club at 320, 390 and 1440px. All 21 checks found one h1,
no page horizontal overflow, no broken already-loaded images and no empty/#-only
links. All four GHL dialogs were separately opened at those three widths: correct
form IDs, one embed script per page, no outer or iframe horizontal overflow,
and Escape closing with focus returned to the opener. No test submissions,
messages or workflow activation occurred. History immediately follows
Mission/Vision on the deployed Mandate page.

These are smoke checks, not full copy, accessibility, performance or delivery
certification. Lazy images not requested in the viewport are not certified by
the loaded-image check. GHL's Cloudflare challenge frames still emitted third-party
console warnings/errors; no security controls were bypassed. No new Lighthouse,
reduced-motion or end-to-end acknowledgment test was run for this release.
Terms content/routes and other approval-dependent items below remain unresolved.

The release ZIP and proof live outside the theme in WordPress-root
`output/solanique-release-2026-10-21/`. It includes the native update-success
screenshot, cache-purge proof, 21-page-check JSON, 12-dialog-check JSON and mobile
and desktop screenshots. Runtime files were unchanged after packaging; only local
project notes were updated. No commit/push or workflow publication was performed.

## Complete / Currently Verified

- [x] Preserve the existing dirty worktree, approved copy and visual system.
  This pass changes project documentation and GHL draft guards, not site layouts.
- [x] Confirm the four live English click-only dialog mappings in `inc/crm.php`.
  The separate disabled planning manifest must not be enabled as a duplicate.
- [x] Reopen all four existing acknowledgment workflows and saved branded emails.
  Keep approved subjects, body wording, logo, signatures and department senders.
- [x] Save form-specific, consented Email-only triggers and pre-email guards in
  those same workflows. Reopen saved guards; negative branches end without email.
- [x] Recheck all four SMS steps as Disabled and all workflows as Draft, with
  zero total and active enrollments in the final workflow list.
- [x] Recheck all four form notification panels: correct department recipient,
  internal notification ON, form autoresponder OFF. No duplicate alerts added.
- [x] Recheck all four workflow settings: re-entry ON, multiple opportunities ON,
  Stop on response OFF, specific sending window OFF, mark-as-read OFF. Leave these
  settings unchanged pending repeat-send policy approval.
- [x] Inspect sender service and reply settings without changing them.
- [x] Confirm approved social URLs and six approved hosted videos are already
  supplied. They are not missing client inputs.

## Exact Form / Department / Workflow Mapping

| Department | Form ID | Sender and internal alert | Workflow ID |
| --- | --- | --- | --- |
| Capital | `A09fGOKG0qMdqOm3kNBF` | `capital@solaniquegroup.com` | `66a3da18-cee4-4823-9d30-2740ba4456d8` |
| Estates | `ZkIp2RDdL2MT2ZiwUABK` | `estate@solaniquegroup.com` | `eac5e5ef-ee7f-4ea5-87f8-a37450294426` |
| Concierge | `mLgnoua7O94pvh4kYsFc` | `concierge@solaniquegroup.com` | `0b8a2cd5-f025-4edc-bb2b-89a95c660d6d` |
| Inquiry | `7RZNMVuqafSzVAnKkhn4` | `inquiry@solaniquegroup.com` | `d13a284a-a114-48d9-9c4c-40b9f1f32c04` |

From name: Solanique Group. Estates deliberately uses singular `estate`.
Route by the submitted form, never by the contact's original source.

## Saved Email-Only Logic

1. Form Submitted trigger: matching form AND Terms and Conditions = Yes AND
   Preferred Contact Method = Email.
2. Immediately before the existing email, `Email acknowledgment eligibility`:
   DND enabled channels does not include Email AND current Preferred Contact
   Method is Email AND contact Email is not empty.
3. `Eligible for email` reaches the original approved acknowledgment. The old
   SMS step remains Disabled; its draft wording is preserved.
4. `No automatic email` ends. Phone, WhatsApp, blank preference, absent submitted
   consent or Email DND must not generate an acknowledgment. Form-level alerts
   remain separate for manual handling regardless of preferred contact channel.

Consent is checked at submission by the trigger. GHL did not expose that
submission consent field in the If/Else selector; do not describe the guard as
rechecking a live consent record. There are no wait steps between guard and email.
Current preference, email and channel DND are read from the shared contact record,
not an immutable per-submission snapshot. Concurrent submissions and subsequent
preference changes therefore require controlled tests before launch.

GHL's documented email action behavior also skips outbound Email DND. This was
not established by a new delivery test in this pass. No DND resets, verification
upsells, promotional permissions or opt-out bypasses were added.

Reference: [GHL email DND behavior](https://help.gohighlevel.com/support/solutions/articles/155000008249-auto-enable-email-dnd-when-a-contact-s-email-bounces).

## Approval-Dependent Decisions

- [ ] Repeat-send policy: current Allow re-entry = ON permits another run after
  completion; a submission while already enrolled is skipped according to the
  settings UI. No cooldown, per-submission idempotency key or deduplication action
  was added. Confirm acknowledgment for every new eligible inquiry versus once
  per contact/department. Multiple opportunities is also ON; there is no
  opportunity trigger in these form workflows. Do not change it silently.
- [ ] Reply handling: no Reply Address override, forwarding address or BCC is
  configured; forwarding to assigned user is OFF. Confirm GHL Conversations versus
  direct department mailbox replies. The UI warns that a Reply Address override
  prevents reply conversation tracking. Do not alter routing until approved.
- [ ] Lead ownership: no approved staff assignment target was provided. Existing
  assignments are untouched; department alerts are not owner assignment.
- [ ] Spanish intake: approve translated labels, options, consent, validation,
  success messages, sender copy and language-specific form IDs. Reuse approved
  bilingual service headings, but do not invent the missing form translations.
- [ ] Investor Admission / Capital, Estate and Concierge JV applications: approve
  fields, destinations, consent and form IDs. Do not use sales forms as applications.
- [ ] Media: confirm gallery route/location/navigation label, selected videos and
  Concierge placement. Preserve the six approved WordPress uploads and masters;
  do not request them again. Only Concierge currently calls a service video slot
  in local page composition; other placements remain manifest-ready after audit
  corrections. Optimize playback copies only after placement approval.
- [ ] Obtain separate authorization for tests, workflow publication, commits,
  pushes, exports and deployment. Earlier test permissions were already consumed.

## Blocked / Unverified Before Launch

- [ ] Sender authentication: GHL currently reports `send.lcmsgsndr.com` as a
  shared sending domain. Solanique From-domain SPF/DKIM/DMARC alignment has not been
  verified; prior inbox receipt is not proof. Obtain authorized domain/admin
  review before changing DNS, billing or global settings.
- [ ] Reply delivery: current settings were read, not tested. Confirm the chosen
  reply destination and run an approved reply test after routing is approved.
- [ ] Terms: inspect the actual production WordPress page/editor body. The
  documented `/terms-conditions/` route failed to load in the browser this pass
  (`ERR_HTTP_RESPONSE_CODE_FAILURE`; exact HTTP status unknown). The homepage
  footer displayed Privacy Policy but no Terms link. A PHP fallback does not prove
  the actual database is empty. Obtain approved copy if it is absent; do not
  invent legal language or merely hide a public pending notice.
- [ ] Verify any required additional broker/disclosure wording with the client.
  Existing supplied credentials and `BROKERAGE: #12052` are not missing; no extra
  license numbers or claims may be invented.
- [ ] Construction affiliation remains pending company name, approved logo,
  authorization and category/description if the client still wants it.
- [ ] CRM data ownership: validate account access, field export completeness,
  costs/security posture and a Solanique-controlled backup/export procedure.
- [ ] Client sign-off: page-specific screenshot review with Sandra; preserve
  History immediately after Mission/Vision unless explicitly changed. Keep any
  Solani/Solanic spelling change unimplemented pending explicit brand approval.
- [ ] Production parity: the public homepage inspected this pass still displayed
  older repeated content blocks and two video placements not matching local audit
  corrections. This does not identify the deployed commit or exclude cache effects.
  Review version/cache/database overrides before a separately approved release.
- [ ] Final responsive, keyboard, reduced-motion, link/media and Lighthouse QA on
  the approved build and actual production. No new score is claimed here.

## Evidence and Test Boundaries

Evidence is outside the theme at WordPress-root
`output/solanique-finalization-2026-10-21/`: saved guards/canvases, workflow list,
four notification panels, four workflow settings, sender service/reply settings
and production homepage snapshot. Keep these local; do not package private CRM
evidence or test-contact data in the theme export.

This pass sent zero emails/SMS/WhatsApp messages, made zero form submissions and
enrolled zero contacts. All workflows remain unpublished. October 18 action-test
success and user-confirmed inbox receipt remain historical results, not evidence
that the new guards have run from real form submissions. Capital and Estates
saved email previews were rechecked for loaded logo and bounded desktop content;
Concierge and Inquiry saved message content was reopened. No new cross-client
Outlook/Gmail/mobile inbox rendering test was performed.

Current artifact checks: `npm run build` passed with Vite 8.1.2, generating
`main-BFOi9bq2.css` (300.59 kB; 39.09 kB gzip) and `app-C9gkLzDr.js`
(14.12 kB; 4.51 kB gzip). PHP 8.3.30 syntax checks passed for 35 files: current
changed/new PHP files plus `inc/crm.php` and `page-terms-conditions.php`.
`git diff --check` passed. No distribution files were manually edited. These
checks do not establish runtime PHP-warning absence, new browser-console
cleanliness, responsive behavior or Lighthouse scores. No new local layout or
Lighthouse run was performed during this Sections 1-2 configuration pass.

After fresh scoped approval, test each department with: eligible Email+consent;
unchecked consent; Phone; WhatsApp; missing preference; Email DND/unsubscribed;
empty email if the form permits it; repeat after completion; rapid/concurrent
cross-department submissions; department alert delivery; and acknowledgment reply.
Record expected outcome, actual form event, execution branch, message log and
confirmed inbox receipt separately. Tests requiring workflow activation need
explicit limited activation approval and a plan to return to Draft.

## Release and Rollback Gate

- [ ] Complete decisions and missing-input checks above, then approve a bounded
  test plan. Manual department follow-up remains the fallback while drafts are off.
- [ ] Snapshot current theme, WordPress database/settings and approved GHL
  workflow configurations before any authorized release. Document restore steps.
- [ ] Run build and PHP checks; review the accumulated local diff without reverting
  client changes. Perform responsive and performance QA on that exact artifact.
- [ ] Obtain separate release authorization, then prepare a clean theme ZIP using
  the existing export checklist. Exclude output evidence, local previews, private
  data, dependencies, reference/review/incoming assets and repository metadata.
- [ ] After authorized deployment, verify production content, form mapping,
  legal routes, logo URLs used by received emails and performance. Keep a known
  good theme/database backup for rollback; do not remove a public logo asset used
  by already-sent emails. Workflow rollback is return to Draft, not SMS activation.

Optional enhancements, not blockers to an approved English email-only launch:
SMS/WhatsApp sending, promotional campaigns, additional social platforms, new
partner logos, broader editor controls and video galleries not yet approved.
