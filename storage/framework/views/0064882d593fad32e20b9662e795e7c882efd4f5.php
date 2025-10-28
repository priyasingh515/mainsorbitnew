<!DOCTYPE html>
<html>
<head>
    <title>Plan Status Update</title>
</head>
<body>
    <h2><?php echo e(config('app.name')); ?></h2> <!-- Company Name -->

    <p>Dear Student,</p> <!-- Fixed greeting -->

    <p>Your plan status has been updated to: <strong><?php echo e($status); ?></strong>.</p>

    <p>Thank you for choosing <?php echo e(config('app.name')); ?>!</p>
</body>
</html>
<?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/emails/plan_status_updated.blade.php ENDPATH**/ ?>