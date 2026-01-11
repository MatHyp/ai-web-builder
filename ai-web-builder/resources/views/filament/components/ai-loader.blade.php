<div 
    x-data 
    wire:loading.flex 
    wire:target="create"
    class="ai-loader-overlay"
>
    <div class="ai-loader-card">
        <h2 class="loader-title">
            Tworzymy Twoją stronę...
        </h2>

        <p class="loader-desc">
            Nasze modele ciężko pracują, aby dostarczyć Ci najlepszą treść.<br>
            To może potrwać około 15-30 sekund.
        </p>

        <div class="progress-bar-bg">
            <div class="progress-bar-fill"></div>
        </div>
    </div>
</div>

<style>
    .ai-loader-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 99999;
        background-color: rgba(0, 0, 0, 0.9);
        backdrop-filter: blur(5px);
        display: none;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .ai-loader-card {
        background-color: #111827;
        border: 1px solid #374151;
        border-radius: 24px;
        padding: 40px;
        text-align: center;
        max-width: 600px;
        width: 90%;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        align-items: center;
        animation: zoomIn 0.3s ease-out;
    }

    .loader-title {
        color: #ffffff;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 16px;
        letter-spacing: -0.025em;
        font-family: sans-serif;
    }

    .loader-desc {
        color: #9ca3af;
        font-size: 1.1rem;
        margin-bottom: 40px;
        line-height: 1.5;
        font-family: sans-serif;
    }

    .progress-bar-bg {
        width: 100%;
        background-color: #1f2937;
        height: 16px;
        border-radius: 9999px;
        overflow: hidden;
        border: 1px solid #374151;
    }

    .progress-bar-fill {
        height: 100%;
        width: 50%;
        background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
        border-radius: 9999px;
        animation: progressMove 2s infinite ease-in-out;
    }

    @keyframes progressMove {
        0% { transform: translateX(-100%); }
        50% { transform: translateX(0%); }
        100% { transform: translateX(100%); }
    }

    @keyframes zoomIn {
        from { transform: scale(0.95); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
</style>
