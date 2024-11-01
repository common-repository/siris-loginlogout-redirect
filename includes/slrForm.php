<div class="wrap">
    <h1>Siris Login/Logout Redirect</h1>
    <hr />
    <form method="post" action="options.php" class="form-horizontal col-md-6">
        <?php settings_fields( 'slr-settings' ); ?>
        <?php do_settings_sections( 'slr-settings' ); ?>
        <!--
        <div class="form-group">
            <label for="roles" class="col-lg-4 control-label">Roles:</label>
            <div class="col-lg-8">
                <?php foreach (get_editable_roles() as $role_name => $role_info): ?>
                <div class="radio">
                    <label>
                        <input name="optionsRadios" id="<?php echo $role_name ?>" value="<?php echo $role_name ?>" type="radio">
                            <?php echo $role_name ?>
                        </input>
                    </label>
                </div>
                <?php endforeach; ?>
                <span class="help-block">Select the Roles option to allow access to Dashboard.</span>
            </div>
        </div>
        -->
        <div class="form-group">
            <label for="redirectUrl" class="col-lg-4 control-label">Redirect URL:</label>
            <div class="col-lg-8">
                <input class="form-control" id="redirectUrl" placeholder="URL to redirect to..." type="text" 
                    name="slr_login_redirect_url" value="<?php echo get_option('slr_login_redirect_url'); ?>">
                <span class="help-block">Select the URL that the user should be redirected to on Successful Login.</span>
            </div>
        </div>
        <div class="form-group">
            <label for="loginPageURL" class="col-lg-4 control-label">Login Page URL:</label>
            <div class="col-lg-8">
                <input class="form-control" id="loginPageURL" placeholder="Login Page URL..." type="text" 
                    name="slr_login_page_url" value="<?php echo get_option('slr_login_page_url'); ?>" >
                <span class="help-block">Login Page URL is the page that the user will be taken to if login fails.</span>
            </div>
        </div>
        <div class="form-group">
            <label for="logoutPageURL" class="col-lg-4 control-label">Logout Page URL:</label>
            <div class="col-lg-8">
                <input class="form-control" id="loginPageURL" placeholder="Logout Page URL..." type="text" 
                    name="slr_logout_page_url" value="<?php echo get_option('slr_logout_page_url'); ?>" >
                <span class="help-block">Logout Page URL is the page that the user will be taken to when they logout.</span>
            </div>
        </div>
        <div class="form-group">
            <label for="redirectUrl" class="col-lg-4 control-label">Show Admin Bar:</label>
            <div class="col-lg-8">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" 
                               name="slr_show_admin_bar"
                               value="True"
                               <?php if( get_option( 'slr_show_admin_bar' ) == 'True' ) { echo 'checked="true"'; }?>
                               />Yes
                    </label>
                </div>
                <span class="help-block">This will show/hide the Admin Bar on the external facing site.</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8 col-lg-offset-4">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
