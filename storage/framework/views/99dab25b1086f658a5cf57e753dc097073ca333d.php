<?php $__env->startComponent('components.master'); ?>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                <div class="lg:w-32">
                    <?php if(auth()->user()->isAdmin()): ?>
                        <?php echo $__env->make('sidebarAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php echo $__env->make('sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
                <div class="lg:flex-1 lg:mx-10 " style="max-width: 1000px">
                    <?php echo e($slot); ?>

                </div>
            </div>
        </main>
    </section>
<?php if (isset($__componentOriginal850c27230e92ef2157925d9cfb0586d6ba56a592)): ?>
<?php $component = $__componentOriginal850c27230e92ef2157925d9cfb0586d6ba56a592; ?>
<?php unset($__componentOriginal850c27230e92ef2157925d9cfb0586d6ba56a592); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/components/app.blade.php ENDPATH**/ ?>