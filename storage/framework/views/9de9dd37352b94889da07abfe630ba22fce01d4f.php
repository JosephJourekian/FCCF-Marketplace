<?php $__env->startComponent('components.app'); ?>
<?php if(session()->has('message')): ?>
    <div class="alert alert-success font-bold color:green" >
        <?php echo e(session()->get('message')); ?>

    </div>
<?php endif; ?>
<form method="POST" action="<?php echo e(route('techUpdates.store')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="name"
        >
            Update Name
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="name"
            id="name"
            autofocus
            value=""
            required
        >

        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="excerpt"
        >
            excerpt
        </label>

        <textarea class="border border-gray-400 p-2 w-full"
            type="text"
            name="excerpt"
            id="excerpt"
            value=""
            required
        ></textarea>

        <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="image"
        >
           Update Picture
        </label>

        <div class="flex">
            <input class="border border-gray-400 p-2 w-full"
                type="file"
                name="image"
                id="image"
                required
                
            >
        </div>

        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="body"
        >
            Body
        </label>

        <textarea class="textarea border border-gray-400 p-2 w-full"
            type="body"
            name="body"
            id="body"
            value=""
            required
        >
        </textarea>

        <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="url"
        >
            Links
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="url"
            id="url"
            autofocus
            value=""
            required
        
        >

        <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="mb-6">
        <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4"
        >
            Submit
        </button>

    </div>
</form>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/techUpdates/add.blade.php ENDPATH**/ ?>