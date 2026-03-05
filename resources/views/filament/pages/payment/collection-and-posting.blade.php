<x-filament-panels::page>
<style>
    .cp-hero {
        background: linear-gradient(135deg, #1e3a5f 0%, #0f2744 60%, #0a1628 100%);
        border-radius: 1rem;
        padding: 2rem 2.5rem;
        position: relative;
        overflow: hidden;
        margin-bottom: 1.5rem;
    }
    .cp-hero::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 220px; height: 220px;
        border-radius: 50%;
        background: rgba(251, 191, 36, 0.08);
    }
    .cp-hero::after {
        content: '';
        position: absolute;
        bottom: -40px; left: 30%;
        width: 140px; height: 140px;
        border-radius: 50%;
        background: rgba(251, 191, 36, 0.05);
    }
    .cp-hero-badge {
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
    .cp-hero-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #fff;
        margin: 0 0 0.4rem;
        letter-spacing: -0.02em;
    }
    .cp-hero-sub {
        color: rgba(255,255,255,0.55);
        font-size: 0.875rem;
        margin: 0;
    }
    .cp-stats {
        display: flex;
        gap: 1.5rem;
        margin-top: 1.5rem;
        flex-wrap: wrap;
    }
    .cp-stat {
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 0.75rem;
        padding: 0.75rem 1.25rem;
        min-width: 120px;
    }
    .cp-stat-value {
        font-size: 1.4rem;
        font-weight: 800;
        color: #fbbf24;
        line-height: 1;
    }
    .cp-stat-label {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.45);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-top: 3px;
    }

    .cp-section-label {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #6b7280;
        margin-bottom: 0.75rem;
        padding-left: 2px;
    }

    .cp-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1rem;
    }

    .cp-card {
        background: #fff;
        border-radius: 0.875rem;
        border: 1px solid #f0f0f0;
        padding: 1.4rem;
        box-shadow: 0 1px 4px rgba(0,0,0,0.04);
        transition: all 0.2s ease;
        position: relative;
        overflow: hidden;
    }
    .dark .cp-card {
        background: #1f2937;
        border-color: rgba(255,255,255,0.07);
    }
    .cp-card:hover {
        box-shadow: 0 6px 24px rgba(0,0,0,0.09);
        transform: translateY(-2px);
        border-color: #e5e7eb;
    }
    .cp-card-accent {
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        border-radius: 0.875rem 0.875rem 0 0;
    }

    .cp-card-icon-wrap {
        width: 42px; height: 42px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 1rem;
        flex-shrink: 0;
    }
    .cp-card-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 0.35rem;
    }
    .dark .cp-card-title { color: #f9fafb; }
    .cp-card-desc {
        font-size: 0.8rem;
        color: #6b7280;
        line-height: 1.5;
        margin-bottom: 1.1rem;
    }
    .cp-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 0.9rem;
        border-top: 1px solid #f3f4f6;
    }
    .dark .cp-card-footer { border-color: rgba(255,255,255,0.06); }
    .cp-btn {
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
        text-decoration: none;
    }
    .cp-btn:hover { filter: brightness(1.08); transform: scale(1.02); }
    .cp-btn-primary { background: #1e3a5f; color: #fff; }
    .cp-btn-warning { background: #f59e0b; color: #fff; }
    .cp-btn-success { background: #10b981; color: #fff; }
    .cp-btn-info    { background: #3b82f6; color: #fff; }
    .cp-btn-gray    { background: #f3f4f6; color: #374151; }
    .dark .cp-btn-gray { background: #374151; color: #d1d5db; }

    .cp-tag {
        font-size: 0.65rem;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 999px;
        letter-spacing: 0.04em;
    }

    .cp-audit-row {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.65rem 0;
        border-bottom: 1px solid #f3f4f6;
        font-size: 0.8rem;
        color: #374151;
    }
    .dark .cp-audit-row { border-color: rgba(255,255,255,0.06); color: #d1d5db; }
    .cp-audit-row:last-child { border-bottom: none; }
    .cp-dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    @media (max-width: 640px) {
        .cp-hero { padding: 1.5rem; }
        .cp-hero-title { font-size: 1.3rem; }
        .cp-stats { gap: 0.75rem; }
        .cp-stat { min-width: 90px; padding: 0.6rem 1rem; }
    }
</style>

<div>
    {{-- Hero Header --}}
    <div class="cp-hero">
        <div class="cp-hero-badge">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor"><circle cx="5" cy="5" r="5"/></svg>
            Payment Management
        </div>
        <h1 class="cp-hero-title"></h1>
        <p class="cp-hero-sub">Manage cash payments, receipts, uploads, and daily collection entries with a full audit trail.</p>
        <div class="cp-stats">
            <div class="cp-stat">
                <div class="cp-stat-value">₱0.00</div>
                <div class="cp-stat-label">Today's Collection</div>
            </div>
            <div class="cp-stat">
                <div class="cp-stat-value">0</div>
                <div class="cp-stat-label">Transactions</div>
            </div>
            <div class="cp-stat">
                <div class="cp-stat-value">0</div>
                <div class="cp-stat-label">Pending Posts</div>
            </div>
        </div>
    </div>

    {{-- Feature Cards --}}
    <p class="cp-section-label">Features &amp; Actions</p>
    <div class="cp-grid" style="margin-bottom:1.5rem;">

        {{-- Cash Payment Collection --}}
        <div class="cp-card">
            <div class="cp-card-accent" style="background: linear-gradient(90deg,#1e3a5f,#3b6cb7);"></div>
            <div class="cp-card-icon-wrap" style="background:#eff6ff;">
                <svg class="h-5 w-5" style="color:#1e3a5f;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="cp-card-title">Payment Collection</div>
            <div class="cp-card-desc">Handles cash, manual electronic transfers, and bank deposits. Supports multiple collection modes.</div>
            <div class="cp-card-footer">
                <button class="cp-btn cp-btn-primary">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Record Payment
                </button>
                <span class="cp-tag" style="background:#eff6ff;color:#1e3a5f;">Cash / Transfer</span>
            </div>
        </div>

        {{-- Upload Transfer Confirmations --}}
        <div class="cp-card">
            <div class="cp-card-accent" style="background: linear-gradient(90deg,#d97706,#fbbf24);"></div>
            <div class="cp-card-icon-wrap" style="background:#fffbeb;">
                <svg class="h-5 w-5" style="color:#d97706;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
            </div>
            <div class="cp-card-title">Upload Transfer Confirmations</div>
            <div class="cp-card-desc">Upload proof of electronic transfers and bank deposit slips. Attach confirmations directly to the payment record.</div>
            <div class="cp-card-footer">
                <button class="cp-btn cp-btn-warning">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    Upload File
                </button>
                <span class="cp-tag" style="background:#fffbeb;color:#b45309;">PDF / Image</span>
            </div>
        </div>

        {{-- Digital Receipt Generation --}}
        <div class="cp-card">
            <div class="cp-card-accent" style="background: linear-gradient(90deg,#059669,#34d399);"></div>
            <div class="cp-card-icon-wrap" style="background:#ecfdf5;">
                <svg class="h-5 w-5" style="color:#059669;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <div class="cp-card-title">Digital Receipt Generation</div>
            <div class="cp-card-desc">Generate PDF or print-ready digital receipts for all recorded transactions instantly upon payment posting.</div>
            <div class="cp-card-footer">
                <button class="cp-btn cp-btn-success">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Generate Receipt
                </button>
                <span class="cp-tag" style="background:#ecfdf5;color:#047857;">PDF / Print</span>
            </div>
        </div>

        {{-- Daily Collection Entry --}}
        <div class="cp-card">
            <div class="cp-card-accent" style="background: linear-gradient(90deg,#2563eb,#60a5fa);"></div>
            <div class="cp-card-icon-wrap" style="background:#eff6ff;">
                <svg class="h-5 w-5" style="color:#2563eb;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            </div>
            <div class="cp-card-title">Daily Collection Entry by AO</div>
            <div class="cp-card-desc">Records and summarizes daily collections per Account Officer. Track totals, variances, and submission status.</div>
            <div class="cp-card-footer">
                <button class="cp-btn cp-btn-info">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    View Daily Log
                </button>
                <span class="cp-tag" style="background:#eff6ff;color:#1d4ed8;">Per AO</span>
            </div>
        </div>

        {{-- Audit Trail --}}
        <div class="cp-card" style="grid-column: span 1;">
            <div class="cp-card-accent" style="background: linear-gradient(90deg,#4b5563,#9ca3af);"></div>
            <div class="cp-card-icon-wrap" style="background:#f9fafb;">
                <svg class="h-5 w-5" style="color:#374151;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <div class="cp-card-title">Audit Trail</div>
            <div class="cp-card-desc">Every payment posting is tracked with timestamps, user actions, and change history. Full compliance-ready log.</div>

            {{-- Mini audit log preview --}}
            <div style="margin-bottom:1rem;">
                <div class="cp-audit-row">
                    <div class="cp-dot" style="background:#10b981;"></div>
                    <span style="flex:1;">Payment posted — Loan #00123</span>
                    <span style="color:#9ca3af;font-size:0.72rem;">Today, 9:14 AM</span>
                </div>
                <div class="cp-audit-row">
                    <div class="cp-dot" style="background:#f59e0b;"></div>
                    <span style="flex:1;">Receipt generated — Acct #00456</span>
                    <span style="color:#9ca3af;font-size:0.72rem;">Today, 8:52 AM</span>
                </div>
                <div class="cp-audit-row">
                    <div class="cp-dot" style="background:#3b82f6;"></div>
                    <span style="flex:1;">Upload confirmed — Deposit slip</span>
                    <span style="color:#9ca3af;font-size:0.72rem;">Yesterday</span>
                </div>
            </div>

            <div class="cp-card-footer">
                <button class="cp-btn cp-btn-gray">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h7"/></svg>
                    View Full Log
                </button>
                <span class="cp-tag" style="background:#f3f4f6;color:#374151;">Immutable</span>
            </div>
        </div>

    </div>
</div>
</x-filament-panels::page>