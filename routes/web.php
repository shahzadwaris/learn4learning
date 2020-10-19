<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/resend-email/{email}','UserController@resendEmailAddress')->name('resendEmailAddress');

Route::get('/email/design', function (){
    return view('mail.successRegister');
});

Route::group(['Public'], function () {
    Route::get('/', 'UserController@homePage')->name('homee');
    Route::get('/for-parents', 'PageController@forParent')->name('parents');
    Route::get('/for-teachers', 'PageController@forTeachers')->name('teachers');
    Route::get('/for-students', 'PageController@forStudents')->name('students');
    Route::get('/mockupschedule', 'PageController@mockupschedule')->name('mockupschedule');
    Route::get('/how-it-works', 'PageController@howitworks')->name('howitworks');
    Route::get('/student-lesson{id}', 'PageController@studentLesson')->name('studentLesson');
    Route::get('/teacher-profile/{id}', 'PageController@teacherProfile')->name('teacherProfile');
    Route::get('/admin-users-approve/{id}', 'PageController@adminUsersApprove')->name('adminUsersApprove');
    Route::get('/donate', function () {
        return view('frontend.pages.donate');
    })->name('donate');
    Route::get('edit/profile', 'PageController@edit_profile')->name('edit.profile');
    Route::get('add/donation', 'PageController@addDonation')->name('Donation');

    Route::post('/add-donations', 'PageController@stirpepaymentgatway')->name('stirpepaymentgatway');
    Route::get('/add-paypal/payment', 'PageController@paypalpaymentgatwway')->name('paypalpaymentgatwway');
    Route::post('stripe', 'PageController@stripePost')->name('stripe.post');

    Route::post('/checkout/stripepayment', 'PageController@stripePayment')->name('stripepayment');
    Route::get('/checkout/Paypal', 'PageController@paypalpaymentgatwway')->name('paypalpaymentgatwway');

    Route::post('/search/Subjects', 'UserController@searchSubForSubjectHome')->name('searchSubForSubjectHome');

    /**
     * register pages for students
     */
    Route::get('register/students/profile', function () {
        return view('auth.students.student-profile');
    })->name('studentprofile');
    Route::get('register/students/subject', function () {
        return view('auth.students.student-subject');
    })->name('studentsubject');

    Route::get('/register/check/{email}', 'UserController@checkMail');

    /**
     * register pages for teachers
     */
    Route::get('register/teachers/profile', function () {
        return view('auth.teachers.teachers.teacher-profile');
    })->name('studentprofile');
    Route::get('register/teachers/subjects', function () {
        return view('auth.teachers.teacher-subjects');
    })->name('studentsubject');
    Route::get('/skip', 'UserController@skip')->name('skip');

    Route::group(['Auth'], function () {
        Route::post('/login', 'Auth/LoginController@login')->name('login');
        Route::get('/register', 'UserController@registerview')->name('register');
        Route::post('/signup', 'UserController@add_user');
        Route::get('/show-form', 'UserController@showForm');
        Route::get('/select-Subjects', 'StudentController@selectSubjects')->name('selectSubjects');
        Route::get('/save-new-subject', 'StudentController@saveNewSubject')->name('save-new-subject');
        Route::post('/get-subjects', 'StudentController@getSubjects')->name('getSubjects');
        Route::post('/get-profile', 'StudentController@getProfile')->name('getProfile');
        Route::post('/teacher-subjects', 'TeacherController@teacherSubjects')->name('teacherSubjects');

        Route::post('/get-teacher-profile', 'TeacherController@getteacherProfile')->name('getteacherProfile');
        Route::get('/view-teacher-profile', 'TeacherController@viewTeacherProfile')->name('viewTeacherProfile');
        Route::get('view.subject', 'StudentController@viewSubjects')->name('view_Mysubjects');
    });
});

Route::get('/teacher-subjects', '@saveNewSubject')->name('save-new-subject');

// Auth::routes();
Auth::routes(['verify' => true]);

