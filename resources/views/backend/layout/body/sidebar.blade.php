<div class="seller-courses">

    <div class="side-menu">
        <div class="frame">
            <div class="logo-wrapper">
                <div class="logo">
                    <div class="div">
                        <div class="logo-2"></div>
                        <div class="text-wrapper">Byway</div>
                    </div>
                    <img class="img" src="https://c.animaapp.com/meilzjuc7hm2I8/img/icon-back.svg" />
                </div>
            </div>
            <div class="frame-2">
                <div class="menu">
                    <div class="img-wrapper">
                        <img class="img" src="https://c.animaapp.com/meilzjuc7hm2I8/img/icon-side-dashboard.svg" />
                    </div>
                    <div class="lable">Dashboard</div>
                </div>
                <div class="menu-2" id="toggle-categories" style="cursor: pointer ">
                    <div class="img-wrapper">
                        <img class="img" src="https://c.animaapp.com/meilzjuc7hm2I8/img/icon-side-course.svg" />
                    </div>
                    <div class="lable-2">Courses</div>
                    <div class="rectangle"></div>

                    <div class="categories-dropdown" style="display: none">
                        <ul>
                            @foreach ($categories as $category)
                                <a href="{{ url('admin/category/' . $category->id . '/courses') }}" style="text-decoration: none">
                                    <li>
                                        {{ $category->title }}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>



                </div>
                <div class="menu">
                    <div class="img-wrapper">
                        <img class="img" src="https://c.animaapp.com/meilzjuc7hm2I8/img/icon-side-chat.svg" />
                    </div>
                    <div class="lable">Communication</div>
                </div>
                <div class="menu">
                    <div class="img-wrapper">
                        <img class="img" src="https://c.animaapp.com/meilzjuc7hm2I8/img/icon-side-dollar.svg" />
                    </div>
                    <div class="lable">Revenue</div>
                </div>
                <div class="menu">
                    <div class="img-wrapper">
                        <img class="img" src="https://c.animaapp.com/meilzjuc7hm2I8/img/icon-side-setting.svg" />
                    </div>
                    <div class="lable">Setting</div>
                </div>
            </div>
        </div>
        <div class="div-wrapper">
            <div class="logo">
                <div class="div">
                    <div class="logo-3"></div>
                    <div class="byway">Hi, John</div>
                </div>
                <img class="img" src="https://c.animaapp.com/meilzjuc7hm2I8/img/icon-hamburger.svg" />
            </div>
        </div>
    </div>
</div>
