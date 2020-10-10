<?php $__env->startSection('title','Messages'); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .successColor{
            background-color: #ffc10e;
            padding: 12px 40px 12px 40px;
            margin: 19px 2px 2px 2px;
            color: white;
            border-radius: 6px;
            border:0px;
            cursor: pointer;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/student-homework.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">


    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150"
             style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/student-lesson-search/banner.jpg')); ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont slider-cont-4 text-center">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="What are you looking for?">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>
    <!-- Card -->

    <section id="about-part" class="about-tow pt-65">
        <div class="about-shape">
        </div>
        <h5 style="text-align: center;color: #006796;font-size: 28px;letter-spacing: 5px;">Find A Lesson</h5>
        <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== ADMISSION PART START ======-->

    <section class="admission-row pb-120" id="std-homework-find-lesson-sec">
        <div class="container">
            <div class="row justify-content-center">
                <form class="search_form" action="<?php echo e(route('searchstudents')); ?>" method="get">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-3" style="padding: 18px;">
                            <select class="selectpicker" name="level">
                                <optgroup label="Picnic">
                                    <?php
                                    if(@$Level){
                                    $aray1=[];
                                    $arraytypes=[];  ?>
                                    <?php foreach (@$Level as $key => $Level) {
                                        if(count($aray1)==0){
                                            array_push($aray1,$Level);
                                            array_push($arraytypes,$Level->name);

                                        }else{
                                            if(!in_array($Level->name, $arraytypes)){
                                                array_push($aray1,$Level);
                                                array_push($arraytypes,$Level->name);
                                                $cc=count($arraytypes);

                                            }
                                        }


                                    }
                                    ?>

                                    <option value="">Find Level</option>

                                    <?php $__currentLoopData = $aray1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subjects->id); ?>"><?php echo e($subjects->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php      }       ?>
                                </optgroup>
                            </select>
                        </div>

                        <div class="col-md-3" style="padding: 18px;">
                            <select class="selectpicker" name="student">
                                <optgroup label="Picnic">
                                    <?php
                                    if(@$Students){
                                    $aray1=[];
                                    $arraytypes=[];  ?>
                                    <?php foreach (@$Students as $key => $Students) {
                                        if(count($aray1)==0){
                                            array_push($aray1,$Students);
                                            array_push($arraytypes,$Students->fname);

                                        }else{
                                            if(!in_array($Students->fname, $arraytypes)){
                                                array_push($aray1,$Students);
                                                array_push($arraytypes,$Students->fname);
                                                $cc=count($arraytypes);

                                            }
                                        }


                                    }
                                    ?>

                                    <option value="">Find Students</option>

                                    <?php $__currentLoopData = $aray1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subjects->id); ?>"><?php echo e($subjects->fname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php      }       ?>
                                </optgroup>
                            </select>

                        </div>

                        <div class="col-md-3" style="padding: 18px;">
                            <select class="selectpicker" name="subject_id">
                                <optgroup label="Picnic">
                                    <?php
                                    $DBsub=DB::table('subjects')->limit(5)->get();
                                    if(@$DBsub){
                                    $aray1=[];
                                    $arraytypes=[];  ?>
                                    <?php foreach (@$DBsub as $key => $DBsub) {
                                        if(count($aray1)==0){
                                            array_push($aray1,$DBsub);
                                            array_push($arraytypes,$DBsub->name);

                                        }else{
                                            if(!in_array($DBsub->name, $arraytypes)){
                                                array_push($aray1,$DBsub);
                                                array_push($arraytypes,$DBsub->name);
                                                $cc=count($arraytypes);

                                            }
                                        }


                                    }
                                    ?>

                                    <option value="">Find Subjects</option>

                                    <?php $__currentLoopData = $aray1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subjects->id); ?>"><?php echo e($subjects->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php      }       ?>
                                </optgroup>
                            </select>
                        </div>

                        <div class="col-md-3" style="padding: 18px;">
                            <input type="submit" data-animation="fadeInUp" value="Search" data-delay="2s" class="main-slider-btn2"
                                   style="background-color: #FDBF11; border:none;">
                        </div>
                    </div>

                </form>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


    <section class="admission-row pb-120" id="std-homework-table-sec">
        <div class="container" id="studentM">
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table">

                        <thead>
                        <tr>
                            <th scope="col" class="table-heading">Sender</th>
                            <th scope="col" class="table-heading">Subject</th>
                            <th scope="col" class="table-heading">Date</th>
                            <th scope="col" class="table-heading">Action</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($message->from_user->fname); ?></td>
                                    <td><?php echo e($message->messages); ?></td>
                                    <td><?php echo e($message->created_at); ?></td>
                                    <td>
                                        <button class="btn btn-indigo btn-sm m-0" data-toggle="modal" data-target="#myModal-<?php echo e($message->id); ?>" id="upload-work-btn">Reply</button>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div id="myModal-<?php echo e($message->id); ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Reply to <?php echo e(strtoupper($message->from_user->fname)); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form>
                                                <input type="hidden" id="teacher_id" value="<?php echo e($message->from_user_id); ?>" />
                                            <div class="modal-body">
                                                <p>
                                                    To : <?php echo e($message->from_user->fname); ?> <input style="font-style: italic" readonly  value="<?php echo e($message->messages); ?>" class="form-control" />
                                                    <br>
                                                    Message : <textarea cols="6" rows="6" v-model="message" class="form-control">
                                                              </textarea>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="successColor" @click="sendMessage()">
                                                    <i class="fa fa-refresh fa-spin" v-if="loader"></i>
                                                    <i class="fa fa-refresh" v-if="!loader"></i>
                                                    Send
                                                </button>
                                            </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- row -->




        </div> <!-- container -->
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js" integrity="sha512-wGKmIfDWUJSUvxUfUayQPJj7ADCD60La3up0VCbq+MTFcOUQ2hlH2McnYFafHgLTsOrGwOdiHKX4p1v0BerCyQ==" crossorigin="anonymous"></script>
    <script>

        new Vue({
            el: '#studentM',
            data: {
                message:'',
                teacher_id:'',
                student_id:'<?php echo e(\Auth::user()->id); ?>',
                loader:false
            },
            methods:{
                sendMessage() {
                    if (this.message == '') {
                        toastr.error('please enter your message');
                    } else {
                        let teacher_id = $('#teacher_id').val();
                        let data = {
                            '_token': '<?php echo e(csrf_token()); ?>',
                            'to_user_id': teacher_id,
                            'from_user_id': this.student_id,
                            'message': this.message
                        };
                        console.log('data');
                        console.log(data);
                        let url = '<?php echo e(route('OurMessages')); ?>';
                        this.loader = true;
                        this.$http.post(url, data).then((response) => {
                            console.log('response');
                            console.log(response);
                            console.log(response.data);
                            this.message = '';
                            this.loader = false;
                            toastr.success('message send successfully');
                            setTimeout(() => {
                                window.location.reload();
                            },500);
                        }).catch((error) => {
                            console.log('error');
                            console.log(error);
                            toastr.error(error);
                            this.loader = false;
                        });
                    }
                }
            },
            mounted(){
                console.log('message section messages vue intialize')
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.masterStudent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mahad/Desktop/learnforlearning/resources/views/frontend/pages/students/myMessages.blade.php ENDPATH**/ ?>