<form method="POST" action="{{ route('specs.update', $spec->id) }}">
  @csrf
  @method('PUT')
  <input name="spec_name" value="{{ $spec->spec_name }}" required>
  <textarea name="spec_value" required>{{ $spec->spec_value }}</textarea>
  <button>Save</button>
</form>

<form method="POST" action="{{ route('specs.destroy', $spec->id) }}">
  @csrf
  @method('DELETE')
  <button>Delete</button>
</form>

@if(session('success')) <p>{{ session('success') }}</p> @endif
