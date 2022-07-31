<script src="https://js.stripe.com/v3/"></script>
<style>
    .StripeElement {
        box-sizing: border-box;

        height: 40px;

        padding: 10px 12px;

        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
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

<form action="<?php echo e(route('payment.strippe', [$package_id])); ?>" method="post" id="payment-form">
    <div class="form-row">
        <p><input type="hidden" value="<?php echo e($amount); ?>" name="amount" /></p>
        <p><input type="hidden" name="email" value="<?php echo e(auth()->user()->email); ?>" /></p>
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
<?php /**PATH D:\laragon\www\bundler\resources\views/backend/pages/plan/stripe.blade.php ENDPATH**/ ?>