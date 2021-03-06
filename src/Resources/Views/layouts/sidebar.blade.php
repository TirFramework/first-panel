@php
//use App\Modules\Authorization\Acl;
@endphp

<div id="sidebar-collapse" class="sidebar">

    <div class="header-sidebar">
        <a href="/" class="navbar-brand" target="_blank"><span>
        {{config('app.name')}}</span>
            <!-- @lang('first-panel::panel.admin_panel') -->
        </a>

        <button class="main-nav-toggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>


    {{--    <form role="search">--}}
    {{--        <div class="form-group">--}}
    {{--            <input type="text" class="form-control" placeholder="Search">--}}
    {{--        </div>--}}
    {{--    </form>--}}

    @php $menu = resolve('AdminMenu') @endphp

    <nav class="main-nav">

       {{-- @dd($menu) --}}



    @foreach ($menu->nav as $section)

        <h6 class="p-2">
            {{$section['title']}}
        </h6><hr>


        @if(isset($section['sub']))
            <ul>
                @foreach($section['sub'] as $menu)
                    <li class="
                    @if(isset($menu['sub']))
                        dropdown
                        @foreach($menu['sub'] as $subMenu)
                            @if(request()->is( $subMenu['link'].'*' )) open @break @endif
                        @endforeach
                    @else
                        {{(request()->is( $menu['link'].'*' )) ? 'active' : '' }}
                    @endif
                    ">
                        <a href="@if(isset($menu['sub'])) # @else {{'/'.$menu['link'] ?? null}} @endif " @if(isset($menu['sub'])) class="dropdown-toggle"  @endif>
                            <span class="icon">
                                <svg class="svg-inline--fa fa-box fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="box" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M509.5 184.6L458.9 32.8C452.4 13.2 434.1 0 413.4 0H272v192h238.7c-.4-2.5-.4-5-1.2-7.4zM240 0H98.6c-20.7 0-39 13.2-45.5 32.8L2.5 184.6c-.8 2.4-.8 4.9-1.2 7.4H240V0zM0 224v240c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V224H0z"></path></svg><!-- <i class="fas fa-box"></i> --> </span>
                            <span class="text">{{$menu['title']}}</span>
                        </a>
                    @if(isset($menu['sub']))
                            <ul>
                                @foreach($menu['sub'] as $subMenu)
                                    <li class="
                                        {{(request()->is( $subMenu['link'] )) ? 'active' : '' }}
                                        {{(request()->is( $subMenu['link'].'/'.'*' )) ? 'active' : '' }}
                                    ">
                                        <a href="{{ '/'.$subMenu['link'] }}">
                                            <span class="icon">
                                                <svg class="svg-inline--fa fa-check-circle fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg><!-- <i class="fas fa-check-circle"></i> -->
                                            </span>
                                            <span class="text">{{$subMenu['title']}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                    @endif
                    </li>

                @endforeach
            </ul>
        @endif


    @endforeach
    </nav>
{{--
    <nav class="main-nav">


        <h6 class="p-2">
            @lang('first-panel::panel.general')
        </h6>
        <ul>
            <li>
                <a href="/admin">
                    <span class="icon"> <i class="fas fa-tachometer-alt"></i> </span>
                    <span class="text">@lang('first-panel::panel.dashboard')</span>
                </a>
            </li>

        </ul>
        @if(Route::has('product.index'))
           <hr>
             <h6 class="p-2">
                @lang('first-panel::panel.shop')
            </h6>

            <ul class="">



                <li class="dropdown
                        {{ (request()->is('admin/attribute*')) ? 'open' : '' }}
                        {{ (request()->is('admin/attributeSet*')) ? 'open' : '' }}
                        {{ (request()->is('admin/product*')) ? 'open' : '' }}
                        {{ (request()->is('admin/option*')) ? 'open' : '' }}
                        {{ (request()->is('admin/category*')) ? 'open' : '' }}
                        ">
                    <a href="#" class="dropdown-toggle"> <span class="icon"> <i class="fas fa-box"></i> </span> <span
                            class="text">@lang('first-panel::panel.products')</span> </a>
                    <ul>
                        <li class="
                        {{(request()->is('admin/attribute')) ? 'active' : '' }}
                        {{(request()->is('admin/attribute/*')) ? 'active' : ''}}

                        ">
                            <a href="{{ route('attribute.index') }} "> <span class="icon"> <i class="fas fa-check-circle"></i>
                                </span> <span class="text">@lang('first-panel::panel.attributes')</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/attributeSet*')) ? 'active' : '' }}">
                            <a href="{{ route('attributeSet.index') }} "> <span class="icon"> <i class="far fa-star"></i>
                                </span> <span class="text">@lang('first-panel::panel.attributeSets')</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/product*')) ? 'active' : '' }}">
                            <a href="{{ route('product.index') }} "> <span class="icon"> <i class="fas fa-boxes"></i> </span>
                                <span class="text">@lang('first-panel::panel.products')</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/option*')) ? 'active' : '' }}">
                            <a href="{{ route('option.index') }} "> <span class="icon"> <i class="fas fa-certificate"></i> </span>
                                <span class="text">@lang('first-panel::panel.options')</span>
                            </a>
                        </li>
                        <li class="{{ (request()->is('admin/category*')) ? 'active' : '' }}">
                            <a href="{{ route('category.index') }} "> <span class="icon"> <i class="fas fa-certificate"></i> </span>
                                <span class="text">@lang('first-panel::panel.categories')</span>
                            </a>
                        </li>
                    </ul>
                </li>



                @php
                //$modules = Module::all();
                @endphp


                --}}
{{-- @foreach ($modules as $module)
            @if ($module['slug'] != 'crud' && $module['slug'] != 'newsletter' && Acl::checkAccess($module['slug'],'index') !=false )
                @component('admin.components.navLink')
                    {{$module['slug']}}
                @endcomponent
                @endif
                @endforeach --}}{{--


            </ul>
        @endif




        <hr>

        <h6 class="p-2">
            @lang('first-panel::panel.users')
        </h6>
        <ul>


            <li class="dropdown
                {{ (request()->is('admin/user*')) ? 'open' : '' }}
            ">
                <a href="#" class="dropdown-toggle"> <span class="icon"> <i class="fas fa-user-tie"></i> </span> <span
                        class="text">@lang('first-panel::panel.user')</span> </a>
                <ul>
                    <li class="{{ (request()->is('admin/user/*')) ? 'active' : '' }}">
                        <a href="{{ route('user.index') }} "> <span class="icon"> <i class="fas fa-users"></i>
                            </span> <span class="text">@lang('first-panel::panel.users')</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
--}}
    {{-- <ul class="nav menu">
        @if(Acl::checkAccess('menu', 'index')!=false || Acl::checkAccess('menuitem', 'index') != false)

        <li class="parent "><a data-toggle="collapse" href="#sub-item-1" aria-expanded="{{ ($routeName == 'menu.index') ? 'active':'' }}">
    <em class="fas fa-ellipsis-v">&nbsp;</em>
    @lang('panel.menu')
    <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fas fa-plus"></em></span>
    </a>

    <ul class="children collapse" id="sub-item-1">
        @if(Acl::checkAccess('menu','index') !=false)
        <li><a class="" href="{{route('menu.index')}}">
                <span class="fas fa-bars">&nbsp;</span>@lang('panel.menus')</a>
        </li>
        @endif
        @if(Acl::checkAccess('menuitem', 'index') != false)
        <li><a class="" href="{{route('menuitem.index')}}">
                <span class="fas fa-minus">&nbsp;</span>@lang('panel.items')</a>
        </li>
        @endif
    </ul>
    </li>
    @endif

    @if(Acl::checkAccess('post', 'index') || Acl::checkAccess('category', 'index') || Acl::checkAccess('tag', 'index'))

    <li class="parent "><a data-toggle="collapse" href="#sub-item-2"
            aria-expanded="{{ ($routeName == 'menu.index') ? 'active':'' }}">
            <em class="fas fa-book-open">&nbsp;</em> @lang('panel.post') <span data-toggle="collapse" href="#sub-item-2"
                class="icon pull-right"><em class="fas fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-2">
            @if(Acl::checkAccess('post', 'index'))
            <li><a class="" href="{{route('post.index')}}">
                    <span class="fas fa-pen-alt">&nbsp;</span>@lang('panel.posts')</a>
            </li>
            @endif
            @if(Acl::checkAccess('category', 'index'))
            <li><a class="" href="{{route('category.index')}}">
                    <span class="fas fa-folder-open">&nbsp;</span>@lang('panel.categories')</a>
            </li>
            @endif
            @if(Acl::checkAccess('tag', 'index'))
            <li><a class="" href="{{route('tag.index')}}">
                    <span class="fas fa-tags">&nbsp;</span>@lang('panel.tags')</a>
            </li>
            @endif

            @if(Acl::checkAccess('comment', 'index'))
            <li><a class="" href="{{route('comment.index')}}">
                    <span class="fas fa-comments">&nbsp;</span>@lang('panel.comments')</a>
            </li>
            @endif

        </ul>
    </li>
    @endif



    @if(Acl::checkAccess('question', 'index') || Acl::checkAccess('questioncategory', 'index') )

    <li class="parent "><a data-toggle="collapse" href="#sub-item-question">
            <em class="fas fa-question-circle">&nbsp;</em> @lang('panel.question') <span data-toggle="collapse"
                href="#sub-item-question" class="icon pull-right"><em class="fas fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-question">
            @if(Acl::checkAccess('question', 'index'))
            <li><a class="" href="{{route('question.index')}}">
                    <span class="fas fa-question-circle">&nbsp;</span>@lang('panel.questions')</a>
            </li>
            @endif
            @if(Acl::checkAccess('questioncategory', 'index'))
            <li><a class="" href="{{route('questioncategory.index')}}">
                    <span class="fas fa-folder-open">&nbsp;</span>@lang('panel.categories')</a>
            </li>
            @endif
        </ul>
    </li>
    @endif











    @if(Acl::checkAccess('message', 'index') || Acl::checkAccess('cooperation', 'index') )

    <li class="parent "><a data-toggle="collapse" href="#sub-item-message">
            <em class="fas fa-comment-alt">&nbsp;</em> @lang('panel.message') <span data-toggle="collapse"
                href="#sub-item-message" class="icon pull-right"><em class="fas fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-message">
            @if(Acl::checkAccess('message', 'index'))
            <li><a class="" href="{{route('message.index')}}">
                    <span class="fas fa-envelope">&nbsp;</span>@lang('panel.messages')</a>
            </li>
            @endif
            @if(Acl::checkAccess('cooperation', 'index'))
            <li><a class="" href="{{route('cooperation.index')}}">
                    <span class="fas fa-comment-dots">&nbsp;</span>@lang('panel.cooperations')</a>
            </li>
            @endif
        </ul>
    </li>
    @endif
















    @if(Acl::checkAccess('page', 'index'))
    <li class="{{ ($routeName == 'page.index') ? 'active':'' }}"><a href="{{$siteUrl}}/admin/page"><em
                class="fas fa-file"></em> @lang('panel.pages') </a></li>
    @endif

    @if(Acl::checkAccess('ad', 'index'))
    <li class="{{ ($routeName == 'ad.index') ? 'active':'' }}"><a href="{{$siteUrl}}/admin/ad"><em
                class="fas fa-ad"></em> @lang('panel.ads') </a></li>
    @endif

    @if(Acl::checkAccess('settings', 'index'))
    <li class="{{ ($routeName == 'ad.index') ? 'active':'' }}"><a href="{{$siteUrl}}/admin/ad"><em
                class="fas fa-cogs"></em> @lang('panel.settings') </a></li>
    @endif

    @if(Acl::checkAccess('newslatter_subscribers', 'index'))
    <li class="{{ ($routeName == 'ad.index') ? 'active':'' }}"><a href="{{$siteUrl}}/admin/newslatter_subscribers"><em
                class="fas fa-cogs"></em> @lang('panel.newslatter') </a></li>
    @endif



    @if(Acl::checkAccess('user', 'index') || Acl::checkAccess('role', 'index') || Acl::checkAccess('profile', 'index') )
    <li class="parent "><a data-toggle="collapse" href="#sub-item-users"
            aria-expanded="{{ ($routeName == 'user.index') ? 'active':'' }}">
            <em class="fas fa-users-cog">&nbsp;</em> @lang('panel.users&Groups') <span data-toggle="collapse"
                href="#sub-item-users" class="icon pull-right"><em class="fas fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-users">
            @if(Acl::checkAccess('user', 'index'))
            <li><a class="" href="{{route('user.index')}}">
                    <span class="fas fa-users">&nbsp;</span>@lang('panel.users')</a>
            </li>
            @endif

            @if(Acl::checkAccess('profile', 'index'))
            <li><a class="" href="{{route('profile.index')}}">
                    <span class="fas fa-file-text-o">&nbsp;</span>@lang('panel.profiles')</a>
            </li>
            @endif

            @if(Acl::checkAccess('role', 'index'))
            <li><a class="" href="{{route('role.index')}}">
                    <span class="fas fa-user-lock">&nbsp;</span>@lang('panel.roles')</a>
            </li>
            @endif

        </ul>
    </li>
    @endif


    @if(Acl::checkAccess('setting', 'edit') || Acl::checkAccess('contact', 'edit') || Acl::checkAccess('social', 'edit')
    || Acl::checkAccess('slider', 'edit') )
    <li class="parent "><a data-toggle="collapse" href="#sub-item-settings">
            <em class="fas fa-cogs">&nbsp;</em> @lang('panel.settings') <span data-toggle="collapse"
                href="#sub-item-users" class="icon pull-right"><em class="fas fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-settings">
            @if(Acl::checkAccess('setting', 'edit'))
            <li><a class="" href="{{route('setting.edit', ['id' => 1]) }}">
                    <span class="fas fa-cog">&nbsp;</span>@lang('panel.setting')</a>
            </li>
            @endif
            @if(Acl::checkAccess('contact', 'edit'))
            <li><a class="" href="{{route('contact.edit', ['id' => 2]) }}">
                    <span class="fas fa-cog">&nbsp;</span>@lang('panel.contact')</a>
            </li>
            @endif
            @if(Acl::checkAccess('social', 'edit'))
            <li><a class="" href="{{route('social.edit', ['id' => 3]) }}">
                    <span class="fas fa-cog">&nbsp;</span>@lang('panel.social')</a>
            </li>
            @endif
            @if(Acl::checkAccess('slider', 'edit'))
            <li><a class="" href="{{route('slider.index') }}">
                    <span class="fas fa-cog">&nbsp;</span>@lang('panel.slider')</a>
            </li>
            @endif
        </ul>
    </li>
    @endif
    <li><a href="{{$siteUrl}}/admin/logout"><em class="fas fa-power-off">&nbsp;</em> @lang('panel.logout')</a></li>

    {{--<li><a href="charts.html"><em class="fas fa-bar-chart">&nbsp;</em> Charts</a></li>--}}
    {{--<li><a href="elements.html"><em class="fas fa-toggle-off">&nbsp;</em> UI Elements</a></li>--}}
    {{--<li><a href="panels.html"><em class="fas fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>--}}

    {{-- @yield('navbar') --}}

    {{-- </ul>  --}}
</div>
<!--/.sidebar-->
