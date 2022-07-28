<link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>" />
<script src="https://js.stripe.com/v3/"></script>

<?php if($message = Session::get('success')): ?>
    <div class="success">
        <strong><?php echo e($message); ?></strong>
    </div>
<?php endif; ?>


<?php if($message = Session::get('error')): ?>
    <div class="error">
        <strong><?php echo e($message); ?></strong>
    </div>
<?php endif; ?>

<form action="<?php echo e(url('charge')); ?>" method="post" id="payment-form">
    <div class="form-row">
        <p><input type="text" name="amount" placeholder="Enter Amount" /></p>
        <p><input type="email" name="email" placeholder="Enter Email" /></p>
        <label for="card-element">
            Credit or debit card
        </label>
        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>
    <p><button>Submit Payment</button></p>
    <?php echo e(csrf_field()); ?>

</form>
<script>
    var publishable_key = '<?php echo e(env('STRIPE_PUBLISHABLE_KEY')); ?>';
</script>
<script src="<?php echo e(asset('/js/card.js')); ?>"></script>
<?php /**PATH D:\LSKIT\bundler\resources\views/backend/pages/plan/stripe.blade.php ENDPATH**/ ?>