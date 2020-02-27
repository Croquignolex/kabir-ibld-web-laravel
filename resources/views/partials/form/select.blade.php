<div class="form-group">
    <label for="{{ $id }}">
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
        <select name="{{ $id }}" id="{{ $id }}" class="form-control">
            @foreach($options as $option)
                <option value="{{ $option->id }}" {{ $value == $option->id ? 'selected' : '' }}>
                    @if(($country_page ?? false))
                        {{ $option->fr_name }}
                    @else
                        {{ $option->name }}
                    @endif
                </option>
            @endforeach
        </select>
    </div>
</div>