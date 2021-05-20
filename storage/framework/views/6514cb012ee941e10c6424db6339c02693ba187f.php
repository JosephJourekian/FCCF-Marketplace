<?php $__env->startComponent('components.app'); ?>
    <?php if(!empty($message)): ?>
    <div class="alert alert-success font-bold color:green" >
       <?php echo e($message); ?>

    </div>
    <?php endif; ?>
    <h1 class="font-bold text-lg mb-4 block">Shopping Cart</h1>
    <?php if(Cart::count() == 0): ?>
        <h1 class="font-bold text-md mb-4 block" style="text-align: center">Cart Empty!</h1>
    <?php else: ?>
        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="border border-gray-800 rounded-lg">
            <img class="rounded-lg" src="<?php echo e($product->options->img); ?>" style="width:150px;height:125px;float:left">
            <a class="font-bold text-md" style="color:blue"href="<?php echo e(route('products.show',$product->id)); ?>"><?php echo e($product->name); ?></a>
            <h1 class="font-bold text-md mt-4 block">Quantity: <?php echo e($product->qty); ?></h1>
            <form method="POST" action='<?php echo e(route('carts.update',$product->rowId)); ?>' enctype="multipart/form-data" >
             <?php echo csrf_field(); ?>
                <p>Update Quantity: <input type="number" id="num" name="num" value="1">
                    <input class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4" 
                    type="submit" value="Update" name="update" id="update">
                    <a href="<?php echo e(route('carts.remove',$product->rowId)); ?>"
                        class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4">
                    Remove
                </a>
                </p>
            </form>
            <h1 class="font-bold text-md mb-4 block">Price: <?php echo e($product->price); ?> Points</h1>
            <h1 class="font-bold text-md mb-4 block">Total: <?php echo e($product->subtotal('0','','')); ?> Points</h1>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <h1 class="font-bold text-md mb-4 block">Subtotal: <?php echo e(Cart::subtotal('0','','')); ?> Points</h1>

        <?php if(((float)auth()->user()->points) >= ((float)Cart::subtotal('0','',''))): ?>
            <a href="<?php echo e(route('checkout.index')); ?>"
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
            Checkout</a>

            <?php else: ?>
            <a href="#"
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
            Insufficient amount of points!</a>
        <?php endif; ?>

        <a href="<?php echo e(route('products.index')); ?>"
            class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4">
                Back To Products
        </a>
        
    <?php endif; ?>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/carts/index.blade.php ENDPATH**/ ?>