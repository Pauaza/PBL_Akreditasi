<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

<style>
    .modal-content {
        border-radius: 15px;
        font-family: 'Montserrat', sans-serif;
    }

    .modal-header {
        border-bottom: none;
        padding-bottom: 0;
    }

    .modal-title {
        color: #315287;
        font-weight: 700;
        font-size: 1.25rem;
    }

    .modal-body {
        padding-top: 0;
    }

    .form-label {
        font-size: 0.9rem;
        font-weight: 400;
        color: #315287;
    }

    .form-control {
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 25px;
        font-size: 0.9rem;
        font-weight: 500;
        padding: 8px 15px;
        color: #315287;
        font-family: 'Montserrat', sans-serif;
    }

    .form-control[readonly] {
        background-color: #f5f5f5;
        opacity: 1;
    }

    .form-text {
        font-size: 0.75rem;
        color: #888;
    }

    .btn-primary {
        background-color: #315287;
        border: none;
        border-radius: 25px;
        padding: 8px 20px;
        font-size: 0.9rem;
        font-family: 'Montserrat', sans-serif;
    }

    .btn-danger {
        background-color: #993A36;
        border: none;
        border-radius: 25px;
        padding: 8px 20px;
        font-size: 0.9rem;
        font-family: 'Montserrat', sans-serif;
    }

    .modal-footer {
        border-top: none;
        padding-top: 0;
    }

    .modal-divider {
        border: 0;
        border-top: 1px solid #315287;
        margin: 1rem 0;
        width: 100%;
    }
</style>

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $modalId }}Label">{{ $modalTitle }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr class="modal-divider">
            <div class="modal-body">
                {!! $slot !!}
            </div>
            <div class="modal-footer">
                @if (isset($cancelButton))
                    <button type="button" class="btn {{ $cancelButton['class'] }}"
                        onclick="window.location.href='{{ route('superAdmin.kriteria.index') }}'">
                        {{ $cancelButton['text'] }}
                    </button>
                @endif
                @if (isset($actionButton))
                    <button type="button" class="btn {{ $actionButton['class'] }}"
                        id="{{ $actionButton['id'] }}">{{ $actionButton['text'] }}</button>
                @endif
            </div>
        </div>
    </div>
</div>