Route::group(['private'], function () {
    //*********** if call inAuthorized route*************
    Route::get('/denied', function () {
        return 'denied';
    })->name('denied');
    /// admin routes
    Route::group(['Admin', 'middleware' => 'CheckUserType:' . 'admin'], function () {
        Route::get('/home', 'HomeController@index')->name('home');

//            Route::group(['middleware' => 'auth'], function () {
        Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
        Route::get('/for-Parent', 'PageController@forParents')->name('forParents');
        Route::get('/for-Student', 'PageController@forStudent')->name('forStudent');
        Route::get('/for-Teacher', 'PageController@forTeacher')->name('forTeacher');
        Route::get('/new-users', 'PageController@newUsers')->name('newUsers');
        Route::get('/schedule-Poster', 'PageController@schedulePoster')->name('schedulePoster');
        Route::get('/all-students', 'PageController@allStudents')->name('allStudents');
        Route::get('/all-teachers', 'PageController@allTeachers')->name('allTeachers');
        Route::get('/new-users', 'PageController@newUsers')->name('newUsers');
        Route::get('/Userid/{id}', 'PageController@Userid')->name('Userid');

        //                        how-it-works

        Route::get('/how-it-Poster', 'PageController@howItPoster')->name('howItPoster');
        Route::post('/edit-Poster/{id}', 'PageController@editPoster')->name('editPoster');
        Route::post('/edit-how-it-works/{id}', 'PageController@editHowItWorks')->name('editHowItWorks');
        Route::post('/edit-for-parents/{id}', 'PageController@editforParents')->name('editforParents');
        Route::post('/edit-for-students/{id}', 'PageController@editforStudent')->name('editforStudent');
        Route::post('/edit-for-teachers/{id}', 'PageController@editforTeacher')->name('editforTeacher');

        Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
        Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
        Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
        Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
        Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
        Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
//            });

//            Route::group(['middleware' => 'auth'], function () {
        Route::resource('user', 'UserController', ['except' => ['show']]);
        Route::get('edit-user/{id}', 'UserController@editUser')->name('editUser');
        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
        Route::get('user-Management', 'ProfileController@userManagement')->name('userManagement');

        Route::get('Block/{id}', 'ProfileController@admin_Block')->name('admin.Block');
        Route::get('Active/{id}', 'ProfileController@admin_Active')->name('admin.Active');

        Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
        Route::post('profile/password', 'ProfileController@password')->name('profile.passwordss');
//            });

        //shahzad
        Route::get('/mail-configuration', 'Admin\EmailConfigurationController@index')->name('email-config');
        Route::post('/mail-configuration-store', 'Admin\EmailConfigurationController@store')->name('email-config.store');
        Route::post('/mail-configuration-update/{email}', 'Admin\EmailConfigurationController@update')->name('email-config.update');
        Route::get('/mail-configuration-edit/{email}', 'Admin\EmailConfigurationController@edit')->name('email-config.edit');

        /** Pages */
        Route::get('/admin/pages', "Admin\PagesController@index")->name('pages.index');
        Route::get('/admin/pages/create', "Admin\PagesController@create")->name('pages.create');
        Route::post('/admin/pages/store', "Admin\PagesController@store")->name('pages.store');
        Route::get('/admin/pages/edit/{page}', "Admin\PagesController@edit")->name('pages.edit');
        Route::post('/admin/pages/update/{page}', "Admin\PagesController@update")->name('pages.update');
        Route::get('/admin/pages/delete/{page}', "Admin\PagesController@destroy")->name('pages.destroy');
        Route::get('/admin/pages/show/{page}', "Admin\PagesController@show")->name('pages.show');
    });


    //student routes
    Route::get('student-select-subjects','UserController@verifiedSuccess')->name('verifiedStudentSuccess');
    Route::get('/student-verify-email','HomeController@verifyEmailAddress')->name('student-verify-email');
    Route::group(['Admin', 'middleware' => ['CheckUserType:' . 'student', 'verified']], function () {
        Route::get('/students/lesssn', 'StudentController@studentLessson')->name('studentLessson');
        Route::get('/students/Home', 'StudentController@studentHome')->name('studentHome');
        Route::get('/add-to-calender/{lesson}', 'StudentController@addToCalender')->name('addToCalender');
        Route::get('student/schedule', 'StudentController@student_schedule')->name('student_schedule');
        Route::get('student/homework', 'StudentController@studetnsHomeWorks')->name('studetnsHomeWork');
        Route::get('/view/teacher/{id}/', 'StudentController@viewSeperatetea')->name('viewSeperatetea');
        Route::get('/view/our/messages', 'StudentController@viewOurMessages')->name('viewOurMessages');
        Route::get('/Messages/{id}/', 'StudentController@viewMessages')->name('viewMessages');
        Route::get('/get/student/messages/{t_id}', 'StudentController@getStudentMessages')->name('getStudentMessages');
        Route::post('/OurMessages/', 'StudentController@OurMessages')->name('OurMessages');
        Route::get('/view/{id}', 'StudentController@viewHomework')->name('viewHomework');
        Route::post('/upload/documnet', 'StudentController@uploadDocs')->name('student.uploadDocs');
        Route::get('/edit/studentd', 'StudentController@student_edit_profile')->name('student_edit_profile');
        Route::post('/update/studentd', 'StudentController@editstudenterprofile')->name('editstudenterprofile');
        Route::post('/Search/homework', 'StudentController@SearchStudentHomeworks')->name('SearchStudentHomeworks');
        Route::get('/Subjects', 'StudentController@My_subjects')->name('My_subjects');

        Route::post('/view/teacher-dashboard', 'StudentController@viewteacherdashboard')->name('viewteacherdashboard');
        Route::get('/student-account', 'StudentController@myAccount')->name('student.account');
        Route::post('/student-account-update', 'StudentController@updateProfile')->name('student.account.update');

        Route::get('/search-subject-lessons', 'SearchController@search')->name('subjects.search');

        Route::get('/student/my-grades', 'GradeController@index')->name('grade.index');
    });


    // teachers routes
    Route::get('teacher-select-subjects','UserController@verifiedSuccess')->name('verifiedSuccess');
    Route::get('/teacher-verify-email','HomeController@verifyEmailAddress')->name('teacher-verify-email');
    Route::group(['Admin', 'middleware' => ['CheckUserType:' . 'teacher', 'verified']], function () {
        Route::get('/teacher-add-lesson', 'TeacherController@teacherAddLesson')->name('teacherAddLesson');
        Route::get('/teacher-home', 'TeacherController@teacherHome')->name('teacherHome');
        Route::get('/update-teachere-profile', 'TeacherController@_EditTeacherProfile');
        Route::post('/create-lesson', 'TeacherController@createLesson')->name('createLesson');
        Route::get('/teacher-schedule', 'TeacherController@teacherSchedule')->name('teacherSchedule');
        Route::get('/add/subject', 'TeacherController@teachersubject')->name('teacherssubject');
        Route::get('/Add/homework', 'TeacherController@teacherHomeWork')->name('teacherHomeWork');
        Route::get('/view/student', 'TeacherController@mystudents')->name('mystudents');
        Route::get('/view/my-student', 'TeacherController@getdataofstudent')->name('getdataofstudent');

        Route::get('/view/stu/{id}/', 'TeacherController@viewSeperateStu')->name('viewSeperateStu');
        Route::get('/message/stu/{id}/', 'TeacherController@messages')->name('messages');
        Route::post('/Search/Subject', 'TeacherController@search_subjects_level')->name('search_subjects_level');
        Route::get('/Edit/Lesson{lessonsid}', 'TeacherController@EditLesson')->name('EditLesson');
        Route::post('/update/Lesson', 'TeacherController@EditLessons')->name('teacher.Edit.lesson');
        Route::get('/view-student-profile/{id}', 'TeacherController@View_student_profile')->name('View.student.profile');
        Route::get('/message/{id}', 'TeacherController@messageStudent')->name('Contact.Student');
        Route::get('/get/messages/{s_id}', 'TeacherController@getMessages')->name('getMessages');
        Route::post('/live/message/', 'TeacherController@teacherSideMesages')->name('teacherSideMesages');
        Route::get('/Upload/homework/{lesson}/{subject}', 'TeacherController@addsubjecthomework')->name('addsubjecthomework');
        Route::post('/Add/homework', 'TeacherController@teacheraddHomework')->name('teacher.addHomework');
        // Route::get('/view/homework', 'TeacherController@ViewStudentHomeWork')->name('ViewStudentHomeWork');
        Route::get('view/our/student', 'TeacherController@MySubStudents')->name('Students');
        Route::get('view/Subject', 'TeacherController@MYSubjects')->name('SubjectMy');
        Route::get('View/homeWork', 'TeacherController@ViewStudentsHomeWork')->name('ViewStudentsHomeWork');
        Route::get('View/MyAchevemnt/', 'TeacherController@MyAchevemntss')->name('MyAchevemnt');
        Route::get('View/Acheivment', 'TeacherController@AssignStudentAchevemnt')->name('AssignStudentAchevemnt');
        Route::get(
            'View/assingachevment/{sub_id}/{User_id}/{homeworkid}',
            'TeacherController@assingachevment'
        )->name('assingachevment');

        Route::post('Assign/Grade', 'TeacherController@AssignGrade')->name('AssignGrade');
        Route::post('Add/Grade', 'TeacherController@assigngradeforstudent')->name('assigngradeforstudent');
        Route::get('Edit/profile', 'TeacherController@teacher_edit_profile')->name('teacher_edit_profile');
        Route::post('update/profile', 'TeacherController@editteacherprofile')->name('editteacherprofile');

        Route::post('update/experience', 'TeacherController@Add_experience')->name('Add_experience');
        Route::get('/Search/Homeworks', 'TeacherController@SearchHomeworks')->name('SearchHomeworks');

        Route::get('/Search/Schedule', 'TeacherController@SearchSchedule')->name('SearchSchedule');
        Route::get('/search-studetns', 'TeacherController@searchstudents')->name('searchstudents');
        Route::post('/Assign/Grade', 'TeacherController@Assign_Acivement')->name('Assign_Acivement');
        Route::get('/Account', 'TeacherController@MYaccount')->name('MYaccount');
        Route::get('/Edit/{id}', 'TeacherController@teacher_dashboard_editprofile')->name('teacher-dashboard-editprofile');
        Route::post('/Edit/tacher', 'TeacherController@edit_teacher_dashboard')->name('edit.form.teacher.dashboard');
    });
});

