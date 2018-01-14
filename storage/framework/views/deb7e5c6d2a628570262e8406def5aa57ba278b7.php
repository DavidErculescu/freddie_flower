<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php if(auth()->guard()->check()): ?>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                            
                            
                            
                            
                        

                        <form role="form" method="POST" action="<?php echo e(route('post_edit', $post->id)); ?>">
                            <input style="width: 100%; height: 50px;" type="text" class="form-control" name="title" value="<?php echo e($post->title); ?>">
                            <input style="width: 100%; height: 50px;" type="text" class="form-control" name="content" value="<?php echo e($post->content); ?>">
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>