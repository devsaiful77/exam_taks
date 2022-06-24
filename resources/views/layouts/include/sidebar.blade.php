<div class="deznav-scroll">
    <ul class="metismenu" id="menu">
        {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-networking"></i>
                <span class="nav-text">Dashboard</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="index.html">Dashboard</a></li>

                <li><a href="page-analytics.html">Analytics</a></li>
                <li><a href="page-review.html">Review</a></li>
                <li><a href="page-order.html">Order</a></li>
                <li><a href="page-order-list.html">Order List</a></li>
                <li><a href="page-general-customers.html">General Customers</a></li>
            </ul>
        </li> --}}

        <li>
          <router-link to="/home" class="ai-icon" aria-expanded="false">
                {{-- <i class="flaticon-381-settings-2"></i> --}}
                <span class="nav-text">Dashboard</span>
            </router-link>
        </li>

        {{-- <li>
            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-networking"></i>
                <span class="nav-text">Partner</span>
            </a>
            <ul aria-expanded="false">
                <li>
                    <router-link :to="{ name: 'create-partner' }">Create Partner</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'list-partner' }">Create Partner</router-link>
                </li>
            </ul>
        </li> --}}

        {{-- Employee Module --}}
        {{-- <li>
            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-male"></i>
                <span class="nav-text">Employee</span>
            </a>
            <ul aria-expanded="false">
                <li>
                    <router-link :to="{ name: 'employee-create' }">Create Employee</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'employee-list' }">All Employee</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'create-partner' }">Partner</router-link>
                </li>
            </ul>
        </li> --}}

        <li>
            <router-link :to="{ name: 'course-list' }">Course List</router-link>
        </li>

        <li>
            <router-link :to="{ name: 'student-list' }">Student List</router-link>
        </li>

        <li>
            <router-link :to="{ name: 'marks-list' }">Marks List</router-link>
        </li>

        <li>
          <router-link to="/logout" class="ai-icon" aria-expanded="false">
                {{-- <i class="fas fa-power-off"></i> --}}
                <span class="nav-text">Logout</span>
          </router-link>
        </li>
    </ul>

    <hr>
    <hr>
    {{-- <div class="copyright">
        <p><strong>Davur - Restaurant Admin Dashboard</strong> © 2021 All Rights Reserved</p>
        <p>Made with <span class="heart"></span> by DexignZone</p>
    </div> --}}
</div>
