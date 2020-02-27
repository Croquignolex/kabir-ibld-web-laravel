<div class="form-group">
    <label for="description">
        {{ $name }}
        @if ($errors->has($id))
            <span class="text-danger">
                {{ $errors->first($id) }}
            </span>
        @endif
    </label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="{{ $icon }}"></i>
            </span>
        </div>
        <textarea rows="5"
                  id="description"
                  name="description"
                  class="form-control">{{ $value }}</textarea>
    </div>
</div>