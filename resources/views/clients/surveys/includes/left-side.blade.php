<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                @foreach($survey->sections as $section)
                <li class="">
                    <a href="{{route('clients.surveys.section.show',['uuid'=>$uuid,'survey_id'=>$survey_id,'section_id'=>$section->id])}}">
                        <i class="material-icons">assignment</i>
                        <span>{{$section->strSectionTitle == null? 'Untitled section':$section->strSectionTitle}}</span>

                    </a>
                </li>
                    @endforeach
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
</section>