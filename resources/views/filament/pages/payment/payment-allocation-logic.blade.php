<x-filament-panels::page>
<div>
<style>
    .pal-hero {
        background: linear-gradient(135deg, #1e3a5f 0%, #0f2744 60%, #0a1628 100%);
        border-radius: 1rem;
        padding: 2rem 2.5rem;
        position: relative;
        overflow: hidden;
        margin-bottom: 1.5rem;
    }
    .pal-hero::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 220px; height: 220px;
        border-radius: 50%;
        background: rgba(251, 191, 36, 0.08);
    }
    .pal-hero::after {
        content: '';
        position: absolute;
        bottom: -40px; left: 30%;
        width: 140px; height: 140px;
        border-radius: 50%;
        background: rgba(251, 191, 36, 0.05);
    }
    .pal-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(251, 191, 36, 0.15);
        border: 1px solid rgba(251, 191, 36, 0.3);
        color: #fbbf24;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 4px 12px;
        border-radius: 999px;
        margin-bottom: 0.75rem;
    }
    .pal-hero-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #fff;
        margin: 0 0 0.4rem;
        letter-spacing: -0.02em;
    }
    .pal-hero-sub {
        color: rgba(255,255,255,0.55);
        font-size: 0.875rem;
        margin: 0;
    }
    .pal-stats {
        display: flex;
        gap: 1.5rem;
        margin-top: 1.5rem;
        flex-wrap: wrap;
    }
    .pal-stat {
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 0.75rem;
        padding: 0.75rem 1.25rem;
        min-width: 120px;
    }
    .pal-stat-value {
        font-size: 1.4rem;
        font-weight: 800;
        color: #fbbf24;
        line-height: 1;
    }
    .pal-stat-label {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.45);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-top: 3px;
    }

    .pal-priority-banner {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 1px 4px rgba(0,0,0,0.04);
    }
    .dark .pal-priority-banner {
        background: #1f2937;
        border-color: rgba(255,255,255,0.07);
    }
    .pal-priority-label {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #6b7280;
        margin-bottom: 1rem;
    }
    .pal-flow {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex-wrap: wrap;
    }
    .pal-step {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 0.75rem;
        padding: 0.75rem 1.1rem;
        min-width: 140px;
        transition: box-shadow 0.2s;
    }
    .dark .pal-step {
        background: #111827;
        border-color: rgba(255,255,255,0.08);
    }
    .pal-step:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.08); }
    .pal-step-num {
        width: 26px; height: 26px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.7rem;
        font-weight: 800;
        flex-shrink: 0;
        color: #fff;
    }
    .pal-step-name {
        font-size: 0.82rem;
        font-weight: 700;
        color: #111827;
        line-height: 1;
    }
    .dark .pal-step-name { color: #f9fafb; }
    .pal-step-sub {
        font-size: 0.68rem;
        color: #9ca3af;
        margin-top: 2px;
    }
    .pal-arrow { color: #d1d5db; font-size: 1.1rem; }
    .pal-override-note {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #fffbeb;
        border: 1px solid #fde68a;
        color: #b45309;
        font-size: 0.72rem;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 999px;
        margin-top: 0.75rem;
        cursor: pointer;
        transition: background 0.15s;
    }
    .pal-override-note:hover { background: #fef3c7; }

    .pal-section-label {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #6b7280;
        margin-bottom: 0.75rem;
        padding-left: 2px;
    }

    .pal-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1rem;
    }

    .pal-card {
        background: #fff;
        border-radius: 0.875rem;
        border: 1px solid #f0f0f0;
        padding: 1.4rem;
        box-shadow: 0 1px 4px rgba(0,0,0,0.04);
        transition: all 0.2s ease;
        position: relative;
        overflow: hidden;
    }
    .dark .pal-card {
        background: #1f2937;
        border-color: rgba(255,255,255,0.07);
    }
    .pal-card:hover {
        box-shadow: 0 6px 24px rgba(0,0,0,0.09);
        transform: translateY(-2px);
        border-color: #e5e7eb;
    }
    .pal-card-accent {
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        border-radius: 0.875rem 0.875rem 0 0;
    }
    .pal-card-icon-wrap {
        width: 42px; height: 42px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 1rem;
    }
    .pal-card-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 0.35rem;
    }
    .dark .pal-card-title { color: #f9fafb; }
    .pal-card-desc {
        font-size: 0.8rem;
        color: #6b7280;
        line-height: 1.5;
        margin-bottom: 1.1rem;
    }
    .pal-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 0.9rem;
        border-top: 1px solid #f3f4f6;
    }
    .dark .pal-card-footer { border-color: rgba(255,255,255,0.06); }

    .pal-pill-list { display: flex; gap: 0.4rem; flex-wrap: wrap; margin-bottom: 1rem; }
    .pal-pill { font-size: 0.68rem; font-weight: 600; padding: 3px 9px; border-radius: 999px; }

    .pal-btn {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 7px;
        border: none;
        cursor: pointer;
        transition: all 0.15s;
        font-family: inherit;
    }
    .pal-btn:hover { filter: brightness(1.08); transform: scale(1.02); }
    .pal-btn-warning { background: #f59e0b; color: #fff; }
    .pal-btn-danger  { background: #ef4444; color: #fff; }
    .pal-btn-success { background: #10b981; color: #fff; }
    .pal-tag { font-size: 0.65rem; font-weight: 600; padding: 3px 8px; border-radius: 999px; }

    /* Modal */
    .pal-modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.5);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }
    .pal-modal-overlay.pal-open { display: flex; }
    .pal-modal {
        background: #fff;
        border-radius: 1rem;
        width: 100%;
        max-width: 520px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        overflow: hidden;
    }
    .dark .pal-modal { background: #1f2937; }
    .pal-modal-header {
        padding: 1.25rem 1.5rem 1rem;
        border-bottom: 1px solid #f3f4f6;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }
    .dark .pal-modal-header { border-color: rgba(255,255,255,0.06); }
    .pal-modal-title { font-size: 0.95rem; font-weight: 800; color: #111827; }
    .dark .pal-modal-title { color: #f9fafb; }
    .pal-modal-sub { font-size: 0.72rem; color: #6b7280; margin-top: 2px; }
    .pal-modal-close {
        width: 28px; height: 28px;
        border-radius: 7px;
        border: none;
        background: #f3f4f6;
        cursor: pointer;
        font-size: 1rem;
        color: #6b7280;
        display: flex; align-items: center; justify-content: center;
    }
    .pal-modal-close:hover { background: #e5e7eb; }
    .pal-modal-body { padding: 1.5rem; max-height: 60vh; overflow-y: auto; }
    .pal-modal-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid #f3f4f6;
        display: flex;
        gap: 0.5rem;
        justify-content: flex-end;
    }
    .dark .pal-modal-footer { border-color: rgba(255,255,255,0.06); }

    .pal-form-group { margin-bottom: 1rem; }
    .pal-form-label { display: block; font-size: 0.73rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem; }
    .dark .pal-form-label { color: #d1d5db; }
    .pal-form-input, .pal-form-select, .pal-form-textarea {
        width: 100%;
        padding: 0.55rem 0.8rem;
        border: 1.5px solid #e5e7eb;
        border-radius: 0.5rem;
        font-size: 0.82rem;
        color: #111827;
        background: #fff;
        transition: border-color 0.15s;
        font-family: inherit;
    }
    .dark .pal-form-input, .dark .pal-form-select, .dark .pal-form-textarea {
        background: #111827; border-color: rgba(255,255,255,0.1); color: #f9fafb;
    }
    .pal-form-input:focus, .pal-form-select:focus, .pal-form-textarea:focus {
        outline: none; border-color: #1e3a5f; box-shadow: 0 0 0 3px rgba(30,58,95,0.08);
    }
    .pal-form-textarea { resize: vertical; min-height: 80px; }
    .pal-form-hint { font-size: 0.68rem; color: #9ca3af; margin-top: 0.25rem; }

    .pal-toggle-row { display: flex; align-items: center; justify-content: space-between; padding: 0.7rem 0; border-bottom: 1px solid #f9fafb; }
    .pal-toggle-row:last-child { border-bottom: none; }
    .pal-toggle-name { font-size: 0.82rem; font-weight: 600; color: #111827; }
    .dark .pal-toggle-name { color: #f9fafb; }
    .pal-toggle-desc { font-size: 0.7rem; color: #9ca3af; margin-top: 1px; }
    .pal-toggle { position: relative; width: 38px; height: 22px; flex-shrink: 0; }
    .pal-toggle input { opacity: 0; width: 0; height: 0; }
    .pal-toggle-slider { position: absolute; inset: 0; background: #d1d5db; border-radius: 999px; cursor: pointer; transition: 0.2s; }
    .pal-toggle-slider::before { content: ''; position: absolute; height: 16px; width: 16px; left: 3px; bottom: 3px; background: #fff; border-radius: 50%; transition: 0.2s; box-shadow: 0 1px 3px rgba(0,0,0,0.2); }
    .pal-toggle input:checked + .pal-toggle-slider { background: #10b981; }
    .pal-toggle input:checked + .pal-toggle-slider::before { transform: translateX(16px); }

    .pal-badge { display: inline-flex; align-items: center; padding: 2px 8px; border-radius: 999px; font-size: 0.65rem; font-weight: 700; }
    .pal-badge-success { background: #ecfdf5; color: #059669; }
    .pal-badge-danger  { background: #fef2f2; color: #dc2626; }
    .pal-badge-warning { background: #fffbeb; color: #d97706; }

    .pal-log-table { width: 100%; border-collapse: collapse; font-size: 0.78rem; }
    .pal-log-table th { text-align: left; padding: 0.45rem 0.7rem; background: #f9fafb; color: #6b7280; font-size: 0.67rem; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase; border-bottom: 1px solid #f0f0f0; }
    .pal-log-table td { padding: 0.6rem 0.7rem; border-bottom: 1px solid #f9fafb; color: #374151; }
    .dark .pal-log-table td { color: #d1d5db; border-color: rgba(255,255,255,0.05); }
    .pal-log-table tr:last-child td { border-bottom: none; }
    .pal-log-table tr:hover td { background: #fafafa; }

    /* Priority list items */
    .pal-priority-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        margin-bottom: 0.5rem;
    }
    .dark .pal-priority-item { background: #111827; border-color: rgba(255,255,255,0.08); }
    .pal-priority-item:last-child { margin-bottom: 0; }

    .pal-toast {
        position: fixed;
        bottom: 1.5rem; right: 1.5rem;
        background: #111827; color: #fff;
        padding: 0.7rem 1.2rem;
        border-radius: 0.75rem;
        font-size: 0.8rem; font-weight: 600;
        display: flex; align-items: center; gap: 0.5rem;
        z-index: 99999;
        transform: translateY(80px); opacity: 0;
        transition: all 0.3s ease;
        box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        pointer-events: none;
    }
    .pal-toast.pal-toast-show { transform: translateY(0); opacity: 1; }
    .pal-toast-dot { width: 18px; height: 18px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.65rem; flex-shrink: 0; }
    .pal-toast-success .pal-toast-dot { background: #10b981; }
    .pal-toast-danger .pal-toast-dot  { background: #ef4444; }
    .pal-toast-warning .pal-toast-dot { background: #f59e0b; }

    @media (max-width: 640px) {
        .pal-hero { padding: 1.5rem; }
        .pal-hero-title { font-size: 1.3rem; }
        .pal-stats { gap: 0.75rem; }
        .pal-stat { min-width: 90px; }
        .pal-step { min-width: 120px; }
    }
</style>

    {{-- Hero Header --}}
    <div class="pal-hero">
        <div class="pal-hero-badge">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor"><circle cx="5" cy="5" r="5"/></svg>
            Payment Management
        </div>
        <h1 class="pal-hero-title">Payment Allocation Logic</h1>
        <p class="pal-hero-sub">Configure how payments are distributed across interest, principal, and penalties — with override controls.</p>
        <div class="pal-stats">
            <div class="pal-stat">
                <div class="pal-stat-value" id="pal-stat-mode">Auto</div>
                <div class="pal-stat-label">Allocation Mode</div>
            </div>
            <div class="pal-stat">
                <div class="pal-stat-value">3</div>
                <div class="pal-stat-label">Priority Levels</div>
            </div>
            <div class="pal-stat">
                <div class="pal-stat-value" id="pal-stat-voids">0</div>
                <div class="pal-stat-label">Pending Voids</div>
            </div>
        </div>
    </div>

    {{-- Priority Flow --}}
    <div class="pal-priority-banner">
        <div class="pal-priority-label">Default Allocation Priority —
            <span style="color:#2563eb;cursor:pointer;" onclick="palOpenModal('pal-modal-priority')">click to reorder</span>
        </div>
        <div class="pal-flow">
            <div class="pal-step">
                <div class="pal-step-num" style="background:#1e3a5f;" id="pal-snum-0">1</div>
                <div>
                    <div class="pal-step-name" id="pal-sname-0">Interest</div>
                    <div class="pal-step-sub" id="pal-ssub-0">Applied first</div>
                </div>
            </div>
            <div class="pal-arrow">→</div>
            <div class="pal-step">
                <div class="pal-step-num" style="background:#2563eb;" id="pal-snum-1">2</div>
                <div>
                    <div class="pal-step-name" id="pal-sname-1">Principal</div>
                    <div class="pal-step-sub" id="pal-ssub-1">Loan balance</div>
                </div>
            </div>
            <div class="pal-arrow">→</div>
            <div class="pal-step">
                <div class="pal-step-num" style="background:#7c3aed;" id="pal-snum-2">3</div>
                <div>
                    <div class="pal-step-name" id="pal-sname-2">Penalties</div>
                    <div class="pal-step-sub" id="pal-ssub-2">Applied last</div>
                </div>
            </div>
        </div>
        <div class="pal-override-note" onclick="palOpenModal('pal-modal-priority')">
            <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
            Manual override available — admin can reorder allocation per payment
        </div>
    </div>

    {{-- Feature Cards --}}
    <p class="pal-section-label">Allocation Features</p>
    <div class="pal-grid">

        {{-- Partial & Advance Payments --}}
        <div class="pal-card">
            <div class="pal-card-accent" style="background: linear-gradient(90deg,#d97706,#fbbf24);"></div>
            <div class="pal-card-icon-wrap" style="background:#fffbeb;">
                <svg class="h-5 w-5" style="color:#d97706;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
            </div>
            <div class="pal-card-title">Partial &amp; Advance Payments</div>
            <div class="pal-pill-list">
                <span class="pal-pill" style="background:#fffbeb;color:#b45309;">Partial</span>
                <span class="pal-pill" style="background:#ecfdf5;color:#047857;">Advance</span>
                <span class="pal-pill" style="background:#eff6ff;color:#1d4ed8;">Overpayment</span>
            </div>
            <div class="pal-card-desc">Full support for partial, advance, and overpayments with automatic carry-forward to the next due date.</div>
            <div class="pal-card-footer">
                <button class="pal-btn pal-btn-warning" onclick="palOpenModal('pal-modal-partial')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Configure
                </button>
                <span class="pal-tag" style="background:#fffbeb;color:#b45309;">Auto carry-forward</span>
            </div>
        </div>

        {{-- Void / Edit Payments --}}
        <div class="pal-card">
            <div class="pal-card-accent" style="background: linear-gradient(90deg,#dc2626,#f87171);"></div>
            <div class="pal-card-icon-wrap" style="background:#fef2f2;">
                <svg class="h-5 w-5" style="color:#dc2626;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="pal-card-title">Void / Edit Payments</div>
            <div class="pal-pill-list">
                <span class="pal-pill" style="background:#fef2f2;color:#b91c1c;">Void</span>
                <span class="pal-pill" style="background:#fff7ed;color:#c2410c;">Edit</span>
                <span class="pal-pill" style="background:#f3f4f6;color:#374151;">Audit Log</span>
            </div>
            <div class="pal-card-desc">Void or edit posted payments with mandatory reason entry. Every change is permanently logged with user and timestamp.</div>
            <div class="pal-card-footer">
                <button class="pal-btn pal-btn-danger" onclick="palOpenModal('pal-modal-void')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Manage Voids
                </button>
                <span class="pal-tag" style="background:#fef2f2;color:#b91c1c;">Reason required</span>
            </div>
        </div>

        {{-- Auto-Apply to Loan --}}
        <div class="pal-card">
            <div class="pal-card-accent" style="background: linear-gradient(90deg,#059669,#34d399);"></div>
            <div class="pal-card-icon-wrap" style="background:#ecfdf5;">
                <svg class="h-5 w-5" style="color:#059669;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
            </div>
            <div class="pal-card-title">Auto-Apply to Loan</div>
            <div class="pal-pill-list">
                <span class="pal-pill" style="background:#ecfdf5;color:#047857;">Auto-match</span>
                <span class="pal-pill" style="background:#eff6ff;color:#1d4ed8;">Override</span>
            </div>
            <div class="pal-card-desc">Automatically matches and applies payments to the correct loan account. Admin can manually override the target account if needed.</div>
            <div class="pal-card-footer">
                <button class="pal-btn pal-btn-success" onclick="palOpenModal('pal-modal-rules')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    View Rules
                </button>
                <span class="pal-tag" style="background:#ecfdf5;color:#047857;">Smart matching</span>
            </div>
        </div>

    </div>

    {{-- ============ MODALS ============ --}}

    {{-- Priority Reorder Modal --}}
    <div class="pal-modal-overlay" id="pal-modal-priority" onclick="palBgClose(event,'pal-modal-priority')">
        <div class="pal-modal">
            <div class="pal-modal-header">
                <div><div class="pal-modal-title">Allocation Priority Order</div><div class="pal-modal-sub">Use ▲ ▼ to reorder</div></div>
                <button class="pal-modal-close" onclick="palCloseModal('pal-modal-priority')">✕</button>
            </div>
            <div class="pal-modal-body">
                <div style="font-size:.78rem;color:#6b7280;margin-bottom:1rem;">Set the order in which payment amounts are applied across all auto-allocations.</div>
                <div id="pal-priority-list">
                    <div class="pal-priority-item" data-name="Interest">
                        <span style="color:#9ca3af;font-size:1.1rem;">⠿</span>
                        <div style="width:26px;height:26px;border-radius:50%;background:#1e3a5f;display:flex;align-items:center;justify-content:center;color:#fff;font-size:.7rem;font-weight:800;" class="pal-pnum">1</div>
                        <div style="flex:1;"><div style="font-size:.85rem;font-weight:700;color:#111827;">Interest</div><div style="font-size:.7rem;color:#9ca3af;">Accrued interest charges</div></div>
                        <div style="display:flex;flex-direction:column;gap:2px;">
                            <button onclick="palMovePriority(this,-1)" style="border:none;background:#e5e7eb;border-radius:4px;padding:2px 6px;cursor:pointer;font-size:.7rem;">▲</button>
                            <button onclick="palMovePriority(this,1)"  style="border:none;background:#e5e7eb;border-radius:4px;padding:2px 6px;cursor:pointer;font-size:.7rem;">▼</button>
                        </div>
                    </div>
                    <div class="pal-priority-item" data-name="Principal">
                        <span style="color:#9ca3af;font-size:1.1rem;">⠿</span>
                        <div style="width:26px;height:26px;border-radius:50%;background:#2563eb;display:flex;align-items:center;justify-content:center;color:#fff;font-size:.7rem;font-weight:800;" class="pal-pnum">2</div>
                        <div style="flex:1;"><div style="font-size:.85rem;font-weight:700;color:#111827;">Principal</div><div style="font-size:.7rem;color:#9ca3af;">Outstanding loan balance</div></div>
                        <div style="display:flex;flex-direction:column;gap:2px;">
                            <button onclick="palMovePriority(this,-1)" style="border:none;background:#e5e7eb;border-radius:4px;padding:2px 6px;cursor:pointer;font-size:.7rem;">▲</button>
                            <button onclick="palMovePriority(this,1)"  style="border:none;background:#e5e7eb;border-radius:4px;padding:2px 6px;cursor:pointer;font-size:.7rem;">▼</button>
                        </div>
                    </div>
                    <div class="pal-priority-item" data-name="Penalties">
                        <span style="color:#9ca3af;font-size:1.1rem;">⠿</span>
                        <div style="width:26px;height:26px;border-radius:50%;background:#7c3aed;display:flex;align-items:center;justify-content:center;color:#fff;font-size:.7rem;font-weight:800;" class="pal-pnum">3</div>
                        <div style="flex:1;"><div style="font-size:.85rem;font-weight:700;color:#111827;">Penalties</div><div style="font-size:.7rem;color:#9ca3af;">Late fees and charges</div></div>
                        <div style="display:flex;flex-direction:column;gap:2px;">
                            <button onclick="palMovePriority(this,-1)" style="border:none;background:#e5e7eb;border-radius:4px;padding:2px 6px;cursor:pointer;font-size:.7rem;">▲</button>
                            <button onclick="palMovePriority(this,1)"  style="border:none;background:#e5e7eb;border-radius:4px;padding:2px 6px;cursor:pointer;font-size:.7rem;">▼</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pal-modal-footer">
                <button class="pal-btn" style="background:#f3f4f6;color:#374151;" onclick="palCloseModal('pal-modal-priority')">Cancel</button>
                <button class="pal-btn pal-btn-success" onclick="palSavePriority()">Save Priority Order</button>
            </div>
        </div>
    </div>

    {{-- Partial Payment Settings Modal --}}
    <div class="pal-modal-overlay" id="pal-modal-partial" onclick="palBgClose(event,'pal-modal-partial')">
        <div class="pal-modal">
            <div class="pal-modal-header">
                <div><div class="pal-modal-title">Partial &amp; Advance Payment Settings</div><div class="pal-modal-sub">Configure rules for non-standard payments</div></div>
                <button class="pal-modal-close" onclick="palCloseModal('pal-modal-partial')">✕</button>
            </div>
            <div class="pal-modal-body">
                <div class="pal-toggle-row"><div><div class="pal-toggle-name">Allow Partial Payments</div><div class="pal-toggle-desc">Members can pay less than the due amount</div></div><label class="pal-toggle"><input type="checkbox" checked><span class="pal-toggle-slider"></span></label></div>
                <div class="pal-toggle-row"><div><div class="pal-toggle-name">Allow Advance Payments</div><div class="pal-toggle-desc">Members can pay future installments early</div></div><label class="pal-toggle"><input type="checkbox" checked><span class="pal-toggle-slider"></span></label></div>
                <div class="pal-toggle-row"><div><div class="pal-toggle-name">Auto Carry-Forward Overpayment</div><div class="pal-toggle-desc">Apply excess to next due amount</div></div><label class="pal-toggle"><input type="checkbox" checked><span class="pal-toggle-slider"></span></label></div>
                <div class="pal-toggle-row"><div><div class="pal-toggle-name">Notify Member on Carry-Forward</div><div class="pal-toggle-desc">Send SMS/email when carry-forward applied</div></div><label class="pal-toggle"><input type="checkbox"><span class="pal-toggle-slider"></span></label></div>
                <div class="pal-form-group" style="margin-top:1rem;"><label class="pal-form-label">Minimum Partial Payment (%)</label><input class="pal-form-input" type="number" min="1" max="100" value="25"><div class="pal-form-hint">Minimum % of due amount accepted as partial payment.</div></div>
                <div class="pal-form-group"><label class="pal-form-label">Max Advance Months</label><input class="pal-form-input" type="number" min="1" max="24" value="3"><div class="pal-form-hint">How many months ahead a member can pay.</div></div>
            </div>
            <div class="pal-modal-footer">
                <button class="pal-btn" style="background:#f3f4f6;color:#374151;" onclick="palCloseModal('pal-modal-partial')">Cancel</button>
                <button class="pal-btn pal-btn-warning" onclick="palSaveToast('pal-modal-partial','Partial payment settings saved.')">Save Settings</button>
            </div>
        </div>
    </div>

    {{-- Void / Edit Modal --}}
    <div class="pal-modal-overlay" id="pal-modal-void" onclick="palBgClose(event,'pal-modal-void')">
        <div class="pal-modal" style="max-width:580px;">
            <div class="pal-modal-header">
                <div><div class="pal-modal-title">Void / Edit Payments</div><div class="pal-modal-sub">Manage posted payment corrections</div></div>
                <button class="pal-modal-close" onclick="palCloseModal('pal-modal-void')">✕</button>
            </div>
            <div class="pal-modal-body">
                <div style="display:flex;gap:.5rem;margin-bottom:1rem;">
                    <input class="pal-form-input" type="text" placeholder="Search loan # or reference…" style="flex:1;">
                    <select class="pal-form-select" style="width:auto;"><option>All</option><option>Void</option><option>Edit</option></select>
                </div>
                <table class="pal-log-table">
                    <thead><tr><th>Loan #</th><th>Amount</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                        <tr><td>#00234</td><td>₱1,500</td><td>Today</td><td><span class="pal-badge pal-badge-success">Posted</span></td><td><button class="pal-btn pal-btn-danger" style="padding:3px 9px;font-size:.68rem;" onclick="palConfirmVoid('#00234',1500)">Void</button></td></tr>
                        <tr><td>#00189</td><td>₱800</td><td>Today</td><td><span class="pal-badge pal-badge-success">Posted</span></td><td><button class="pal-btn pal-btn-danger" style="padding:3px 9px;font-size:.68rem;" onclick="palConfirmVoid('#00189',800)">Void</button></td></tr>
                        <tr><td>#00155</td><td>₱500</td><td>Yesterday</td><td><span class="pal-badge pal-badge-danger">Voided</span></td><td><span style="font-size:.7rem;color:#9ca3af;">—</span></td></tr>
                    </tbody>
                </table>
                <div id="pal-void-form" style="display:none;margin-top:1.25rem;padding-top:1.25rem;border-top:1px solid #f3f4f6;">
                    <div style="font-size:.82rem;font-weight:700;color:#dc2626;margin-bottom:.75rem;">Void Payment <span id="pal-void-label"></span></div>
                    <div class="pal-form-group"><label class="pal-form-label">Void Reason <span style="color:#ef4444;">*</span></label><textarea class="pal-form-textarea" id="pal-void-reason" placeholder="Enter reason for voiding this payment…"></textarea></div>
                    <div style="display:flex;gap:.5rem;">
                        <button class="pal-btn" style="background:#f3f4f6;color:#374151;" onclick="palCancelVoid()">Cancel</button>
                        <button class="pal-btn pal-btn-danger" onclick="palSubmitVoid()">Confirm Void</button>
                    </div>
                </div>
            </div>
            <div class="pal-modal-footer">
                <button class="pal-btn" style="background:#f3f4f6;color:#374151;" onclick="palCloseModal('pal-modal-void')">Close</button>
            </div>
        </div>
    </div>

    {{-- Auto-Apply Rules Modal --}}
    <div class="pal-modal-overlay" id="pal-modal-rules" onclick="palBgClose(event,'pal-modal-rules')">
        <div class="pal-modal">
            <div class="pal-modal-header">
                <div><div class="pal-modal-title">Auto-Apply Rules</div><div class="pal-modal-sub">Configure smart payment matching logic</div></div>
                <button class="pal-modal-close" onclick="palCloseModal('pal-modal-rules')">✕</button>
            </div>
            <div class="pal-modal-body">
                <div class="pal-toggle-row"><div><div class="pal-toggle-name">Match by Reference Number</div><div class="pal-toggle-desc">Use gateway reference to identify loan</div></div><label class="pal-toggle"><input type="checkbox" checked><span class="pal-toggle-slider"></span></label></div>
                <div class="pal-toggle-row"><div><div class="pal-toggle-name">Match by Member Account</div><div class="pal-toggle-desc">Auto-apply to oldest due loan of member</div></div><label class="pal-toggle"><input type="checkbox" checked><span class="pal-toggle-slider"></span></label></div>
                <div class="pal-toggle-row"><div><div class="pal-toggle-name">Allow Manual Override</div><div class="pal-toggle-desc">Admin can redirect payment to different loan</div></div><label class="pal-toggle"><input type="checkbox" checked><span class="pal-toggle-slider"></span></label></div>
                <div class="pal-toggle-row"><div><div class="pal-toggle-name">Flag Unmatched Payments</div><div class="pal-toggle-desc">Alert admin when no match found</div></div><label class="pal-toggle"><input type="checkbox" checked><span class="pal-toggle-slider"></span></label></div>
                <div class="pal-form-group" style="margin-top:1rem;"><label class="pal-form-label">Matching Priority</label>
                    <select class="pal-form-select">
                        <option>Reference Number → Member Account → Manual</option>
                        <option>Member Account → Reference Number → Manual</option>
                        <option>Manual only (no auto-match)</option>
                    </select>
                </div>
            </div>
            <div class="pal-modal-footer">
                <button class="pal-btn" style="background:#f3f4f6;color:#374151;" onclick="palCloseModal('pal-modal-rules')">Cancel</button>
                <button class="pal-btn pal-btn-success" onclick="palSaveToast('pal-modal-rules','Matching rules saved.')">Save Rules</button>
            </div>
        </div>
    </div>

    {{-- Toast --}}
    <div class="pal-toast" id="pal-toast">
        <div class="pal-toast-dot" id="pal-toast-dot">✓</div>
        <span id="pal-toast-msg"></span>
    </div>

    <script>
        function palOpenModal(id)  { document.getElementById(id).classList.add('pal-open'); }
        function palCloseModal(id) { document.getElementById(id).classList.remove('pal-open'); }
        function palBgClose(e, id) { if (e.target === e.currentTarget) palCloseModal(id); }

        var palToastTimer;
        function palToast(msg, type) {
            type = type || 'success';
            var t = document.getElementById('pal-toast');
            t.className = 'pal-toast pal-toast-' + type;
            document.getElementById('pal-toast-dot').textContent = type === 'success' ? '✓' : type === 'warning' ? '!' : '✕';
            document.getElementById('pal-toast-msg').textContent = msg;
            t.classList.add('pal-toast-show');
            clearTimeout(palToastTimer);
            palToastTimer = setTimeout(function() { t.classList.remove('pal-toast-show'); }, 3000);
        }
        function palSaveToast(id, msg) {
            palCloseModal(id);
            setTimeout(function() { palToast(msg, 'success'); }, 200);
        }

        function palMovePriority(btn, dir) {
            var list  = document.getElementById('pal-priority-list');
            var item  = btn.closest('.pal-priority-item');
            var items = Array.prototype.slice.call(list.querySelectorAll('.pal-priority-item'));
            var idx   = items.indexOf(item);
            var newIdx = idx + dir;
            if (newIdx < 0 || newIdx >= items.length) return;
            if (dir === -1) list.insertBefore(item, items[newIdx]);
            else            list.insertBefore(items[newIdx], item);
            list.querySelectorAll('.pal-pnum').forEach(function(n, i) { n.textContent = i + 1; });
        }

        function palSavePriority() {
            var items = Array.prototype.slice.call(document.querySelectorAll('.pal-priority-item'));
            var order = items.map(function(i) { return i.dataset.name; });
            order.forEach(function(name, i) {
                document.getElementById('pal-sname-' + i).textContent = name;
                document.getElementById('pal-snum-'  + i).textContent = i + 1;
            });
            palCloseModal('pal-modal-priority');
            setTimeout(function() { palToast('Priority saved: ' + order.join(' → '), 'success'); }, 200);
        }

        var palCurrentVoid = null;
        function palConfirmVoid(loan, amount) {
            palCurrentVoid = { loan: loan, amount: amount };
            document.getElementById('pal-void-label').textContent = loan + ' (₱' + amount.toLocaleString() + ')';
            document.getElementById('pal-void-form').style.display = 'block';
            document.getElementById('pal-void-reason').value = '';
        }
        function palCancelVoid() {
            palCurrentVoid = null;
            document.getElementById('pal-void-form').style.display = 'none';
        }
        function palSubmitVoid() {
            var reason = document.getElementById('pal-void-reason').value.trim();
            if (reason.length < 10) { palToast('Please provide a reason (min 10 chars).', 'danger'); return; }
            var el = document.getElementById('pal-stat-voids');
            el.textContent = parseInt(el.textContent) + 1;
            var loanRef = palCurrentVoid ? palCurrentVoid.loan : '';
            palCancelVoid();
            palCloseModal('pal-modal-void');
            setTimeout(function() { palToast('Payment ' + loanRef + ' voided and logged.', 'success'); }, 200);
        }
    </script>
</div>
</x-filament-panels::page>