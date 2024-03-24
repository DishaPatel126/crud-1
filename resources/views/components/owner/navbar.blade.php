<div>
    <div class="fixed top-0 w-full bg-white z-50">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-2 sm:px-6 ">
            <div class="inline-flex items-center space-x-2">
                <span class="font-bold text-lg py-2 lg:py-0">CRUD 1</span>
            </div>
            <div class="hidden md:block grow items-start">
                <ul class="ml-12 inline-flex space-x-8 ">
                    <li>
                        <a href="{{ url('/home') }}" id="home"
                            class=" inline-flex items-center text-lg font-semibold text-black hover:bg-honeydew/80 px-3 py-2 rounded-md hover:text-berkleyBlue transition duration-150 ease-in-out">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/products') }}" id="products"
                            class=" inline-flex items-center text-lg font-semibold text-black hover:bg-honeydew/80 px-3 py-2 rounded-md hover:text-berkleyBlue transition duration-150 ease-in-out">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="products/create" id="create"
                            class=" inline-flex items-center text-lg font-semibold text-black hover:bg-honeydew/80 px-3 py-2 rounded-md hover:text-berkleyBlue transition duration-150 ease-in-out">
                            Create product
                        </a>
                    </li>
                </ul>
            </div>

            @if (Auth::user() !== null)
                <div class="hidden space-x-2 md:block ">
                    <a href="{{ url('/logout') }}"
                        class="rounded-md bg-transparent px-3 py-2 text-lg font-semibold text-black hover:bg-lightCyan/70 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                        Log Out
                    </a>
                    <a
                        class="rounded-md bg-transparent px-3 py-2 text-lg font-semibold text-honeydew bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black ">
                        {{ Auth::user()->name }}
                    </a>
                </div>
            @else
                <div class="hidden space-x-2 md:block">
                    <a href="{{ url('/login') }}"
                        class="rounded-md bg-transparent px-3 py-2 text-lg font-semibold text-black hover:bg-lightCyan/70 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                        Log In
                    </a>
                    <a href="{{ url('/register') }}"
                        class="rounded-md bg-transparent px-3 py-2 text-lg font-semibold text-black hover:bg-lightCyan/70 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black ">
                        Sign Up
                    </a>
                </div>
            @endif


            <div class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="h-6 w-6 cursor-pointer">
                    <line x1="4" y1="12" x2="20" y2="12"></line>
                    <line x1="4" y1="6" x2="20" y2="6"></line>
                    <line x1="4" y1="18" x2="20" y2="18"></line>
                </svg>
            </div>
        </div>
    </div>
    <div class="pt-[3.76rem]">
        <!-- padding provided so that navbar doesnt overlap the sidebar. -->
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the current URL path
        var currentPath = window.location.pathname;
        console.log(currentPath);

        // Add the 'active' class to the corresponding link
        if (currentPath === "/home" || currentPath === "/") {
            document.getElementById("home").classList.add("active");
        } else if (currentPath === "/products") {
            document.getElementById("products").classList.add("active");
        } else if (currentPath === "/products/create") {
            document.getElementById("create").classList.add("active");
        }
    });
</script>