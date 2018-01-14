<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php if(auth()->guard()->check()): ?>
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php echo e(Form::open(['route' => 'post_add'])); ?>

                                <?php echo e(Form::label('title', 'Add new 2ost')); ?>

                                <?php echo e(Form::textarea('title', '', ['style' => 'width: 100%; height: 50px;', 'placeholder' => 'Post title'])); ?>

                                <?php echo e(Form::textarea('content', '', ['style' => 'width: 100%; height: 150px;', 'placeholder' => 'Post content'])); ?>

                                <?php echo e(Form::submit('Add post')); ?>

                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>