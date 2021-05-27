<meta name="viewport" content="width=device-width, initial-scale=1">
<ul>
    <!-- -->
    <li>
        <a href="<?php echo e(route('home')); ?>" class="font-bold text-lg mb-4 block">
            Home <!--or use can use /tweets -->
        </a>
    </li>
    <li>
        <p class="font-bold text-lg mb-4 block">
            My points: <?php echo e(auth()->user()->points); ?>

        </p>
    </li>
    <li>
        <a href="<?php echo e(route('carts.index')); ?>" class="font-bold text-lg mb-4 block">
            My Cart (<?php echo e(Cart::count()); ?>)
        </a>
    </li>
    <li>
        <div class="dropdown">
            <button class="dropbtn">Products</button>
            <div class="dropdown-content">
              <a href="<?php echo e(route('products.index')); ?>">View Products</a>
              <a href="<?php echo e(route('products.add')); ?>" >Add Products</a>
              <a href="<?php echo e(route('products.inventory.view')); ?>">Edit Inventory</a>
            </div>
        </div>
    </li>
    
    <li>
        <div class="dropdown">
            <button class="dropbtn">My Profile</button>
            <div class="dropdown-content">
                <a href="<?php echo e(route('profiles.edit',auth()->user()->username)); ?>">Edit Profile</a>
                <a href="<?php echo e(route('purchaseHistory',auth()->user()->username)); ?>">Purchase History</a>
                <a href="<?php echo e(route('viewUsers')); ?>">View Users</a>            
            </div>
    </li>
    <li>
        <form method="POST" action="/logout">
            <?php echo csrf_field(); ?>
            <button class="font-bold text-lg">Logout</button>
        </form>
    </li>
</ul><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/sidebarAdmin.blade.php ENDPATH**/ ?>