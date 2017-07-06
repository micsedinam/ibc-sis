<div class="sidebar" data-background-color="white" data-active-color="warning">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{url('admin')}}" class="simple-text">
                    EDU-HUB NODASS
                </a>
            </div>

            <ul class="nav">
                {{-- <li>
                    <a href="{{url('admin/index')}}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li> --}}
               {{--  <li>
                    <a href="{{url('admin/forum')}}">
                        <i class="ti-comments"></i>
                        <p>Forum</p>
                    </a>
                </li> --}}
                <li>
                    <a href="{{url('admin/fees')}}">
                        <i class="fa fa-list-alt"></i>
                        <p>Fees</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/notice')}}">
                        <i class="ti-clipboard"></i>
                        <p>Notice</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/manage-results')}}">
                        <i class="fa fa-file-text"></i>
                        <p>Results</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/subjects')}}">
                        <i class="ti-book"></i>
                        <p>Subjects</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/programme')}}">
                        <i class="ti-blackboard"></i>
                        <p>Programmes</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/add-admin')}}">
                        <i class="ti-pencil"></i>
                        <p>Register Admin</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/parent')}}">
                        <i class="fa fa-archive"></i>
                        <p>Parent Management</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/staff')}}">
                        <i class="fa fa-archive"></i>
                        <p>Staff Management</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/student')}}">
                        <i class="fa fa-graduation-cap"></i>
                        <p>Register Student</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/passreset')}}">
                        <i class="ti-lock"></i>
                        <p>Reset Password</p>
                    </a>
                </li>
            </ul>
    	</div>
</div>