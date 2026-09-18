<footer id="contacto" class="border-t border-pink-100 bg-white">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-10 md:grid-cols-4">
            <!-- Brand -->
            <div class="md:col-span-2">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <img src="{{ asset('logo.webp') }}" alt="El Taller"
                        class="h-11 w-11 rounded-full ring-2 ring-pink-100">
                    <div>
                        <p class="font-extrabold text-pink-600">
                            El Taller
                        </p>
                        <p class="text-xs text-slate-400">
                            Detalles que inspiran
                        </p>
                    </div>
                </a>
                <p class="mt-5 max-w-md text-sm leading-6 text-slate-500">
                    Productos personalizados, detalles para tu hogar
                    y soluciones creativas para darle identidad a tus ideas.
                </p>
            </div>
            <!-- Navigation -->
            <div>
                <h3 class="text-sm font-bold text-slate-800">
                    Explora
                </h3>
                <ul class="mt-4 space-y-3 text-sm text-slate-500">
                    <li>
                        <a href="{{ url('/') }}" class="transition hover:text-pink-600">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/catalogo') }}" class="transition hover:text-pink-600">
                            Productos
                        </a>
                    </li>
                    <li>
                        <a href="#categorias" class="transition hover:text-pink-600">
                            Categorías
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Contact -->
            <div>
                <h3 class="text-sm font-bold text-slate-800">
                    Contacto
                </h3>
                <ul class="mt-4 space-y-3 text-sm text-slate-500">
                    <li>
                        <a href="#" class="transition hover:text-pink-600">
                            WhatsApp
                        </a>
                    </li>
                    <li>
                        <a href="#" class="transition hover:text-pink-600">
                            Facebook
                        </a>
                    </li>
                    <li>
                        <a href="#" class="transition hover:text-pink-600">
                            Instagram
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div
            class="mt-10 flex flex-col gap-3 border-t border-slate-100
                       pt-6 text-xs text-slate-400 sm:flex-row
                       sm:items-center sm:justify-between">
            <p>
                © {{ date('Y') }} El Taller. Todos los derechos reservados.
            </p>
            <p>
                Hecho con ❤️
            </p>
        </div>
    </div>
</footer>
