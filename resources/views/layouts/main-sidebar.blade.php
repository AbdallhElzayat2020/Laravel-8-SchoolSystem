<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span
                                        class="right-nav-text">{{ __('language.dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">{{ __('language.Dashboard_page') }}</a></li>
                        </ul>
                    </li>

                    {{-- Grades List --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                        class="right-nav-text">{{ __('language.Grades') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('grades.index') }}">{{ __('language.Grades_list') }}</a></li>
                        </ul>
                    </li>

                    {{-- Classes List --}}
                    <li>
                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                        class="right-nav-text">{{ __('My_Classes_trans.title_page') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('classrooms.index') }}">{{ __('My_Classes_trans.List_classes') }}
                                </a></li>
                        </ul>
                    </li>

                    {{-- List_Teachers --}}

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="fas fa-user-tie"></i>
                                <span class="right-nav-text">
                                    {{ __('language.Teachers') }}
                                </span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Teachers.index') }}">{{ __('language.List_Teachers') }}</a></li>
                        </ul>
                    </li>


                    {{-- Sections List --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                                        class="right-nav-text">{{ __('Sections_trans.title_page') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('sections.index') }}"><i class="ti-menu-alt"></i><span
                                            class="right-nav-text">{{ __('Sections_trans.List_sections') }}</span> </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Parents List --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                        class="right-nav-text">{{ __('language.Parents') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ url('add_parent') }}">{{ __('language.List_Parents') }}</a></li>
                        </ul>
                    </li>


                    {{-- List_Students --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i
                                    class="fas fa-user-graduate"></i>{{ trans('language.students') }}
                            <div
                                    class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                   data-target="#Student_information">{{ trans('language.Student_information') }}
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Student_information" class="collapse">
                                    <li><a
                                                href="{{ route('Students.create') }}">{{ trans('language.add_student') }}</a>
                                    </li>
                                    <li><a
                                                href="{{ route('Students.index') }}">{{ trans('language.list_students') }}</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                   data-target="#Students_upgrade">{{ trans('language.Students_Promotions') }}
                                    <div
                                            class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Students_upgrade" class="collapse">
                                    <li><a
                                                href="{{ route('Promotions.index') }}">{{ trans('language.add_Promotion') }}</a>
                                    </li>
                                    <li><a
                                                href="{{ route('Promotions.create') }}">{{ trans('language.list_Promotions') }}</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                   data-target="#Graduate students">{{ trans('language.Graduate_students') }}
                                    <div
                                            class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Graduate students" class="collapse">
                                    <li>
                                        <a
                                                href="{{ route('Graduated.create') }}">{{ trans('language.add_Graduate') }}</a>
                                    </li>
                                    <li>
                                        <a
                                                href="{{ route('Graduated.index') }}">{{ trans('language.list_Graduate') }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    {{-- Accounts--> --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                        class="right-nav-text">{{ trans('language.Accounts') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Fees.index') }}">الرسوم الدراسية</a></li>
                            <li><a href="{{ route('Fees_Invoices.index') }}">قائمة الفواتير</a></li>
                            <li><a href="{{ route('ProcessingFee.index') }}">استبعاد رسوم</a></li>
                            <li><a href="{{ route('Payment_students.index') }}">سندات الصرف</a></li>
                        </ul>
                    </li>


                    <!-- Attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                            <div class="pull-left"><i class="fas fa-calendar-alt"></i><span
                                        class="right-nav-text">{{trans('language.Attendance')}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Attendance.index')}}">قائمة الطلاب</a></li>
                        </ul>
                    </li>


                    <!-- Subjects-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subjects">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">المواد الدراسية</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Subjects" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('subjects.index')}}">قائمة المواد</a></li>
                        </ul>
                    </li>

                    <!-- Quizzes-->
                    <!-- Quizzes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">الاختبارات</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('questions.index')}}">قائمة الاسئلة</a></li>
                            <li><a href="{{route('Quizzes.index')}}">قائمة الاختبارات</a> </li>
                        </ul>
                    </li>

                    <!-- menu item maps-->
                    <li>
                        <a href="maps.html"><i class="ti-location-pin"></i><span class="right-nav-text">maps</span>
                            <span class="badge badge-pill badge-success float-right mt-1">06</span></a>
                    </li>
                    <!-- menu item timeline-->
                    <li>
                        <a href="timeline.html"><i class="ti-panel"></i><span class="right-nav-text">timeline</span>
                        </a>
                    </li>
                    <!-- menu item Multi level-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                            <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">Multi
                                    level Menu</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level
                                    item 1
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="auth" class="collapse">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                           data-target="#login">Level
                                            item 1.1
                                            <div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="login" class="collapse">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="collapse"
                                                   data-target="#invoice">level item 1.1.1
                                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <ul id="invoice" class="collapse">
                                                    <li><a href="#">level item 1.1.1.1</a></li>
                                                    <li><a href="#">level item 1.1.1.2</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">level item 1.2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level
                                    item 2
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="error" class="collapse">
                                    <li><a href="#">level item 2.1</a></li>
                                    <li><a href="#">level item 2.2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>


            <!-- Start About -->
            <div class="about">
                <div class="container">
                    <h2 class="special-heading">About</h2>
                    <p>Less is more work</p>
                    <div class="about-content">
                        <div class="image">
                            <img decoding="async" src="images/about.jpg" alt=""/>
                        </div>
                        <div class="text">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil nemo neque voluptate
                                tempora velit cum non,
                                fuga vitae architecto delectus sed maxime rerum impedit aliquam obcaecati, aut excepturi
                                iusto laudantium!
                            </p>
                            <hr/>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, sapiente. Velit iure
                                exercitationem
                                dolores nesciunt dolore. Eum officiis dolorum hic voluptate quaerat minima, similique
                                inventore esse,
                                alias, sed quo officia?
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Start About -->
            <div class="about">
                <div class="container">
                    <h2 class="specile-heading">About</h2>
                    <p>Less is more work</p>
                    <div class="about-content">
                        <div class="image">
                            <img src="./images/about.jpg" alt="">
                        </div>
                        <div class="text">
                            <p>
                                “Work less and do more” refers to the idea of optimizing productivity by focusing on
                                efficiency rather than
                                quantity. The goal is to achieve greater outcomes without overextending oneself, often
                                by prioritizing,
                                automating, and streamlining tasks.
                            </p>
                            <hr>
                            <p>
                                “Work less and do more” refers to the idea of optimizing productivity by focusing on
                                efficiency rather than quantity. The goal is to achieve greater outcomes without
                                overextending oneself, often by prioritizing, automating, and streamlining tasks.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End About -->


            <!-- End About -->
        </div>

        <!-- Left Sidebar End-->
