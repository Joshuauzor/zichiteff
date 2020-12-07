            <!-- success message -->
            <?php if (session()->get('success')) : ?>
                <div class="alert alert-success text-center hide" role="alert">
                    <?= session()->get('success') ?>
                </div>
            <?php endif ?>
            <!-- success message ends -->

            <!-- error message -->
            <?php if (session()->get('error')) : ?>
                <div class="alert alert-danger text-center hide" role="alert">
                    <?= session()->get('error') ?>
                </div>
            <?php endif ?>
            <!-- error message ends -->
            
            <style>
                 .errors li{
                    list-style-type: none;
                    width: 100%;
                    text-align: center;
                }
                .errors ul{
                    padding-bottom: 0;
                    margin-bottom: 0;
                }
            </style>