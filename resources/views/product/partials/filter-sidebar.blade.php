<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav border-bottom border-white">
        <li class="sidebar-brand border-bottom border-white">
            <a href="{{ url('/') }}">
                Aquario
            </a>
        </li>
        @foreach ($categories as $category)
            <li>
                <a class="btn-link" href="{{ url('/category', [$category->category_id]) }}">
                    {{ Str::ucfirst(Str::plural($category->category_name)) }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
<!-- /#sidebar-wrapper -->
