
<?php $__env->startSection('title','Payment'); ?>
<?php $__env->startSection('content'); ?>

<style>
    .page-title-section{
            padding: 9px 0 90px
        }
   
</style>

<section class="d-flex justify-content-center align-items-center min-vh-100" 
    style="background: linear-gradient(135deg, #e3f2fd, #fce4ec);">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card border-0 shadow-lg p-4 rounded-4 text-center" 
                     style="background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(10px);">

                    <h2 class="fw-bold text-primary mb-2">
                        <i class="bi bi-credit-card"></i> Pay & Confirm
                    </h2>
                    <p class="text-muted mb-4">Complete your payment securely and share your receipt on WhatsApp</p>

                    <div class="border-top border-bottom py-3 mb-3">
                        <h4 class="mb-2 text-dark">
                            <strong>Plan:</strong> <?php echo e($purchase->plan_name); ?>

                        </h4>
                        <h4 class="text-success fw-bold">
                            <strong>Price:</strong> ₹<?php echo e(number_format($purchase->price, 2)); ?>

                        </h4>
                    </div>

                    <h3 class="mb-3 text-primary fw-semibold">Scan the QR Code to Pay</h3>

                    <div class="qr-wrapper mb-3">
                        <img src="<?php echo e(asset('public/assets/front/mains.jpeg')); ?>" 
                             alt="QR Code" 
                             class="img-fluid rounded shadow-lg border border-3 border-light"
                             style="max-width: 280px; transition: transform 0.3s ease;">
                    </div>

                    <p class="mt-3 mb-1 fw-semibold text-dark">
                        Note: Share your payment receipt on this number And Wait — <br>
                        You will receive a confirmation email about the activation of your plan within 24 hours.
                    </p>

                    <a href="https://wa.me/<?php echo e($settingsData->whatsapp); ?>" 
                       target="_blank"
                       class="btn btn-success rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="bi bi-whatsapp me-2"></i><?php echo e($settingsData->whatsapp); ?>

                    </a>

                </div>
            </div>
        </div>
    </div>

    <style>
        .qr-wrapper img:hover {
            transform: scale(1.08);
        }
        .card {
            animation: fadeInUp 0.8s ease;
        }
        @keyframes  fadeInUp {
            from {opacity: 0; transform: translateY(40px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\rayss\mainsorbitnew\public_html\resources\views/front/payment.blade.php ENDPATH**/ ?>