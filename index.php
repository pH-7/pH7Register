<?php
/**
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2013, Pierre-Henry Soria. All Rights Reserved.
 * @license        CC BY-NC-SA <http://creativecommons.org/licenses/by-nc-sa/3.0/>
 */
define('PH7', 1);

require 'process_form.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Get a free license key for pH7CMS</title>
        <meta name="description" content="Get a free license key for pH7CMS" />
        <meta name="author" content="Pierre-Henry Soria" />
        <link rel="stylesheet" href="./static/css/common.css" />
    </head>
    <body>
        <header>
            <h2 class="center">Get a free license key for pH7CMS</h2>
        </header>

        <section role="main" id="container">
            <?php if (!empty($sSuccess)): ?>
                <p class="lic_msg success"><?php echo $sSuccess ?></p>
            <?php else: ?>

                <?php if (!empty($sError)): ?>
                    <p class="error"><?php echo $sError ?></p>
                <?php endif ?>

                <form method="post" action="./">

                    <p>
                        <span class="mandatory">*</span>
                        <label for="first_name">Your First Name:</label><br />
                        <input type="text" name="first_name" id="first_name" value="<?php echo $sFirstName ?>" required="required" />
                    </p>

                    <p>
                        <span class="mandatory">*</span>
                        <label for="last_name">Your Last Name:</label><br />
                        <input type="text" name="last_name" id="last_name" value="<?php echo $sLastName ?>" required="required" />
                    </p>

                    <p>
                        <span class="mandatory">*</span>
                        <label for="email">Your Email:</label><br />
                        <input type="email" name="email" id="email" value="<?php echo $sEmail ?>" required="required" />
                    </p>

                    <p>
                        <span class="mandatory">*</span>
                        <label for="url">URL where you will install our software:</label><br />
                        <span class="small">If you install it on a local server, enter the URL of the local server.</span><br />
                        <input type="url" name="url" id="url" value="<?php echo $sUrl ?>" required="required" />
                    </p>

                    <p>
                        <span class="mandatory">*</span>
                        <label for="how_hear_about_software">How did you hear about our software:</label><br />
                        <textarea cols="30" rows="8" name="how_hear_about_software" id="how_hear_about_software" required="required"><?php echo $sHowHearAboutSoft ?></textarea>
                    </p>

                    <p><button type="submit" class="bold">Get a free license key!</button></p>

                </form>

            <?php endif ?>
        </section>

        <footer class="center">
            <p>By <strong><a href="http://ph-7.github.com">pH7</a></strong> &copy; <span id="copyrightYear"></span> | <small><a href="#" rel="nofollow">Privacy Policy</a> | <a href="#" rel="nofollow">Imprint</a></small></p>
        </footer>

        <script>document.getElementById('copyrightYear').innerHTML=(new Date).getFullYear()</script>
    </body>
</html>
