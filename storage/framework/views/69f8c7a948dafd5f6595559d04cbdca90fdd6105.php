<?php $__env->startComponent('components.app'); ?>
<h1 class="font-bold  mb-4">Increase/decrease Inventory:</h1>
<div>
    <?php if(session()->has('message')): ?>
    <div class="alert alert-success font-bold color:green" >
        <?php echo e(session()->get('message')); ?>

    </div>
    <?php endif; ?>
    
    <div>
        <form method="POST" action='<?php echo e(route('products.inventory.update')); ?>' enctype="multipart/form-data" class="mb-8" >
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            
            <table id="t01">
                <tr>
                  <th>Product Name</th>
                  <th>Current Stock</th>
                  <th>Stock Adjusment</th>
                  <th>Price (Points)</th>
                  <th>View</th>
                </tr>
                <?php $index = 0 ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($product->name); ?></td>
                  <td><?php echo e($product->stock); ?></td>
                  <input hidden type="number" name="products[<?php echo e($index); ?>][id]" value="<?php echo e($product->id); ?>" required>
                  <td><input type="number" name="products[<?php echo e($index); ?>][stock]" value="" ></td>
                  <td><input type="number" name="products[<?php echo e($index); ?>][price]" value="<?php echo e($product->price); ?>" ></td>
                  <td><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-300"><a href="<?php echo e(route('products.show',$product->id)); ?>" class="card-link">View</a></button></td>
                </tr>
                <?php $index++ ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <input class="bg-blue-400 text-white rounded py-2 px-4 mt-3 hover:bg-blue-300" type="submit" value="Submit">
        </form>
    </div>
</div>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/products/inventory/view.blade.php ENDPATH**/ ?>