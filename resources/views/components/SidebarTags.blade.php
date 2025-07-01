<div class="container">
    <div class="headersidebar">
        <h4>Trending Category</h4>
    </div>
    <div class="sidebar-menu d-flex flex-column gap-2 mt-4">
        @foreach($dataartikel as $categorytrn)
        <a href="/category/{{$categorytrn->Category->id}}">{{$categorytrn->Category->Category_name}}</a>
        @endforeach
    </div>
</div>