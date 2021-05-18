@component('components.master')
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                <div class="lg:w-32">
                    @if(auth()->user()->isAdmin())
                        @include('sidebarAdmin')
                    @else
                        @include('sidebar')
                    @endif
                </div>
                <div class="lg:flex-1 lg:mx-10 " style="max-width: 1000px">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </section>
@endcomponent