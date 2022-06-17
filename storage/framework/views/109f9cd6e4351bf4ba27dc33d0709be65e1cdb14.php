

<?php $__env->startSection('container'); ?>
    <style>
       

        /* Base styles */
        *,
        *:after,
        *:before {
            box-sizing: border-box;
        }

        html {
            font-size: 100%;
            line-height: 1.5;
            height: 100%;
        }

        body {
            position: relative;
            margin: 0;
            font-family: 'Work Sans', Arial, Helvetica, sans-serif;
            min-height: 100%;
            background: linear-gradient(to bottom, #68EACC 0%, #497BE8 100%);
            color: #777;
        }

        img {
            vertical-align: middle;
            max-width: 100%;
        }

        button {
            cursor: pointer;
            border: 0;
            padding: 0;
            background-color: transparent;
        }

        /* Container */
        .container {
            position: absolute;
            width: 24em;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            animation: intro .7s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        /* Profile Card */
        .profile {
            position: relative;
        }

        .profile--open {}

        .profile--open .profile__form {
            visibility: visible;
            height: auto;
            opacity: 1;
            transform: translateY(-6em);
            padding-top: 12em;
        }

        .profile--open .profile__fields {
            opacity: 1;
            visibility: visible;
        }

        .profile--open .profile__avatar {
            transform: translate(-50%, -1.5em);

        }

        .profile__form {
            position: relative;
            background: white;
            visibility: hidden;
            opacity: 0;
            height: 0;
            padding: 3em;
            border-radius: .25em;
            -webkit-filter: drop-shadow(0 0 2em rgba(0, 0, 0, 0.2));
            transition:
                opacity .4s ease-in-out,
                height .4s ease-in-out,
                transform .4s cubic-bezier(0.175, 0.885, 0.32, 1.275),
                padding .4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .profile__fields {
            opacity: 0;
            visibility: hidden;
            transition: opacity .2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .profile__avatar {
            position: absolute;
            z-index: 1;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 1.25em;
            overflow: hidden;

            display: block;
            transition: transform .3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            will-change: transform;
        }

        .profile__avatar:focus {
            outline: 0;
        }

        .profile__footer {
            padding-top: 1em;
        }


        /* Form */
        .field {
            position: relative;
            margin-bottom: 2em;
        }

        .label {

            height: 2rem;
            line-height: 2rem;
            bottom: 0;
            color: #999;
            transition: all .3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .input {
            width: 100%;
            font-size: 100%;
            border: 0;
            padding: 0;
            background-color: transparent;
            height: 2rem;
            line-height: 2rem;
            border-bottom: 1px solid #eee;
            color: #777;
            transition: all .2s ease-in;
        }

        .input:focus {
            outline: 0;
            border-color: #ccc;
        }

        /* Using required and a faux pattern to see if input has text from http://stackoverflow.com/questions/16952526/detect-if-an-input-has-text-in-it-using-css */
        .input:focus+.label,
        input:valid+.label {

            font-size: 0.75rem;
            color: #ccc;
        }

        /* Button */
        .btn {
            border: 0;
            font-size: 0.75rem;
            height: 2.5rem;
            line-height: 2.5rem;
            padding: 0 1.5rem;
            color: white;
            background: #8E49E8;
            text-transform: uppercase;
            border-radius: .25rem;
            letter-spacing: .2em;
            transition: background .2s;
        }

        .btn:focus {
            outline: 0;
        }

        .btn:hover,
        .btn:focus {
            background: #A678E2;
        }


        /* Intro animation */
        @keyframes  intro {
            from {
                opacity: 0;
                top: 0;
            }

            to {
                opacity: 1;
                top: 50%;
            }
        }
    </style>
    <?php if(session()->has('loginError')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('loginError')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="profile">
            <button class="profile__avatar" id="toggleProfile">
                <img src="<?php echo e(asset('storage/logo.png')); ?>" alt="" style="width: 100px ;height:100px;">
            </button>
            <div class="profile__form">
                <div class="profile__fields">
                    <form action="/login" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="field">
                            <input type="email" name="email" id="fieldUser" class="input" required pattern=.*\S.* />
                            <label for="fieldUser" class="label">E-mail</label>
                        </div>
                        <div class="field">
                            <input type="password" name="password" id="fieldPassword" class="input" required
                                pattern=.*\S.* />
                            <label for="fieldPassword" class="label">Password</label>
                        </div>
                        <div class="profile__footer">
                            <button type="submit" class="btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        /* Simple VanillaJS to toggle class */

        document.getElementById('toggleProfile').addEventListener('click', function() {
            [].map.call(document.querySelectorAll('.profile'), function(el) {
                el.classList.toggle('profile--open');
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kasirku\resources\views/index.blade.php ENDPATH**/ ?>