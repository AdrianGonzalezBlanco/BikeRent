@foreach (['success', 'error'] as $type)
    @if (session($type))
        <div class="alert alert--{{ $type }}" role="{{ $type === 'error' ? 'alert' : 'status' }}">
            {{ session($type) }}
        </div>
    @endif
@endforeach
