<img src="{{ asset('storage/'.$sponsor->logo) }}" width="120">

<form method="POST" action="{{ route('sponsors.update', $sponsor->id) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <input type="url" name="website" value="{{ $sponsor->website }}" placeholder="https://company.com">
  <input type="file" name="logo">
  <button>Save</button>
</form>

<form method="POST" action="{{ route('sponsors.destroy', $sponsor->id) }}">
  @csrf
  @method('DELETE')
  <button>Delete</button>
</form>

@if(session('success')) <p>{{ session('success') }}</p> @endif
