<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
                <div class="email">{{Auth::user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">help</i>Help</a></li>

                        <li role="seperator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">settings</i>Settings</a></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>Sign Out</a>
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="{{ Route::is('manage_dashboard') ? 'active': null }}">
                    <a href="{{ URL::route('manage_dashboard',['user' => Auth::user()->getUsername()]) }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="{{ set_active(['all-surveys', 'all-surveys/*']) }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">view_list</i>
                        <span>Surveys</span>
                    </a>
                    <ul class="ml-menu">
                        {{--{{ Route::is('admin.surveys.show') ? 'active': null }}--}}
                        <li class="">
                            <a href="">Survey Normal Tables</a>
                            {{--{{ URL::route('admin.surveys.show') }}--}}
                        </li>
                        <li>
                            <a href="pages/tables/jquery-datatable.html">Jquery Datatables</a>
                        </li>
                        <li>
                            <a href="pages/tables/editable-table.html">Editable Tables</a>
                        </li>
                    </ul>
                </li>

                @if(Auth::user()->isTherapist())
                    <?php
                        $username = Auth::user()->getUsername();
                    $user_assignment_route = 'manage/users/'.$username.'/survey-assignments';
                    $user_assignment_route_append = $user_assignment_route.'/*';
                    ?>
                    <li class="{{ set_active([$user_assignment_route, $user_assignment_route_append]) }}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Survey Assignments</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{ set_active([$user_assignment_route]) }}">
                                <a href="{{ URL::route('users.survey-assignments.index',['user' => $username]) }}">Show All</a>
                            </li>
                            <li class="{{ set_active([$user_assignment_route.'/create']) }}">
                                <a href="{{ URL::route('users.survey-assignments.create',['user' => $username]) }}">Create New</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment_turned_in</i>
                            <span>Survey Response</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="">Show</a>
                            </li>
                            <li>
                                <a href="">Delete</a>
                            </li>
                            <li>
                                <a href="">Edit</a>
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 <a href="javascript:void(0);">Red Frog for Families</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
        <?php
            $colors = array(
                'red','pink','purple','deep-purple','indigo','blue','light-blue','cyan','teal','green',
                'light-green','lime','yellow','amber','orange','deep-orange','brown','grey','blue-grey','black');
            $labels = array(
                'Red','Pink','Purple','Deep Purple','Indigo','Blue','Light Blue','Cyan','Teal','Green',
                'Light Green','Lime','Yellow','Amber','Orange','Deep Orange','Brown','Grey','Blue Grey','Black'
            );
            $length = count($colors);
        ?>
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    @for($x = 0; $x < $length; $x++)
                        {{--@if($_SERVER['REQUEST_METHOD'] == 'GET')--}}
                            {{--@if($x == 0)--}}
                                {{--<li data-theme="{{$colors[$x]}}" class="active">--}}
                                    {{--<div class="{{$colors[$x]}}"></div>--}}
                                    {{--<span>{{$labels[$x]}}</span>--}}
                                {{--</li>--}}
                            {{--@else--}}
                                {{--<li data-theme="{{$colors[$x]}}" class="">--}}
                                    {{--<div class="{{$colors[$x]}}"></div>--}}
                                    {{--<span>{{$labels[$x]}}</span>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                        {{--@else--}}
                        @if(!(session()->has('active')))
                            @if($x == 0)
                                <li data-theme="{{$colors[$x]}}" class="active" id="{{$x}}">
                                    <div class="{{$colors[$x]}}"></div>
                                    <span>{{$labels[$x]}}</span>
                                </li>
                            @else
                                <li data-theme="{{$colors[$x]}}" class="" id="{{$x}}">
                                    <div class="{{ $colors[$x] }}"></div>
                                    <span>{{$labels[$x]}}</span>
                                </li>
                            @endif
                        @else
                            @if((int)(session()->get('id')) == $x)
                                <li data-theme="{{$colors[$x]}}" class="active" id="{{$x}}">
                                    <div class="{{$colors[$x]}}"></div>
                                    <span>{{$labels[$x]}}</span>
                                </li>
                            @else
                                <li data-theme="{{$colors[$x]}}" class="" id="{{$x}}">
                                    <div class="{{ $colors[$x] }}"></div>
                                    <span>{{$labels[$x]}}</span>
                                </li>
                            @endif
                        @endif


                    @endfor

                       {{--<li data-theme="red" class="active">--}}
                           {{--<div class="red"></div>--}}
                           {{--<span>Red</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="pink" class="{{$aha = session()->has('active') ? 'active': ''}}">--}}
                           {{--<div class="pink"></div>--}}
                           {{--<span>Pink</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="purple" class="{{$active = session()->has('active') ? 'active': ''}}">--}}
                           {{--<div class="purple"></div>--}}
                           {{--<span>Purple</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="deep-purple">--}}
                           {{--<div class="deep-purple"></div>--}}
                           {{--<span>Deep Purple</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="indigo">--}}
                           {{--<div class="indigo"></div>--}}
                           {{--<span>Indigo</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="blue">--}}
                           {{--<div class="blue"></div>--}}
                           {{--<span>Blue</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="light-blue">--}}
                           {{--<div class="light-blue"></div>--}}
                           {{--<span>Light Blue</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="cyan">--}}
                           {{--<div class="cyan"></div>--}}
                           {{--<span>Cyan</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="teal">--}}
                           {{--<div class="teal"></div>--}}
                           {{--<span>Teal</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="green">--}}
                           {{--<div class="green"></div>--}}
                           {{--<span>Green</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="light-green">--}}
                           {{--<div class="light-green"></div>--}}
                           {{--<span>Light Green</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="lime">--}}
                           {{--<div class="lime"></div>--}}
                           {{--<span>Lime</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="yellow">--}}
                           {{--<div class="yellow"></div>--}}
                           {{--<span>Yellow</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="amber">--}}
                           {{--<div class="amber"></div>--}}
                           {{--<span>Amber</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="orange">--}}
                           {{--<div class="orange"></div>--}}
                           {{--<span>Orange</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="deep-orange">--}}
                           {{--<div class="deep-orange"></div>--}}
                           {{--<span>Deep Orange</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="brown">--}}
                           {{--<div class="brown"></div>--}}
                           {{--<span>Brown</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="grey">--}}
                           {{--<div class="grey"></div>--}}
                           {{--<span>Grey</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="blue-grey">--}}
                           {{--<div class="blue-grey"></div>--}}
                           {{--<span>Blue Grey</span>--}}
                       {{--</li>--}}
                       {{--<li data-theme="black">--}}
                           {{--<div class="black"></div>--}}
                           {{--<span>Black</span>--}}
                       {{--</li>--}}

                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>