/**
 * shehrayar routes
 */

Route::group(['Public'], function () {
//

    // Route::get('/mockupschedule', function () {return view('frontend.pages.mockup-schedule');})->name('mockupschedule');
    Route::get('/donate', function () {
        return view('frontend.pages.donate');
    })->name('donate');

    /**
     * register pages for students
     */
    Route::get('register/students/level', function () {
        return view('views.frontend.register.students.student-level');
    })->name('studentlevel');
    Route::get('register/students/profile', function () {
        return view('views.frontend.register.students.student-profile');
    })->name('studentprofile');
    Route::get('register/students/subject', function () {
        return view('views.frontend.register.students.student-subject');
    })->name('studentsubject');
    Route::get('register/students/student-lesson-page', function () {
        return view('views.frontend.register.students.student-lesson-page');
    })->name('student-lesson-page');
    Route::get('register/students/student-lesson-search', function () {
        return view('views.frontend.register.students.student-lesson-search');
    })->name('student-lesson-search');
    Route::get('register/students/student-schedule', function () {
        return view('frontend.pages.students.student-schedule');
    })->name('student-schedule');

    Route::get('register/students/student-homepage', function () {
        return view('views.frontend.register.students.student-homepage');
    })->name('student-homepage');
    Route::get('register/students/teacher-profile-view', function () {
        return view('views.frontend.register.students.teacher-profile-view');
    })->name('teacher-profile-view');
    Route::get('register/students/student-homework', function () {
        return view('views.frontend.register.students.student-homework');
    })->name('student-homework');

    /**
     * register pages for teachers
     */
    Route::get('register/students/teacher-homepage', function () {
        return view('views.frontend.register.students.teacher-homepage');
    })->name('teacher-homepage');
    Route::get('register/teachers/profile', function () {
        return view('views.frontend.register.teachers.teacher-profile');
    })->name('studentprofile');
    Route::get('register/teachers/subjects', function () {
        return view('views.frontend.register.teachers.teacher-subjects');
    })->name('studentsubject');
    Route::get('auth', function () {
        return view('views.auth.register2');
    })->name('register2');
    Route::get('register/students/add-lesson', function () {
        return view('views.frontend.register.students.add-lesson');
    })->name('add-lesson');
});
/** shahzad */
Route::get('/page/{page}', "Admin\PagesController@show")->name('page.show');
