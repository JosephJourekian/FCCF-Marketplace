<?php $__env->startComponent('components.app'); ?>

<h1 class="font-bold text-lg mb-4 block">Purchase History</h1>

<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="border border-gray-800 rounded-lg mb-2">
        <h1 class="font-bold text-md mt-4 block">Purchased on: <?php echo e($order->created_at->format('Y-m-d')); ?></h1>
        <?php $__currentLoopData = unserialize($order['cart']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img class="rounded-lg mb-4" src="<?php echo e($item->options->img); ?>" style="width:150px;height:104px;float:left">
            <a class="font-bold text-md mb-3" style="color:blue"href="<?php echo e(route('products.show',$item->id)); ?>"><?php echo e($item->name); ?></a>
            <h1 class="font-bold text-md mt-6 block">Quantity: <?php echo e($item->qty); ?></h1>
            <h1 class="font-bold text-md mb-6 block">Price: <?php echo e($item->price); ?> Points</h1>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <h1 class="font-bold text-md mb-6 block">Subtotal of the order: <?php echo e($order->order_subtotal); ?> Points</h1>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/purchaseHistory/index.blade.php ENDPATH**/ ?>