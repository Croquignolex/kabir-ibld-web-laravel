<div class="form-group">
    <label for="file">
        {{ $name }}
        @if ($errors->has('file'))
            <span class="text-danger">
                {{ $errors->first('file') }}
            </span>
        @endif
    </label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="{{ $icon }}"></i>
            </span>
        </div>
        <input type="file" class="form-control" id="file" name="file">
    </div>
    <small class="text-danger">{{ $tip }}</small>
</div>