

<?php $__env->startSection('template_title'); ?>
    <?php echo e($user->name); ?>'s Profile
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-css'); ?>
    <style>
        #map-canvas {
            min-height: 300px;
            height: 100%;
            width: 100%;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php
$currentUser = Auth::user();
?>

<?php $__env->startSection('content'); ?>
    <div class="container my-2">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-header">
                        <?php echo e(trans('profile.showProfileTitle', ['username' => $user->name])); ?>

                    </div>
                    <div class="card-body">

                        <img src="<?php if($user->profile->avatar_status == 1): ?> <?php echo e($user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($user->email)); ?> <?php endif; ?>"
                            alt="<?php echo e($user->name); ?>" class="user-avatar">

                        <dl class="user-info">
                            <dt>
                                <?php echo e(trans('profile.showProfileUsername')); ?>

                            </dt>
                            <dd>
                                <?php echo e($user->name); ?>

                            </dd>

                            <dt>
                                <?php echo e(trans('profile.showProfileFirstName')); ?>

                            </dt>
                            <dd>
                                <?php echo e($user->first_name); ?>

                            </dd>

                            <?php if($user->last_name && ($currentUser->id == $user->id || $currentUser->hasRole('admin'))): ?>
                                <dt>
                                    <?php echo e(trans('profile.showProfileLastName')); ?>

                                </dt>
                                <dd>
                                    <?php echo e($user->last_name); ?>

                                </dd>
                            <?php endif; ?>

                            <?php if($user->email && ($currentUser->id == $user->id || $currentUser->hasRole('admin'))): ?>
                                <dt>
                                    <?php echo e(trans('profile.showProfileEmail')); ?>

                                </dt>
                                <dd>
                                    <?php echo e($user->email); ?>

                                </dd>
                            <?php endif; ?>

                            <?php if($user->profile): ?>
                                

                                <?php if($user->profile->location): ?>
                                    <dt>
                                        <?php echo e(trans('profile.showProfileLocation')); ?>

                                    </dt>
                                    <dd>
                                        <?php echo e($user->profile->location); ?> <br />

                                        <?php if(config('settings.googleMapsAPIStatus')): ?>
                                            Latitude: <span id="latitude"></span> / Longitude: <span id="longitude"></span>
                                            <br />

                                            <div id="map-canvas"></div>
                                        <?php endif; ?>
                                    </dd>
                                <?php endif; ?>

                                <?php if($user->profile->bio && ($currentUser->id == $user->id || $currentUser->hasRole('admin'))): ?>
                                    <dt>
                                        <?php echo e(trans('profile.showProfileBio')); ?>

                                    </dt>
                                    <dd>
                                        <?php echo e($user->profile->bio); ?>

                                    </dd>
                                <?php endif; ?>

                                <?php if($user->profile->twitter_username): ?>
                                    <dt>
                                        <?php echo e(trans('profile.showProfileTwitterUsername')); ?>

                                    </dt>
                                    <dd>
                                        <?php echo HTML::link('https://twitter.com/' . $user->profile->twitter_username, $user->profile->twitter_username, [
                                            'class' => 'twitter-link',
                                            'target' => '_blank',
                                        ]); ?>

                                    </dd>
                                <?php endif; ?>

                                <?php if($user->profile->github_username): ?>
                                    <dt>
                                        <?php echo e(trans('profile.showProfileGitHubUsername')); ?>

                                    </dt>
                                    <dd>
                                        <?php echo HTML::link('https://github.com/' . $user->profile->github_username, $user->profile->github_username, [
                                            'class' => 'github-link',
                                            'target' => '_blank',
                                        ]); ?>

                                    </dd>
                                <?php endif; ?>
                            <?php endif; ?>

                        </dl>

                        <?php if($user->profile): ?>
                            <?php if($currentUser->id == $user->id): ?>
                                <?php echo HTML::icon_link(
                                    URL::to('/profile/' . $currentUser->name . '/edit'),
                                    'fa fa-fw fa-cog',
                                    trans('titles.editProfile'),
                                    ['class' => 'btn btn-small btn-info btn-block'],
                                ); ?>

                            <?php endif; ?>
                        <?php else: ?>
                            <p>
                                <?php echo e(trans('profile.noProfileYet')); ?>

                            </p>
                            <?php echo HTML::icon_link(
                                URL::to('/profile/' . $currentUser->name . '/edit'),
                                'fa fa-fw fa-plus ',
                                trans('titles.createProfile'),
                                ['class' => 'btn btn-small btn-info btn-block'],
                            ); ?>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
    <?php if(config('settings.googleMapsAPIStatus')): ?>
        <?php echo $__env->make('scripts.google-maps-geocode-and-map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\bundler\resources\views/backend/pages/profiles/show.blade.php ENDPATH**/ ?>