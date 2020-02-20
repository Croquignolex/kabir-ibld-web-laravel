<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="label-{{ $id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="label-{{ $id }}">
                    {{ $title }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-danger text-white">
                {{ $message }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="mdi mdi-thumb-down-outline"></i>
                    Non
                </button>
                <button type="button" class="btn btn-danger" onclick="document.getElementById('{{ $id }}-form').submit();">
                    <i class="mdi mdi-thumb-up-outline"></i>
                    Oui
                </button>
            </div>
        </div>
    </div>
</div>

<form id="{{ $id }}-form" action="{{ $route }}" method="POST" class="hidden">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
