<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <link rel="shortcut icon" href="<?php echo e(asset('asset/images/logo1.png')); ?>" type="image/png">
        </div>
        <ul class="nav">
            <li <?php if(isset($pageSlug) && $pageSlug=='dashboard' ): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('home')); ?>">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p><?php echo e(__('Dashboard')); ?></p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel"></i>
                    <span class="nav-link-text">User Management</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">

                        <li <?php if(isset($pageSlug) && $pageSlug=='users' ): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('userManagement')); ?>">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p><?php echo e(__('User')); ?></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            

            <li>
                <a data-toggle="collapse" href="#poster_colap" aria-expanded="true">
                    <i class="tim-icons icon-paper"></i>
                    <span class="nav-link-text"><?php echo e(__('Posters')); ?></span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="poster_colap">
                    <ul class="nav pl-4">
                        <li <?php if(isset($pageSlug) && $pageSlug=='Schedule' ): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('schedulePoster')); ?>">
                                <i class="tim-icons icon-pencil"></i>
                                <p><?php echo e(__('Schedule')); ?></p>
                            </a>
                        </li>
                        <li <?php if(isset($pageSlug) && $pageSlug=='howitworks' ): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('howItPoster')); ?>">
                                <i class="tim-icons icon-pencil"></i>
                                <p><?php echo e(__('howitworks')); ?></p>
                            </a>
                        </li>

                        <li <?php if(isset($pageSlug) && $pageSlug=='forteacher' ): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('forTeacher')); ?>">
                                <i class="tim-icons icon-pencil"></i>
                                <p><?php echo e(__('forteacher')); ?></p>
                            </a>
                        </li>


                        <li <?php if(isset($pageSlug) && $pageSlug=='forstudent' ): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('forStudent')); ?>">
                                <i class="tim-icons icon-pencil"></i>
                                <p><?php echo e(__('forstudent')); ?></p>
                            </a>
                        </li>

                        <li <?php if(isset($pageSlug) && $pageSlug=='forparents' ): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('forParents')); ?>">
                                <i class="tim-icons icon-pencil"></i>
                                <p><?php echo e(__('ForParents')); ?></p>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>

            <li>
                <a href="<?php echo e(route('email-config')); ?>">
                    <i class="tim-icons icon-settings"></i>
                    <p><?php echo e(__('Mail Configuration')); ?></p>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('pages.index')); ?>">
                    <i class="tim-icons icon-settings"></i>
                    <p><?php echo e(__('Pages')); ?></p>
                </a>
            </li>




        </ul>
    </div>
</div>
<?php /**PATH /home/mustafa/Desktop/rikxtech/learnforlearning/resources/views/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>