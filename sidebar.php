<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="start ">
                <a href="/" target="_blank">
                    <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-magnifier"></i>
                    <span class="title">দাগ সার্চ করুন</span>
                </a>
            </li>
            <li class="start active">
                <a href="/dashboard">
                    <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-home"></i>
                    <span class="title">ড্যাশবোর্ড</span>
                </a>
            </li>
            <li class="start">
                <a href="/add">
                    <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-plus"></i>
                    <span class="title">নতুন তথ্য যুক্ত করুন</span>
                </a>
            </li>
            <li class="start">
                <a href="/infograph">
                    <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-graph"></i>
                    <span class="title">তথ্যচিত্র</span>
                </a>
            </li>

            <li class="">
                <a href="#" class="">
                    <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-settings"></i>
                    <span class="title">সেটিংস</span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li>
                        <a href="/mouja" class="service-list" data-s_id="13">
                            <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-flag"></i>
                                <span class="title">মৌজা তালিকা</span>
                        </a>
                    </li>
                    <li>
                        <a href="/interest" class="service-list" data-s_id="13">
                            <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-list"></i>
                            <span class="title">সরকারি স্বার্থের ধরণ</span>
                        </a>
                    </li>
                    <li>
                        <a href="/profile" class="service-list" data-s_id="13">
                            <i class="a2i_gn_usermanagement1"></i>
                            <span class="title">অফিস নাম</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="#" class="">
                    <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-settings"></i>
                    <span class="title">মৌজাভিত্তিক তথ্য</span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <?php

                    // get the info from the db
                    $mouja_query = "SELECT * FROM `mouja` ORDER BY `id` ASC";
                    $mouja_result = mysqli_query($conn, $mouja_query);

                    while ($mouja_info = mysqli_fetch_array($mouja_result)) {

                        echo ' 
					<li> ';
                        echo ' 
						<a href="/mouja_details.php?mouja=';
                        echo $mouja_info['id'];
                        echo '" class="service-list" data-s_id="13">
							<i style="float: left; margin: 2px 6px 4px 7px;" class="icon-map"></i>
							<span class="title">';

                        echo $mouja_info['name'];
                        echo "</span>
						</a>
					</li>";

                    }

                    ?>

                </ul>
            </li>

            <li class="open">
                <a href="#" class="">
                    <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-list"></i>
                    <span class="title">সরকারি স্বার্থের তালিকা</span>
                </a>
                <ul class="sub-menu" style="display: block;">
                    <?php

                    // get the info from the db
                    $interest_query = "SELECT * FROM `interest` ORDER BY `interest_id` ASC";
                    $interest_result = mysqli_query($conn, $interest_query);

                    $interest_rows = mysqli_num_rows($interest_result);


                    while ($interest_info = mysqli_fetch_array($interest_result)) {

                        echo ' 
					<li> ';
                        echo ' 
						<a href="/interest_details.php?interest=';
                        echo $interest_info['interest_id'];
                        echo '" class="service-list" data-s_id="13">
							<i style="float: left; margin: 2px 6px 4px 7px;" class="icon-book-open"></i>
							<span class="title">';

                        echo $interest_info['interest_name'];
                        echo "</span>
						</a>
					</li>";

                    }

                    ?>
                </ul>
            <li>
                <a href="/help" class="service-list" data-s_id="13">
                    <i class="icon-question"></i>
                   <span class="title">সাহায্য ও প্রশ্ন-উত্তর</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->