<nav class="navbar navbar-expand-lg py-0">
    <div class="container py-0">
        <div class="col-6 text-start">
            <h1 class="mx-auto">
                <a class="text-decoration-none"
                    href="{{ session()->get('user')->id ?? false ? route('user.home') : route('home') }}">DevBank</a>
            </h1>
        </div>
        <div class="col-6 text-end">
            <h2 class="mx-auto">{{ session()->get('user')->name ?? '' }}</h2>
        </div>
    </div>
</nav>
<hr class="my-0">
