<?php $__env->startComponent('components.master'); ?>
    <div class="container mx-auto flex justify-center">
        <div class="px-12 py-8 bg-gray-200 rounded-lg">
            <div class="col-md-8">
                <div class="font-bold text-lg mb-4"><?php echo e(_('Login')); ?></div>
                <form method="POST"
                    action="<?php echo e(route('login')); ?>"
                >
                    <?php echo csrf_field(); ?>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="email"
                        >
                            Email
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                            type="text"
                            name="email"
                            id="email"
                            autocomplete="email"
                            value="<?php echo e(old('email')); ?>"
                            required
                        >

                        <?php $__errorArgs = ['email'];
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
                            for="password"
                        >
                            Password
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                            type="password"
                            name="password"
                            id="password"
                            autocomplete="current-password"
                        >

                        <?php $__errorArgs = ['password'];
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
                        <div>
                            <input class="mr-1"
                                type="checkbox"
                                name="remember"
                                id="remember" <?php echo e(old('remember') ? ' checked' : ''); ?>

                            >

                            <label class="text-xs text-gray-700 font-bold uppercase"
                                for="remember"
                            >
                                Remember Me
                            </label>
                        </div>

                        <?php $__errorArgs = ['remember'];
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


                    <div>
                        <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2"
                        >
                            Submit
                        </button>

                        <a href="<?php echo e(route('password.request')); ?>" class="text-xs text-gray-700">Forgot Your Password?</a>
                    </div>
                </form>
            </div>
            <br>
            <b><a href="<?php echo e(route('register')); ?>" class="text-xs text-gray-700">Don't have an account? Register here</a></b>
        </div>
    </div>
<?php if (isset($__componentOriginal850c27230e92ef2157925d9cfb0586d6ba56a592)): ?>
<?php $component = $__componentOriginal850c27230e92ef2157925d9cfb0586d6ba56a592; ?>
<?php unset($__componentOriginal850c27230e92ef2157925d9cfb0586d6ba56a592); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/auth/login.blade.php ENDPATH**/ ?>