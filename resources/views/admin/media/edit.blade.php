<img src="{{ asset('storage/'.$item->file_path) }}" width="180">

<form method="POST" action="{{ route('media.update', $item->id) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <input name="title" value="{{ $item->title }}">
  <input name="event_name" value="{{ $item->event_name }}">
  <input type="date" name="event_date" value="{{ $item->event_date }}">
  <input type="file" name="file">
  <button>Save</button>
</form>

<form method="POST" action="{{ route('media.destroy', $item->id) }}">
  @csrf
  @method('DELETE')
  <button>Delete</button>
</form>

@if(session('success')) <p>{{ session('success') }}</p> @endif
