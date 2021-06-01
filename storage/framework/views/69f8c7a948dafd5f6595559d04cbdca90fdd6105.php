<?php $__env->startComponent('components.app'); ?>
<?php if(session()->has('message')): ?>
    <div class="alert alert-success font-bold color:green" >
        <?php echo e(session()->get('message')); ?>

    </div>
    <?php endif; ?>
<div>
    <div style="float: left; width: 30%;" >
        <h1 class="font-bold  ">Add a new Category:</h1>
        <form method="POST" action='<?php echo e(route('products.addCategory')); ?>' enctype="multipart/form-data" class="mr-8">
        <?php echo csrf_field(); ?>
            <input type="string" name="name" placeholder="Enter category name" required>
            <input class="bg-green-400 text-white rounded py-2 px-4 mt-3 hover:bg-green-300" type="submit" value="Submit">
        </form>
    </div>
    <h1 class="font-bold ">Delete a Category:</h1>
    <form method="POST" action='<?php echo e(route('products.deleteCategory')); ?>' enctype="multipart/form-data" class="mb-8">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <select class="mr-4" name="name" required>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
        <input class="bg-green-400 text-white rounded py-2 px-4 mt-3 hover:bg-green-300" type="submit" value="Submit">
    </form>
</div>
<h1 class="font-bold  mb-4">Increase/decrease Inventory:</h1>
<div>
    <div>
        <form method="POST" action='<?php echo e(route('products.inventory.update')); ?>' enctype="multipart/form-data" class="mb-8" >
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <table id="t01">
                <tr>
                  <th>Product Name</th>
                  <th>Current Stock</th>
                  <th>Categories</th>
                  <th>Stock Adjusment</th>
                  <th>Price (Points)</th>
                  <th>Add Categories (Ctrl + Click for multiple)</th>
                  <th>Remove Categories (Ctrl + Click for multiple)</th>
                  <th>View</th>
                </tr>
                <?php $index = 0 ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($product->name); ?></td>
                  <td><?php echo e($product->stock); ?></td>
                  <td>
                      <?php $__currentLoopData = $product->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php echo e($categorie->name); ?><br>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </td>
                  <input hidden type="number" name="products[<?php echo e($index); ?>][id]" value="<?php echo e($product->id); ?>" required>
                  <td><input type="number" name="products[<?php echo e($index); ?>][stock]" value="" ></td>
                  <td><input type="number" name="products[<?php echo e($index); ?>][price]" value="<?php echo e($product->price); ?>" ></td>
                  <td>
                    <select name="products[<?php echo e($index); ?>][categories][]" multiple>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </td>
                  <td>
                    <select name="products[<?php echo e($index); ?>][categoriesR][]" multiple>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </td>
                  <td><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-300"><a href="<?php echo e(route('products.show',$product->productname)); ?>" class="card-link">View</a></button></td>
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