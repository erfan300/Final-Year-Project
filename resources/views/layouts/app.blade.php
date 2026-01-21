<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body data-success="{{ session('success') }}"
  data-errors='@json($errors->all() ?? [])'
>

@include('partials.header')

<main>
  @yield('content')
</main>

@include('partials.footer')

<div id="toast-container"></div>
<script>
  function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.textContent = message;

    document.getElementById('toast-container').appendChild(toast);

    setTimeout(() => toast.classList.add('show'), 20);
    setTimeout(() => {
      toast.classList.remove('show');
      setTimeout(() => toast.remove(), 250);
    }, 3000);
  }

  document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;

    const successMsg = body.dataset.success;
    const errorMsgs = JSON.parse(body.dataset.errors || '[]');

    if (successMsg) showToast(successMsg, 'success');
    errorMsgs.forEach(msg => showToast(msg, 'error'));
  });
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[maxlength]').forEach(field => {
    const max = field.getAttribute('maxlength');

    const counter = document.querySelector(`#${field.id}-count`);
    if (!counter) return;

    const update = () => {
      counter.textContent = field.value.length;
    };

    field.addEventListener('input', update);
    update();
  });
});
</script>

</body>
</html>
