<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="start active">
                <a href="/dashboard.php">
                    <i style="float: left; margin: 2px 6px 4px 7px;" class="icon-home"></i>
                    <span class="title">ড্যাশবোর্ড</span>
                </a>
            </li>



            <?php

            include 'config.php';

            // get the info from the db
            $interest_query = "SELECT * FROM `interest` ORDER BY `interest_id` ASC";
            $interest_result = mysqli_query($conn, $interest_query);

            $interest_rows =mysqli_num_rows($interest_result);


            while ($interest_info = mysqli_fetch_array($interest_result)) {

                echo ' <li>';
               echo ' <a href="/interest.php?interest=';
               echo $interest_info['interest_id'];
               echo '" class="service-list" data-s_id="13"><span class="title">';

                    echo $interest_info['interest_name'];
                    echo "</span>
                </a>
            </li>";

            }

            ?>



            <li>
                <a href="/users" class="service-list" data-s_id="13">
                    <!--                                <form class="login-form" action="http://oh.lams.gov.bd/emutationSso" method="post">-->
                    <span class="title">ব্যবহারকারীর তালিকা</span>
                    <!--                                    <input type="hidden" name="username" value="palashmondal"/><input type="hidden" name="password" value="ACL@Mohanagar002"/></form>-->
                </a>
            </li>
            <li>
                <a href="/mouja.php" class="service-list" data-s_id="13">
                    <!--                                <form class="login-form" action="http://oh.lams.gov.bd/emutationSso" method="post">-->
                    <span class="title">মৌজা তালিকা</span>
                    <!--                                    <input type="hidden" name="username" value="palashmondal"/><input type="hidden" name="password" value="ACL@Mohanagar002"/></form>-->
                </a>
            </li>

            <li>
                <a href="javascript:;">
                    <span class="title">আর্কাইভ</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="/mutation/archive/cases/index/22">

                            <span class="title">মঞ্জুর মামলার আর্কাইভ</span>

                        </a>
                    </li>

                    <li>

                        <a href="/mutation/archive/cases/namonjur-mamla/9">

                            <span class="title">নামঞ্জুর মামলার আর্কাইভ</span>

                        </a>
                    </li>
                    <li>

                        <a href="/mutation/archive/cases/namonjur-mamla/27">

                            <span class="title">বাতিল মামলার আর্কাইভ</span>

                        </a>
                    </li>
                    <li>
                        <a href="/mutation/khotians">
                            <span class="title">নামজারি খতিয়ান</span>
                        </a>
                    </li>
                </ul>


            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->

