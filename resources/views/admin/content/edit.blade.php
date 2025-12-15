<form method="POST" action="{{ route('content.update', $section->id) }}">
  @csrf
  @method('PUT')
  <textarea name="content" rows="12" required>{{ $section->content }}</textarea>
  <button type="submit">Save</button>
</form>

@if(session('success')) <p>{{ session('success') }}</p> @endif
@error('content') <p>{{ $message }}</p> @enderror
