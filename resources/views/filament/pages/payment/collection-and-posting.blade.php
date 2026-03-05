<x-filament-panels::page>
<div>
<style>
    * { box-sizing: border-box; }

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
        margin-bottom: 1.5rem;
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
    .cp-card:hover { box-shadow: 0 6px 24px rgba(0,0,0,0.09); transform: translateY(-2px); border-color: #e5e7eb; }
    .cp-card-accent { position: absolute; top: 0; left: 0; right: 0; height: 3px; border-radius: 0.875rem 0.875rem 0 0; }
    .cp-card-icon-wrap { width: 42px; height: 42px; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; flex-shrink: 0; }
    .cp-card-title { font-size: 0.9rem; font-weight: 700; color: #111827; margin-bottom: 0.35rem; }
    .cp-card-desc { font-size: 0.8rem; color: #6b7280; line-height: 1.5; margin-bottom: 1.1rem; }
    .cp-card-footer { display: flex; align-items: center; justify-content: space-between; padding-top: 0.9rem; border-top: 1px solid #f3f4f6; }

    .cp-btn {
        display: inline-flex; align-items: center; gap: 5px;
        font-size: 0.75rem; font-weight: 600; padding: 6px 14px;
        border-radius: 7px; border: none; cursor: pointer;
        transition: all 0.15s; font-family: inherit;
    }
    .cp-btn:hover { filter: brightness(1.08); transform: scale(1.02); }
    .cp-btn-primary { background: #1e3a5f; color: #fff; }
    .cp-btn-success { background: #10b981; color: #fff; }
    .cp-btn-info    { background: #3b82f6; color: #fff; }
    .cp-btn-gray    { background: #f3f4f6; color: #374151; }

    .cp-tag { font-size: 0.65rem; font-weight: 600; padding: 3px 8px; border-radius: 999px; letter-spacing: 0.04em; }

    .cp-audit-row { display: flex; align-items: center; gap: 0.75rem; padding: 0.65rem 0; border-bottom: 1px solid #f3f4f6; font-size: 0.8rem; color: #374151; }
    .cp-audit-row:last-child { border-bottom: none; }
    .cp-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; }

    .cp-modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center; padding: 1rem; }
    .cp-modal-overlay.cp-open { display: flex; }
    .cp-modal { background: #fff; border-radius: 1rem; width: 100%; max-width: 540px; box-shadow: 0 20px 60px rgba(0,0,0,0.2); overflow: hidden; max-height: 92vh; display: flex; flex-direction: column; }
    .cp-modal-header { padding: 1.25rem 1.5rem 1rem; border-bottom: 1px solid #f3f4f6; display: flex; align-items: flex-start; justify-content: space-between; flex-shrink: 0; }
    .cp-modal-title { font-size: 0.95rem; font-weight: 800; color: #111827; }
    .cp-modal-sub { font-size: 0.72rem; color: #6b7280; margin-top: 2px; }
    .cp-modal-close { width: 28px; height: 28px; border-radius: 7px; border: none; background: #f3f4f6; cursor: pointer; font-size: 1rem; color: #6b7280; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .cp-modal-close:hover { background: #e5e7eb; }
    .cp-modal-body { padding: 1.5rem; overflow-y: auto; flex: 1; }
    .cp-modal-footer { padding: 1rem 1.5rem; border-top: 1px solid #f3f4f6; display: flex; gap: 0.5rem; justify-content: flex-end; flex-shrink: 0; }

    .cp-form-group { margin-bottom: 1rem; }
    .cp-form-label { display: block; font-size: 0.73rem; font-weight: 700; color: #374151; margin-bottom: 0.35rem; }
    .cp-form-input, .cp-form-select, .cp-form-textarea {
        width: 100%; padding: 0.55rem 0.8rem; border: 1.5px solid #e5e7eb;
        border-radius: 0.5rem; font-size: 0.82rem; color: #111827;
        background: #fff; transition: border-color 0.15s; font-family: inherit; box-sizing: border-box;
    }
    .cp-form-input:focus, .cp-form-select:focus, .cp-form-textarea:focus { outline: none; border-color: #1e3a5f; box-shadow: 0 0 0 3px rgba(30,58,95,0.08); }
    .cp-form-textarea { resize: vertical; min-height: 60px; }
    .cp-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

    .cp-inner-divider { border: none; border-top: 1px solid #f0f0f0; margin: 0.5rem 0 1.2rem; }
    .cp-inner-header { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 0.65rem; gap: 0.75rem; }
    .cp-inner-title { font-size: 0.76rem; font-weight: 700; color: #374151; display: flex; align-items: center; gap: 5px; }
    .cp-inner-sub { font-size: 0.68rem; color: #9ca3af; margin-top: 2px; }

    .cp-badge { display: inline-flex; align-items: center; padding: 2px 8px; border-radius: 999px; font-size: 0.65rem; font-weight: 700; }
    .cp-badge-success { background: #ecfdf5; color: #059669; }
    .cp-badge-warning { background: #fffbeb; color: #d97706; }
    .cp-badge-info    { background: #eff6ff; color: #2563eb; }
    .cp-badge-danger  { background: #fef2f2; color: #dc2626; }
    .cp-badge-gray    { background: #f3f4f6; color: #374151; }

    .cp-log-table { width: 100%; border-collapse: collapse; font-size: 0.78rem; }
    .cp-log-table th { text-align: left; padding: 0.45rem 0.7rem; background: #f9fafb; color: #6b7280; font-size: 0.67rem; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase; border-bottom: 1px solid #f0f0f0; }
    .cp-log-table td { padding: 0.6rem 0.7rem; border-bottom: 1px solid #f9fafb; color: #374151; }
    .cp-log-table tr:last-child td { border-bottom: none; }
    .cp-log-table tr:hover td { background: #fafafa; }

    .cp-receipt-preview { background: #f9fafb; border: 1px dashed #d1d5db; border-radius: 0.75rem; padding: 1rem 1.15rem; font-size: 0.78rem; }
    .cp-receipt-line { display: flex; justify-content: space-between; padding: 0.2rem 0; color: #374151; }
    .cp-receipt-divider { border: none; border-top: 1px dashed #d1d5db; margin: 0.5rem 0; }
    .cp-receipt-total { font-weight: 800; font-size: 0.88rem; color: #111827; }

    .cp-upload-zone {
        border: 2px dashed #d1d5db;
        border-radius: 0.75rem;
        padding: 1.25rem 1rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
        background: #fafafa;
        position: relative;
    }
    .cp-upload-zone:hover { border-color: #1e3a5f; background: #eff6ff; }
    .cp-upload-zone.cp-has-file { border-color: #10b981; background: #ecfdf5; }
    .cp-upload-zone.cp-error { border-color: #ef4444 !important; background: #fef2f2 !important; }
    .cp-upload-error-msg { display: none; font-size: 0.7rem; color: #ef4444; font-weight: 600; margin-top: 0.35rem; }
    .cp-upload-error-msg.cp-show { display: block; }

    .cp-file-thumb { display: none; margin: 0.6rem auto 0; max-width: 100%; max-height: 120px; border-radius: 0.5rem; border: 1px solid #d1d5db; object-fit: contain; }
    .cp-file-thumb.cp-show { display: block; }

    .cp-remove-file {
        display: none;
        position: absolute;
        top: 8px; right: 10px;
        background: #ef4444; color: #fff;
        border: none; border-radius: 50%;
        width: 22px; height: 22px;
        font-size: 0.7rem; cursor: pointer;
        align-items: center; justify-content: center;
        font-weight: 700; line-height: 1;
    }
    .cp-remove-file.cp-show { display: flex; }

    .cp-ao-row { display: flex; align-items: center; gap: 0.75rem; padding: 0.65rem 0; border-bottom: 1px solid #f3f4f6; font-size: 0.78rem; }
    .cp-ao-row:last-child { border-bottom: none; }

    .cp-toast { position: fixed; bottom: 1.5rem; right: 1.5rem; background: #111827; color: #fff; padding: 0.7rem 1.2rem; border-radius: 0.75rem; font-size: 0.8rem; font-weight: 600; display: flex; align-items: center; gap: 0.5rem; z-index: 99999; transform: translateY(80px); opacity: 0; transition: all 0.3s ease; box-shadow: 0 8px 24px rgba(0,0,0,0.2); pointer-events: none; }
    .cp-toast.cp-toast-show { transform: translateY(0); opacity: 1; }
    .cp-toast-dot { width: 18px; height: 18px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.65rem; flex-shrink: 0; }
    .cp-toast-success .cp-toast-dot { background: #10b981; }
    .cp-toast-danger  .cp-toast-dot { background: #ef4444; }
    .cp-toast-warning .cp-toast-dot { background: #f59e0b; }

    @media (max-width: 640px) {
        .cp-hero { padding: 1.5rem; }
        .cp-hero-title { font-size: 1.3rem; }
        .cp-stats { gap: 0.75rem; }
        .cp-stat { min-width: 90px; }
        .cp-form-row { grid-template-columns: 1fr; }
    }
</style>

    {{-- Hero --}}
    <div class="cp-hero">
        <div class="cp-hero-badge">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor"><circle cx="5" cy="5" r="5"/></svg>
            Payment Management
        </div>
        <h1 class="cp-hero-title">Cash &amp; Manual Payments</h1>
        <p class="cp-hero-sub">Manage cash payments, receipts, uploads, and daily collection entries with a full audit trail.</p>
        <div class="cp-stats">
            <div class="cp-stat">
                <div class="cp-stat-value" id="cp-stat-total">₱0.00</div>
                <div class="cp-stat-label">Today's Collection</div>
            </div>
            <div class="cp-stat">
                <div class="cp-stat-value" id="cp-stat-txn">0</div>
                <div class="cp-stat-label">Transactions</div>
            </div>
            <div class="cp-stat">
                <div class="cp-stat-value" id="cp-stat-pending">0</div>
                <div class="cp-stat-label">Pending Posts</div>
            </div>
        </div>
    </div>

    {{-- Feature Cards --}}
    <p class="cp-section-label">Features &amp; Actions</p>
    <div class="cp-grid">

        <div class="cp-card">
            <div class="cp-card-accent" style="background: linear-gradient(90deg,#1e3a5f,#3b6cb7);"></div>
            <div class="cp-card-icon-wrap" style="background:#eff6ff;">
                <svg class="h-5 w-5" style="color:#1e3a5f;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="cp-card-title">Payment Collection</div>
            <div class="cp-card-desc">Handles cash, electronic transfers, and bank deposits. Attach transfer confirmation slips directly when recording a payment.</div>
            <div class="cp-card-footer">
                <button class="cp-btn cp-btn-primary" onclick="cpOpenModal('cp-modal-record')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Record Payment
                </button>
                <span class="cp-tag" style="background:#eff6ff;color:#1e3a5f;">Cash / Transfer</span>
            </div>
        </div>

        <div class="cp-card">
            <div class="cp-card-accent" style="background: linear-gradient(90deg,#059669,#34d399);"></div>
            <div class="cp-card-icon-wrap" style="background:#ecfdf5;">
                <svg class="h-5 w-5" style="color:#059669;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <div class="cp-card-title">Digital Receipt Generation</div>
            <div class="cp-card-desc">Generate PDF or print-ready digital receipts for all recorded transactions instantly upon payment posting.</div>
            <div class="cp-card-footer">
                <button class="cp-btn cp-btn-success" onclick="cpOpenModal('cp-modal-receipt')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Generate Receipt
                </button>
                <span class="cp-tag" style="background:#ecfdf5;color:#047857;">PDF / Print</span>
            </div>
        </div>

        <div class="cp-card">
            <div class="cp-card-accent" style="background: linear-gradient(90deg,#2563eb,#60a5fa);"></div>
            <div class="cp-card-icon-wrap" style="background:#eff6ff;">
                <svg class="h-5 w-5" style="color:#2563eb;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            </div>
            <div class="cp-card-title">Daily Collection Entry by AO</div>
            <div class="cp-card-desc">Records and summarizes daily collections per Account Officer. Track totals, variances, and submission status.</div>
            <div class="cp-card-footer">
                <button class="cp-btn cp-btn-info" onclick="cpOpenModal('cp-modal-daily')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    View Daily Log
                </button>
                <span class="cp-tag" style="background:#eff6ff;color:#1d4ed8;">Per AO</span>
            </div>
        </div>

        <div class="cp-card">
            <div class="cp-card-accent" style="background: linear-gradient(90deg,#4b5563,#9ca3af);"></div>
            <div class="cp-card-icon-wrap" style="background:#f9fafb;">
                <svg class="h-5 w-5" style="color:#374151;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <div class="cp-card-title">Audit Trail</div>
            <div class="cp-card-desc">Every payment posting is tracked with timestamps, user actions, and change history. Full compliance-ready log.</div>
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
                <button class="cp-btn cp-btn-gray" onclick="cpOpenModal('cp-modal-audit')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h7"/></svg>
                    View Full Log
                </button>
                <span class="cp-tag" style="background:#f3f4f6;color:#374151;">Immutable</span>
            </div>
        </div>

    </div>

    {{-- ============ MODALS ============ --}}

    {{-- Record Payment Modal --}}
    <div class="cp-modal-overlay" id="cp-modal-record" onclick="cpBgClose(event,'cp-modal-record')">
        <div class="cp-modal" style="max-width:560px;">
            <div class="cp-modal-header">
                <div>
                    <div class="cp-modal-title">Record Payment</div>
                    <div class="cp-modal-sub">Post a cash or manual payment — attach proof if applicable</div>
                </div>
                <button class="cp-modal-close" onclick="cpCloseModal('cp-modal-record')">✕</button>
            </div>
            <div class="cp-modal-body">

                <div class="cp-form-row">
                    <div class="cp-form-group">
                        <label class="cp-form-label">Loan Number <span style="color:#ef4444;">*</span></label>
                        <input class="cp-form-input" type="text" placeholder="e.g. #00234" id="cp-rec-loan">
                    </div>
                    <div class="cp-form-group">
                        <label class="cp-form-label">Member Name</label>
                        <input class="cp-form-input" type="text" placeholder="Auto-fill from loan #" id="cp-rec-name">
                    </div>
                </div>
                <div class="cp-form-row">
                    <div class="cp-form-group">
                        <label class="cp-form-label">Amount (₱) <span style="color:#ef4444;">*</span></label>
                        <input class="cp-form-input" type="number" min="0" placeholder="0.00" id="cp-rec-amount" oninput="cpUpdatePreview()">
                    </div>
                    <div class="cp-form-group">
                        <label class="cp-form-label">Payment Date <span style="color:#ef4444;">*</span></label>
                        <input class="cp-form-input" type="date" id="cp-rec-date">
                    </div>
                </div>
                <div class="cp-form-group">
                    <label class="cp-form-label">Payment Method</label>
                    <select class="cp-form-select" id="cp-rec-method" onchange="cpMethodChange()">
                        <option value="Cash">Cash</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="Bank Deposit">Bank Deposit</option>
                        <option value="Check">Check</option>
                    </select>
                </div>
                <div class="cp-form-group">
                    <label class="cp-form-label">Reference / OR Number</label>
                    <input class="cp-form-input" type="text" placeholder="Official Receipt or reference #" id="cp-rec-ref">
                </div>
                <div class="cp-form-group">
                    <label class="cp-form-label">Notes</label>
                    <textarea class="cp-form-textarea" placeholder="Optional notes…" id="cp-rec-notes"></textarea>
                </div>

                {{-- Upload Confirmation — Required --}}
                <hr class="cp-inner-divider">
                <div id="cp-upload-section">
                    <div class="cp-inner-header">
                        <div>
                            <div class="cp-inner-title">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="#dc2626" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                Upload Payment Confirmation <span style="color:#ef4444;">*</span>
                            </div>
                            <div class="cp-inner-sub">Proof of payment is required before posting — PDF, JPG, PNG up to 10MB</div>
                        </div>
                        <span class="cp-tag" style="background:#fef2f2;color:#dc2626;flex-shrink:0;margin-top:2px;">Required</span>
                    </div>

                    <div class="cp-upload-zone" id="cp-upload-zone"
                         onclick="document.getElementById('cp-file-input').click()"
                         ondragover="cpDragOver(event)"
                         ondragleave="cpDragLeave(event)"
                         ondrop="cpDrop(event)">

                        <input type="file" id="cp-file-input" accept=".pdf,.jpg,.jpeg,.png,.gif,.webp" style="display:none;" onchange="cpHandleFile(this)">
                        <button class="cp-remove-file" id="cp-remove-btn" onclick="cpRemoveFile(event)" title="Remove file">✕</button>

                        <div id="cp-upload-prompt">
                            <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="#9ca3af" stroke-width="1.5" style="margin:0 auto .5rem;display:block;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>
                            <div style="font-size:.82rem;font-weight:600;color:#374151;">Click to upload or drag &amp; drop</div>
                            <div style="font-size:.7rem;color:#9ca3af;margin-top:3px;">PDF, JPG, PNG, GIF — max 10MB</div>
                        </div>

                        <div id="cp-upload-selected" style="display:none;">
                            <div style="display:flex;align-items:center;gap:.5rem;justify-content:center;margin-bottom:.4rem;">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#059669" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span id="cp-file-name" style="font-size:.82rem;font-weight:700;color:#059669;"></span>
                            </div>
                            <div id="cp-file-meta" style="font-size:.7rem;color:#6b7280;"></div>
                            <img id="cp-file-thumb" class="cp-file-thumb" alt="Preview" />
                        </div>
                    </div>
                    <div class="cp-upload-error-msg" id="cp-upload-error">⚠ Proof of payment is required to post this transaction.</div>

                    <div class="cp-form-group" style="margin-top:.75rem;margin-bottom:0;">
                        <label class="cp-form-label">Document Type</label>
                        <select class="cp-form-select" id="cp-doc-type">
                            <option>Proof of Payment (General)</option>
                            <option>Bank Transfer Confirmation</option>
                            <option>Deposit Slip</option>
                            <option>Official Receipt</option>
                            <option>GCash / E-Wallet Screenshot</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>

                {{-- Receipt Preview --}}
                <div id="cp-receipt-preview-wrap" style="display:none;">
                    <hr class="cp-inner-divider">
                    <div class="cp-inner-title" style="margin-bottom:.65rem;">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="#059669" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Receipt Preview
                    </div>
                    <div class="cp-receipt-preview">
                        <div class="cp-receipt-line"><span>Payment Type</span><span id="cp-prev-method">Cash</span></div>
                        <div class="cp-receipt-line"><span>Amount</span><span id="cp-prev-amount">₱0.00</span></div>
                        <div class="cp-receipt-line"><span>Attachment</span><span id="cp-prev-attach" style="color:#9ca3af;">None</span></div>
                        <hr class="cp-receipt-divider">
                        <div class="cp-receipt-line cp-receipt-total"><span>Total Received</span><span id="cp-prev-total">₱0.00</span></div>
                    </div>
                </div>

            </div>
            <div class="cp-modal-footer">
                <button class="cp-btn cp-btn-gray" onclick="cpCloseModal('cp-modal-record')">Cancel</button>
                <button class="cp-btn" style="background:#f3f4f6;color:#374151;" onclick="cpSaveDraft()">Save Draft</button>
                <button class="cp-btn cp-btn-primary" onclick="cpPostPayment()">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    Confirm &amp; Post Payment
                </button>
            </div>
        </div>
    </div>

    {{-- Generate Receipt Modal --}}
    <div class="cp-modal-overlay" id="cp-modal-receipt" onclick="cpBgClose(event,'cp-modal-receipt')">
        <div class="cp-modal">
            <div class="cp-modal-header">
                <div><div class="cp-modal-title">Generate Digital Receipt</div><div class="cp-modal-sub">Create and send a payment receipt</div></div>
                <button class="cp-modal-close" onclick="cpCloseModal('cp-modal-receipt')">✕</button>
            </div>
            <div class="cp-modal-body">
                <div class="cp-form-group">
                    <label class="cp-form-label">Select Payment</label>
                    <select class="cp-form-select" id="cp-rcpt-loan" onchange="cpLoadReceipt()">
                        <option value="">— Select a payment —</option>
                        <option value="00234">Loan #00234 — ₱1,500.00 (Today)</option>
                        <option value="00189">Loan #00189 — ₱800.00 (Today)</option>
                        <option value="00301">Loan #00301 — ₱3,200.00 (Yesterday)</option>
                    </select>
                </div>
                <div id="cp-rcpt-preview" style="display:none;">
                    <div class="cp-receipt-preview">
                        <div style="text-align:center;margin-bottom:.75rem;">
                            <div style="font-weight:800;font-size:.9rem;color:#111827;">OFFICIAL RECEIPT</div>
                            <div style="font-size:.68rem;color:#9ca3af;">Cooperative Lending System</div>
                        </div>
                        <div class="cp-receipt-line"><span>Member</span><span id="cp-rcpt-member">—</span></div>
                        <div class="cp-receipt-line"><span>Loan #</span><span id="cp-rcpt-loanno">—</span></div>
                        <div class="cp-receipt-line"><span>Date</span><span id="cp-rcpt-date2">—</span></div>
                        <div class="cp-receipt-line"><span>Method</span><span id="cp-rcpt-meth">—</span></div>
                        <hr class="cp-receipt-divider">
                        <div class="cp-receipt-line cp-receipt-total"><span>Amount Paid</span><span id="cp-rcpt-amt">—</span></div>
                        <div class="cp-receipt-line"><span style="font-size:.7rem;color:#9ca3af;">Remaining Balance</span><span id="cp-rcpt-bal" style="font-size:.7rem;color:#9ca3af;">—</span></div>
                    </div>
                    <div style="font-size:.75rem;font-weight:700;color:#374151;margin:.75rem 0 .5rem;">Delivery Options</div>
                    <div style="display:flex;gap:.75rem;flex-wrap:wrap;">
                        <label style="display:flex;align-items:center;gap:.4rem;font-size:.78rem;cursor:pointer;"><input type="checkbox" checked> Email</label>
                        <label style="display:flex;align-items:center;gap:.4rem;font-size:.78rem;cursor:pointer;"><input type="checkbox"> SMS</label>
                        <label style="display:flex;align-items:center;gap:.4rem;font-size:.78rem;cursor:pointer;"><input type="checkbox"> Print PDF</label>
                    </div>
                </div>
            </div>
            <div class="cp-modal-footer">
                <button class="cp-btn cp-btn-gray" onclick="cpCloseModal('cp-modal-receipt')">Cancel</button>
                <button class="cp-btn cp-btn-success" id="cp-rcpt-send" disabled onclick="cpSendReceipt()">Generate &amp; Send</button>
            </div>
        </div>
    </div>

    {{-- Daily Collection Modal --}}
    <div class="cp-modal-overlay" id="cp-modal-daily" onclick="cpBgClose(event,'cp-modal-daily')">
        <div class="cp-modal" style="max-width:560px;">
            <div class="cp-modal-header">
                <div><div class="cp-modal-title">Daily Collection Summary</div><div class="cp-modal-sub">Per Account Officer — Today</div></div>
                <button class="cp-modal-close" onclick="cpCloseModal('cp-modal-daily')">✕</button>
            </div>
            <div class="cp-modal-body">
                <div style="display:flex;gap:.5rem;margin-bottom:1rem;">
                    <input class="cp-form-input" type="date" id="cp-daily-date" style="flex:1;">
                    <select class="cp-form-select" style="width:auto;"><option>All AOs</option><option>AO - Santos</option><option>AO - Reyes</option><option>AO - Cruz</option></select>
                </div>
                <div style="background:#f9fafb;border-radius:.75rem;padding:1rem;margin-bottom:1rem;display:grid;grid-template-columns:repeat(3,1fr);gap:.75rem;text-align:center;">
                    <div><div style="font-size:1.1rem;font-weight:800;color:#059669;">₱5,500</div><div style="font-size:.65rem;color:#9ca3af;text-transform:uppercase;">Total</div></div>
                    <div><div style="font-size:1.1rem;font-weight:800;color:#2563eb;">8</div><div style="font-size:.65rem;color:#9ca3af;text-transform:uppercase;">Entries</div></div>
                    <div><div style="font-size:1.1rem;font-weight:800;color:#10b981;">2</div><div style="font-size:.65rem;color:#9ca3af;text-transform:uppercase;">Submitted</div></div>
                </div>
                <div>
                    <div class="cp-ao-row">
                        <div style="width:30px;height:30px;border-radius:50%;background:#eff6ff;display:flex;align-items:center;justify-content:center;font-size:.7rem;font-weight:800;color:#1e3a5f;flex-shrink:0;">JS</div>
                        <div style="flex:1;"><div style="font-size:.82rem;font-weight:700;">AO - Santos</div><div style="font-size:.7rem;color:#9ca3af;">3 transactions</div></div>
                        <div style="font-weight:700;color:#059669;">₱2,300</div>
                        <span class="cp-badge cp-badge-success">Submitted</span>
                    </div>
                    <div class="cp-ao-row">
                        <div style="width:30px;height:30px;border-radius:50%;background:#ecfdf5;display:flex;align-items:center;justify-content:center;font-size:.7rem;font-weight:800;color:#059669;flex-shrink:0;">MR</div>
                        <div style="flex:1;"><div style="font-size:.82rem;font-weight:700;">AO - Reyes</div><div style="font-size:.7rem;color:#9ca3af;">5 transactions</div></div>
                        <div style="font-weight:700;color:#059669;">₱3,200</div>
                        <span class="cp-badge cp-badge-success">Submitted</span>
                    </div>
                    <div class="cp-ao-row">
                        <div style="width:30px;height:30px;border-radius:50%;background:#fffbeb;display:flex;align-items:center;justify-content:center;font-size:.7rem;font-weight:800;color:#d97706;flex-shrink:0;">LC</div>
                        <div style="flex:1;"><div style="font-size:.82rem;font-weight:700;">AO - Cruz</div><div style="font-size:.7rem;color:#9ca3af;">0 transactions</div></div>
                        <div style="font-weight:700;color:#9ca3af;">₱0</div>
                        <span class="cp-badge cp-badge-warning">Pending</span>
                    </div>
                </div>
            </div>
            <div class="cp-modal-footer">
                <button class="cp-btn cp-btn-gray" onclick="cpCloseModal('cp-modal-daily')">Close</button>
                <button class="cp-btn cp-btn-info" onclick="cpToast('Daily report exported.','success')">Export Report</button>
            </div>
        </div>
    </div>

    {{-- Audit Trail Modal --}}
    <div class="cp-modal-overlay" id="cp-modal-audit" onclick="cpBgClose(event,'cp-modal-audit')">
        <div class="cp-modal" style="max-width:600px;">
            <div class="cp-modal-header">
                <div><div class="cp-modal-title">Full Audit Trail</div><div class="cp-modal-sub">Immutable log of all payment actions</div></div>
                <button class="cp-modal-close" onclick="cpCloseModal('cp-modal-audit')">✕</button>
            </div>
            <div class="cp-modal-body">
                <div style="display:flex;gap:.5rem;margin-bottom:1rem;flex-wrap:wrap;">
                    <input class="cp-form-input" type="text" placeholder="Search…" style="flex:1;min-width:120px;">
                    <select class="cp-form-select" style="width:auto;"><option>All Actions</option><option>Posted</option><option>Voided</option><option>Edited</option><option>Receipt</option></select>
                    <select class="cp-form-select" style="width:auto;"><option>All Users</option><option>Admin</option><option>AO - Santos</option></select>
                </div>
                <table class="cp-log-table">
                    <thead><tr><th>Action</th><th>Reference</th><th>User</th><th>Timestamp</th></tr></thead>
                    <tbody>
                        <tr><td><span class="cp-badge cp-badge-success">Posted</span></td><td>Loan #00123</td><td>Admin</td><td>Today, 9:14 AM</td></tr>
                        <tr><td><span class="cp-badge cp-badge-warning">Receipt</span></td><td>Acct #00456</td><td>AO-Santos</td><td>Today, 8:52 AM</td></tr>
                        <tr><td><span class="cp-badge cp-badge-info">Upload</span></td><td>Deposit slip</td><td>AO-Reyes</td><td>Yesterday, 4:11 PM</td></tr>
                        <tr><td><span class="cp-badge cp-badge-success">Posted</span></td><td>Loan #00189</td><td>AO-Santos</td><td>Yesterday, 3:45 PM</td></tr>
                        <tr><td><span class="cp-badge cp-badge-danger">Voided</span></td><td>Loan #00155</td><td>Admin</td><td>2 days ago</td></tr>
                        <tr><td><span class="cp-badge cp-badge-gray">Edited</span></td><td>Loan #00200</td><td>Admin</td><td>3 days ago</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="cp-modal-footer">
                <button class="cp-btn cp-btn-gray" onclick="cpCloseModal('cp-modal-audit')">Close</button>
                <button class="cp-btn cp-btn-success" onclick="cpToast('Audit log exported.','success')">Export CSV</button>
            </div>
        </div>
    </div>

    {{-- Toast --}}
    <div class="cp-toast" id="cp-toast">
        <div class="cp-toast-dot" id="cp-toast-dot">✓</div>
        <span id="cp-toast-msg"></span>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            var d1 = document.getElementById('cp-rec-date');
            var d2 = document.getElementById('cp-daily-date');
            if (d1) d1.value = today;
            if (d2) d2.value = today;
        });

        function cpOpenModal(id)  { document.getElementById(id).classList.add('cp-open'); }
        function cpCloseModal(id) { document.getElementById(id).classList.remove('cp-open'); }
        function cpBgClose(e, id) { if (e.target === e.currentTarget) cpCloseModal(id); }

        var cpToastTimer;
        function cpToast(msg, type) {
            type = type || 'success';
            var t = document.getElementById('cp-toast');
            t.className = 'cp-toast cp-toast-' + type;
            document.getElementById('cp-toast-dot').textContent = type === 'success' ? '✓' : type === 'warning' ? '!' : '✕';
            document.getElementById('cp-toast-msg').textContent = msg;
            t.classList.add('cp-toast-show');
            clearTimeout(cpToastTimer);
            cpToastTimer = setTimeout(function() { t.classList.remove('cp-toast-show'); }, 3000);
        }

        function cpMethodChange() { cpUpdatePreview(); }

        function cpUpdatePreview() {
            var amt    = parseFloat(document.getElementById('cp-rec-amount').value) || 0;
            var method = document.getElementById('cp-rec-method').value;
            var wrap   = document.getElementById('cp-receipt-preview-wrap');
            if (amt > 0) {
                wrap.style.display = 'block';
                var fmt = '₱' + amt.toLocaleString('en-PH', { minimumFractionDigits: 2 });
                document.getElementById('cp-prev-method').textContent = method;
                document.getElementById('cp-prev-amount').textContent = fmt;
                document.getElementById('cp-prev-total').textContent  = fmt;
                var file = document.getElementById('cp-file-input').files[0];
                var attachEl = document.getElementById('cp-prev-attach');
                if (file) {
                    attachEl.textContent = '📎 ' + file.name;
                    attachEl.style.color = '#059669';
                } else {
                    attachEl.textContent = 'None';
                    attachEl.style.color = '#9ca3af';
                }
            } else {
                wrap.style.display = 'none';
            }
        }

        function cpDragOver(e) {
            e.preventDefault();
            document.getElementById('cp-upload-zone').style.borderColor = '#1e3a5f';
            document.getElementById('cp-upload-zone').style.background  = '#eff6ff';
        }
        function cpDragLeave(e) {
            var zone = document.getElementById('cp-upload-zone');
            if (!zone.classList.contains('cp-has-file')) {
                zone.style.borderColor = '';
                zone.style.background  = '';
            }
        }
        function cpDrop(e) {
            e.preventDefault();
            if (e.dataTransfer.files.length > 0) {
                try {
                    var dt = new DataTransfer();
                    dt.items.add(e.dataTransfer.files[0]);
                    document.getElementById('cp-file-input').files = dt.files;
                } catch(err) {}
                cpHandleFile({ files: e.dataTransfer.files });
            }
        }

        function cpHandleFile(input) {
            var file = input.files && input.files[0];
            if (!file) return;
            if (file.size > 10 * 1024 * 1024) {
                cpToast('File is too large. Max 10MB.', 'danger');
                return;
            }
            document.getElementById('cp-upload-zone').classList.remove('cp-error');
            document.getElementById('cp-upload-error').classList.remove('cp-show');
            var zone = document.getElementById('cp-upload-zone');
            zone.classList.add('cp-has-file');
            document.getElementById('cp-upload-prompt').style.display = 'none';
            var sel = document.getElementById('cp-upload-selected');
            sel.style.display = 'block';
            document.getElementById('cp-file-name').textContent = file.name;
            document.getElementById('cp-file-meta').textContent =
                (file.size / 1024).toFixed(1) + ' KB  •  ' + (file.type.split('/')[1] || 'FILE').toUpperCase();
            document.getElementById('cp-remove-btn').classList.add('cp-show');
            var thumb = document.getElementById('cp-file-thumb');
            if (file.type.startsWith('image/')) {
                var reader = new FileReader();
                reader.onload = function(e) { thumb.src = e.target.result; thumb.classList.add('cp-show'); };
                reader.readAsDataURL(file);
            } else {
                thumb.classList.remove('cp-show');
            }
            var docType = document.getElementById('cp-doc-type');
            var name = file.name.toLowerCase();
            if (name.includes('gcash') || name.includes('ewallet') || name.includes('maya'))
                docType.value = 'GCash / E-Wallet Screenshot';
            else if (name.includes('deposit') || name.includes('slip'))
                docType.value = 'Deposit Slip';
            else if (name.includes('transfer') || name.includes('confirm'))
                docType.value = 'Bank Transfer Confirmation';
            else if (name.includes('receipt') || name.includes('or'))
                docType.value = 'Official Receipt';
            cpUpdatePreview();
        }

        function cpRemoveFile(e) {
            e.stopPropagation();
            document.getElementById('cp-file-input').value = '';
            var zone = document.getElementById('cp-upload-zone');
            zone.classList.remove('cp-has-file');
            zone.style.borderColor = '';
            zone.style.background  = '';
            document.getElementById('cp-upload-prompt').style.display = 'block';
            document.getElementById('cp-upload-selected').style.display = 'none';
            document.getElementById('cp-remove-btn').classList.remove('cp-show');
            var thumb = document.getElementById('cp-file-thumb');
            thumb.classList.remove('cp-show');
            thumb.src = '';
            cpUpdatePreview();
        }

        function cpSaveDraft() {
            var loan = document.getElementById('cp-rec-loan').value.trim();
            if (!loan) { cpToast('Please enter a loan number.', 'danger'); return; }
            document.getElementById('cp-stat-pending').textContent =
                parseInt(document.getElementById('cp-stat-pending').textContent) + 1;
            cpCloseModal('cp-modal-record');
            setTimeout(function() { cpToast('Payment saved as draft.', 'warning'); }, 200);
        }

        function cpPostPayment() {
            var loan = document.getElementById('cp-rec-loan').value.trim();
            var amt  = parseFloat(document.getElementById('cp-rec-amount').value);
            var file = document.getElementById('cp-file-input').files[0];

            if (!loan)            { cpToast('Please enter a loan number.', 'danger'); return; }
            if (!amt || amt <= 0) { cpToast('Please enter a valid amount.', 'danger'); return; }
            if (!file) {
                document.getElementById('cp-upload-zone').classList.add('cp-error');
                document.getElementById('cp-upload-error').classList.add('cp-show');
                document.getElementById('cp-upload-zone').scrollIntoView({ behavior: 'smooth', block: 'center' });
                cpToast('Proof of payment is required.', 'danger');
                return;
            }

            var totalEl = document.getElementById('cp-stat-total');
            var cur = parseFloat(totalEl.textContent.replace('₱', '').replace(/,/g, '')) || 0;
            totalEl.textContent = '₱' + (cur + amt).toLocaleString('en-PH', { minimumFractionDigits: 2 });
            document.getElementById('cp-stat-txn').textContent =
                parseInt(document.getElementById('cp-stat-txn').textContent) + 1;

            ['cp-rec-loan','cp-rec-name','cp-rec-amount','cp-rec-ref','cp-rec-notes'].forEach(function(id) {
                document.getElementById(id).value = '';
            });
            document.getElementById('cp-rec-method').value = 'Cash';
            document.getElementById('cp-receipt-preview-wrap').style.display = 'none';
            cpRemoveFile({ stopPropagation: function(){} });

            cpCloseModal('cp-modal-record');
            setTimeout(function() { cpToast('Payment confirmed and posted for ' + loan + '.', 'success'); }, 200);
        }

        var cpReceiptData = {
            '00234': { member: 'Juan Dela Cruz', loan: '#00234', date: 'Today',     method: 'GCash',       amt: '₱1,500.00', bal: '₱12,300.00' },
            '00189': { member: 'Maria Santos',   loan: '#00189', date: 'Today',     method: 'Cash',        amt: '₱800.00',   bal: '₱5,600.00'  },
            '00301': { member: 'Pedro Reyes',    loan: '#00301', date: 'Yesterday', method: 'Credit Card', amt: '₱3,200.00', bal: '₱28,100.00' }
        };

        function cpLoadReceipt() {
            var val = document.getElementById('cp-rcpt-loan').value;
            var preview = document.getElementById('cp-rcpt-preview');
            var btn     = document.getElementById('cp-rcpt-send');
            if (!val) { preview.style.display = 'none'; btn.disabled = true; return; }
            var d = cpReceiptData[val];
            document.getElementById('cp-rcpt-member').textContent = d.member;
            document.getElementById('cp-rcpt-loanno').textContent = d.loan;
            document.getElementById('cp-rcpt-date2').textContent  = d.date;
            document.getElementById('cp-rcpt-meth').textContent   = d.method;
            document.getElementById('cp-rcpt-amt').textContent    = d.amt;
            document.getElementById('cp-rcpt-bal').textContent    = d.bal;
            preview.style.display = 'block';
            btn.disabled = false;
        }

        function cpSendReceipt() {
            cpCloseModal('cp-modal-receipt');
            setTimeout(function() { cpToast('Receipt generated and sent.', 'success'); }, 200);
        }
    </script>

</div>
</x-filament-panels::page>