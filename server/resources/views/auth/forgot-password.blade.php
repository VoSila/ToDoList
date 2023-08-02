<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form class="modal-content" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="container-register">
            <div class="title-block">
                <h2>Восстановление пароля</h2>
            </div>
            <div class="form-group-register">
                <input type="text" name="email" placeholder="E-mail" id="email" class="form-control-register">
            </div>
        </div>
        <button type="submit" class="button-login">Сбросить пароль</button>
    </form>
</x-guest-layout>
