
<?php $__env->startComponent('components.app'); ?>
<h1 class="font-bold  mb-4">List of Users</h1>
<div>
    <?php if(session()->has('message')): ?>
    <div class="alert alert-success font-bold color:green" >
        <?php echo e(session()->get('message')); ?>

    </div>
    <?php endif; ?>
    
    <div>
        <form method="POST" action='<?php echo e(route('viewUsers')); ?>' enctype="multipart/form-data" class="mb-8" >
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            
            <table id="t01">
                <tr>
                  <th>User Name</th>
                  <th>Point Amount</th>
                  <th>Current Type</th>
                  <th>Change Type</th>
                  <th>Point Adjustment</th>
                  <th>View Purchase History</th>
                </tr>
                <?php $index = 0 ?>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($user->name); ?></td>
                  <td><?php echo e($user->points); ?></td>
                  <input hidden type="number" name="users[<?php echo e($index); ?>][id]" value="<?php echo e($user->id); ?>" required>
                  <td><?php echo e($user->type); ?></td>
                  <td><select name="users[<?php echo e($index); ?>][type]" value="<?php echo e($user->type); ?>">
                    <option></option>
                    <option value="admin">Admin</option>
                    <option value="default">Default</option>
                  </select></td>
                  <td><input type="number" name="users[<?php echo e($index); ?>][points]" value="" ></td>
                  <td><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-300"><a href="<?php echo e(route('purchaseHistory',$user->username)); ?>" class="card-link">Purchase History</a></button></td>
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
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/viewUsers.blade.php ENDPATH**/ ?>