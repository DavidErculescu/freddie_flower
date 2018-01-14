<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="<?php echo e(URL::route('post_single', $post->id)); ?>">
                                <?php echo e($post->title); ?>

                            </a>
                            <span class="pull-right"><?php echo e($post->created_at); ?></span>
                        </div>

                        <div class="panel-body">
                            <?php echo e($post->content); ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>