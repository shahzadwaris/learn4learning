<?php $__env->startSection('title','Teacher Profile'); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/teacher-profile.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min-for-teacher-homepage.css')); ?>">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>


    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/teacher-homepage/teaching_banner.jpg')); ?>">
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>
    <!-- Card -->

    

    <section class="dashboard-section" id="messages">
        <div class="container">
            <div class="row d-flex justify-content-center text-center h-100">
                <div class="col-12" id="std-dashboard-left">
                    <div class="stu-home-dash-head-div">
                        <p class="stu-home-dash-head-head">TEACHER PROFILE</p>
                        <hr>
                    </div>
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row container d-flex justify-content-center">
                                <div class="col-md-6">
                                    <div class="card card-bordered">
                                        <div class="card-header">
                                            <h4 class="card-title"><strong>Chat</strong></h4> <a class="btn btn-xs btn-secondary" href="#" data-abc="true"></a>
                                        </div>
                                        <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">





                                            <div v-for="messages in allMessages">
                                                <div v-if="messages.from_user_id == '<?php echo e(\Auth::user()->id); ?>'">
                                                    <div class="media media-chat media-chat-reverse">
                                                        <div class="media-body">
                                                            <p>{{ messages.messages }}</p>
                                                            <p class="meta"><time datetime="2018">00:12</time></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div v-else class="media media-chat"> <img class="avatar" src="<?php echo e(asset('asset/images/student-homepage/child.jpg')); ?>" alt="...">
                                                    <div class="media-body">
                                                        <p>{{ messages.messages }}</p>
                                                        <p class="meta"><time datetime="2018">00:12</time></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                            </div>
                                            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                                                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                                            </div>
                                        </div>

                                            <?php echo csrf_field(); ?>

                                            <input type="hidden" name="teacherid" value="<?php echo e($teacherid); ?>">
                                            <input type="hidden" name="STU_ID" value="<?php echo e($STU_ID); ?>">

                                            <div class="publisher bt-1 border-light">
                                                <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                                                <input class="publisher-input" v-model="message" type="text"  name="msg" placeholder="Write something">
                                                <span class="publisher-btn file-group">
                                                    <i class="fa fa-paperclip file-browser"></i>
                                                    <input type="file"> </span>
                                                <a class="publisher-btn" href="#" data-abc="true">
                                                    <i class="fa fa-smile"></i>
                                                </a>
                                                <input type="button" @click="sendMessage()" class="btn btn-success" value="send" name="submit">
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style type="text/css">
        .card-bordered {
            border: 1px solid #ebebeb
        }

        .card {
            border: 0;
            border-radius: 0px;
            margin-bottom: 30px;
            -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
            -webkit-transition: .5s;
            transition: .5s
        }

        .padding {
            padding: 3rem !important
        }

        body {
            background-color: #f9f9fa
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
        }

        .card-header {
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            align-items: center;
            padding: 15px 20px;
            background-color: transparent;
            border-bottom: 1px solid rgba(77, 82, 89, 0.07)
        }

        .card-header .card-title {
            padding: 0;
            border: none
        }

        h4.card-title {
            font-size: 17px
        }

        .card-header>*:last-child {
            margin-right: 0
        }

        .card-header>* {
            margin-left: 8px;
            margin-right: 8px
        }

        .btn-secondary {
            color: #4d5259 !important;
            background-color: #e4e7ea;
            border-color: #e4e7ea;
            color: #fff
        }

        .btn-xs {
            font-size: 11px;
            padding: 2px 8px;
            line-height: 18px
        }

        .btn-xs:hover {
            color: #fff !important
        }

        .card-title {
            font-family: Roboto, sans-serif;
            font-weight: 300;
            line-height: 1.5;
            margin-bottom: 0;
            padding: 15px 20px;
            border-bottom: 1px solid rgba(77, 82, 89, 0.07)
        }

        .ps-container {
            position: relative
        }

        .ps-container {
            -ms-touch-action: auto;
            touch-action: auto;
            overflow: hidden !important;
            -ms-overflow-style: none
        }

        .media-chat {
            padding-right: 64px;
            margin-bottom: 0
        }

        .media {
            padding: 16px 12px;
            -webkit-transition: background-color .2s linear;
            transition: background-color .2s linear
        }

        .media .avatar {
            flex-shrink: 0
        }

        .avatar {
            position: relative;
            display: inline-block;
            width: 36px;
            height: 36px;
            line-height: 36px;
            text-align: center;
            border-radius: 100%;
            background-color: #f5f6f7;
            color: #8b95a5;
            text-transform: uppercase
        }

        .media-chat .media-body {
            -webkit-box-flex: initial;
            flex: initial;
            display: table
        }

        .media-body {
            min-width: 0
        }

        .media-chat .media-body p {
            position: relative;
            padding: 6px 8px;
            margin: 4px 0;
            background-color: #f5f6f7;
            border-radius: 3px;
            font-weight: 100;
            color: #9b9b9b
        }

        .media>* {
            margin: 0 8px
        }

        .media-chat .media-body p.meta {
            background-color: transparent !important;
            padding: 0;
            opacity: .8
        }

        .media-meta-day {
            -webkit-box-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            align-items: center;
            margin-bottom: 0;
            color: #8b95a5;
            opacity: .8;
            font-weight: 400
        }

        .media {
            padding: 16px 12px;
            -webkit-transition: background-color .2s linear;
            transition: background-color .2s linear
        }

        .media-meta-day::before {
            margin-right: 16px
        }

        .media-meta-day::before,
        .media-meta-day::after {
            content: '';
            -webkit-box-flex: 1;
            flex: 1 1;
            border-top: 1px solid #ebebeb
        }

        .media-meta-day::after {
            content: '';
            -webkit-box-flex: 1;
            flex: 1 1;
            border-top: 1px solid #ebebeb
        }

        .media-meta-day::after {
            margin-left: 16px
        }

        .media-chat.media-chat-reverse {
            padding-right: 12px;
            padding-left: 64px;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: reverse;
            flex-direction: row-reverse
        }

        .media-chat {
            padding-right: 64px;
            margin-bottom: 0
        }

        .media {
            padding: 16px 12px;
            -webkit-transition: background-color .2s linear;
            transition: background-color .2s linear
        }

        .media-chat.media-chat-reverse .media-body p {
            float: right;
            clear: right;
            background-color: #48b0f7;
            color: #fff
        }

        .media-chat .media-body p {
            position: relative;
            padding: 6px 8px;
            margin: 4px 0;
            background-color: #f5f6f7;
            border-radius: 3px
        }

        .border-light {
            border-color: #f1f2f3 !important
        }

        .bt-1 {
            border-top: 1px solid #ebebeb !important
        }

        .publisher {
            position: relative;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            padding: 12px 20px;
            background-color: #f9fafb
        }

        .publisher>*:first-child {
            margin-left: 0
        }

        .publisher>* {
            margin: 0 8px
        }

        .publisher-input {
            -webkit-box-flex: 1;
            flex-grow: 1;
            border: none;
            outline: none !important;
            background-color: transparent
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: Roboto, sans-serif;
            font-weight: 300
        }

        .publisher-btn {
            background-color: transparent;
            border: none;
            color: #8b95a5;
            font-size: 16px;
            cursor: pointer;
            overflow: -moz-hidden-unscrollable;
            -webkit-transition: .2s linear;
            transition: .2s linear
        }

        .file-group {
            position: relative;
            overflow: hidden
        }

        .publisher-btn {
            background-color: transparent;
            border: none;
            color: #cac7c7;
            font-size: 16px;
            cursor: pointer;
            overflow: -moz-hidden-unscrollable;
            -webkit-transition: .2s linear;
            transition: .2s linear
        }

        .file-group input[type="file"] {
            position: absolute;
            opacity: 0;
            z-index: -1;
            width: 20px
        }

        .text-info {
            color: #48b0f7 !important
        }
    </style>
    <!--Carousel Wrapper-->

    



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js" integrity="sha512-wGKmIfDWUJSUvxUfUayQPJj7ADCD60La3up0VCbq+MTFcOUQ2hlH2McnYFafHgLTsOrGwOdiHKX4p1v0BerCyQ==" crossorigin="anonymous"></script>
    <script>

        new Vue({
            el: '#messages',
            data: {
                message:'',
                teacher_id:'<?php echo e($teacherid); ?>',
                student_id:'<?php echo e($STU_ID); ?>',
                allMessages:[]
            },
            methods:{
                getMessages(){
                    let url = '/get/messages/'+this.student_id;
                    this.$http.get(url).then((response) => {
                        console.log('response');
                        console.log(response);
                        console.log(response.data);
                        this.allMessages = response.data.data;
                        console.log(this.allMessages)
                    }).catch((error) => {
                        console.log('error');
                        console.log(error);
                    });
                },
                sendMessage(){
                    console.log(this.message);
                    console.log(this.teacher_id);
                    console.log(this.student_id);
                    let data = {
                        '_token':'<?php echo e(csrf_token()); ?>',
                        'to_user_id':this.student_id,
                        'from_user_id':this.teacher_id,
                        'message':this.message
                    };
                    let url = '<?php echo e(route('teacherSideMesages')); ?>';
                    this.$http.post(url,data).then((response) => {
                        console.log('response');
                        console.log(response);
                        console.log(response.data);
                        this.allMessages = response.data.data;
                        console.log(this.allMessages)
                        toastr.success('message send successfully');
                        this.message = '';
                        this.getMessages();
                    }).catch((error) => {
                        console.log('error');
                        console.log(error);
                        toastr.error(error);
                    });
                }
            },
            mounted(){
                console.log('message section vue intialize')
                this.getMessages();
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.teachersmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mustafa/Desktop/rikxtech/learnforlearning/resources/views/frontend/pages/teachers/MessagesStudent.blade.php ENDPATH**/ ?>