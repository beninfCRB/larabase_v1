<div class="form-group col-12">
    <label for="exampleFormControlSelect1">{{ $label }}</label>
    <select class="form-control" name="{{ $name }}" id="{{ $name }}">
        @if ($value == null && $method == 'add')
            <option selected>========Pilih {{ $label }}========</option>
        @endif
        @foreach ($data as $v)
            @if ($value != null && $method == 'edit')
                @if ($value == $v->id)
                    <option selected value="{{ $v->id }}">{{ $v->code }} - {{ $v->name }}</option>
                @elseif($value != $v->id)
                    <option value="{{ $v->id }}">{{ $v->code }} - {{ $v->name }}
                    </option>
                @endif
            @else
                <option value="{{ $v->id }}">{{ $v->code }} - {{ $v->name }}
                </option>
            @endif
        @endforeach
    </select>
</div>
