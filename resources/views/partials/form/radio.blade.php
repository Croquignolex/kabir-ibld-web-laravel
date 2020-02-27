<div class="form-group">
    <label for="icon">
        {{ $name }}
        @if ($errors->has($id))
            <span class="text-danger">
                {{ $errors->first($id) }}
            </span>
        @endif
    </label>
    <ul class="list-unstyled list-inline">
        @foreach(icons() as $icon)
            <li class="d-inline-block mr-3">
                <label class="control control-radio">
                    <i class="{{ $icon }}"></i>
                    <input type="radio" name="icon" value="{{ $icon }}"
                            {{ $icon === $value ? 'checked' : '' }}
                    />
                    <div class="control-indicator"></div>
                </label>
            </li>
        @endforeach
    </ul>
</div>