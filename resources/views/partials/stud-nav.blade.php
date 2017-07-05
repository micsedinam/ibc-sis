<div class="sidebar" data-background-color="white" data-active-color="warning">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{url('home')}}" class="simple-text">
                    EDU-HUB NODASS
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{url('home')}}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{url('forum')}}">
                        <i class="ti-comments"></i>
                        <p>Forum</p>
                    </a>
                </li> --}}
                <li>
                    <a href="{{url('fees')}}">
                        <i class="ti-view-list-alt"></i>
                        <p>Fees</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('notice')}}">
                        <i class="ti-clipboard"></i>
                        <p>Notice</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('results')}}">
                        <i class="ti-write"></i>
                        <p>Results</p>
                    </a>
                </li>
            </ul>
    	</div>
</div>