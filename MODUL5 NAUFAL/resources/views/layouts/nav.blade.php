  <ul class="nav justify-content-center pt-3">
    <li class="nav-item">
      <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" aria-current="page" href="{{ route('welcome') }}">HOME</a>
    </li>
    <li class="nav-item">
      <a class="nav-link{{ request()->is('vaccine*') ? ' active' : '' }}" href="{{ route('vaccine.index') }}">VACCINE</a>
    </li>
    <li class="nav-item">
      <a class="nav-link{{ request()->is('patient*') ? ' active' : '' }}" href="{{ route('patient.index') }}">PATIENT</a>
    </li>
  </ul>
