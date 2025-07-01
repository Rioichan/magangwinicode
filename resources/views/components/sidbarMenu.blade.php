<div class="container">
    <div class="headersidebar">
        <h4>Rio Blogs</h4>
    </div>
    <div class="sidebar-menu d-flex flex-column gap-3 mt-4">
        <a href="/">Home</a>
        <a href="/Newarticel">New Article</a>
        <a href="/trending">Trending Article</a>
        <div class="dropdown-center">
            <button class="btn p-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Category Article
            </button>
            <ul class="dropdown-menu ">
                @foreach($category as $categorydata)
                <li><a class="dropdown-item" href="/category/{{$categorydata['id']}}">{{$categorydata['Category_name']}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="sidebarUser-menu mt-4 d-flex flex-column gap-3">
            @auth
            <a href="{{ route('userprofile') }}">Your Account</a>
            @endauth
            @guest
            <a href="{{ route('login') }}">Login/register</a>
            @endguest
        </div>
    </div>
</div>