<?php $__env->startComponent('components.app'); ?>
<h1 class="font-bold text-lg ">Checkout</h1>
    <div class="border border-gray-800 rounded-lg" sytle="float:left;">
        <h1 class="font-bold text-lg mb-3 block">Shipping Information:</h1>
        <h1 class="font-bold text-md block">Name: <?php echo e(auth()->user()->name); ?></h1>
        <h1 class="font-bold text-md block">Email: <?php echo e(auth()->user()->email); ?></h1>
        <h1 class="font-bold text-md block">Address: <?php echo e(auth()->user()->address); ?></h1>
        <h1 class="font-bold text-md block">City: <?php echo e(auth()->user()->city); ?></h1>
        <h1 class="font-bold text-md block">Province: <?php echo e(auth()->user()->province); ?></h1>
        <h1 class="font-bold text-md block">Postal Code/Zip: <?php echo e(auth()->user()->postalCode); ?></h1>
        <a class="font-bold text-md" style="color:blue"href="<?php echo e(route('profiles.edit',auth()->user()->username)); ?>">Change Shipping Info</a>
    </div>

    <div class="border border-gray-800 rounded-lg">
        <h1 class="font-bold text-lg mb-3 block">Order Summary:</h1>
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <ol>
                    <li>
                        <h1 class="font-bold text-md block">Product Name: <?php echo e($product->name); ?></h1>
                        <h1 class="font-bold text-md block">Size: <?php echo e($product->options->size); ?></h1>
                        <h1 class="font-bold text-md block">Color: <?php echo e($product->options->color); ?></h1>
                        <h1 class="font-bold text-md block">Quantity: <?php echo e($product->qty); ?></h1>
                        <h1 class="font-bold text-md mb-4 block">Price: <?php echo e($product->price); ?> Points</h1>
                    </li>
                </ol>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <h1 class="font-bold text-md block">Your Points: <?php echo e(auth()->user()->points); ?></h1>
        <h1 class="font-bold text-md block">Subtotal: <?php echo e(Cart::subtotal('0','','')); ?> Points</h1>
        <h1 class="font-bold text-md block">Your Points After This Order: <?php echo e(Auth()->user()->points - Cart::subtotal('0','','')); ?> Points</h1>
    </div>
    <h1 class="font-bold text-md mb-4 block">An Email confirmation will be sent once the order has been submitted.</h1>
    <a href="<?php echo e(route('checkout.confirm')); ?>"
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
            Confirm Order
        </a>

    <a href="<?php echo e(route('carts.index')); ?>"
            class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4">
                Back To Cart
        </a>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/checkout/index.blade.php ENDPATH**/ ?>