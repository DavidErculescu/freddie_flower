<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span style="font-size: 30px"><?php echo e($post->title); ?></span>
                        <?php if($post->author->id == Auth::user()->id): ?>
                            <a href="<?php echo e(URL::route('post_delete', $post->id)); ?>" class="pull-right btn btn-danger">Delete</a>
                            <a href="<?php echo e(URL::route('post_form', $post->id)); ?>" class="pull-right btn btn-success">Edit</a>
                        <?php else: ?>
                            <span style="font-size: 30px; float: right; text-decoration: underline"><?php echo e($post->author->name); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="panel-body">
                        <?php echo e($post->content); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Comments:</h3>
            </div>
            <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b><?php echo e($comment->author->name); ?></b> @ <?php echo e($comment->created_at); ?>

                            <?php if(auth()->guard()->check()): ?>
                                <?php if($comment->author->id == Auth::user()->id): ?>
                                    <a href="<?php echo e(URL::route('comment_delete', $comment->id)); ?>" class="btn btn-danger btn-sm pull-right">X</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <div class="panel-body">
                            <?php echo e($comment->content); ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if(auth()->guard()->check()): ?>
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php echo e(Form::open(['route' => ['comment_add', $post->id]])); ?>

                                <?php echo e(Form::label('content', 'Leave a comment')); ?>

                                <?php echo e(Form::textarea('content', '', ['style' => 'width: 100%; height: 150px;'])); ?>

                                <?php echo e(Form::submit('Add comment')); ?>

                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>