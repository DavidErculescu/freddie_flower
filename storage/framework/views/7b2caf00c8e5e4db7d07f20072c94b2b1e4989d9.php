<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php if(auth()->guard()->check()): ?>
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php if(isset($post->id)): ?>
                                <?php echo e(Form::model($post, array('route' => array('post_edit', $post->id)))); ?>

                                    <?php echo e(Form::label('title', 'Edit your post')); ?>

                                    <div>
                                        <?php echo e(Form::text('title', $post->title)); ?>

                                        <?php echo e(Form::textarea('content', $post->content, ['style' => 'margin-top:15px; width: 100%; height: 150px;'])); ?>

                                        <?php echo e(Form::submit('Edit post')); ?>

                                    </div>
                                <?php echo e(Form::close()); ?>

                            <?php else: ?>
                                <?php echo e(Form::open(['route' => 'post_add'])); ?>

                                    <?php echo e(Form::label('title', 'Add new post')); ?>

                                    <div>
                                        <?php echo e(Form::text('title', '', ['placeholder' => 'Post title'])); ?>

                                        <?php echo e(Form::textarea('content', '', ['style' => 'margin-top:15px; width: 100%; height: 150px;', 'placeholder' => 'Post content'])); ?>

                                        <?php echo e(Form::submit('Add post')); ?>

                                    </div>
                                <?php echo e(Form::close()); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>