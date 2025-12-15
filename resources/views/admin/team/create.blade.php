<form method="POST" action="{{ route('team.store') }}">
  @csrf
  <input name="name" placeholder="Name" required>
  <input name="role" placeholder="Role" required>
  <textarea name="bio" placeholder="Bio"></textarea>
  <textarea name="testimonial" placeholder="Testimonial"></textarea>
  <button>Add profile</button>
</form>

@if(session('success')) <p>{{ session('success') }}</p> @endif
