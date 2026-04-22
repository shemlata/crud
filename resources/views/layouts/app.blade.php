
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>AdminLTE</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('layouts.partials.head')
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">

  <div class="app-wrapper">

    @include('layouts.partials.header')

    @include('layouts.partials.sidebar')

    <main class="app-main">
      <div class="container-fluid">
        @yield('content')
      </div>
    </main>

    @include('layouts.partials.footer')

  </div>

  @include('layouts.partials.script')
  @yield('scripts')
</body>
</html>
