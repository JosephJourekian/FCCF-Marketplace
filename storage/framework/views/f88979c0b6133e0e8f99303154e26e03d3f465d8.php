<?php $__env->startComponent('components.app'); ?>

<h1 class="font-bold text-lg mb-4 block">FCCF Updates</h1>

<?php $__currentLoopData = $updates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="border border-gray-800 rounded-lg mb-2">
        <img class="rounded-lg mb-4" src="<?php echo e($update->image); ?>" style="width:350px;height:200px;float:left; position: relative;">
        <h1 class="font-bold text-md mt-1 ml-2 flex block">Posted on: <?php echo e($update->created_at->format('Y-m-d')); ?></h1>
        <h1 class="font-bold text-3xl block"><?php echo e($update->title); ?></h1>
        <h1 class="font-bold text-md block">By: <?php echo e($update->author); ?></h1>              
        <h1 class="font-bold text-md block mb-10"><?php echo e(\Illuminate\Support\Str::limit($update->excerpt, 75)); ?></h1>
        <div class="flex mb-3">
            <p><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4 ml-3"><a href="<?php echo e(route('fccfUpdates.show',$update->updatename)); ?>" class="card-link">View Update</a></button>
                <?php if(auth()->user()->isAdmin()): ?>
                    <form method="POST" action="<?php echo e(route('fccfUpdates.delete')); ?>"> 
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <input type="hidden" name="id" value="<?php echo e($update->id); ?>"> 
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 ">Delete Update</button>
                    </form>
                    <p><button class="bg-green-400 text-white rounded py-2 px-4 hover:bg-green-500 mr-4 ml-3"><a href="<?php echo e(route('fccfUpdates.edit',$update->updatename)); ?>" class="card-link">Edit this Update</a></button>
                <?php endif; ?>
            </p>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/fccfUpdates/index.blade.php ENDPATH**/ ?>