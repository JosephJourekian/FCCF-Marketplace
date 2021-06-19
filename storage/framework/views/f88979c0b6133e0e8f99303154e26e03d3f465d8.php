<?php $__env->startComponent('components.app'); ?>

<h1 class="font-bold text-lg mb-4 block">FCCF Updates</h1>

<?php $__empty_1 = true; $__currentLoopData = $updates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="border border-gray-800 rounded-lg mb-2">
        <img class="rounded-lg mb-4" src="storage/<?php echo e($update->image); ?>" style="width:350px;height:200px;float:left">
        <h1 class="font-bold text-md mt-1 block">Posted on: <?php echo e($update->created_at->format('Y-m-d')); ?></h1>
        <h1 class="font-bold text-md block"><?php echo e($update->title); ?></h1>
        <h1 class="font-bold text-md block">By: <?php echo e($update->author); ?></h1>              
        <h1 class="font-bold text-md block mb-12"><?php echo e($update->excerpt); ?></h1>
        <p><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4 mb-1"><a href="<?php echo e(route('fccfUpdates.show',$update->updatename)); ?>" class="card-link">View Update</a></button></p>
        <?php if(auth()->user()->isAdmin()): ?>
            <form method="POST" action="<?php echo e(route('fccfUpdates.delete')); ?>"> 
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <input type="hidden" name="id" value="<?php echo e($update->id); ?>"> 
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="bg-red-400 text-white rounded py-4 px-6 hover:bg-red-500 mr-4">Delete Update</button>
            </form>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No Updates yet!</p>
        
    </div>
    <?php endif; ?>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/fccfUpdates/index.blade.php ENDPATH**/ ?>