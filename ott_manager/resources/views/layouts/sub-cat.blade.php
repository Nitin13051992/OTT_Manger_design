<li>
    <a href="{{ $child_category->menu_url == '#' ? 'Javascript:void(0)' : strtok($child_category->menu_url, '.') }}"
        class="cursor tab menuID {{ strtok(\Route::currentRouteName(), '.') == strtok($child_category->menu_url, '.') ? 'act' : '' }}"
        data-icon="icon{{ $child_category->mid }}" data-menu="menuid{{ $child_category->mid }}">
        <span class="icon d-flex align-items-center justify-content-center">
            <i class="fa {{ $child_category->icon_class }}"></i>
        </span>
        {{ $child_category->mname }}</a>
</li>