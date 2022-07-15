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
                <a href="/dashboard.php">
                    <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-home"></i>
                    <span class="title">ড্যাশবোর্ড</span>
                </a>
            </li>
            <li class="start active">
                <a href="/infograph.php">
                    <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-info"></i>
                    <span class="title">মৌজাভিত্তিক তথ্য</span>
                </a>
            </li>

            <li class="">
                <a href="#" class="">
                    <i style="float: left; margin: 2px 6px 4px 7px;" class="a2i_gn_settings1"></i>
                    <span>সেটিংস</span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li>
                        <a href="/mouja.php" class="service-list" data-s_id="13">
                            <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-flag"></i>
                            <!--
                                                                         <form class="login-form" action="http://oh.lams.gov.bd/emutationSso" method="post">-->
                            <span class="title">মৌজা তালিকা</span>
                            <!--                                    <input type="hidden" name="username" value="palashmondal"/><input type="hidden" name="password" value="ACL@Mohanagar002"/></form>-->
                        </a>
                    </li>
                    <li>
                        <a href="/interest.php" class="service-list" data-s_id="13">
                            <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-list"></i>
                            <!--                                <form class="login-form" action="http://oh.lams.gov.bd/emutationSso" method="post">-->
                            <span class="title">সরকারি স্বার্থের ধরণ</span>
                            <!--                                    <input type="hidden" name="username" value="palashmondal"/><input type="hidden" name="password" value="ACL@Mohanagar002"/></form>-->
                        </a>
                    </li>
                    <li>
                        <a href="/profile.php" class="service-list" data-s_id="13">
                            <i class="a2i_gn_usermanagement1"></i>
                            <!--                                <form class="login-form" action="http://oh.lams.gov.bd/emutationSso" method="post">-->
                            <span class="title">অফিস নাম</span>
                            <!--                                    <input type="hidden" name="username" value="palashmondal"/><input type="hidden" name="password" value="ACL@Mohanagar002"/></form>-->
                        </a>
                    </li>
                </ul>
            </li>
            <li class="open">
                <a href="#" class="">
                    <i style="float: left; margin: 2px 6px 4px 7px;" class="a2i_gn_settings1"></i>
                    <span>সরকারি স্বার্থের তালিকা</span>
                </a>
                <ul class="sub-menu" style="display: block;"> <?php

                    include 'config.php';

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

                    ?> </ul>
            <li>
                <a href="/help.php" class="service-list" data-s_id="13">
                    <i class="a2i_gn_usermanagement1"></i>
                    <!--                                <form class="login-form" action="http://oh.lams.gov.bd/emutationSso" method="post">-->
                    <span class="title">সাহায্য ও প্রশ্ন-উত্তর</span>
                    <!--                                    <input type="hidden" name="username" value="palashmondal"/><input type="hidden" name="password" value="ACL@Mohanagar002"/></form>-->
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->